@extends('layouts.admin')

@section('title')
    Dosen Penguji Page
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Dosen Penguji</h2>
            <h5 class="content-desc mb-4">FOR ADMIN</h5>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosen_pengujis as $dosen_penguji)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dosen_penguji->dosen->nip }}</td>
                <td>{{ $dosen_penguji->dosen->user->nama }}</td>
                <td>{{ $dosen_penguji->dosen->user->email }}</td>
                <td>{{ $dosen_penguji->dosen->jurusan->nama }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

