@extends('layouts.admin')

@section('title')
    Tugas Akhir
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h2 class="content-title">Tugas Akhir</h2>
            @auth
            @if (!Auth::user()->role->nama == 'admin' || (Auth::user()->role->nama == 'mahasiswa' && !Auth::user()->mahasiswa->tugas_akhir))
                <a href="{{ route('tugas-akhir.create') }}">Tambah</a>
                @endif
            @endauth
        </div>

        @if (Auth::user()->role->nama == 'mahasiswa' && !Auth::user()->mahasiswa->tugas_akhir)
            <p>Tambahkan Tugas Akhir</p>
        @else
        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Mahasiswa</th>
                <th>Dosen Pembimbing</th>
                <th>Status Persetujuan</th>
                <th>Total Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tugasAkhirs as $tugasAkhir)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('tugas-akhir.show', ['tugasAkhir' => $tugasAkhir->id]) }}">{{ $tugasAkhir->judul }}</a></td>
                <td>{{ $tugasAkhir->mahasiswa->user->nama }}</td>
                <td>{{ $tugasAkhir->dosen_pembimbing->dosen->user->nama }}</td>
                <td>{{ $tugasAkhir->status_persetujuan }}</td>
                <td>{{ $tugasAkhir->total_nilai }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        @endif
    </div>
</div>
@endsection

