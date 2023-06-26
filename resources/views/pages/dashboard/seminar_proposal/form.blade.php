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
            <label for="tanggal" class="form-label">Tanggal</label>
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
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($seminarProposal->waktu_mulai ?? '') }}" required>
            @else
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($seminarProposal->waktu_mulai ?? '') }}" readonly>
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
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($seminarProposal->waktu_selesai ?? '') }}" required>
            @else
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($seminarProposal->waktu_selesai ?? '') }}" readonly>
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

    <center><button type="submit" id="add" class="btn btn-primary">{{ $tombol }}</button></center>
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
            <label for="file" class="form-label">File</label>
            <input type="text" class="form-control mb-2" value="{{ basename($seminarProposal->tugas_akhir->file) }}" readonly>
            <p>Lihat file :
                @if (isset($seminarProposal->tugas_akhir->file))
                <a href="{{ Storage::url($seminarProposal->tugas_akhir->file) }}" class="btn btn-primary">Buka File</a>
            @endif
            </p>
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
            <label for="tanggal" class="form-label">Tanggal</label>
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
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            @if (Auth::user()->role->nama == 'admin')
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($seminarProposal->waktu_mulai ?? '') }}" required>
            @else
                <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') ?? ($seminarProposal->waktu_mulai ?? '') }}" readonly>
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
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($seminarProposal->waktu_selesai ?? '') }}" required>
            @else
                <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') ?? ($seminarProposal->waktu_selesai ?? '') }}" readonly>
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
                @foreach ($dosenSeminarProposals as $dosenSeminarProposal)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSeminarProposal->id }}" {{ in_array($dosenSeminarProposal->id, $selectedDosenProposal) ? 'checked' : '' }}>

                        <label class="form-check-label" for="dosen_penguji_{{ $dosenSeminarProposal->id }}">{{ $dosenSeminarProposal->nama }}</label>
                    </div>
                @endforeach
            @else
                @foreach ($dosenSeminarProposals as $dosenSeminarProposal)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_penguji_[]"  value="{{ $dosenSeminarProposal->id }}" {{ in_array($dosenSeminarProposal->dosen_penguji->id, $selectedDosenProposal) ? 'checked' : '' }} disabled>

                        <label class="form-check-label" for="dosenpenguji{{ $dosenSeminarProposal->id }}">{{ $dosenSeminarProposal->dosen_penguji->dosen->user->nama }}</label>
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
                $dosenPengujiLogin = Auth::user()->dosen ? Auth::user()->dosen->dosen_penguji->id : null;
                $nilaiProposalDosenPengujiLogin = $seminarProposal->seminar_proposal_nilais()->where('dosen_penguji_id', $dosenPengujiLogin)->value('nilai');
            @endphp

            @if ($mahasiswaLogin || ($dosenPengujiLogin && $nilaiProposalDosenPengujiLogin) || Auth::user()->role->nama == 'admin')
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

    @if (Auth::user()->role->nama == 'admin' && !$seminarProposal->nilai_akhir)
        <button type="submit" id="edit" class="btn btn-primary">{{ $tombol }}</button>
    @elseif ($seminarProposal->nilai_akhir)
        <input type="hidden" name="">
    @endif

    {{-- menampilkan tombol jika login sebagai dosen penguji --}}
    <center>
    @if (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji)
        <a href="{{ route('seminar-proposal-nilai.nilai', ['seminarProposal' => $seminarProposal->id]) }}" class="btn btn-primary">Berikan Nilai</a>
        <a href="{{ route('seminar-proposal.index') }}" class="btn btn-secondary">Kembali</a>
    @endif
    </center>
</div>
@endif
