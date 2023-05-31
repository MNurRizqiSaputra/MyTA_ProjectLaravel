<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\SeminarProposal;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeminarProposalController extends Controller
{
    public function index()
    {
        // if (Auth::user()->role->nama == 'dosen') {
        //     // get id dosen penguji yang login
        //     $dosenPengujiId = Auth::user()->dosen->seminar_proposals->pluck('id');
        //     $seminarProposal = SeminarProposal::where('seminar_proposal_id', $dosenPengujiId)->get();
        // } else {
        //     $seminarProposal = SeminarProposal::all();
        // }
        // dump(Auth::user()->mahasiswa);
        return view('pages.dashboard.seminar_proposal.index', [
            'seminar_proposals' => SeminarProposal::all(),
            // 'tugasAkhir' => SeminarProposal::where('tugas_akhir_id', Auth::user()->mahasiswa->tugas_akhir->id)->get()
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.seminar_proposal.create');
    }

    public function show(Request $request, SeminarProposal $seminarProposal)
    {
        return view('pages.dashboard.seminar_proposal.show');
    }
}
