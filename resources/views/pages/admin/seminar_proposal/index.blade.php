@extends('layouts.admin')

@section('title')
    Seminar Proposal Page
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">MENU</h2>
            <h5 class="content-desc mb-4">DATA SEMINAR PROPOSAL</h5>
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
            @foreach ($seminar_proposals as $seminar_proposal)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $seminar_proposal->tugas_akhir->judul }}</td>
                <td>{{ $seminar_proposal->tempat }}</td>
                <td>{{ $seminar_proposal->tanggal }}</td>
                <td>{{ $seminar_proposal->waktu }}</td>
                <td>{{ $seminar_proposal->nilai_akhir }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

