<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen_pembimbing()
    {
        return $this->belongsTo(DosenPembimbing::class);
    }

    public function seminar_proposal()
    {
        return $this->hasOne(SeminarProposal::class);
    }
    public function seminar_penelitian()
    {
        return $this->hasOne(SeminarPenelitian::class);
    }
    public function sidang_akhir()
    {
        return $this->hasOne(SidangAkhir::class);
    }
}
