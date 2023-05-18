<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarPenelitianNilai extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'seminar_penelitian_nilai';
    public function seminar_penelitian()
    {
        return $this->belongsTo(SeminarPenelitian::class);
    }
    public function dosen_penguji()
    {
        return $this->belongsTo(DosenPenguji::class);
    }
}
