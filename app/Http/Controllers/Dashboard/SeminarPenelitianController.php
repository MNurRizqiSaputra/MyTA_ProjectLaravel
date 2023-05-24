<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\SeminarPenelitian;
use Illuminate\Http\Request;

class SeminarPenelitianController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.seminar_penelitian.index', [
            'seminar_penelitians' => SeminarPenelitian::all(),
        ]);
    }
}
