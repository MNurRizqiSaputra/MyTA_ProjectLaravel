@extends('layouts.admin')
@section('title')
    Detail Seminar Penelitian
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        {{-- admin dan dosen penguji --}}
                        @if(Auth::user()->mahasiswa)
                        <p>Seminar Penelitian</p>
                        @elseif (Auth::user()->role->nama == 'admin' || Auth::user()->dosen->dosen_pengujis)
                        <a href="{{ route('seminar-penelitian.index') }}">Seminar Penelitian</a>
                        @endif
                    </li>
                    <li class="breadcrumb-item active">Detail Data</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('seminar-penelitian.update', ['seminarPenelitian' => $seminarPenelitian->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('pages.dashboard.seminar_penelitian.form', ['tombol' => 'Simpan'])
            </form>
        </div>
    </div>
</div>
@endsection
