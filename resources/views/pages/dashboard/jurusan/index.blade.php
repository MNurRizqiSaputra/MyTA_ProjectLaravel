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

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$jurusan->id}}">Hapus</button>
                </td>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal{{$jurusan->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $jurusan->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin akan menghapus data jurusan {{ $jurusan->nama }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('jurusan.destroy', ['jurusan' => $jurusan->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="jurusan_id" value="{{ $jurusan->id }}">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

