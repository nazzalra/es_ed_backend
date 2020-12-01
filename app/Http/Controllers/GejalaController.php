<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\Gangguan;
use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class GejalaController extends Controller{
    public function getGejala(Request $request){
        $results = Gejala::whereIn('id',$request->gejala)->get();
        $json = json_encode($results);
        return $json;
    }
    public function identifikasi(Request $request){
        $daftar_aturan = $this->getAturanGejala($request->gejala);
        $m3 = array();
        while(!empty($daftar_aturan)){
            $m1 = $this->setBPA($e = array_shift($daftar_aturan));
            $m2 = empty($m3)?$this->setBPA($e = array_shift($daftar_aturan)):$this->setBPAFrom($m3);
            $m3 = array();
            for ($i = 0; $i < count($m2); $i++) {
                for ($j = 0; $j < 2; $j++) {
                        $key = $this->getKey($m1[$j],$m2[$i]);
                        if (!isset($m3[$key])) { 
                            $m3[$key] = $m1[$j]->nilai_keyakinan * $m2[$i]->nilai_keyakinan;
                        } else {
                            $m3[$key] += $m1[$j]->nilai_keyakinan * $m2[$i]->nilai_keyakinan;
                        }
                }
            }
            $m3 = $this->hitungAturanDempster($m3);
        }
        return response()->json(
            $this->getKesimpulan($m3)
        );
    }
    protected function getAturanGejala($gejala){
        return json_decode(Aturan::gejala($gejala));
    }
    protected function setBPA($e){
        $m[0] = $e;
        $m[1] = Gejala::createFod($m[0]->nilai_keyakinan);
        return $m;
    }
    protected function setBPAFrom($m3){
        foreach ($m3 as $key => $val) { // konvert dari array assosiative ke objek
                $m = new stdClass;
                $m->gangguan = $key;
                $m->nilai_keyakinan = $val;
                $m2[] = $m;
        }
        return $m2;
    }
    protected function getKey($m1_j,$m2_i){
        $x = explode(',', $m1_j->gangguan);
        $y = explode(',', $m2_i->gangguan);
        sort($x);
        sort($y);
        $xy = array_intersect($x, $y);
        // buat array assosiative
        return empty($xy)?"himpunan_kosong":implode(',',$xy);
    }
    protected function hitungAturanDempster($m3){
        foreach ($m3 as $key => $val) {
            if ($key != "himpunan_kosong") {
                $m3[$key] = $val / (1 - (isset($m3["himpunan_kosong"]) ? $m3["himpunan_kosong"] : 0));
            }
        }
        unset($m3["himpunan_kosong"]);
        return $m3;
    }
    protected function getGangguan($ids){
        return Gangguan::whereIn('id',explode(",",$ids))->get();
    }
    protected function getKesimpulan($m3){
        unset($m3[implode(',',Aturan::fod())]);
        arsort($m3);
        $keys = array_keys($m3);
        return [
            'gangguan' => $this->getGangguan($keys[0]),
            'nilai_keyakinan' => $m3[$keys[0]]
        ];
    }
}