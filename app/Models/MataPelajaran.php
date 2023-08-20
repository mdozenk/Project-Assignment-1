<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MataPelajaran extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'mata_pelajarans';


    protected $fillable = ['nama_mata_pelajaran'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
