<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\SeminarProposal;
use Illuminate\Http\Request;

class SeminarProposalController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.seminar_proposal.index', [
            'seminar_proposals' => SeminarProposal::all(),
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
