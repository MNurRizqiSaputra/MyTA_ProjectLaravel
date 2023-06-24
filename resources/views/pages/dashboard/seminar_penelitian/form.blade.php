@csrf

@if (request()->is('dashboard/seminar-penelitian/create'))
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
            <label for="file" class="form-label">File</label>
            <input type="text" class="form-control" value="{{ basename($tugasAkhir->file) }}" readonly>
        </div>
    </div>

    {{-- admin --}}
    <div class="row">
        <div class="col mb-3">
            <label for="tempat" class="form-label">Tempat</label>

            @if (Auth::user()->role->nama == 'admin')
                <select id="tempat" name="tempat" class="form-select" required>
                    <option value="Gedung A" {{ $seminarPenelitian->tempat == 'Gedung A' ? 'selected' : '' }}>Gedung A</option>
                    <option value="Gedung B" {{ $seminarPenelitian->tempat == 'Gedung B' ? 'selected' : '' }}>Gedung B</option>
                    <option value="Gedung C" {{ $seminarPenelitian->tempat == 'Gedung C' ? 'selected' : '' }}>Gedung C</option>
                </select>
            @else
                <input type="text" class="form-control" value="{{ old('tempat') ?? ($seminarPenelitian->tempat ?? '') }}" readonly>
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
            <label for="tanggal" class="form-label">Tanggal</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($seminarPenelitian->tanggal ?? '') }}" required>
            @else
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($seminarPenelitian->tanggal ?? '') }}" readonly>
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
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($seminarPenelitian->waktu_mulai ?? '') }}" required>
            @else
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($seminarPenelitian->waktu_mulai ?? '') }}" readonly>
            @endif
            @error('waktu_mulai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($seminarPenelitian->waktu_selesai ?? '') }}" required>
            @else
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($seminarPenelitian->waktu_selesai ?? '') }}" readonly>
            @endif
            @error('waktu_selesai')
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
            <label for="nilai_akhir" class="form-label">Nilai Akhir</label>
            @if (Auth::user()->role->nama == 'admin' || Auth::user()->mahasiswa)
                <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($seminar_penelitian->nilai_akhir ?? '') }}" readonly>
            @else
                <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($seminar_penelitian->nilai_akhir ?? '') }}" required>
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

@elseif (request()->is('dashboard/seminar-penelitian/detail/' . $seminarPenelitian->id))
<div class="p-2">
    <input type="hidden" name="tugas_akhir_id" value="{{ old('tugas_akhir_id') ?? ($seminarPenelitian->tugas_akhir->id ?? '') }}">
    <div class="row">
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $seminarPenelitian->tugas_akhir->mahasiswa->user->nama }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" value="{{ $seminarPenelitian->tugas_akhir->judul }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="file" class="form-label">File</label>
            <input type="text" class="form-control" value="{{ basename($seminarPenelitian->tugas_akhir->file) }}" readonly>
            <p>Lihat file :
                @if (isset($seminarPenelitian->tugas_akhir->file))
                <a href="{{ Storage::url($seminarPenelitian->tugas_akhir->file) }}">Buka File</a>
            @endif
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="tempat" class="form-label">Tempat</label>

            @if (Auth::user()->role->nama == 'admin')
                <select id="tempat" name="tempat" class="form-select" required>
                    <option value="Gedung A" {{ $seminarPenelitian->tempat == 'Gedung A' ? 'selected' : '' }}>Gedung A</option>
                    <option value="Gedung B" {{ $seminarPenelitian->tempat == 'Gedung B' ? 'selected' : '' }}>Gedung B</option>
                    <option value="Gedung C" {{ $seminarPenelitian->tempat == 'Gedung C' ? 'selected' : '' }}>Gedung C</option>
                </select>
            @else
                <input type="text" class="form-control" value="{{ old('tempat') ?? ($seminarPenelitian->tempat ?? '') }}" readonly>
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
            <label for="tanggal" class="form-label">Tanggal</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($seminarPenelitian->tanggal ?? '') }}" required>
            @else
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($seminarPenelitian->tanggal ?? '') }}" readonly>
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
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($seminarPenelitian->waktu_mulai ?? '') }}" required>
            @else
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($seminarPenelitian->waktu_mulai ?? '') }}" readonly>
            @endif
            @error('waktu_mulai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($seminarPenelitian->waktu_selesai ?? '') }}" required>
            @else
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($seminarPenelitian->waktu_selesai ?? '') }}" readonly>
            @endif
            @error('waktu_selesai')
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
                @foreach ($dosenSeminarPenelitians as $dosenSeminarPenelitian)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSeminarPenelitian->id }}" {{ in_array($dosenSeminarPenelitian->id, $selectedDosenPenelitian) ? 'checked' : '' }}>

                        <label class="form-check-label" for="dosen_penguji_{{ $dosenSeminarPenelitian->id }}">{{ $dosenSeminarPenelitian->nama }}</label>
                    </div>
                @endforeach
            @else
                @foreach ($dosenSeminarPenelitians as $dosenSeminarPenelitian)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSeminarPenelitian->id }}" {{ in_array($dosenSeminarPenelitian->dosen_penguji->id, $selectedDosenPenelitian) ? 'checked' : '' }}>

                        <label class="form-check-label" for="dosen_penguji_{{ $dosenSeminarPenelitian->id }}">{{ $dosenSeminarPenelitian->dosen_penguji->dosen->user->nama }}</label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="nilai_akhir" class="form-label">Nilai akhir</label>
            @php
                $mahasiswaLogin = Auth::user()->mahasiswa ? Auth::user()->mahasiswa->tugas_akhir->seminar_penelitian->id : null;
                $dosenPengujiLogin = Auth::user()->dosen ? Auth::user()->dosen->dosen_penguji->id : null;
                $nilaiPenelitianDosenPengujiLogin = $seminarPenelitian->seminar_penelitian_nilais->where('dosen_penguji_id', $dosenPengujiLogin)->value('nilai');
            @endphp

            @if ($mahasiswaLogin || ($dosenPengujiLogin && $nilaiPenelitianDosenPengujiLogin) || Auth::user()->role->nama == 'admin')
                <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($seminarPenelitian->nilai_akhir ?? '') }}" readonly>
            @else
                <input type="number" name="nilai_akhir" class="form-control" value="" readonly>
            @endif
            @error('nilai_akhir')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @if (Auth::user()->role->nama == 'admin' && !$seminarPenelitian->nilai_akhir)
        <button type="submit" id="edit" class="btn btn-primary">{{ $tombol }}</button>
    @elseif ($seminarPenelitian->nilai_akhir)
        <input type="hidden" name="">
    @endif

    {{-- menampilkan tombol jika login sebagai dosen penguji --}}
    @if (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji)
        <a href="{{ route('seminar-penelitian-nilai.nilai', ['seminarPenelitian' => $seminarPenelitian->id]) }}" class="btn btn-primary">Berikan Nilai</a>
    @endif
</div>
@endif

