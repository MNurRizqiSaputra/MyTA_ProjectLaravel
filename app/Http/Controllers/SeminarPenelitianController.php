<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeminarPenelitianController extends Controller
{
    public function index()
    {
        return view('seminar_penelitian.index', [
            'seminar_penelitians' => SeminarPenelitian::all(),
        ]);
    }
}
