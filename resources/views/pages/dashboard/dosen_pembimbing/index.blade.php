@extends('layouts.admin')

@section('title')
    Dosen Pembimbing
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h2 class="content-title">Dosen Pembimbing</h2>
            @auth
                @if (Auth::user()->role->nama == 'admin')
                    <a href="{{ route('dosen-pembimbing.create') }} " class=btn btn-primary mb-2>Tambah</a>
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosen_pembimbings as $dosen_pembimbing)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dosen_pembimbing->nip ?? ''}}</td>
                <td>{{ $dosen_pembimbing->nama ?? ''}}</td>
                <td>{{ $dosen_pembimbing->email ?? ''}}</td>
                <td>{{ $dosen_pembimbing->jurusan ?? ''}}</td>
                <td class="d-flex gap-2">
                    <form action="{{ route('dosen-pembimbing.destroy', $dosen_pembimbing->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
