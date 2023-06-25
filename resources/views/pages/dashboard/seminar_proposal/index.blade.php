@extends('layouts.admin')

@section('title')
    Seminar Proposal
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Data Seminar Proposal</h2>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Judul</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Waktu mulai</th>
                <th>Waktu selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seminarProposals as $seminarProposal)
            {{-- Berikan warna yang berbeda untuk seminar proposal yang sudah atau belum di nilai --}}
            @if ($pengujiBelumNilai->contains($seminarProposal->id))
<<<<<<< HEAD
                <tr class="bg-danger">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $seminarProposal->tugas_akhir->mahasiswa->user->nama }}</a></td>
                    <td>{{ $seminarProposal->tugas_akhir->judul }}</td>
                    <td>{{ $seminarProposal->tempat }}</td>
                    <td>{{ $seminarProposal->tanggal }}</td>
                    <td>{{ $seminarProposal->waktu }}</td>
                    {{-- <td><a href="{{ route('seminar-proposal.edit', ['seminarProposal' => $seminarProposal->id]) }}">Edit</a></td> --}}
                    <td><a class="btn btn-warning btn-sm" href="{{ route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id]) }}">Edit</a></td>
                </tr>
            @else
=======
>>>>>>> 71f905d86b6e76694b3dff50a46a6e7794b6f246
                <tr class="bg-light">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $seminarProposal->tugas_akhir->mahasiswa->user->nama }}</a></td>
                    <td>{{ $seminarProposal->tugas_akhir->judul }}</td>
                    <td>{{ $seminarProposal->tempat }}</td>
                    <td>{{ $seminarProposal->tanggal }}</td>
                    <td>{{ $seminarProposal->waktu_mulai }}</td>
                    <td>{{ $seminarProposal->waktu_selesai }}</td>
                    <td><a href="{{ route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id]) }}" class="btn btn-primary rounded border-0">Edit</a></td>
                </tr>
                @elseif (!is_null($seminarProposal->nilai_akhir))
                <tr class="bg-success text-white">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $seminarProposal->tugas_akhir->mahasiswa->user->nama }}</a></td>
                    <td>{{ $seminarProposal->tugas_akhir->judul }}</td>
                    <td>{{ $seminarProposal->tempat }}</td>
                    <td>{{ $seminarProposal->tanggal }}</td>
                    <td>{{ $seminarProposal->waktu_mulai }}</td>
                    <td>{{ $seminarProposal->waktu_selesai }}</td>
                    <td><a href="{{ route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id]) }}" class="btn btn-light rounded border-0">Edit</a></td>
                </tr>
            @else
                <tr class="bg-danger" style="color:white;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $seminarProposal->tugas_akhir->mahasiswa->user->nama }}</a></td>
                    <td>{{ $seminarProposal->tugas_akhir->judul }}</td>
                    <td>{{ $seminarProposal->tempat }}</td>
                    <td>{{ $seminarProposal->tanggal }}</td>
                    <td>{{ $seminarProposal->waktu_mulai }}</td>
                    <td>{{ $seminarProposal->waktu_selesai }}</td>
                    <td><a href="{{ route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id]) }}" class="btn btn-light rounded border-0" >Edit</a></td>
                </tr>
            @endif
            @endforeach
        </tbody>
        </table>
    </div>
    <br>
    @if (Auth::user()->role_id == 1)
    <h8>Warna baris tabel:</h8>
    <h8 style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
        <span style="font-weight: bold; color: red;">Belum di scheduling & menentukan dosen pembimbing</span>
        <span style="font-weight: bold; color: gray;">Belum di nilai</span>
        <span style="font-weight: bold; color: green;">Sudah di nilai</span>
    </h8>
    @elseif (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji)
    <h8>Warna baris tabel:</h8>
    <h8 style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
        <span style="font-weight: bold; color: gray;">Belum di nilai</span>
        <span style="font-weight: bold; color: green;">Sudah di nilai</span>
    </h8>
    @endif
</div>
@endsection