@csrf
<div class="p-2">
    <div class="row">
        <h1 style="text-align:center;">
            @if ($tombol == 'Add')
                FORM TAMBAH ROLE
            @elseif ($tombol == 'Simpan')
                FORM EDIT ROLE
            @endif
        </h1>
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama Role</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') ?? ($role->nama ?? '') }}" placeholder="Masukan nama role">
            @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <center>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    <a href="{{ route('role.index') }}" class="btn btn-secondary">Cancel</a>
    </center>
</div>
