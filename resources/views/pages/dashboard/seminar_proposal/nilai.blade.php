@extends('layouts.admin')
@section('title')
    Nilai Seminar Proposal
@endsection
@section('content')
<div class="content">
    <div class="row">
    <div class="col-12 bg-light text-dark border border-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        {{-- admin dan dosen penguji --}}
                        @if(Auth::user()->mahasiswa)
                            <p>Seminar Proposal</p>

                        @elseif (Auth::user()->role->nama == 'admin' || Auth::user()->dosen->dosen_penguji)
                            <a href="{{ route('seminar-proposal.index') }}">Data Seminar Proposal</a>
                        @endif
                    </li>
                    <li class="breadcrumb-item">
                        {{-- admin dan dosen penguji --}}
                        @if(Auth::user()->mahasiswa)
                            <p>Data Seminar Proposal</p>

                        @elseif (Auth::user()->role->nama == 'admin' || Auth::user()->dosen->dosen_penguji)
                            <a href="{{ route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id]) }}">Detail Seminar Proposal</a>
                        @endif

                    </li>
                    <li class="breadcrumb-item active">Form Nilai</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
            <h3 style="text-align:center;">FORM NILAI <br>SEMINAR PROPOSAL</h3>
                <div class="col-12">
                    <form action="{{ route('seminar-proposal-nilai.update', ['seminarProposal' => $seminarProposal->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('pages.dashboard.seminar_proposal_nilai.form-nilai', ['tombol' => 'Nilai'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
