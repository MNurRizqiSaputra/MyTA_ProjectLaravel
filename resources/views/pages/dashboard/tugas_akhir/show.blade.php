@extends('layouts.admin')
@section('title')
    Detail Tugas Akhir
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <p>Tugas Akhir</p>
                    </li>
                    <li class="breadcrumb-item active">Detail Data</li>
                </ol>
            </nav>
        </div>

        <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{ route('tugas-akhir.update', ['tugasAkhir' => $tugasAkhir->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('pages.dashboard.tugas_akhir.form', ['tombol' => 'Edit'])
            </form>
        </div>
    </div>
</div>
@endsection
