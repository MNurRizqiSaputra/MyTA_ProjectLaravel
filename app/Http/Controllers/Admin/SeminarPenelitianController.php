<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SeminarPenelitian;
use Illuminate\Http\Request;

class SeminarPenelitianController extends Controller
{
    public function index()
    {
        return view('pages.admin.seminar_penelitian.index', [
            'seminar_penelitians' => SeminarPenelitian::all(),
        ]);
    }
}
