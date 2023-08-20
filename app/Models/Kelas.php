<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kelas extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'kelas';
    protected $fillable = ['nama_kelas'];

    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}
