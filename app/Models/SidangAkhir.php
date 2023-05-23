<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidangAkhir extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function tugas_akhir()
    {
        return $this->belongsTo(TugasAkhir::class);
    }
    public function sidang_akhir_nilai()
    {
        return $this->hasMany(SidangAkhirNilai::class);
    }
}
