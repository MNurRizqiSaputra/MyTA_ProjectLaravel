<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function dosens()
    {
        return $this->hasMany(Dosen::class);
    }
}
