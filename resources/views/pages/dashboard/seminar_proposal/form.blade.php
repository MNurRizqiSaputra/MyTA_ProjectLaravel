@csrf

@if (request()->is('dashboard/seminar-proposal/create'))
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
                    <option value="">--Pilih--</option>
                    <option value="Gedung A" {{ $seminarProposal->tempat == 'Gedung A' ? 'selected' : '' }}>Gedung A</option>
                    <option value="Gedung B" {{ $seminarProposal->tempat == 'Gedung B' ? 'selected' : '' }}>Gedung B</option>
                    <option value="Gedung C" {{ $seminarProposal->tempat == 'Gedung C' ? 'selected' : '' }}>Gedung C</option>
                </select>
            @else
                <input type="text" class="form-control" value="{{ old('tempat') ?? ($seminarProposal->tempat ?? '') }}" readonly>
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
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($seminarProposal->tanggal ?? '') }}" required>
            @else
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($seminarProposal->tanggal ?? '') }}" readonly>
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
                <input type="time" name="waktu" class="form-control" value="{{ old('waktu') ?? ($seminarProposal->waktu ?? '') }}" required>
            @else
                <input type="time" name="waktu" class="form-control" value="{{ old('waktu') ?? ($seminarProposal->waktu ?? '') }}" readonly>
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
                <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($seminar_proposal->nilai_akhir ?? '') }}" readonly>
            @else
                <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($seminar_proposal->nilai_akhir ?? '') }}" required>
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

@elseif (request()->is('dashboard/seminar-proposal/detail/' . $seminarProposal->id))
<div class="p-2">
    <input type="hidden" name="tugas_akhir_id" value="{{ old('tugas_akhir_id') ?? ($seminarProposal->tugas_akhir->id ?? '') }}">
    <div class="row">
        <div class="col mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $seminarProposal->tugas_akhir->mahasiswa->user->nama }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" value="{{ $seminarProposal->tugas_akhir->judul }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="file" class="form-label">file</label>
            <input type="text" class="form-control" value="{{ basename($seminarProposal->tugas_akhir->file) }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="tempat" class="form-label">Tempat</label>

            @if (Auth::user()->role->nama == 'admin')
                <select id="tempat" name="tempat" class="form-select" required>
                    <option value="">--Pilih--</option>
                    <option value="Gedung A" {{ $seminarProposal->tempat == 'Gedung A' ? 'selected' : '' }}>Gedung A</option>
                    <option value="Gedung B" {{ $seminarProposal->tempat == 'Gedung B' ? 'selected' : '' }}>Gedung B</option>
                    <option value="Gedung C" {{ $seminarProposal->tempat == 'Gedung C' ? 'selected' : '' }}>Gedung C</option>
                </select>
            @else
                <input type="text" class="form-control" value="{{ old('tempat') ?? ($seminarProposal->tempat ?? '') }}" readonly>
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
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($seminarProposal->tanggal ?? '') }}" required>
            @else
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? ($seminarProposal->tanggal ?? '') }}" readonly>
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
                <input type="time" name="waktu" class="form-control" value="{{ old('waktu') ?? ($seminarProposal->waktu ?? '') }}" required>
            @else
                <input type="time" name="waktu" class="form-control" value="{{ old('waktu') ?? ($seminarProposal->waktu ?? '') }}" readonly>
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
                @foreach ($dosenSeminarProposals as $dosenSeminarProposal)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSeminarProposal->id }}" {{ in_array($dosenSeminarProposal->id, $selectedDosenProposal) ? 'checked' : '' }}>

                        <label class="form-check-label" for="dosen_penguji_{{ $dosenSeminarProposal->id }}">{{ $dosenSeminarProposal->nama }}</label>
                    </div>
                @endforeach
            @else
                @foreach ($dosenSeminarProposals as $dosenSeminarProposal)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSeminarProposal->id }}" {{ in_array($dosenSeminarProposal->dosen_penguji->id, $selectedDosenProposal) ? 'checked' : '' }}>

                        <label class="form-check-label" for="dosen_penguji_{{ $dosenSeminarProposal->id }}">{{ $dosenSeminarProposal->dosen_penguji->dosen->user->nama }}</label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="nilai_akhir" class="form-label">Nilai akhir</label>
            @php
                $mahasiswaLogin = Auth::user()->mahasiswa ? Auth::user()->mahasiswa->tugas_akhir->seminar_proposal->id : null;
                $dosenPengujiLogin = Auth::user()->dosen ? Auth::user()->dosen->dosen_pengujis->pluck('id')->first() : null;
                $nilaiDosenPenguji = $seminarProposal->seminar_proposal_nilais()->where('dosen_penguji_id', $dosenPengujiLogin)->value('nilai');
            @endphp

            @if ($mahasiswaLogin || ($dosenPengujiLogin && $nilaiDosenPenguji))
                <input type="number" name="nilai_akhir" class="form-control" value="{{ old('nilai_akhir') ?? ($seminarProposal->nilai_akhir ?? '') }}" readonly>
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

    @if (Auth::user()->role->nama == 'admin')
        <button type="submit" id="edit" class="btn btn-primary">{{ $tombol }}</button>
    @endif

    {{-- menampilkan tombol jika login sebagai dosen penguji --}}
    @if (Auth::user()->dosen && Auth::user()->dosen->dosen_pengujis->count() > 0)
        <a href="{{ route('seminar-proposal-nilai.nilai', ['seminarProposal' => $seminarProposal->id]) }}" class="btn btn-primary">Berikan Nilai</a>
    @endif
</div>
@endif

