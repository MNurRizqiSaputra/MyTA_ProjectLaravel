@extends('layouts.admin')
@section('title')
    Detail Seminar Penelitian
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <h3 style="text-align:center;">DETAIL SEMINAR PENELITIAN</h3>
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
                    <form action="{{ route('seminar-penelitian.update', ['seminarPenelitian' => $seminarPenelitian->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('pages.dashboard.seminar_penelitian.form', ['tombol' => 'Simpan'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
