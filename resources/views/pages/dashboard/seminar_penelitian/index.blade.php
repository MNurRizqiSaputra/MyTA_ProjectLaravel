@extends('layouts.admin')

@section('title')
    Seminar Penelitian
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Data Seminar Penelitian</h2>
        </div>

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
<<<<<<< HEAD
            @if ($seminarPenelitian->nilai_akhir)
            <tr class="bg-primary">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $seminarPenelitian->tugas_akhir->judul }}</td>
                <td>{{ $seminarPenelitian->tempat }}</td>
                <td>{{ $seminarPenelitian->tanggal }}</td>
                <td>{{ $seminarPenelitian->waktu }}</td>
                <td><a class="btn btn-warning btn-sm" href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}">Edit</a></td>
            </tr>
            @else
            <tr class="bg-warning">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $seminarPenelitian->tugas_akhir->judul }}</td>
                <td>{{ $seminarPenelitian->tempat }}</td>
                <td>{{ $seminarPenelitian->tanggal }}</td>
                <td>{{ $seminarPenelitian->waktu }}</td>
                <td><a class="btn btn-warning btn-sm" href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}">Edit</a></td>
            </tr>
            @endif
=======
                @if ($pengujiBelumNilai->contains($seminarPenelitian->id))
                    <tr class="bg-light">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $seminarPenelitian->tugas_akhir->mahasiswa->user->nama }}</a></td>
                        <td>{{ $seminarPenelitian->tugas_akhir->judul }}</td>
                        <td>{{ $seminarPenelitian->tempat }}</td>
                        <td>{{ $seminarPenelitian->tanggal }}</td>
                        <td>{{ $seminarPenelitian->waktu_mulai }}</td>
                        <td>{{ $seminarPenelitian->waktu_selesai }}</td>
                        <td><a href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}" class="btn btn-primary rounded border-0">Edit</a></td>
                    </tr>
                @elseif (!is_null($seminarPenelitian->nilai_akhir))
                    <tr class="bg-success text-white">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $seminarPenelitian->tugas_akhir->mahasiswa->user->nama }}</a></td>
                        <td>{{ $seminarPenelitian->tugas_akhir->judul }}</td>
                        <td>{{ $seminarPenelitian->tempat }}</td>
                        <td>{{ $seminarPenelitian->tanggal }}</td>
                        <td>{{ $seminarPenelitian->waktu_mulai }}</td>
                        <td>{{ $seminarPenelitian->waktu_selesai }}</td>
                        <td><a href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}" class="btn btn-light rounded border-0">Edit</a></td>
                    </tr>
                @else
                    <tr class="bg-danger" style="color:white;">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $seminarPenelitian->tugas_akhir->mahasiswa->user->nama }}</a></td>
                        <td>{{ $seminarPenelitian->tugas_akhir->judul }}</td>
                        <td>{{ $seminarPenelitian->tempat }}</td>
                        <td>{{ $seminarPenelitian->tanggal }}</td>
                        <td>{{ $seminarPenelitian->waktu_mulai }}</td>
                        <td>{{ $seminarPenelitian->waktu_selesai }}</td>
                        <td><a href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}" class="btn btn-light">Edit</a></td>
                    </tr>
                @endif
>>>>>>> 71f905d86b6e76694b3dff50a46a6e7794b6f246
            @endforeach
        </tbody>
        </table>
    </div>
    <br>
    @if (Auth::user()->role_id == 1)
    <h8>Warna baris tabel:</h8>
    <h8 style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
        <span style="font-weight: bold; color: red;">Belum di scheduling & menentukan dosen pembimbing</span>
        <span style="font-weight: bold; color: gray;">Belum di nilai</span>
        <span style="font-weight: bold; color: green;">Sudah di nilai</span>
    </h8>
    @elseif (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji)
    <h8>Warna baris tabel:</h8>
    <h8 style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
        <span style="font-weight: bold; color: gray;">Belum di nilai</span>
        <span style="font-weight: bold; color: green;">Sudah di nilai</span>
    </h8>
    @endif
</div>
@endsection
