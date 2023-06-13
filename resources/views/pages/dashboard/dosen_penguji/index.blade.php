@extends('layouts.admin')

@section('title')
    Dosen Penguji
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h2 class="content-title">Dosen Penguji</h2>
            @auth
                @if (Auth::user()->role->nama == 'admin')
                    <a href="{{ route('dosen-penguji.create') }}">Tambah</a>
                @endif
            @endauth
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
                <td>{{ $dosen_penguji->nip ?? ''}}</td>
                <td>{{ $dosen_penguji->nama ?? '' }}</td>
                <td>{{ $dosen_penguji->email ?? '' }}</td>
                <td>{{ $dosen_penguji->jurusan ?? '' }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

