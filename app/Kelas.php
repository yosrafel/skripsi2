<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table="kelas";
    protected $fillable = ["nama_matakuliah, grup, sifat, sks, jumlah_mhs, prodi, tahun_ajaran, semester"];
    public $timestamps = false;

    public function dosen(){
        return $this->belongsToMany(Dosen::class)->withPivot('bkd_inqa', 'bkd_kelas', 'verifikasi')->withTimeStamps();
    }
    public function dosenKelas(){
        return $this->hasMany(DosenKelas::class);
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class);
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

    public function bkdinq(){
        $a = $this->sks / $this->jumlah_dosen;
        return $a;
    }
}
