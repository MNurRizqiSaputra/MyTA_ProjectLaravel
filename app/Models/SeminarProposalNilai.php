<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarProposalNilai extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'seminar_proposal_nilai';
    public function seminar_proposal()
    {
        return $this->belongsTo(SeminarProposal::class);
    }
    public function dosen_penguji()
    {
        return $this->belongsTo(DosenPenguji::class);
    }
}
