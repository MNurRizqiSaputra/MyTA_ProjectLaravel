@extends('layouts.admin')
@section('title')
    Profile Mahasiswa
@endsection
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Profile Mahasiswa</h5>
        <!-- Account -->
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="d-grid gap-4">
                    {{-- foto --}}
                    <img src="{{ Storage::url($mahasiswa->foto) }}" alt="user-avatar" class="rounded" height="100" width="100" id="uploadedAvatar">
                    <input type="file" id="upload" name="foto">

                        {{-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button> --}}

                </div>
            </div>
            <hr class="my-0">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="nim" class="form-label">NIM</label>
                        <input class="form-control" type="number" id="nim" name="nim" value="{{ old('nim') ?? ($mahasiswa->nim ?? '') }}" required>
                        @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" id="nama" name="nama" value="{{ old('nama') ?? ($mahasiswa->user->nama ?? '') }}" required>
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? ($mahasiswa->user->tanggal_lahir ?? '') }}" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="nohp" class="form-label">No HP</label>
                        <input class="form-control" type="number" id="nohp" name="nohp" value="{{ old('nohp') ?? ($mahasiswa->nohp ?? '') }}" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email" value="{{ old('email') ?? ($mahasiswa->user->email ?? '') }}" placeholder="john.doe@example.com" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">New Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" value="" placeholder="********" autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">Konfirmasi Password</label>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" id="password" name="password_confirmation" value="" placeholder="********" autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="jurusan" class="form-label">Jurusan</label>

                        <select name="jurusan_id" id="jurusan_id"
                            class="form-select @error('jurusan_id') is-invalid @enderror">
                            @foreach ($jurusans as $jurusan)
                                @if ($jurusan->id == (old('jurusan_id') ?? ($mahasiswa->jurusan_id ?? '')))
                                    <option value="{{ $jurusan->id }}" selected>
                                        {{ $jurusan->nama }}
                                    </option>
                                @else
                                    <option value="{{ $jurusan->id }}">
                                        {{ $jurusan->nama }}
                                    </option>
                                @endif
                            @endforeach
                            @error('jurusan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
        </form>
    </div>
    <!-- /Account -->
    </div>
@endsection
