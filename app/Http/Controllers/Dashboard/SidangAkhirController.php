<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\DosenPenguji;
use App\Models\SidangAkhir;
use App\Models\SidangAkhirNilai;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SidangAkhirController extends Controller
{
    public function index()
    {
        if (Auth::user()->dosen && Auth::user()->dosen->dosen_pengujis->pluck('id')) {
            $dosenPenguji = auth()->user()->dosen->dosen_pengujis;
            // get id dosen penguji yang login
            $dosenPengujiId = $dosenPenguji->pluck('id');

            // Ambil daftar sidang akhir yang terkait dengan dosen penguji
            $sidangAkhirId = SidangAkhirNilai::whereIn('dosen_penguji_id', $dosenPengujiId)->pluck('sidang_akhir_id');

            // Tampilkan daftar sidang akhir yang terkait
            $sidangAkhirs = SidangAkhir::whereIn('id', $sidangAkhirId)->get();

            return view('pages.dashboard.sidang_akhir.index', [
                'sidangAkhirs' => $sidangAkhirs,
            ]);
        } else {
            $sidangAkhirs = SidangAkhir::all();

            return view('pages.dashboard.sidang_akhir.index', [
                'sidangAkhirs' => SidangAkhir::all(),
            ]);
        }
    }
    public function show(SidangAkhir $sidangAkhir)
    {
        $admin = Auth::user()->role->nama == 'admin';
        if ($admin) {
            $dosenSidangAkhirs = DosenPenguji::with('dosen.user')->get();
            $selectedDosenSidangAkhir = $sidangAkhir->sidang_akhir_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.sidang_akhir.show', [
                'sidangAkhir' => $sidangAkhir,
                'dosenSidangAkhirs' => $dosenSidangAkhirs,
                'selectedDosenSidangAkhir' => $selectedDosenSidangAkhir
            ]);
        } else {
            $dosenSidangAkhirs = $sidangAkhir->sidang_akhir_nilais()->with('dosen_penguji.dosen.user')->get();
            $selectedDosenSidangAkhir = $sidangAkhir->sidang_akhir_nilais()->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.sidang_akhir.show', [
                'sidangAkhir' => $sidangAkhir,
                'dosenSidangAkhirs' => $dosenSidangAkhirs,
                'selectedDosenSidangAkhir' => $selectedDosenSidangAkhir
            ]);
        }
    }
    public function create()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $tugasAkhir = $mahasiswa->tugas_akhir;
        $seminarPenelitian = $tugasAkhir->seminar_penelitian;

        // periksa nilai seminar penelitian
        if ($seminarPenelitian->nilai_akhir) {
            return view('pages.dashboard.sidang_akhir.create', [
                'tugasAkhir' => $tugasAkhir
            ]);
        }
        return redirect()->back()->with('error', 'Mohon Maaf, Harap lengkapi penilaian Seminar Penelitian Anda');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tempat' => 'nullable',
            'tanggal' => 'nullable',
            'waktu' => 'nullable',
            'tugas_akhir_id' => 'required|exists:tugas_akhirs,id'
        ]);

        $tugasAkhir = TugasAkhir::find($request->tugas_akhir_id);
        if ($tugasAkhir->sidang_akhir) {
            return redirect()->back()->with('error', 'Mohon Maaf, Anda sudah menambahkan sidang akhir');
        }

        $sidangAkhir = SidangAkhir::create([
            'tugas_akhir_id' => $request->tugas_akhir_id
        ]);

        return redirect()->route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id])->with('success', 'Sidang Akhir berhasil ditambahkan.');
    }
}
