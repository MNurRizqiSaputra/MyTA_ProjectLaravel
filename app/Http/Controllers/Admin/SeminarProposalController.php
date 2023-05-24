<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SeminarProposal;
use Illuminate\Http\Request;

class SeminarProposalController extends Controller
{
    public function index()
    {
        return view('pages.admin.seminar_proposal.index', [
            'seminar_proposals' => SeminarProposal::all(),
        ]);
    }
}
