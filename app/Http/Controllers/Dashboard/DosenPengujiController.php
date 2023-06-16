<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\DosenPenguji;
use Illuminate\Http\Request;

class DosenPengujiController extends Controller
{
    public function index()
    {
        $dosen_pengujis = DosenPenguji::with('dosen')
                                        ->leftJoin('dosens', 'dosen_pengujis.dosen_id', '=', 'dosens.id')
                                        ->leftJoin('users', 'dosens.user_id', '=', 'users.id')
                                        ->leftJoin('jurusans', 'dosens.jurusan_id', '=', 'jurusans.id')
                                            ->select(
                                                'dosen_pengujis.id as id',
                                                'dosens.nip as nip',
                                                'users.nama as nama',
                                                'users.email as email',
                                                'jurusans.nama as jurusan',
                                            )
                                        ->orderBy('users.nama')->get();
        return view('pages.dashboard.dosen_penguji.index', [
            'dosen_pengujis' => $dosen_pengujis,
        ]);
    }
    public function create()
    {
        return view('pages.dashboard.dosen_penguji.create', [
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
            'dosen_id' => 'required|unique:dosen_pengujis,dosen_id'
        ]);
        DosenPenguji::create($validated);
        session()->flash('success', 'Data Dosen Penguji berhasil ditambah');
        return redirect()->route('dosen-penguji.index');
    }

    function destroy(DosenPenguji $dosenPenguji){
        if($dosenPenguji->seminar_penelitians()->exists() || $dosenPenguji->seminar_proposals()->exists() || $dosenPenguji->sidang_akhirs()->exists()){
            return redirect()->back()->with('error', 'Tidak bisa menghapus data dosen yang sudah terkait.');
        } else {
            $dosenPenguji->delete();
            return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
        }
    }
}
