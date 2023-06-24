@extends('layouts.admin')

@section('title')
    User
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h2 class="content-title">Data Users</h2>
            @auth
            @if (Auth::user()->role->nama == 'admin')
            <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">Tambah</a>
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
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->nama }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-warning rounded border-0">Edit</a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
