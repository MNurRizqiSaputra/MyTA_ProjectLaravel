@extends('layouts.admin')

@section('title')
    Dosen
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Dosen</h2>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosens as $dosen)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dosen->nip ?? ''}}</td>
                <td>{{ $dosen->user->nama ?? '' }}</td>
                <td>{{ $dosen->user->email ?? '' }}</td>
                <td>{{ $dosen->jurusan->nama ?? '' }}</td>
                <td><a href="{{ route('dosen.show', ['dosen' => $dosen->id]) }}" class="btn btn-warning">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

