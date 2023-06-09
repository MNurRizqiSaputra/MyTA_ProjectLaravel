@extends('layouts.admin')

@section('title')
    Jurusan
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h2 class="content-title">Jurusan</h2>
            @auth
                @if (Auth::user()->role->nama == 'admin')
                    <a href="{{ route('jurusan.create') }}" class="btn btn-primary mb-2">Tambah</a>
                @endif
            @endauth
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jurusans as $jurusan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jurusan->nama }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('jurusan.show', ['jurusan' => $jurusan->id]) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('jurusan.destroy', ['jurusan' => $jurusan->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

