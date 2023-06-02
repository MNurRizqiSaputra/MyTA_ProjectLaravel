<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarPenelitian extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function tugas_akhir()
    {
        return $this->belongsTo(TugasAkhir::class);
    }
    public function seminar_penelitian_nilais()
    {
        return $this->hasMany(SeminarPenelitianNilai::class);
    }
}
