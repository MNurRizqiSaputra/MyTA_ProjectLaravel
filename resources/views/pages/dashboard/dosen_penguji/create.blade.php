@extends('layouts.admin')
@section('title')
    Tambah Dosen Penguji
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dosen-penguji.index') }}">Dosen Penguji</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('dosen-penguji.store') }}" method="POST" enctype="multipart/form-data">
                @include('pages.dashboard.dosen_penguji.form', ['tombol' => 'Add'])
            </form>
        </div>
    </div>
</div>
@endsection
