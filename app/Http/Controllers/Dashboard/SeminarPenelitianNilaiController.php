<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\SeminarPenelitianNilai;
use Illuminate\Http\Request;

class SeminarPenelitianNilaiController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.seminar_penelitian_nilai.index', [
            'seminar_penelitian_nilais' => SeminarPenelitianNilai::all(),
        ]);
    }
}
