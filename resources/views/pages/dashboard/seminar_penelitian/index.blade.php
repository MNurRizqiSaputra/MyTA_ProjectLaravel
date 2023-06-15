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

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @else
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Judul</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Waktu mulai</th>
                <th>Waktu selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seminarPenelitians as $seminarPenelitian)
                @if ($pengujiBelumNilai->contains($seminarPenelitian->id))
                    <tr class="bg-warning">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $seminarPenelitian->tugas_akhir->mahasiswa->user->nama }}</a></td>
                        <td>{{ $seminarPenelitian->tugas_akhir->judul }}</td>
                        <td>{{ $seminarPenelitian->tempat }}</td>
                        <td>{{ $seminarPenelitian->tanggal }}</td>
                        <td>{{ $seminarPenelitian->waktu_mulai }}</td>
                        <td>{{ $seminarPenelitian->waktu_selesai }}</td>
                        <td><a href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}">Edit</a></td>
                    </tr>
                @else
                    <tr class="bg-danger">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $seminarPenelitian->tugas_akhir->mahasiswa->user->nama }}</a></td>
                        <td>{{ $seminarPenelitian->tugas_akhir->judul }}</td>
                        <td>{{ $seminarPenelitian->tempat }}</td>
                        <td>{{ $seminarPenelitian->tanggal }}</td>
                        <td>{{ $seminarPenelitian->waktu_mulai }}</td>
                        <td>{{ $seminarPenelitian->waktu_selesai }}</td>
                        <td><a href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}">Edit</a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
