@extends('layouts.admin')

@section('title')
    Mahasiswa
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Mahasiswa</h2>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mahasiswa->nim ?? ''}}</td>
                <td>{{ $mahasiswa->user->nama ?? '' }}</td>
                <td>{{ $mahasiswa->user->email ?? '' }}</td>
                <td>{{ $mahasiswa->jurusan->nama ?? ''}}</td>
                <td><a href="{{ route('mahasiswa.show', ['mahasiswa' => $mahasiswa->id]) }}" class="btn btn-warning">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

