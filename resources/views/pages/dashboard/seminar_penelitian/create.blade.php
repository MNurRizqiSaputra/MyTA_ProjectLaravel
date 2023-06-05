@extends('layouts.admin')
@section('title')
    Tambah Seminar Penelitian
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <p>Seminar Penelitian</p>
                    </li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('seminar-penelitian.store') }}" method="POST" enctype="multipart/form-data">
                @include('pages.dashboard.seminar_penelitian.form', ['tombol' => 'Add'])
            </form>
        </div>
    </div>
</div>
@endsection
