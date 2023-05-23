@extends('layouts.admin')

@section('title')
    Tugas Akhir Page
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">MENU</h2>
            <h5 class="content-desc mb-4">DATA TUGAS AKHIR</h5>
        </div>

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
            @foreach ($tugas_akhirs as $tugas_akhir)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tugas_akhir->judul }}</td>
                <td>{{ $tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $tugas_akhir->dosen_pembimbing->dosen->user->nama }}</td>
                <td>{{ $tugas_akhir->status_persetujuan }}</td>
                <td>{{ $tugas_akhir->total_nilai }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

