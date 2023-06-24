@extends('layouts.admin')
@section('title')
    Tambah Seminar Proposal
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <h3 style="text-align:center;">TAMBAH SEMINAR PROPOSAL</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <form action="{{ route('seminar-proposal.store') }}" method="POST" enctype="multipart/form-data">
                        @include('pages.dashboard.seminar_proposal.form', ['tombol' => 'Tambah'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
