@extends('layouts.admin')

@section('title')
Nilai Sidang Akhir
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Nilai Sidang Akhir</h2>
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
                <th>Tugas Akhir</th>
                <th>Dosen Penguji</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sidang_akhir_nilais as $sidang_akhir_nilai)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sidang_akhir_nilai->sidang_akhir->tugas_akhir->judul }}</td>
                <td>{{ $sidang_akhir_nilai->dosen_penguji->dosen->user->nama }}</td>
                <td>{{ $sidang_akhir_nilai->nilai }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

