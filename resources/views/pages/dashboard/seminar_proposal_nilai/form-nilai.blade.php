@csrf
<div class="p-2">
    <div class="row">
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $seminarProposalNilai->seminar_proposal->tugas_akhir->mahasiswa->user->nama ?? '' }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" value="{{ $seminarProposalNilai->seminar_proposal->tugas_akhir->judul ?? '' }}" readonly>
            <input type="hidden" name="seminar_proposal_id" value="{{ $seminarProposal->id ?? ''}}">
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="nama_dosen_penguji" class="form-label">Nama Dosen Penguji</label>
            <input type="text" class="form-control" value="{{ Auth::user()->dosen->user->nama }}" readonly>
            <input type="hidden" class="form-control" name="dosen_penguji_id" value="{{ old('dosen_penguji_id') ?? ($seminarProposalNilai->dosen_penguji_id ?? '') }}" required>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="nilai" class="form-label">nilai</label>
            <input type="number" class="form-control" name="nilai" value="{{ old('nilai') ?? ($seminarProposalNilai->nilai ?? '') }}">
        </div>
    </div>


    <button type="submit" id="add" class="btn btn-primary">{{ $tombol }}</button>
</div>
