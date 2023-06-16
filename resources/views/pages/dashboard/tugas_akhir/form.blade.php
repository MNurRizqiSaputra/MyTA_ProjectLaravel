@csrf
@if (request()->is('dashboard/tugas-akhir/create'))
<div class="p-2">
    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Judul" value="{{ old('judul') ?? ($tugasAkhir->judul ?? '') }}" required>
            @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" id="file" class="form-control @error('file') is-invalid @enderror" name="file">

            @if (isset($tugasAkhir->file))
                <label for="file" class="form-label mt-3">Lihat File Sebelumnya</label>
                <a href="{{ Storage::url($tugasAkhir->file) }}">Buka File</a>
            @endif

            @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="dosen_pembimbing" class="form-label">Dosen Pembimbing :</label><br>
            <label for="" class="form-label">Tidak ada data</label>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="status_persetujuan" class="form-label">Status Persetujuan</label>
            @auth

                @if (Auth::user()->role->nama == 'admin' || Auth::user()->mahasiswa && Auth::user()->mahasiswa->id === ($tugasAkhir->mahasiswa_id ?? null))
                    <input class="form-control" type="text" name="status_persetujuan" id="status_persetujuan" value="{{ $tugasAkhir->status_persetujuan }}" readonly>

                @elseif ((!isset($tugasAkhir) || !$tugasAkhir->id) || (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && Auth::user()->mahasiswa->id === ($tugasAkhir->mahasiswa_id ?? null)))
                    <input class="form-control" type="text" name="status_persetujuan" id="status_persetujuan" readonly>

                @elseif (Auth::user()->role->nama == 'dosen' && Auth::user()->dosen && Auth::user()->dosen->dosen_pembimbing->id)
                    <select class="form-select" name="status_persetujuan" id="status_persetujuan" required>
                        <option value="">--Pilih--</option>
                        <option value="Disetujui" {{ $tugasAkhir->status_persetujuan == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="Tidak Disetujui" {{ $tugasAkhir->status_persetujuan == 'Tidak Disetujui' ? 'selected' : '' }}>Tidak Disetujui</option>
                    </select>
                @endif

            @endauth
            @error('status_persetujuan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="total_nilai" class="form-label">Total Nilai</label>

            <input class="form-control" type="number" name="total_nilai" id="total_nilai" value="{{ old('total_nilai') ?? ($tugasAkhir->total_nilai ?? '') }}" required readonly>

            @error('total_nilai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @auth
        @if ((Auth::user()->dosen && Auth::user()->dosen->dosen_pembimbing->id) || (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir) || Auth::user()->role->nama == 'admin')
            <button type="submit" id="edit" class="btn btn-primary">{{ $tombol }}</button>

        @elseif (Auth::user()->mahasiswa)
            <button type="submit" id="tambah" class="btn btn-primary">{{ $tombol }}</button>

        @elseif(!Auth::user()->mahasiswa)
            <input type="hidden" name="">
        @endif
    @endauth
</div>
@elseif(request()->is('dashboard/tugas-akhir/detail/' . $tugasAkhir->id))
<div class="p-2">
    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            @auth
                @if ((!isset($tugasAkhir) || !$tugasAkhir->id) || (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && Auth::user()->mahasiswa->id === ($tugasAkhir->mahasiswa_id ?? null)))
                    <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Judul" value="{{ old('judul') ?? ($tugasAkhir->judul ?? '') }}" required>
                @else
                    <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Judul" value="{{ old('judul') ?? ($tugasAkhir->judul ?? '') }}" readonly>
                @endif
            @endauth
            @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="file" class="form-label">File</label>
            @auth
                @if ((!isset($tugasAkhir) || !$tugasAkhir->id) || (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && Auth::user()->mahasiswa->id === ($tugasAkhir->mahasiswa_id ?? null)))
                    <input type="file" id="file" class="form-control @error('file') is-invalid @enderror" name="file">
                @endif
            @endauth

            @if (isset($tugasAkhir->file))
                <label for="file" class="form-label mt-3">Lihat File Sebelumnya</label>
                <a href="{{ Storage::url($tugasAkhir->file) }}">Buka File</a>
            @endif

            @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="dosen_pembimbing" class="form-label">Dosen Pembimbing :</label>
            @if (Auth::user()->role->nama == 'admin')
                @foreach ($dosenPembimbings as $dosenPembimbing)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="dosen_pembimbing_[]"  value="{{ $dosenPembimbing->id }}" {{ $dosenPembimbing->id == $selectedDosenPembimbing ? 'checked' : '' }}>

                    <label class="form-check-label" for="dosen_pembimbing_{{ $dosenPembimbing->id }}">{{ $dosenPembimbing->dosen->user->nama }}</label>
                </div>
                @endforeach
            @elseif (Auth::user()->dosen || Auth::user()->mahasiswa)
                @if ($selectedDosenPembimbing)
                    <label for="" class="form-label">{{ $selectedDosenPembimbing->dosen->user->nama }}</label>
                @else
                    <br><label for="" class="form-label">Tidak ada data</label>
                @endif
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="status_persetujuan" class="form-label">Status Persetujuan</label>
            @auth

                @if (Auth::user()->role->nama == 'admin' || Auth::user()->mahasiswa && Auth::user()->mahasiswa->id === ($tugasAkhir->mahasiswa_id ?? null))
                    <input class="form-control" type="text" name="status_persetujuan" id="status_persetujuan" value="{{ $tugasAkhir->status_persetujuan }}" readonly>

                @elseif ((!isset($tugasAkhir) || !$tugasAkhir->id) || (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && Auth::user()->mahasiswa->id === ($tugasAkhir->mahasiswa_id ?? null)))
                    <input class="form-control" type="text" name="status_persetujuan" id="status_persetujuan" readonly>

                @elseif (Auth::user()->role->nama == 'dosen' && Auth::user()->dosen && Auth::user()->dosen->dosen_pembimbing->id)
                    <select class="form-select" name="status_persetujuan" id="status_persetujuan" required>
                        <option value="">--Pilih--</option>
                        <option value="Disetujui" {{ $tugasAkhir->status_persetujuan == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="Tidak Disetujui" {{ $tugasAkhir->status_persetujuan == 'Tidak Disetujui' ? 'selected' : '' }}>Tidak Disetujui</option>
                    </select>
                @endif

            @endauth
            @error('status_persetujuan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="total_nilai" class="form-label">total nilai</label>

            <input class="form-control" type="number" name="total_nilai" id="total_nilai" value="{{ old('total_nilai') ?? ($tugasAkhir->total_nilai ?? '') }}" required readonly>

            @error('total_nilai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @auth
        @if (!isset(Auth::user()->mahasiswa->tugas_akhir) && $tugasAkhir->status_persetujuan == 'Disetujui')
            <input type="hidden" name="">
        @elseif ((Auth::user()->dosen && Auth::user()->dosen->dosen_pembimbing->id) || (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir) || Auth::user()->role->nama == 'admin')
            <button type="submit" id="edit" class="btn btn-primary">{{ $tombol }}</button>
        @elseif (Auth::user()->mahasiswa)
            <button type="submit" id="tambah" class="btn btn-primary">{{ $tombol }}</button>
        @elseif(!Auth::user()->mahasiswa)
            <input type="hidden" name="">
        @endif
    @endauth
</div>
@endif
