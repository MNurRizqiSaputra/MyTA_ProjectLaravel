<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dosen_pengujis()
    {
        return $this->hasMany(DosenPenguji::class);
    }

    public function dosen_pembimbings()
    {
        return $this->hasMany(DosenPembimbing::class);
    }
}
