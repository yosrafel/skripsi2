<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DosenKelas extends Model
{
    protected $table="dosen_kelas";
    protected $fillable = ["dosen_id, kelas_id, bkd_inqa, bkd_kelas, verifikasi, created_at, updated_at"];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function dosen(){
        return $this->belongsTo(Dosen::class);
    }

    public function bkd(){
        $a = null;
        $bkd = null;
        if($this->sifat == 'Team Teaching'){
            $bkd = (($this->jumlah_mhs / 40) * ($this->sks * 1.5)) / $this->jumlah_dosen;
            return $bkd;
        }elseif($this->sifat == 'Group Teaching'){
            $bkd = (($this->jumlah_mhs / 40) * $this->sks) / $this->jumlah_dosen;
            return $bkd;
        }else{
            $variabel = 0.5;
            $a = $this->jumlah_mhs * $variabel;
            return $a;
        }
    }
}
