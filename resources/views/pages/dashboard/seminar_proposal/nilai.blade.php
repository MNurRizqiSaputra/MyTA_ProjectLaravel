@extends('layouts.admin')
@section('title')
    Nilai Seminar Proposal
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-2 mb-4">
                    <li class="breadcrumb-item">
                        {{-- admin dan dosen penguji --}}
                        @if(Auth::user()->mahasiswa)
                            <p>Seminar Proposal</p>

                        @elseif (Auth::user()->role->nama == 'admin' || Auth::user()->dosen->dosen_pengujis)
                            <a href="{{ route('seminar-proposal.index') }}">Seminar Proposal</a>

                        @endif
                    </li>
                    <li class="breadcrumb-item">
                        {{-- admin dan dosen penguji --}}
                        @if(Auth::user()->mahasiswa)
                            <p>Seminar Proposal</p>

                        @elseif (Auth::user()->role->nama == 'admin' || Auth::user()->dosen->dosen_pengujis)
                            <a href="{{ route('seminar-proposal.show', ['seminarProposal' => $seminarProposal->id]) }}">Detail Data</a>

                        @endif

                    </li>
                    <li class="breadcrumb-item active">Nilai</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <form action="{{ route('seminar-proposal-nilai.update', ['seminarProposal' => $seminarProposal->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('pages.dashboard.seminar_proposal_nilai.form-nilai', ['tombol' => 'Nilai'])
            </form>
        </div>
    </div>
</div>
@endsection
