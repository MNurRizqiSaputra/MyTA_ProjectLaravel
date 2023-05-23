<?php

namespace App\Http\Controllers;

use App\Models\SeminarProposalNilai;
use App\Models\SidangAkhir;
use Illuminate\Http\Request;

class SidangAkhirNilaiController extends Controller
{
    public function index()
    {
        return view('seminar_proposal_nilai.index', [
            'seminar_proposal_nilais' => SeminarProposalNilai::all(),
        ]);
    }
}
