@csrf
<div class="p-2">
    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            @auth
                @if (!Auth::user()->dosen)
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
            <label for="status_persetujuan" class="form-label">Status Persetujuan</label>
            @auth
                @if (Auth::user()->role->nama === 'dosen' && Auth::user()->dosen->dosen_pembimbings->pluck('id')->toArray() || Auth::user()->role->nama == 'admin')
                    <select class="form-select" name="status_persetujuan" id="status_persetujuan" required>
                        <option value="Disetujui" {{ $tugasAkhir->status_persetujuan == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="Tidak Disetujui" {{ $tugasAkhir->status_persetujuan == 'Tidak Disetujui' ? 'selected' : '' }}>Tidak Disetujui</option>
                    </select>
                @elseif(Auth::user()->role->nama === 'mahasiswa' || Auth::user()->role->nama === 'admin')
                    <input class="form-control" type="text" name="status_persetujuan" id="status_persetujuan" value="{{ $tugasAkhir->status_persetujuan }}" readonly>
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
            <label for="file" class="form-label">File</label>
            @auth
                @if (!Auth::user()->dosen)
                    <input type="file" id="file" class="form-control @error('file') is-invalid @enderror" name="file">
                @endif
            @endauth
            @isset($tugasAkhir->file)
                <label for="file" class="form-label mt-3">Lihat File Sebelumnya</label>
                <a href="{{ Storage::url($tugasAkhir->file) }}">Buka File</a>
            @endisset
            @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
