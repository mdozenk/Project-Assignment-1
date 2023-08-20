<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Murid extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'murids';
    protected $fillable = ['nama_murid', 'nama_kelas','mata_pelajaran_id','nilai'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mata_pelajaran()
    {
        return $this->hasMany(MataPelajaran::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}