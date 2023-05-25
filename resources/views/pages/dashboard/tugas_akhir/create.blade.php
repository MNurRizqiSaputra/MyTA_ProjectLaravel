@extends('layouts.admin')
@section('title')
    Tambah Tugas Akhir
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('tugas-akhir.index') }}">Tugas Akhir</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('tugas-akhir.store') }}" method="POST" enctype="multipart/form-data">
                @include('pages.dashboard.tugas_akhir.form', ['tombol' => 'Add'])
            </form>
        </div>
    </div>
</div>
@endsection
