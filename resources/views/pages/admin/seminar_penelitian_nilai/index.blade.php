@extends('layouts.admin')

@section('title')
    Seminar Penelitian Nilai Page
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Nilai Seminar Penelitian</h2>
            <h5 class="content-desc mb-4">FOR ADMIN</h5>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Tugas Akhir</th>
                <th>Dosen Penguji</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seminar_penelitian_nilais as $seminar_penelitian_nilai)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $seminar_penelitian_nilai->seminar_penelitian->tugas_akhir->judul }}</td>
                <td>{{ $seminar_penelitian_nilai->dosen_penguji->dosen->user->nama ?? ''}}</td>
                <td>{{ $seminar_penelitian_nilai->nilai }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

