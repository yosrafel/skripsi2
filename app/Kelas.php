<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table="kelas";
    protected $fillable = ["id", "kode_matkul", "nama_matkul", "grup", "sifat", "sks", "jumlah_mhs", "prodi", "tahun_ajaran", "semester", "jumlah_dosen"];
    public $timestamps = false;

    public function dosen(){
        return $this->belongsToMany(Dosen::class)->withPivot('bkd_inqa', 'bkd_kelas', 'verifikasi')->withTimeStamps();
    }
    public function dosenKelas(){
        return $this->hasMany(DosenKelas::class);
    }

    public function bkd(){
        $a = null;
        $bkd = null;
        if($this->sifat == 'Team Teaching'){
            if($this->jumlah_mhs <= 40){
                $bkd = ($this->sks * 1.5) / $this->jumlah_dosen;
                return $bkd;
            }else{
                $bkd = (($this->jumlah_mhs / 40) * ($this->sks * 1.5)) / $this->jumlah_dosen;
                return $bkd;
            }
        }elseif($this->sifat == 'Group Teaching'){
            if($this->jumlah_mhs <= 40){
                $bkd = $this->sks / $this->jumlah_dosen;
                return $bkd;
            }else{
                $bkd = (($this->jumlah_mhs / 40) * $this->sks) / $this->jumlah_dosen;
                return $bkd;
            }
        }elseif($this->sifat == 'Tatap Muka'){
            if($this->jumlah_mhs <= 40){
                $bkd = $this->sks / $this->jumlah_dosen;
                return $bkd;
            }else{
                $bkd = (($this->jumlah_mhs / 40) * $this->sks) / $this->jumlah_dosen;
                return $bkd;
            }
        }elseif($this->sifat == 'Praktikum'){
            if($this->jumlah_mhs <= 40){
                $bkd = $this->sks / $this->jumlah_dosen;
                return $bkd;
            }else{
                $bkd = (($this->jumlah_mhs / 40) * $this->sks) / $this->jumlah_dosen;
                return $bkd;
            }
        }elseif($this->sifat == 'Kelas Lab'){
            if($this->jumlah_mhs <= 40){
                $bkd = 3.5 / $this->jumlah_dosen;
                return $bkd;
            }else{
                $bkd = (($this->jumlah_mhs / 40) * 3.5) / $this->jumlah_dosen;
                return $bkd;
            }
        }elseif($this->sifat == 'Asistensi'){
            $variabel = 0.5;
            $bkd = $this->jumlah_mhs * $variabel;
            return $bkd;
        }
    }

    public function bkdinq(){
        $a = $this->sks / $this->jumlah_dosen;
        return $a;
    }
}
