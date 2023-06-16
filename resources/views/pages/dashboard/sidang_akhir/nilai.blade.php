@extends('layouts.admin')
@section('title')
    Nilai Sidang Akhir
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
                            <p>Sidang Akhir</p>

                        @elseif (Auth::user()->role->nama == 'admin' || Auth::user()->dosen->dosen_penguji)
                            <a href="{{ route('sidang-akhir.index') }}">Sidang Akhir</a>

                        @endif
                    </li>
                    <li class="breadcrumb-item">
                        {{-- admin dan dosen penguji --}}
                        @if(Auth::user()->mahasiswa)
                            <p>Sidang Akhir</p>

                        @elseif (Auth::user()->role->nama == 'admin' || Auth::user()->dosen->dosen_penguji)
                            <a href="{{ route('sidang-akhir.show', ['sidangAkhir' => $sidangAkhir->id]) }}">Detail Data</a>

                        @endif


                    </li>
                    <li class="breadcrumb-item active">Nilai</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('sidang-akhir-nilai.update', ['sidangAkhir' => $sidangAkhir->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('pages.dashboard.sidang_akhir_nilai.form-nilai', ['tombol' => 'Nilai'])
            </form>
        </div>
    </div>
</div>
@endsection
