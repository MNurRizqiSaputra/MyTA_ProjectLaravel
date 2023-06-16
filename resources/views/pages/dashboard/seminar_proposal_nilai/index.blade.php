@extends('layouts.admin')

@section('title')
Nilai Seminar Proposal
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Nilai Seminar Proposal</h2>
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
            @foreach ($seminar_proposal_nilais as $seminar_proposal_nilai)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $seminar_proposal_nilai->seminar_proposal->tugas_akhir->judul }}</td>
                <td>{{ $seminar_proposal_nilai->dosen_penguji->dosen->user->nama }}</td>
                <td>{{ $seminar_proposal_nilai->nilai }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

