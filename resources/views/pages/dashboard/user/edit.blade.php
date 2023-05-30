@extends('layouts.admin')
@section('title')
    Edit User
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.index') }}" class="text-decoration-none">User</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Users</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-2">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="hidden" name="id" value="{{$user->id}}"/>
                            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama') ?? $user->nama }}" required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') ?? $user->email }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" value="{{ old('password') ?? $user->password }}" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="role_id" class="form-label">Role</label>
                            <select name="role_id" id="role_id" class="form-select @error('role_id') is-invalid @enderror">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}> {{ $role->nama }} </option>
                                @endforeach
                            </select>
                            @error('role_id')
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
