@csrf
<div class="p-2">
    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Judul" value="{{ old('judul') ?? ($tugas_akhir->judul ?? '') }}" required>
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
            <input type="file" id="file" class="form-control @error('file') is-invalid @enderror" name="file" placeholder="file" value="{{ old('file') ?? ($tugas_akhir->file ?? '') }}" required>
            @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
