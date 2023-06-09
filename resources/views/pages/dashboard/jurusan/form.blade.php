@csrf
<div class="p-2">
    <div class="row">
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') ?? ($jurusan->nama ?? '') }}">
            @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
