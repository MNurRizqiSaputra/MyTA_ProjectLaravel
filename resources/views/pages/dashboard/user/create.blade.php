@extends('layouts.admin')
@section('title')
    Tambah User
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.index') }}">User</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Users</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <form action="{{ route('user.store') }}" method="POST">
                        @include('pages.dashboard.user.form', ['tombol' => 'Add'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
