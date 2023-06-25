@extends('layouts.admin')
@section('title')
    Tambah Seminar Penelitian
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <h3 style="text-align:center;">TAMBAH SEMINAR PENILITIAN</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <form action="{{ route('seminar-penelitian.store') }}" method="POST" enctype="multipart/form-data">
                        @include('pages.dashboard.seminar_penelitian.form', ['tombol' => 'Tambah'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
