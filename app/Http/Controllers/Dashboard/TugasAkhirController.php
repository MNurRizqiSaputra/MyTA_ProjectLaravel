<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\DosenPembimbing;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TugasAkhirController extends Controller
{
    public function index()
    {
        if (Auth::user()->dosen && Auth::user()->dosen->dosen_pembimbing->id){
            $dosenPembimbingId = Auth::user()->dosen->dosen_pembimbing->id; // get id dosen pembimbing yang login
            $tugasAkhir = TugasAkhir::where('dosen_pembimbing_id', $dosenPembimbingId)->orderByDesc('created_at')->get();
        }

        else {
            $tugasAkhir = TugasAkhir::orderByDesc('created_at')->get();
        }

        return view('pages.dashboard.tugas_akhir.index', [
            'tugasAkhirs' => $tugasAkhir,
        ]);
    }

    public function show(TugasAkhir $tugasAkhir)
    {
        if (Auth::user()->dosen) {
            $selectedDosenPembimbing = $tugasAkhir->dosen_pembimbing; // mendapatkan data dosen pembimbing terkait.
            $dosenPembimbingId = Auth::user()->dosen->dosen_pembimbing->id;

            if ($selectedDosenPembimbing->id == $dosenPembimbingId) {
                return view('pages.dashboard.tugas_akhir.show', [
                    'tugasAkhir' => $tugasAkhir,
                    'selectedDosenPembimbing' => $selectedDosenPembimbing
                ]);
            }
        } elseif (Auth::user()->mahasiswa) {
            $selectedDosenPembimbing = $tugasAkhir->dosen_pembimbing; // mendapatkan data dosen pembimbing terkait.

            if ($tugasAkhir->mahasiswa_id === Auth::user()->mahasiswa->id) {
                return view('pages.dashboard.tugas_akhir.show', [
                    'tugasAkhir' => $tugasAkhir,
                    'selectedDosenPembimbing' => $selectedDosenPembimbing
                ]);
            }
        } elseif (Auth::user()->role->nama === 'admin') {
            $dosenPembimbings = DosenPembimbing::with('dosen.user')->get();

            $selectedDosenPembimbing = $tugasAkhir->dosen_pembimbing_id; // mendapatkan data dosen pembimbing di tabel tugas akhir.

            return view('pages.dashboard.tugas_akhir.show', [
                'tugasAkhir' => $tugasAkhir,
                'dosenPembimbings' => $dosenPembimbings,
                'selectedDosenPembimbing' => $selectedDosenPembimbing
            ]);
        }
        Alert::error('Gagal', 'Anda tidak memiliki izin untuk mengakses Tugas Akhir ini');
        return redirect()->route('tugas-akhir.index');
    }


    public function create()
    {
        return view('pages.dashboard.tugas_akhir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|min:3|unique:tugas_akhirs,judul',
            'file' => 'required|mimes:pdf',
        ]);

        // Cek apakah mahasiswa sudah memiliki tugas akhir
        $mahasiswa = auth()->user()->mahasiswa;
        $existingTugasAkhir = TugasAkhir::where('mahasiswa_id', $mahasiswa->id)->first();

        if ($mahasiswa && $existingTugasAkhir) {
            session()->flash('error', 'Anda sudah memiliki Tugas Akhir');
            return redirect()->route('tugas-akhir.index');
        } else {

            // Simpan file tugas akhir
            // $path = $request->file('file')->store('tugas-akhir', 'public');
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('tugas-akhir/' . $mahasiswa->id, $fileName);

            // Buat data tugas akhir baru
            $tugasAkhir = TugasAkhir::create([
                'judul' => $request->judul,
                'file' => $filePath,
                'mahasiswa_id' => $mahasiswa->id,
            ]);
        }
        Alert::success('Success', 'Tugas Akhir berhasil ditambahkan');
        return redirect()->route('tugas-akhir.show', ['tugasAkhir' => $tugasAkhir->id]);
    }

    public function update(Request $request, TugasAkhir $tugasAkhir)
    {
        $request->validate([
            'judul' => 'required|string|min:3',
            'file' => 'nullable|mimes:pdf',
        ]);

        $user = auth()->user();
        if ($user->mahasiswa && $user->mahasiswa->id === $tugasAkhir->mahasiswa_id) {

            $tugasAkhir->judul = $request->judul;

            // Cek apakah ada file file yang diunggah
            if ($request->hasFile('file')) {
                // Hapus file lama jika ada
                if ($tugasAkhir->file) {
                    Storage::delete($tugasAkhir->file);
                }

                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('tugas-akhir/' . $user->mahasiswa->id, $fileName);

                $tugasAkhir->file = $filePath;
            }
            $tugasAkhir->save();
            Alert::success('Success', 'Tugas Akhir berhasil diperbarui');
            return redirect()->route('tugas-akhir.show', ['tugasAkhir' => $tugasAkhir]);
        }

        elseif ($user->role->nama == 'admin') {
            // Ambil request form daftar dosen pembimbing
            $selectedDosenPembimbing = $request->input('dosen_pembimbing_', []);

            // Tambahkan dosen pembimbing ke data tugas akhir mahasiswa
            foreach ($selectedDosenPembimbing as $dosenPembimbing) {
                $dosenPembimbing = DosenPembimbing::find($dosenPembimbing);

                if ($dosenPembimbing) {
                    $tugasAkhir->update([
                        'dosen_pembimbing_id' => $dosenPembimbing->id
                    ]);
                }
            }
            Alert::success('Success', 'Tugas Akhir berhasil diperbarui');
            return redirect()->route('tugas-akhir.show', ['tugasAkhir' => $tugasAkhir]);
        }
        elseif ($user->dosen->dosen_pembimbing->id === $tugasAkhir->dosen_pembimbing_id) {
            $request->validate([
                'status_persetujuan' => 'required|in:Disetujui,Tidak Disetujui'
            ]);
            $tugasAkhir->status_persetujuan = $request->status_persetujuan;
            $tugasAkhir->save();

            Alert::success('Success', 'Berhasil mengubah Status Persetujuan');
            return redirect()->route('tugas-akhir.show', ['tugasAkhir' => $tugasAkhir]);
        }
        Alert::success('Success', 'Anda tidak memiliki akses untuk mengubah data Tugas Akhir');
        return redirect()->back();
    }

}
