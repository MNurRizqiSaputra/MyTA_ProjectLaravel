@extends('layouts.admin')
@section('title')
    Detail Sidang Akhir
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <h3 style="text-align:center;">DETAIL SIDANG AKHIR</h3>
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
                    <form action="{{ route('sidang-akhir.update', ['sidangAkhir' => $sidangAkhir->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('pages.dashboard.sidang_akhir.form', ['tombol' => 'Simpan'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
