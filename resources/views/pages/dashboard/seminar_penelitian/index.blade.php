@extends('layouts.admin')

@section('title')
    Seminar Penelitian
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Seminar Penelitian</h2>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Tugas Akhir</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seminarPenelitians as $seminarPenelitian)
            @if ($seminarPenelitian->nilai_akhir)
            <tr class="bg-light">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $seminarPenelitian->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $seminarPenelitian->tugas_akhir->judul }}</td>
                <td>{{ $seminarPenelitian->tempat }}</td>
                <td>{{ $seminarPenelitian->tanggal }}</td>
                <td>{{ $seminarPenelitian->waktu }}</td>
                <td><a href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}" class="btn btn-warning">Edit</a></td>
            </tr>
            @else
            <tr class="bg-danger">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $seminarPenelitian->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $seminarPenelitian->tugas_akhir->judul }}</td>
                <td>{{ $seminarPenelitian->tempat }}</td>
                <td>{{ $seminarPenelitian->tanggal }}</td>
                <td>{{ $seminarPenelitian->waktu }}</td>
                <td><a href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}" class="btn btn-warning">Edit</a></td>
            </tr>
            @endif
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

