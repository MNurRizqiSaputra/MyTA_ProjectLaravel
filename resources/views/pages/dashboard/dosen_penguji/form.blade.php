@csrf
<div class="p-2">
    <div class="row">
        <h1 style="text-align:center;">FORM TAMBAH <br>DOSEN PENGUJI</h1>
        <div class="col mb-3">
            <label for="dosen" class="form-label">Dosen</label>
            <select name="dosen_id" id="dosen_id" class="form-select">
                <option value="" disabled selected>-- Pilih Dosen --</option>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
            @error('dosen_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <center>
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    <a href="{{ route('dosen-penguji.index') }}" class="btn btn-secondary">Cancel</a> 
    </center>
</div>
