@extends('layouts.admin')
@section('title')
    Detail Jurusan
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('jurusan.index') }}">Data Jurusan</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Jurusan</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <form action="{{ route('jurusan.update', ['jurusan' => $jurusan->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('pages.dashboard.jurusan.form', ['tombol' => 'Simpan'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
