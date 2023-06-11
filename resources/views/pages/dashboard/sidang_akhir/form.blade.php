@csrf

@if (request()->is('dashboard/sidang-akhir/create'))
<div class="p-2">
    {{-- mahasiswa --}}
    <input type="hidden" name="tugas_akhir_id" value="{{ old('tugas_akhir_id') ?? ($tugasAkhir->id ?? '') }}">
    <div class="row">
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $tugasAkhir->mahasiswa->user->nama }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" value="{{ $tugasAkhir->judul }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="file" class="form-label">file</label>
            <input type="text" class="form-control" value="{{ basename($tugasAkhir->file) }}" readonly>
        </div>
    </div>

    {{-- admin --}}
    <div class="row">
        <div class="col mb-3">
            <label for="tempat" class="form-label">Tempat</label>

            @if (Auth::user()->role->nama == 'admin')
                <select id="tempat" name="tempat" class="form-select" required>
                    <option value="Gedung A" {{ $sidangAkhir->tempat == 'Gedung A' ? 'selected' : '' }}>Gedung A</option>
                    <option value="Gedung B" {{ $sidangAkhir->tempat == 'Gedung B' ? 'selected' : '' }}>Gedung B</option>
                    <option value="Gedung C" {{ $sidangAkhir->tempat == 'Gedung C' ? 'selected' : '' }}>Gedung C</option>
                </select>
            @else
                <input type="text" class="form-control" value="{{ old('tempat') ?? ($sidangAkhir->tempat ?? '') }}" readonly>
            @endif

            @error('tempat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="tanggal" class="form-label">tanggal</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($sidangAkhir->tanggal ?? '') }}" required>
            @else
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($sidangAkhir->tanggal ?? '') }}" readonly>
            @endif
            @error('tanggal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu" class="form-control" value="{{ old('waktu') ?? ($sidangAkhir->waktu ?? '') }}" required>
            @else
                <input type="time" name="waktu" class="form-control" value="{{ old('waktu') ?? ($sidangAkhir->waktu ?? '') }}" readonly>
            @endif
            @error('waktu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="dosen_penguji_id" class="form-label">Dosen Penguji:</label>

        </div>
    </div>

    {{-- dosen penguji --}}
    <div class="row">
        <div class="col mb-3">
            <label for="nilai_akhir" class="form-label">Nilai akhir</label>
            @if (Auth::user()->role->nama == 'admin' || Auth::user()->mahasiswa)
                <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($sidang_akhir->nilai_akhir ?? '') }}" readonly>
            @else
                <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($sidang_akhir->nilai_akhir ?? '') }}" required>
            @endif
            @error('nilai_akhir')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <button type="submit" id="add" class="btn btn-primary">{{ $tombol }}</button>
</div>

@elseif (request()->is('dashboard/sidang-akhir/detail/' . $sidangAkhir->id))
<div class="p-2">
    <input type="hidden" name="tugas_akhir_id" value="{{ old('tugas_akhir_id') ?? ($sidangAkhir->tugas_akhir->id ?? '') }}">
    <div class="row">
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $sidangAkhir->tugas_akhir->mahasiswa->user->nama }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" value="{{ $sidangAkhir->tugas_akhir->judul }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="file" class="form-label">file</label>
            <input type="text" class="form-control" value="{{ basename($sidangAkhir->tugas_akhir->file) }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="tempat" class="form-label">Tempat</label>

            @if (Auth::user()->role->nama == 'admin')
                <select id="tempat" name="tempat" class="form-select" required>
                    <option value="Gedung A" {{ $sidangAkhir->tempat == 'Gedung A' ? 'selected' : '' }}>Gedung A</option>
                    <option value="Gedung B" {{ $sidangAkhir->tempat == 'Gedung B' ? 'selected' : '' }}>Gedung B</option>
                    <option value="Gedung C" {{ $sidangAkhir->tempat == 'Gedung C' ? 'selected' : '' }}>Gedung C</option>
                </select>
            @else
                <input type="text" class="form-control" value="{{ old('tempat') ?? ($sidangAkhir->tempat ?? '') }}" readonly>
            @endif

            @error('tempat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="tanggal" class="form-label">tanggal</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($sidangAkhir->tanggal ?? '') }}" required>
            @else
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($sidangAkhir->tanggal ?? '') }}" readonly>
            @endif
            @error('tanggal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu" class="form-control" value="{{ old('waktu') ?? ($sidangAkhir->waktu ?? '') }}" required>
            @else
                <input type="time" name="waktu" class="form-control" value="{{ old('waktu') ?? ($sidangAkhir->waktu ?? '') }}" readonly>
            @endif
            @error('waktu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="dosen_penguji_id" class="form-label">Dosen Penguji:</label>
            @if (Auth::user()->role->nama == 'admin')
                <!-- Loop untuk menampilkan daftar dosen penguji -->
                @foreach ($dosenSidangAkhirs as $dosenSidangAkhir)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSidangAkhir->id }}" {{ in_array($dosenSidangAkhir->id, $selectedDosenSidangAkhir) ? 'checked' : '' }}>

                        <label class="form-check-label" for="dosen_penguji_{{ $dosenSidangAkhir->id }}">{{ $dosenSidangAkhir->nama }}</label>
                    </div>
                @endforeach
            @else
                @foreach ($dosenSidangAkhirs as $dosenSidangAkhir)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSidangAkhir->id }}" {{ in_array($dosenSidangAkhir->dosen_penguji->id, $selectedDosenSidangAkhir) ? 'checked' : '' }}>

                        <label class="form-check-label" for="dosen_penguji_{{ $dosenSidangAkhir->id }}">{{ $dosenSidangAkhir->dosen_penguji->dosen->user->nama }}</label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="nilai_akhir" class="form-label">Nilai akhir</label>
            <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($sidangAkhir->nilai_akhir ?? '') }}" readonly>
            @error('nilai_akhir')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @if (Auth::user()->role->nama == 'admin')
        <button type="submit" id="edit" class="btn btn-primary">{{ $tombol }}</button>
    @endif

    {{-- menampilkan tombol jika login sebagai dosen penguji --}}
    @if (Auth::user()->dosen && Auth::user()->dosen->dosen_pengujis->count() > 0)
        <a href="{{ route('sidang-akhir-nilai.nilai', ['sidangAkhir' => $sidangAkhir->id]) }}" class="btn btn-primary">Berikan Nilai</a>
    @endif
</div>
@endif

