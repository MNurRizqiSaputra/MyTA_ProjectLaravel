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
                <th>Tugas Akhir</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sidang_akhirs as $sidang_akhir)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidang_akhir->tugas_akhir->judul }}</td>
                <td>{{ $sidang_akhir->tempat }}</td>
                <td>{{ $sidang_akhir->tanggal }}</td>
                <td>{{ $sidang_akhir->waktu }}</td>
                <td>{{ $sidang_akhir->nilai_akhir }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

