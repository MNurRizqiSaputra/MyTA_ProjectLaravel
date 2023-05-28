@extends('layouts.admin')
@section('title')
    Tambah Dosen Pembimbing
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dosen-pembimbing.index') }}">Dosen Pembimbing</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('dosen-pembimbing.store') }}" method="POST" enctype="multipart/form-data">
                @include('pages.dashboard.dosen_pembimbing.form', ['tombol' => 'Add'])
            </form>
        </div>
    </div>
</div>
@endsection
