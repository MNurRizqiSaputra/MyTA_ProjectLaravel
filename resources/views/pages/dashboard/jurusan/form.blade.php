@csrf
<div class="p-2">
    <div class="row">
        <h1 style="text-align:center;">
            @if ($tombol == 'Add')
                FORM TAMBAH JURUSAN
            @elseif ($tombol == 'Simpan')
                FORM EDIT JURUSAN
            @endif
        </h1>
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama Jurusan</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') ?? ($jurusan->nama ?? '') }}" placeholder="Masukan nama jurusan">
            @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <center>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Cancel</a>
    </center>

</div>
