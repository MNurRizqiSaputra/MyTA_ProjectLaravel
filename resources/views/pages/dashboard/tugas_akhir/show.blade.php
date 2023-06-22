@extends('layouts.admin')
@section('title')
    Detail Tugas Akhir
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <h3 style="text-align:center;">DETAIL TUGAS AKHIR</h3>
        </div>

        <div class="card">
            <div class="card-body">
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
    </div>
</div>
<br>
@endsection
