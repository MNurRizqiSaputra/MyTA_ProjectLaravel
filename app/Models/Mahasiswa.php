<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nim', 'foto', 'jurusan_id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tugas_akhir()
    {
        return $this->hasOne(TugasAkhir::class);
    }
}
