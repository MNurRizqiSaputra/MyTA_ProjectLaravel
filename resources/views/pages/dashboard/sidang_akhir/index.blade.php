@extends('layouts.admin')

@section('title')
    Sidang Akhir
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Data Sidang Akhir</h2>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Tugas Akhir</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sidangAkhirs as $sidangAkhir)
            @if ($pengujiBelumNilai->contains($sidangAkhir->id))
            <tr class="bg-Light">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->judul }}</td>
                <td>{{ $sidangAkhir->tempat }}</td>
                <td>{{ $sidangAkhir->tanggal }}</td>
                <td>{{ $sidangAkhir->waktu_mulai }}</td>
                <td>{{ $sidangAkhir->waktu_selesai }}</td>
                <td><a href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}" class="btn btn-primary rounded border-0">Edit</a></td>
            </tr>
            @elseif (!is_null($sidangAkhir->nilai_akhir))
            <tr class="bg-success text-white">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->judul }}</td>
                <td>{{ $sidangAkhir->tempat }}</td>
                <td>{{ $sidangAkhir->tanggal }}</td>
                <td>{{ $sidangAkhir->waktu_mulai }}</td>
                <td>{{ $sidangAkhir->waktu_selesai }}</td>
                <td><a href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}" class="btn btn-light rounded border-0">Edit</a></td>
            @else
            <tr class="bg-danger" style="color:white;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->judul }}</td>
                <td>{{ $sidangAkhir->tempat }}</td>
                <td>{{ $sidangAkhir->tanggal }}</td>
                <td>{{ $sidangAkhir->waktu_mulai }}</td>
                <td>{{ $sidangAkhir->waktu_selesai }}</td>
                <td><a href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}" class="btn btn-light rounded border-0">Edit</a></td>
            </tr>
            @endif
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
