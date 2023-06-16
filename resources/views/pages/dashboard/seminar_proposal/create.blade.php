@extends('layouts.admin')
@section('title')
    Tambah Seminar Proposal
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <p>Seminar Proposal</p>
                    </li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('seminar-proposal.store') }}" method="POST" enctype="multipart/form-data">
                @include('pages.dashboard.seminar_proposal.form', ['tombol' => 'Tambah'])
            </form>
        </div>
    </div>
</div>
@endsection
