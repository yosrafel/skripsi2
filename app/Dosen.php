<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table="dosen";
    protected $fillable = ["nik, user_id, nama, alamat, no_telp, prodi"];
    public $timestamps = false;
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kelas(){
        return $this->belongsToMany(Kelas::class)->withPivot('bkd_inqa', 'bkd_kelas', 'verifikasi')->withTimeStamps();
    }

    public function dosenKelas(){
        return $this->hasMany(DosenKelas::class);
    }

    public function pekerjaan(){
        return $this->hasMany(Pekerjaan::class);
    }

    public function bkdinq(){
        $a = $this->kelas->sks / $this->kelas->jumlah_dosen;
        return $a;
    }
    public function bkd(){
        $a = $this->kelas->sks / $this->kelas->jumlah_dosen;
        return $a;
    }
}
