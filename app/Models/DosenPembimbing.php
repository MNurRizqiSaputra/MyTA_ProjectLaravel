<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPembimbing extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function tugas_akhirs()
    {
        return $this->hasMany(TugasAkhir::class);
    }
}
