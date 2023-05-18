<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPenguji extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function seminar_proposal_nilais()
    {
        return $this->hasMany(SeminarProposalNilai::class);
    }
    public function seminar_penelitian_nilais()
    {
        return $this->hasMany(SeminarPenelitianNilai::class);
    }
    public function sidang_akhir_nilais()
    {
        return $this->hasMany(SidangAkhirNilai::class);
    }
}
