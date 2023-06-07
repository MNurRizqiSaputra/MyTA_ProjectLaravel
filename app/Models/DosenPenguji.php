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
    public function seminar_proposals()
    {
        return $this->hasMany(SeminarProposalNilai::class);
    }
    public function seminar_penelitians()
    {
        return $this->hasMany(SeminarPenelitianNilai::class);
    }
    public function sidang_akhirs()
    {
        return $this->hasMany(SidangAkhirNilai::class);
    }
}
