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
                                                'dosens.id as id',
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
            'dosens' => Dosen::with('user')->join('users', 'dosens.user_id', '=', 'users.id')->orderBy('users.nama')->get(),
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:dosens,id|unique:dosen_pengujis,dosen_id'
        ]);
        DosenPenguji::create($validated);
        session()->flash('success', 'Data Dosen Penguji berhasil ditambah');
        return redirect()->route('dosen-penguji.index');
    }
}
