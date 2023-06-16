@extends('layouts.admin')

@section('title')
    Sidang Akhir
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Sidang Akhir</h2>
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
            @if ($sidangAkhir->nilai_akhir)
            <tr class="bg-primary">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->judul }}</td>
                <td>{{ $sidangAkhir->tempat }}</td>
                <td>{{ $sidangAkhir->tanggal }}</td>
                <td>{{ $sidangAkhir->waktu }}</td>
                <td><a class="btn btn-warning btn-sm" href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}">Edit</a></td>
            </tr>
            @else
            <tr class="bg-warning">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->judul }}</td>
                <td>{{ $sidangAkhir->tempat }}</td>
                <td>{{ $sidangAkhir->tanggal }}</td>
<<<<<<< HEAD
                <td>{{ $sidangAkhir->waktu }}</td>
                <td><a class="btn btn-warning btn-sm" href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}">Edit</a></td>
=======
                <td>{{ $sidangAkhir->waktu_mulai }}</td>
                <td>{{ $sidangAkhir->waktu_selesai }}</td>
                <td><a href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}">Edit</a></td>
            </tr>
            @else
            <tr class="bg-danger">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->judul }}</td>
                <td>{{ $sidangAkhir->tempat }}</td>
                <td>{{ $sidangAkhir->tanggal }}</td>
                <td>{{ $sidangAkhir->waktu_mulai }}</td>
                <td>{{ $sidangAkhir->waktu_selesai }}</td>
                <td><a href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}">Edit</a></td>
>>>>>>> 29343c2fbbb5eececbdf90fccc1dfede9ae6c492
            </tr>
            @endif
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
