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
                <th>Judul</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sidangAkhirs as $sidangAkhir)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidangAkhir->tugas_akhir->judul }}</td>
                <td>{{ $sidangAkhir->tempat }}</td>
                <td>{{ $sidangAkhir->tanggal }}</td>
                <td>{{ $sidangAkhir->waktu }}</td>
                <td>{{ $sidangAkhir->nilai_akhir }}</td>
                <td><a href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

