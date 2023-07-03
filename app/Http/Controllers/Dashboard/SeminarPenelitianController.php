<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\DosenPenguji;
use App\Models\SeminarPenelitian;
use App\Models\SeminarPenelitianNilai;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SeminarPenelitianController extends Controller
{
    public function index()
    {
        if (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji) {
            $dosenPengujiId = auth()->user()->dosen->dosen_penguji->id;
            $seminarPenelitianId = SeminarPenelitianNilai::where('dosen_penguji_id', $dosenPengujiId)->pluck('seminar_penelitian_id'); // Ambil daftar seminar penelitian yang terkait dengan dosen penguji
            $seminarPenelitians = SeminarPenelitian::whereIn('id', $seminarPenelitianId)->orderByDesc('created_at')->get(); // Tampilkan daftar seminar penelitian yang terkait

            $pengujiBelumNilai = SeminarPenelitianNilai::where('dosen_penguji_id', $dosenPengujiId)->whereNull('nilai')->pluck('seminar_penelitian_id'); // Ambil dosen penguji yang belum memberikan nilai

            return view('pages.dashboard.seminar_penelitian.index', [
                'seminarPenelitians' => $seminarPenelitians,
                'dosenPengujiId' => $dosenPengujiId,
                'pengujiBelumNilai' => $pengujiBelumNilai
            ]);
        } else {
            $seminarPenelitians = SeminarPenelitian::orderByDesc('created_at')->get();
            $pengujiBelumNilai = SeminarPenelitianNilai::whereNull('nilai')->pluck('seminar_penelitian_id');

            return view('pages.dashboard.seminar_penelitian.index', [
                'seminarPenelitians' => $seminarPenelitians,
                'pengujiBelumNilai' => $pengujiBelumNilai

            ]);
        }
    }

    public function show(SeminarPenelitian $seminarPenelitian)
    {
        $admin = Auth::user()->role->nama == 'admin';
        if ($admin) {
            $dosenSeminarPenelitians = DosenPenguji::with('dosen')
                                                    ->join('dosens', 'dosen_pengujis.dosen_id', '=', 'dosens.id')
                                                    ->join('users', 'dosens.user_id', '=', 'users.id')
                                                    ->select(
                                                        'dosen_pengujis.id as id',
                                                        'users.nama as nama'
                                                    )->orderBy('users.nama')->get(); //mengambil daftar dosen seminar penelitian
            $selectedDosenPenelitian = $seminarPenelitian->seminar_penelitian_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_penelitian.show', [
                'seminarPenelitian' => $seminarPenelitian,
                'dosenSeminarPenelitians' => $dosenSeminarPenelitians,
                'selectedDosenPenelitian' => $selectedDosenPenelitian
            ]);
        } else {
            $dosenSeminarPenelitians = $seminarPenelitian->seminar_penelitian_nilais()->with('dosen_penguji.dosen.user')
                                                                                        ->join('dosen_pengujis', 'seminar_penelitian_nilai.dosen_penguji_id', '=', 'dosen_pengujis.id')
                                                                                        ->join('dosens', 'dosen_pengujis.dosen_id', '=', 'dosens.id')
                                                                                        ->join('users', 'dosens.user_id', '=', 'users.id')
                                                                                        ->where('seminar_penelitian_nilai.seminar_penelitian_id', $seminarPenelitian->id)
                                                                                        ->orderBy('users.nama')
                                                                                        ->get(); //mengambil daftar dosen seminar proposal yang terkait dengan seminar proposal
            $selectedDosenPenelitian = $seminarPenelitian->seminar_penelitian_nilais->pluck('dosen_penguji_id')->all();

            return view('pages.dashboard.seminar_penelitian.show', [
                'seminarPenelitian' => $seminarPenelitian,
                'dosenSeminarPenelitians' => $dosenSeminarPenelitians,
                'selectedDosenPenelitian' => $selectedDosenPenelitian
            ]);
        }
    }

    public function create()
    {
        $tugasAkhirMahasiswa = Auth::user()->mahasiswa->tugas_akhir;
        $seminarProposal = $tugasAkhirMahasiswa->seminar_proposal;

        if (isset($seminarProposal->nilai_akhir)) {
            $dosenPengujiBelumNilai = $seminarProposal->seminar_proposal_nilais()->whereNull('nilai')->with('dosen_penguji')->get();


            if ($dosenPengujiBelumNilai->isEmpty()) {
                return view('pages.dashboard.seminar_penelitian.create', [
                    'tugasAkhir' => $tugasAkhirMahasiswa
                ]);
            } else {
                Alert::error('Gagal', 'Mohon Maaf, masih terdapat Dosen Penguji yang belum menilai Seminar Proposal anda');
                return redirect()->back();
            }
        } else {
            Alert::error('Gagal', 'Mohon Maaf, anda belum memiliki Seminar Proposal');
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
        if ($tugasAkhir->seminar_penelitian) {
            Alert::error('Gagal', 'Anda sudah menambahkan Seminar Penelitian');
            return redirect()->back();
        }

        $seminarPenelitian = SeminarPenelitian::create([
            'tugas_akhir_id' => $request->tugas_akhir_id
        ]);

        Alert::success('Success', 'Seminar Penelitian berhasil ditambah');
        return redirect()->route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]);
    }

    public function update(Request $request, SeminarPenelitian $seminarPenelitian)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tempat' => 'required',
        ]);

        $tanggal = $request->tanggal;
        $tempat = $request->tempat;

        $bentrok = SeminarPenelitian::where('id', '!=', $seminarPenelitian->id)
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
            Alert::error('Gagal', 'Terdapat bentrok dengan jadwal lain');
            return redirect()->back();
        }

        $seminarPenelitian->update($validate);

        $selectedDosenPengujiIds = $request->input('dosen_penguji_', []); // Ambil daftar dosen penguji yang dipilih
        $seminarPenelitian->seminar_penelitian_nilais()->whereNotIn('dosen_penguji_id', $selectedDosenPengujiIds)->delete(); // hapus data dosen penguji yang tidak dipilih pada tabel seminar_penelitian_nilai

        // Tambahkan data dosen penguji terpilih ke seminar_penelitian_nilai
        foreach ($selectedDosenPengujiIds as $dosenPengujiId) {
            $tugasAkhir = TugasAkhir::find($seminarPenelitian->tugas_akhir_id);
            $dosenPenguji = DosenPenguji::where('id', $dosenPengujiId)->value('dosen_id');

            // Cek apakah dosen penguji sudah menjadi dosen pembimbing
            if ($tugasAkhir->dosen_pembimbing->dosen_id == $dosenPenguji) {
                Alert::error('Gagal', 'Dosen yang dipilih sudah menjadi Dosen Pembimbing');
                return redirect()->route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]);
            } else {
                $seminarPenelitianNilai = SeminarPenelitianNilai::firstOrNew([
                    'seminar_penelitian_id' => $seminarPenelitian->id,
                    'dosen_penguji_id' => $dosenPengujiId,
                ]);
                $seminarPenelitianNilai->save();
            }
        }

        Alert::success('Success', 'Seminar Penelitian berhasil diperbarui');
        return redirect()->route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]);
    }
}
