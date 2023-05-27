<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\DosenPembimbing;
use App\Models\Mahasiswa;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasAkhirController extends Controller
{
    public function index()
    {
        if (Auth::user()->role->nama == 'mahasiswa') {
            $mahasiswaId = Auth::user()->mahasiswa->id;
            $tugasAkhir = TugasAkhir::where('mahasiswa_id', $mahasiswaId)->get();
        } elseif (Auth::user()->dosen->dosen_pembimbings) {
            $dosenPembimbingId = Auth::user()->dosen->dosen_pembimbings;
            $tugasAkhir = TugasAkhir::where('dosen_pembimbing_id', $dosenPembimbingId)->get();
        } elseif (Auth::user()->role->nama == 'admin') {
            $tugasAkhir = TugasAkhir::all();
        }

        return view('pages.dashboard.tugas_akhir.index', [
            'tugas_akhirs' => $tugasAkhir,
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.tugas_akhir.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|min:3',
            'file' => 'required|mimes:pdf',
        ]);

        // Cek apakah mahasiswa sudah memiliki tugas akhir
        $mahasiswa = auth()->user()->mahasiswa;
        $existingTugasAkhir = TugasAkhir::where('mahasiswa_id', $mahasiswa->id)->first();

        if ($mahasiswa && $existingTugasAkhir) {
            return redirect()->route('tugas-akhir.index')->with('error', 'Anda sudah memiliki tugas akhir.');
        }

        // menambahkan data dosen pembimbing secara acak
        $dosenPembimbingCount = DosenPembimbing::count();
        $dosenId = rand(1, $dosenPembimbingCount);

        // Simpan file tugas akhir
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public/tugas-akhir', $fileName);

        // Buat data tugas akhir baru
        $tugasAkhir = TugasAkhir::create([
            'judul' => $request->judul,
            'file' => $filePath,
            'dosen_pembimbing_id' => $dosenId, // Kolom dosen_pembimbing_id tidak diisi pada saat pembuatan tugas akhir
            'mahasiswa_id' => $mahasiswa->id,
        ]);

        return redirect()->route('tugas-akhir.index')->with('success', 'Berhasil ditambahkan.');
    }
}
