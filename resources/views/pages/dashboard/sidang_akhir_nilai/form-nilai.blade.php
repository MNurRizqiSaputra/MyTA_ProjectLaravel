@csrf
<div class="p-2">
    <div class="row">
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $sidangAkhirNilai->sidang_akhir->tugas_akhir->mahasiswa->user->nama ?? '' }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" value="{{ $sidangAkhirNilai->sidang_akhir->tugas_akhir->judul ?? '' }}" readonly>
            <input type="hidden" name="sidang_akhir_id" value="{{ $sidangAkhir->id ?? ''}}">
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="nama_dosen_penguji" class="form-label">Nama Dosen Penguji</label>
            <input type="text" class="form-control" value="{{ Auth::user()->dosen->user->nama }}" readonly>
            <input type="hidden" class="form-control" name="dosen_penguji_id" value="{{ old('dosen_penguji_id') ?? ($sidangAkhirNilai->dosen_penguji_id ?? '') }}" required>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="nilai" class="form-label">N ilai</label>
            <input type="number" class="form-control" name="nilai" value="{{ old('nilai') ?? ($sidangAkhirNilai->nilai ?? '') }}">
        </div>
    </div>


    <button type="submit" id="add" class="btn btn-primary">{{ $tombol }}</button>
</div>
