@csrf

<div class="p-2">
    {{-- tugas akhir mahasiswa terkait --}}
    {{-- tempat --}}
    {{-- tanggal --}}
    {{-- waktu --}}
    {{-- nilai akhir --}}
    <div class="row">
        @dump($tugasAkhir->judul)
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" value="{{ $tugasAkhir->judul }}">
            @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @auth
        @if ((Auth::user()->dosen && Auth::user()->dosen->dosen_pengujis->contains('id', $tugasAkhir->dosen_penguji_id)) || (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir))
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
        @elseif (Auth::user()->mahasiswa)
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
        @elseif(Auth::user()->role->nama == 'admin' || !Auth::user()->mahasiswa)
        <input type="hidden" name="">
        @endif
    @endauth
</div>
