@extends('layouts.admin')
@section('title')
    Edit Role
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('role.index') }}" class="text-decoration-none">Role</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Roles</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('role.update', ['id' => $role->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-2">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="hidden" name="id" value="{{$role->id}}"/>
                            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama') ?? $role->nama }}" required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
