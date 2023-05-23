<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarProposal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tugas_akhir()
    {
        return $this->belongsTo(TugasAkhir::class);
    }

    public function seminar_proposal_nilais()
    {
        return $this->hasMany(SeminarProposalNilai::class);
    }
}
