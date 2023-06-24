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
            <label for="file" class="form-label">File</label>
            <input type="text" class="form-control" value="{{ basename($tugasAkhir->file) }}" readonly>
            <details>
                <summary>Attention!</summary>
                    <h8 style="font-style:italic; color:red;" >Silakan unggah ulang file jika terdapat pembaruan dalam menu Tugas Akhir</h8>
            </details> 
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
            <label for="tanggal" class="form-label">Tanggal</label>
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
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($sidangAkhir->waktu_mulai ?? '') }}" required>
            @else
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($sidangAkhir->waktu_mulai ?? '') }}" readonly>
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
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($sidangAkhir->waktu_selesai ?? '') }}" required>
            @else
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($sidangAkhir->waktu_selesai ?? '') }}" readonly>
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

    <center><button type="submit" id="add" class="btn btn-primary">{{ $tombol }}</button></center>
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
            <label for="file" class="form-label">File</label>
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
            <label for="tanggal" class="form-label">Tanggal</label>
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
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($sidangAkhir->waktu_mulai ?? '') }}" required>
            @else
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($sidangAkhir->waktu_mulai ?? '') }}" readonly>
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
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($sidangAkhir->waktu_selesai ?? '') }}" required>
            @else
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($sidangAkhir->waktu_selesai ?? '') }}" readonly>
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
                @foreach ($dosenSidangAkhirs as $dosenSidangAkhir)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSidangAkhir->id }}" {{ in_array($dosenSidangAkhir->id, $selectedDosenSidangAkhir) ? 'checked' : '' }}>

                        <label class="form-check-label" for="dosen_penguji_{{ $dosenSidangAkhir->id }}">{{ $dosenSidangAkhir->nama }}</label>
                    </div>
                @endforeach
            @else
                @foreach ($dosenSidangAkhirs as $dosenSidangAkhir)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSidangAkhir->id }}" {{ in_array($dosenSidangAkhir->dosen_penguji->id, $selectedDosenSidangAkhir) ? 'checked' : '' }} disabled>

                        <label class="form-check-label" for="dosen_penguji_{{ $dosenSidangAkhir->id }}">{{ $dosenSidangAkhir->dosen_penguji->dosen->user->nama }}</label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="nilai_akhir" class="form-label">Nilai akhir</label>
            @php
                $mahasiswaLogin = Auth::user()->mahasiswa ? Auth::user()->mahasiswa->tugas_akhir->sidang_akhir->id : null;
                $dosenPengujiLogin = Auth::user()->dosen ? Auth::user()->dosen->dosen_penguji->id : null;
                $nilaiSidangAkhirDosenPengujiLogin = $sidangAkhir->sidang_akhir_nilais()->where('dosen_penguji_id', $dosenPengujiLogin)->value('nilai');
            @endphp

            @if ($mahasiswaLogin || ($dosenPengujiLogin && $nilaiSidangAkhirDosenPengujiLogin) || Auth::user()->role->nama == 'admin')
                <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($sidangAkhir->nilai_akhir ?? '') }}" readonly>
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

    @if (Auth::user()->role->nama == 'admin' && !$sidangAkhir->nilai_akhir)
        <button type="submit" id="edit" class="btn btn-primary">{{ $tombol }}</button>
    @elseif ($sidangAkhir->nilai_akhir)
        <input type="hidden" name="">
    @endif

    {{-- menampilkan tombol jika login sebagai dosen penguji --}}
    <center>
    @if (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji)
        <a href="{{ route('sidang-akhir-nilai.nilai', ['sidangAkhir' => $sidangAkhir->id]) }}" class="btn btn-primary">Berikan Nilai</a>
        <a href="{{ route('sidang-akhir.index') }}" class="btn btn-secondary">Kembali</a>
    @endif
    </center>
</div>
@endif
