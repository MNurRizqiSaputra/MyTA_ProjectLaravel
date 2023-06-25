@extends('layouts.admin')
@section('title')
    Nilai Seminar Penelitian
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        {{-- admin dan dosen penguji --}}
                        @if(Auth::user()->mahasiswa)
                            <p>Seminar Penelitian</p>

                        @elseif (Auth::user()->role->nama == 'admin' || Auth::user()->dosen->dosen_penguji)
                            <a href="{{ route('seminar-penelitian.index') }}">Data Seminar Penelitian</a>

                        @endif
                    </li>
                    <li class="breadcrumb-item">
                        {{-- admin dan dosen penguji --}}
                        @if(Auth::user()->mahasiswa)
                            <p>Data Seminar Penelitian</p>

                        @elseif (Auth::user()->role->nama == 'admin' || Auth::user()->dosen->dosen_penguji)
                            <a href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => $seminarPenelitian->id]) }}">Detail Seminar Penilitan</a>

                        @endif

                    </li>
                    <li class="breadcrumb-item active">Form Nilai</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 style="text-align:center;">FORM NILAI <br>SEMINAR PENELITIAN</h3>
                <div class="col-12">
                    <form action="{{ route('seminar-penelitian-nilai.update', ['seminarPenelitian' => $seminarPenelitian->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('pages.dashboard.seminar_penelitian_nilai.form-nilai', ['tombol' => 'Nilai'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
