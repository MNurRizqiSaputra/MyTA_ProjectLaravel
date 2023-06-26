<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\DosenPembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DosenPembimbingController extends Controller
{
    public function index()
    {
        $dosen_pembimbings = DosenPembimbing::with('dosen')
                                            ->leftJoin('dosens', 'dosen_pembimbings.dosen_id', '=', 'dosens.id')
                                            ->leftJoin('users', 'dosens.user_id', '=', 'users.id')
                                            ->leftJoin('jurusans', 'dosens.jurusan_id', '=', 'jurusans.id')
                                            ->select(
                                                'dosen_pembimbings.id as id',
                                                'dosens.nip as nip',
                                                'users.nama as nama',
                                                'users.email as email',
                                                'jurusans.nama as jurusan',
                                            )
                                            ->orderBy('users.nama')->get();

        return view('pages.dashboard.dosen_pembimbing.index', [
            'dosen_pembimbings' => $dosen_pembimbings
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.dosen_pembimbing.create', [
            'dosens' => Dosen::with('user')
                            ->join('users', 'dosens.user_id', '=', 'users.id')
                            ->select(
                                'dosens.id as id',
                                'users.nama as nama'
                            )
                            ->orderBy('users.nama')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:dosens,id|unique:dosen_pembimbings,dosen_id'
        ]);

        DosenPembimbing::create($validated);
        Alert::success('Success', 'Data dosen pembimbing berhasil ditambah');
        return redirect()->route('dosen-pembimbing.index');
    }

    public function destroy(DosenPembimbing $dosen_pembimbing)
    {
        // Menghapus dosen pembimbing
        if($dosen_pembimbing->tugas_akhirs()->exists()){
            return redirect()->back()->with('error', 'Tidak bisa menghapus data dosen yang sudah terkait sebagai dosen pembimbing atau dosen penguji.');
        }
        $dosen_pembimbing->delete();
        Alert::success('Success', 'Data dosen pembimbing berhasil dihapus');
        return redirect()->route('dosen-pembimbing.index');
    }
}
