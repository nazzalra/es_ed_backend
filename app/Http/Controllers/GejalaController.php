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
        $daftar_aturan = $this->dapatkanAturan($request->gejala);
        $m3 = [];
        while(!empty($daftar_aturan)){
            $m1 = $this->tentukanBPA(array_shift($daftar_aturan));
            $m2 = empty($m3)?$this->tentukanBPA(array_shift($daftar_aturan)):$this->tentukanBPAdari($m3);
            $m3 = $this->hitungKombinasiAturanDempster($m1,$m2);
        }
        return response()->json(
            $this->dapatkanKesimpulan($m3)
        );
    }
    protected function dapatkanAturan($gejala){
        return json_decode(Aturan::gejala($gejala));
    }
    protected function tentukanBPA($e){
        $m[0] = $e;
        $m[1] = Gejala::tentukanFod($m[0]->nilai_keyakinan);
        return $m;
    }
    protected function tentukanBPAdari($m3){
        foreach ($m3 as $key => $val) { // konvert dari array assosiative ke objek
                $m = new stdClass;
                $m->gangguan = $key;
                $m->nilai_keyakinan = $val;
                $m2[] = $m;
        }
        return $m2;
    }
    protected function dapatkanHimpunanGangguan($m1_j,$m2_i){
        $x = explode(',', $m1_j->gangguan);
        $y = explode(',', $m2_i->gangguan);
        sort($x);
        sort($y);
        $xy = array_intersect($x, $y);
        // buat array assosiative
        return empty($xy)?"himpunan_kosong":implode(',',$xy);
    }
    protected function hitungKombinasiAturanDempster($m1,$m2){
        $m3 = [];
        for ($i = 0; $i < count($m2); $i++) {
            for ($j = 0; $j < 2; $j++) {
                    $himpunan_gangguan = $this->dapatkanHimpunanGangguan($m1[$j],$m2[$i]);
                    if (!isset($m3[$himpunan_gangguan])) { 
                        $m3[$himpunan_gangguan] = $m1[$j]->nilai_keyakinan * $m2[$i]->nilai_keyakinan;
                    } else {
                        $m3[$himpunan_gangguan] += $m1[$j]->nilai_keyakinan * $m2[$i]->nilai_keyakinan;
                    }
            }
        }
        return $this->tanpaEvidentialConflict($m3);
    }
    protected function dapatkanDataGangguan($ids){
        return Gangguan::whereIn('id',explode(",",$ids))->get();
    }
    protected function dapatkanKesimpulan($m3){
        array_pop($m3);
        arsort($m3);
        return [
            'gangguan' => $this->dapatkanDataGangguan(array_key_first($m3)),
            'nilai_keyakinan' => array_shift($m3)
        ];
    }
    protected function tanpaEvidentialConflict($m3){
        foreach ($m3 as $himpunan_gangguan => $nilai) {
            if ($himpunan_gangguan != "himpunan_kosong") {
                $m3[$himpunan_gangguan] = $nilai / (1 - (isset($m3["himpunan_kosong"]) ? $m3["himpunan_kosong"] : 0));
            }
        }
        unset($m3["himpunan_kosong"]);
        return $m3;
    }
}