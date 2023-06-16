@csrf
<div class="p-2">
    <div class="row">
        <div class="col mb-3">
            <label for="dosen" class="form-label">Dosen</label>
            <select name="dosen_id" id="dosen_id" class="form-select">
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

    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
