<?php

namespace App\Http\Controllers;

use App\Models\SeminarProposalNilai;
use Illuminate\Http\Request;

class SeminarProposalNilaiController extends Controller
{
    public function index()
    {
        return view('seminar_proposal_nilai.index', [
            'seminar_proposal_nilais' => SeminarProposalNilai::all(),
        ]);
    }
}
