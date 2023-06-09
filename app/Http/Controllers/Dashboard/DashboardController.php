<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use App\Models\Dosen;
use App\Models\DosenPembimbing;
use App\Models\DosenPenguji;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Role;
use App\Models\SeminarPenelitian;
use App\Models\SeminarProposal;
use App\Models\SidangAkhir;
use App\Models\TugasAkhir;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index', [
            'user' => User::count(),
            'mahasiswa' => Mahasiswa::count(),
            'dosen' => Dosen::count(),
            'dosenPembimbing' => DosenPembimbing::count(),
            'dosenPenguji' => DosenPenguji::count(),
            'jurusan' => Jurusan::count(),
            'tugasAkhir' => TugasAkhir::count(),
            'seminarProposal' => SeminarProposal::count(),
            'seminarPenelitian' => SeminarPenelitian::count(),
            'sidangAkhir' => SidangAkhir::count(),
        ]);
    }
}
