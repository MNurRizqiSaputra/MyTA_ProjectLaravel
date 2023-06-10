@extends('layouts.admin')
@section('title')
    Detail Role
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('role.index') }}">Role</a>
                    </li>
                    <li class="breadcrumb-item active">Detail Data</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('role.update', ['role' => $role->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('pages.dashboard.role.form', ['tombol' => 'Edit'])
            </form>
        </div>
    </div>
</div>
@endsection
