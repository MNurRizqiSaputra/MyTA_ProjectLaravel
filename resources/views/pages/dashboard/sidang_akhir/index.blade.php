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
            @if ($pengujiBelumNilai->contains($sidangAkhir->id))
            <tr class="bg-warning">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->judul }}</td>
                <td>{{ $sidangAkhir->tempat }}</td>
                <td>{{ $sidangAkhir->tanggal }}</td>
                <td>{{ $sidangAkhir->waktu_mulai }}</td>
                <td>{{ $sidangAkhir->waktu_selesai }}</td>
                <td><a href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}">Edit</a></td>
            </tr>
            @else
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->mahasiswa->user->nama }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->judul }}</td>
                <td>{{ $sidangAkhir->tempat }}</td>
                <td>{{ $sidangAkhir->tanggal }}</td>
                <td>{{ $sidangAkhir->waktu_mulai }}</td>
                <td>{{ $sidangAkhir->waktu_selesai }}</td>
                <td><a href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}">Edit</a></td>
            </tr>
            @endif
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

