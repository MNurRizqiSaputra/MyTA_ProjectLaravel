@extends('layouts.admin')

@section('title')
    Role
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Roles</h2>
            @auth
                @if (Auth::user()->role->nama == 'admin')
                    <a href="{{ route('role.create') }}">Tambah</a>
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
            @foreach ($roles as $role)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $role->nama }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('role.show', ['role' => $role->id]) }}" class="btn btn-warning">Detail</a>
                    <form action="{{ route('role.destroy', ['role' => $role->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

