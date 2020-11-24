<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gangguan extends Model {
    protected $table = 'gangguan';
    protected $guarded = [];

    public function aturan(){
        return $this->belongsToMany(Gejala::class,'aturan','id_gejala','id_gangguan')->withPivot('nilai_keyakinan');
    }
}