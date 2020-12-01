<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class Gejala extends Model {
    protected $table = 'gejala';
    protected $guarded = [];
    protected $with = ['aturan'];

    public function aturan(){
        return $this->belongsToMany(Gangguan::class,'aturan','id_gejala','id_gangguan')->withPivot('nilai_keyakinan');
    }
    public static function tentukanFod($nilai_gejala){
            $fodObj = new stdClass;
            $fodObj->gangguan = implode(',', Aturan::fod());
            $fodObj->nilai_keyakinan = 1 - $nilai_gejala;
            return $fodObj;
    }
}