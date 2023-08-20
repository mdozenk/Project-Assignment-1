<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Nilai extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'nilai';
    protected $fillable = ['murid_id', 'mata_pelajaran_id', 'latihan1', 'latihan2', 'latihan3', 'latihan4', 'ulangan1', 'ulangan2', 'uts', 'uas', 'total_nilai'];

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
};