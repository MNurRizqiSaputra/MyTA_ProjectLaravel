@extends('layouts.admin')
@section('title')
    Detail Seminar Proposal
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 bg-light text-dark border border-light">
            <h3 style="text-align:center;">DETAIL SEMINAR PROPOSAL</h3>
        </div>
        @if(session('success'))
        <div class="col-12 alert alert-success">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="col-12 alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <form action="{{ route('seminar-proposal.update', ['seminarProposal' => $seminarProposal->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('pages.dashboard.seminar_proposal.form', ['tombol' => 'Simpan'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
