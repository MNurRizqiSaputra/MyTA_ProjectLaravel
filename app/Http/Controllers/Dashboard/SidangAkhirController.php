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

            // Ambil dosen penguji yang belum memberikan nilai
            $pengujiNilai = SidangAkhirNilai::where('dosen_penguji_id', $dosenPengujiId)->whereNull('nilai')->pluck('sidang_akhir_id');

            return view('pages.dashboard.sidang_akhir.index', [
                'sidangAkhirs' => $sidangAkhirs,
                'dosenPengujiId' => $dosenPengujiId,
                'pengujiNilai' => $pengujiNilai
            ]);
        } else {
            $sidangAkhirs = SidangAkhir::all();
            // Ambil dosen penguji yang belum memberikan nilai
            $pengujiNilai = SidangAkhirNilai::whereNull('nilai')->pluck('sidang_akhir_id');

            return view('pages.dashboard.sidang_akhir.index', [
                'sidangAkhirs' => SidangAkhir::all(),
                'pengujiNilai' => $pengujiNilai
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
            $selectedDosenSidangAkhir = $sidangAkhir->sidang_akhir_nilais->pluck('dosen_penguji_id')->all();

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
        if (!isset($seminarPenelitian->nilai_akhir)) {
            return redirect()->back()->with('error', 'Mohon Maaf, Harap lengkapi penilaian Seminar Penelitian Anda');
        } elseif($seminarPenelitian->nilai_akhir) {
            return view('pages.dashboard.sidang_akhir.create', [
                'tugasAkhir' => $tugasAkhir
            ]);
        }
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

    public function update(Request $request, SidangAkhir $sidangAkhir)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required',
        ]);

        $sidangAkhir->update($validate);

        // Ambil daftar dosen penguji yang dipilih
        $selectedDosenPengujiIds = $request->input('dosen_penguji_', []);

        // hapus data dosen penguji yang tidak dipilih pada tabel sidang_akhir_nilai
        $sidangAkhir->sidang_akhir_nilais()->whereNotIn('dosen_penguji_id', $selectedDosenPengujiIds)->delete();

        // Tambahkan data dosen penguji terpilih ke sidang_akhir_nilai
        foreach ($selectedDosenPengujiIds as $dosenPengujiId) {
            $sidangAkhirNilai = SidangAkhirNilai::firstOrNew([
                'sidang_akhir_id' => $sidangAkhir->id,
                'dosen_penguji_id' => $dosenPengujiId
            ]);
            $sidangAkhirNilai->save();
        }

        return redirect()->route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id])->with('success', 'Data Sidang Akhir berhasil diperbarui.');

    }
}
