<?php

namespace App\Http\Controllers;

use App\Models\SeminarProposal;
use Illuminate\Http\Request;

class SeminarProposalController extends Controller
{
    public function index()
    {
        return view('seminar_proposal.index', [
            'seminar_proposals' => SeminarProposal::all(),
        ]);
    }
}
