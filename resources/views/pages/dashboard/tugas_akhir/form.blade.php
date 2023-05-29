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
            <label for="file" class="form-label">File</label>
            @auth
                @if (!Auth::user()->dosen)
                    <input type="file" id="file" class="form-control @error('file') is-invalid @enderror" name="file" placeholder="file" required>
                @endif
            @endauth
            @isset($tugasAkhir->file)
                <label for="file" class="form-label mt-3">Lihat File Sebelumnya</label>
                <a href="{{ Storage::url($tugasAkhir->file) }}" target="_blank">Buka File</a>
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
