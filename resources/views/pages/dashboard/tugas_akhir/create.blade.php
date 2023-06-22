@extends('layouts.admin')
@section('title')
    Tambah Tugas Akhir
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <h3 style="text-align:center;">TAMBAH TUGAS AKHIR</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <form action="{{ route('tugas-akhir.store') }}" method="POST" enctype="multipart/form-data">
                        @include('pages.dashboard.tugas_akhir.form', ['tombol' => 'Tambah'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
