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
        $aturan_gejala = json_decode(Aturan::gejala($request->gejala)); // get aturan gejala
        // $aturan_fod = Aturan::fod();
        $m3 = array();
        while(!empty($aturan_gejala)){
            $m1[0] = array_shift($aturan_gejala);
            $m1[1] = Gejala::createFod($m1[0]->nilai_keyakinan);
            $m2 = array();
            if (empty($m3)) {
                $m2[0] = array_shift($aturan_gejala);
            } else {
                // $densitas_baru merupakan array assosiative
                foreach ($m3 as $key => $val) {
                    if ($key != "himpunan_kosong") {
                        $m = new stdClass;
                        $m->gangguan = $key;
                        $m->nilai_keyakinan = $val;
                        $m2[] = $m;
                    }
                }
                // $densitas2 merupakan hasil konversi struktur $densitas_baru yang array assosiative ke array numberik
            }
            $nilai_fod2 = 1;
            foreach ($m2 as $m) $nilai_fod2 -= $m->nilai_keyakinan; // memperoleh densitas theta
            $fodObj = new stdClass;
            $fodObj->gangguan = implode(',', Aturan::fod());
            $fodObj->nilai_keyakinan = $nilai_fod2;
            $m2[] = $fodObj;
            $m2_len = count($m2);
            $m3 = array();
            for ($y = 0; $y < $m2_len; $y++) {
                for ($x = 0; $x < 2; $x++) {
                    if (!($y == $m2_len - 1 && $x == 1)) {
                        $v = explode(',', $m1[$x]->gangguan);
                        $w = explode(',', $m2[$y]->gangguan);
                        sort($v);
                        sort($w);
                        $vw = array_intersect($v, $w);
                        // buat array assosiative
                        $key = empty($vw)?"himpunan_kosong":implode(',',$vw);
                        if (!isset($m3[$key])) {
                            $m3[$key] = $m1[$x]->nilai_keyakinan * $m2[$y]->nilai_keyakinan;
                        } else {
                            $m3[$key] += $m1[$x]->nilai_keyakinan * $m2[$y]->nilai_keyakinan;
                        }
                    }
                }
            }
            foreach ($m3 as $key => $val) {
                if ($key != "himpunan_kosong") {
                    $m3[$key] = $val / (1 - (isset($m3["himpunan_kosong"]) ? $m3["himpunan_kosong"] : 0));
                }
            }
        }
        unset($m3["himpunan_kosong"]);
        arsort($m3);
        $keys = array_keys($m3);
        $gangguan = Gangguan::whereIn('id',explode(",",$keys[0]))->get();
        return response()->json([
            'gangguan' => $gangguan,
            'nilai_keyakinan' => $m3[$keys[0]]
        ]);
    }
}