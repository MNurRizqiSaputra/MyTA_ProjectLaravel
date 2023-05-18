<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidangAkhirNilai extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'sidang_akhir_nilai';
    public function sidang_akhir()
    {
        return $this->belongsTo(SidangAkhir::class);
    }
    public function dosen_penguji()
    {
        return $this->belongsTo(DosenPenguji::class);
    }
}
