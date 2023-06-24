@extends('layouts.admin')

@section('title')
Nilai Seminar Penelitian
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Nilai Seminar Penelitian</h2>
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
                <td>
                    @if (is_null($seminar_penelitian_nilai->nilai))
                        <span class="badge bg-secondary">Belum dinilai</span>
                    @else
                        <span class="badge bg-success">{{ $seminar_penelitian_nilai->nilai }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

