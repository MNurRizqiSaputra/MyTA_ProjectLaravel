<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\DosenPenguji;
use App\Models\SidangAkhir;
use App\Models\SidangAkhirNilai;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SidangAkhirController extends Controller
{
    public function index()
    {
        if (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji) {
            $dosenPengujiId = Auth::user()->dosen->dosen_penguji->id; // get id dosen penguji yang login
            $sidangAkhirId = SidangAkhirNilai::where('dosen_penguji_id', $dosenPengujiId)->pluck('sidang_akhir_id'); // Ambil daftar sidang akhir yang terkait dengan dosen penguji
            $sidangAkhirs = SidangAkhir::whereIn('id', $sidangAkhirId)->orderByDesc('created_at')->get(); // Tampilkan daftar sidang akhir yang terkait

            $pengujiBelumNilai = SidangAkhirNilai::where('dosen_penguji_id', $dosenPengujiId)->whereNull('nilai')->pluck('sidang_akhir_id'); // Ambil dosen penguji yang belum memberikan nilai

            return view('pages.dashboard.sidang_akhir.index', [
                'sidangAkhirs' => $sidangAkhirs,
                'dosenPengujiId' => $dosenPengujiId,
                'pengujiBelumNilai' => $pengujiBelumNilai
            ]);
        } else {
            $sidangAkhirs = SidangAkhir::orderByDesc('created_at')->get();
            $pengujiBelumNilai = SidangAkhirNilai::whereNull('nilai')->pluck('sidang_akhir_id'); // Ambil dosen penguji yang belum memberikan nilai

            return view('pages.dashboard.sidang_akhir.index', [
                'sidangAkhirs' => $sidangAkhirs,
                'pengujiBelumNilai' => $pengujiBelumNilai
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
        $tugasAkhirMahasiswa = auth()->user()->mahasiswa->tugas_akhir;
        $seminarPenelitian = $tugasAkhirMahasiswa->seminar_penelitian;

        if (isset($seminarPenelitian->nilai_akhir)) {
            $dosenPengujiBelumNilai = $seminarPenelitian->seminar_penelitian_nilais()->whereNull('nilai')->with('dosen_penguji')->get();

            if ($dosenPengujiBelumNilai->isEmpty()) {
                return view('pages.dashboard.sidang_akhir.create', [
                    'tugasAkhir' => $tugasAkhirMahasiswa
                ]);
            } else {
                Alert::error('Gagal', 'Dosen Penguji belum menilai Seminar Penelitian anda');
                return redirect()->back();
            }
        } else {
            Alert::error('Gagal', 'Anda belum memiliki Seminar Penelitian');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'tempat' => 'nullable',
            'tanggal' => 'nullable',
            'waktu_mulai' => 'nullable',
            'waktu_selesai' => 'nullable',
            'tugas_akhir_id' => 'required|exists:tugas_akhirs,id'
        ]);

        $tugasAkhir = TugasAkhir::find($request->tugas_akhir_id);
        if ($tugasAkhir->sidang_akhir) {
            Alert::error('Gagal', 'Anda sudah menambahkan sidang akhir');
            return redirect()->back();
        }

        $sidangAkhir = SidangAkhir::create([
            'tugas_akhir_id' => $request->tugas_akhir_id
        ]);

        Alert::success('Success', 'Sidang Akhir berhasil ditambahkan');
        return redirect()->route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]);
    }

    public function update(Request $request, SidangAkhir $sidangAkhir)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required',
        ]);

        $tanggal = $request->tanggal;
        $tempat = $request->tempat;

        $bentrok = SidangAkhir::where('id', '!=', $sidangAkhir->id)
                    ->where('tempat', $tempat)
                    ->where('tanggal', $tanggal)
                    ->where(function($query) use ($validate){
                        $query->where(function ($query) use ($validate) {
                            $query->whereBetween('waktu_mulai', [$validate['waktu_mulai'], $validate['waktu_selesai']])
                                ->orWhereBetween('waktu_selesai', [$validate['waktu_mulai'], $validate['waktu_selesai']]);
                        })
                        ->orWhere(function ($query) use ($validate) {
                            $query->where('waktu_mulai', '<=', $validate['waktu_mulai'])
                                ->where('waktu_selesai', '>=', $validate['waktu_selesai']);
                        });
                    })->exists();
        if ($bentrok) {
            Alert::error('Gagal', 'Terdapat bentrol dengan jadwal lain');
            return redirect()->back();
        }

        $sidangAkhir->update($validate);

        $selectedDosenPengujiIds = $request->input('dosen_penguji_', []); // Ambil daftar dosen penguji yang dipilih
        $sidangAkhir->sidang_akhir_nilais()->whereNotIn('dosen_penguji_id', $selectedDosenPengujiIds)->delete(); // hapus data dosen penguji yang tidak dipilih pada tabel sidang_akhir_nilai

        // Tambahkan data dosen penguji terpilih ke sidang_akhir_nilai
        foreach ($selectedDosenPengujiIds as $dosenPengujiId) {
            $tugasAkhir = TugasAkhir::find($sidangAkhir->tugas_akhir_id);

            // Cek apakah dosen penguji sudah menjadi dosen pembimbing
            if ($tugasAkhir->dosen_pembimbing_id == $dosenPengujiId) {
                Alert::error('Gagal', 'Dosen yang dipilih sudah menjadi Dosen Pembimbing');
                return redirect()->route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]);
            }

            // Cek apakah dosen sudah menjadi dosen penguji
            $dosenPenguji = $sidangAkhir->sidang_akhir_nilais()
                ->where('dosen_penguji_id', $dosenPengujiId)
                ->exists();

            if (!$dosenPenguji) {
                $sidangAkhirNilai = SidangAkhirNilai::firstOrNew([
                    'sidang_akhir_id' => $sidangAkhir->id,
                    'dosen_penguji_id' => $dosenPengujiId,
                ]);
                $sidangAkhirNilai->save();
            }
        }

        Alert::success('Success', 'Sidang Akhir berhasil diperbarui');
        return redirect()->route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]);

    }
}
