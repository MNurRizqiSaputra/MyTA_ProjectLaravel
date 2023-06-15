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
            $dosenPengujiId = $dosenPenguji->pluck('id'); // get id dosen penguji yang login
            $sidangAkhirId = SidangAkhirNilai::whereIn('dosen_penguji_id', $dosenPengujiId)->pluck('sidang_akhir_id'); // Ambil daftar sidang akhir yang terkait dengan dosen penguji
            $sidangAkhirs = SidangAkhir::whereIn('id', $sidangAkhirId)->orderByDesc('created_at')->get(); // Tampilkan daftar sidang akhir yang terkait
            $pengujiNilai = SidangAkhirNilai::where('dosen_penguji_id', $dosenPengujiId)->whereNull('nilai')->pluck('sidang_akhir_id'); // Ambil dosen penguji yang belum memberikan nilai

            return view('pages.dashboard.sidang_akhir.index', [
                'sidangAkhirs' => $sidangAkhirs,
                'dosenPengujiId' => $dosenPengujiId,
                'pengujiNilai' => $pengujiNilai
            ]);
        } else {
            $sidangAkhirs = SidangAkhir::orderByDesc('created_at')->get();
            $pengujiNilai = SidangAkhirNilai::whereNull('nilai')->pluck('sidang_akhir_id'); // Ambil dosen penguji yang belum memberikan nilai

            return view('pages.dashboard.sidang_akhir.index', [
                'sidangAkhirs' => $sidangAkhirs,
                'pengujiNilai' => $pengujiNilai
            ]);
        }
    }
    public function show(SidangAkhir $sidangAkhir)
    {
        $admin = Auth::user()->role->nama == 'admin';
        if ($admin) {
            $dosenSidangAkhirs = DosenPenguji::with('dosen')
                                                    ->join('dosens', 'dosen_pengujis.dosen_id', '=', 'dosens.id')
                                                    ->join('users', 'dosens.user_id', '=', 'users.id')
                                                    ->select(
                                                        'dosen_pengujis.id as id',
                                                        'users.nama as nama'
                                                    )->orderBy('users.nama')->get(); //mengambil daftar dosen sidang akhir
            $selectedDosenSidangAkhir = $sidangAkhir->sidang_akhir_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.sidang_akhir.show', [
                'sidangAkhir' => $sidangAkhir,
                'dosenSidangAkhirs' => $dosenSidangAkhirs,
                'selectedDosenSidangAkhir' => $selectedDosenSidangAkhir
            ]);
        } else {
            $dosenSidangAkhirs = $sidangAkhir->sidang_akhir_nilais()->with('dosen_penguji.dosen.user')
                                                                    ->join('dosen_pengujis', 'sidang_akhir_nilai.dosen_penguji_id', '=', 'dosen_pengujis.id')
                                                                    ->join('dosens', 'dosen_pengujis.dosen_id', '=', 'dosens.id')
                                                                    ->join('users', 'dosens.user_id', '=', 'users.id')
                                                                    ->where('sidang_akhir_nilai.sidang_akhir_id', $sidangAkhir->id)
                                                                    ->orderBy('users.nama')
                                                                    ->get(); //mengambil daftar dosen seminar proposal yang terkait dengan seminar proposal
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

        if ($seminarPenelitian) {
            $dosenPengujiBelumNilai = $seminarPenelitian->seminar_penelitian_nilais()->whereNull('nilai')->with('dosen_penguji')->get();

            if ($dosenPengujiBelumNilai) {
                session()->flash('error', 'Mohon Maaf, Harap lengkapi penilaian Seminar Penelitian Anda');
                return redirect()->back();
            } else {
                return view('pages.dashboard.sidang_akhir.create', [
                    'tugasAkhir' => $tugasAkhir
                ]);
            }
        } else {
            session()->flash('error', 'Mohon Maaf, Anda belum memiliki Seminar Penelitian');
            return redirect()->back();
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
            session()->flash('error', 'Mohon Maaf, Anda sudah menambahkan sidang akhir');
            return redirect()->back();
        }

        $sidangAkhir = SidangAkhir::create([
            'tugas_akhir_id' => $request->tugas_akhir_id
        ]);

        session()->flash('success', 'Sidang Akhir berhasil ditambahkan');
        return redirect()->route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]);
    }

    public function update(Request $request, SidangAkhir $sidangAkhir)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required',
        ]);

        $sidangAkhir->update($validate);

        $selectedDosenPengujiIds = $request->input('dosen_penguji_', []); // Ambil daftar dosen penguji yang dipilih
        $sidangAkhir->sidang_akhir_nilais()->whereNotIn('dosen_penguji_id', $selectedDosenPengujiIds)->delete(); // hapus data dosen penguji yang tidak dipilih pada tabel sidang_akhir_nilai

        // Tambahkan data dosen penguji terpilih ke sidang_akhir_nilai
        foreach ($selectedDosenPengujiIds as $dosenPengujiId) {
            $sidangAkhirNilai = SidangAkhirNilai::firstOrNew([
                'sidang_akhir_id' => $sidangAkhir->id,
                'dosen_penguji_id' => $dosenPengujiId
            ]);
            $sidangAkhirNilai->save();
        }

        session()->flash('success', 'Data Sidang Akhir berhasil diperbarui');
        return redirect()->route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]);

    }
}
