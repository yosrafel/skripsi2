<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table="pekerjaan";
    protected $fillable = ["dosen_id, jenis_pekerjaan, keterangan, sks, tahun_ajaran, created_at, updated_at"];

    public function dosen(){
        return $this->belongsTo(Dosen::class);
    }

    public function bkdnp(){
        $sks = $this->sks;
        return $sks;
    }
}
