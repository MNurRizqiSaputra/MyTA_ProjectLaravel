@extends('layouts.admin')

@section('title')
    Seminar Penelitian Page
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Seminar Penelitian</h2>
            <h5 class="content-desc mb-4">FOR ADMIN</h5>
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
            @foreach ($seminar_penelitians as $seminar_penelitians)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $seminar_penelitians->tugas_akhir->judul }}</td>
                <td>{{ $seminar_penelitians->tempat }}</td>
                <td>{{ $seminar_penelitians->tanggal }}</td>
                <td>{{ $seminar_penelitians->waktu }}</td>
                <td>{{ $seminar_penelitians->nilai_akhir }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

