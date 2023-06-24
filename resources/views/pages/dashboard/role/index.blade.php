@extends('layouts.admin')

@section('title')
    Role
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h2 class="content-title">Data Roles</h2>
            @auth
              @if (Auth::user()->role->nama == 'admin')
                <a href="{{ route('role.create') }}" class="btn btn-primary mb-2">Tambah</a>
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
            @foreach ($roles as $role)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $role->nama }}</td>
                <td>
                    <a href="{{ route('role.show', ['role' => $role->id]) }}" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$role->id}}">Hapus</button>
                </td>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal{{$role->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $role->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin akan menghapus data ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('role.destroy', ['role' => $role->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="role_id" value="{{ $role->id }}">
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

