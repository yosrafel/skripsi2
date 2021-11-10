<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table="matakuliah";
    protected $fillable = ["kode, nama, pilah, sks"];
    public $timestamps = false;

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
}
