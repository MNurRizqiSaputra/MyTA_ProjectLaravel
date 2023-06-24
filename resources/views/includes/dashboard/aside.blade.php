<aside class="sidebar">
    <a href="#" class="sidebar-logo">
        <div class="d-flex justify-content-start align-items-center">
        <img src="{{ asset('dashboard/assets/img/global/buatfavicon.png') }}" alt="" style="width: 150px; height: 120px; border-radius: 10%;">
        </div>
    </a>

    <h5 class="sidebar-title">General</h5>

    <!-- Bagian Home -->
    <a href="{{ route('frontend.home') }}" class="sidebar-item {{ request()->is('pages/home') ? 'active' : '' }}" onclick="toggleActive(this)">
        <img src="{{ asset('dashboard/assets/img/global/home.png') }}" width="24" height="24" class="sidebar-icon">

        <span style="margin-left: 8px;">Home</span>
    </a>

    <!-- Bagian Overview -->
    <a href="{{ route('dashboard') }}" class="sidebar-item {{ request()->is('dashboard/overview') ? 'active' : '' }}" onclick="toggleActive(this)">
        <img src="{{ asset('dashboard/assets/img/global/overview.png') }}" width="24" height="24" class="sidebar-icon">
        
        <span style="margin-left: 8px;">Overview</span>
    </a>

    <!-- Bagian otentikasi menu user, mahasiswa, dosen for admin  -->
    @auth
    @if (Auth::user()->role->nama == 'admin')
        <a href="{{ route('user.index') }}" class="sidebar-item {{ request()->is('dashboard/user') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/user.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">User</span>
        </a>

        <a href="{{ route('mahasiswa.index') }}" class="sidebar-item {{ request()->is('dashboard/mahasiswa') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/student.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Mahasiswa</span>
        </a>

        <a href="{{ route('dosen.index') }}" class="sidebar-item {{ request()->is('dashboard/dosen') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/dosen.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Dosen</span>
        </a>

    <!-- Bagian otentikasi menu profile dosen-->
    @elseif (Auth::user()->dosen)
        <a href="{{ route('dosen.show', ['dosen' => Auth::user()->dosen->id]) }}" class="sidebar-item {{ request()->is('dashboard/dosen') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/profile.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Profile</span>
        </a>

    <!-- Bagian otentikasi menu profile mahasiswa-->
    @elseif (Auth::user()->mahasiswa)
        <a href="{{ route('mahasiswa.show', ['mahasiswa' => Auth::user()->mahasiswa->id]) }}" class="sidebar-item {{ request()->is('dashboard/mahasiswa') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/profile.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Profile</span>
        </a>
    @endif
    @endauth

    <!-- Bagian menu dospem -->
    <a href="{{ route('dosen-pembimbing.index') }}" class="sidebar-item {{ request()->is('dashboard/dosen-pembimbing') ? 'active' : '' }}" onclick="toggleActive(this)">
        <img src="{{ asset('dashboard/assets/img/global/dospem.png') }}" width="24" height="24" class="sidebar-icon">

        <span style="margin-left: 8px;">Dosen Pembimbing</span>
    </a>

    <!-- Bagian menu dospen -->
    <a href="{{ route('dosen-penguji.index') }}" class="sidebar-item {{ request()->is('dashboard/dosen-penguji') ? 'active' : '' }}" onclick="toggleActive(this)">
        <img src="{{ asset('dashboard/assets/img/global/dospen.png') }}" width="24" height="24" class="sidebar-icon">

        <span style="margin-left: 8px;">Dosen Penguji</span>
    </a>

    <!-- Bagian otentikasi menu TA -->
    @auth
        @if (Auth::user()->dosen && Auth::user()->dosen->dosen_pembimbing()->first() || Auth::user()->role->nama == 'admin')
        <a href="{{ route('tugas-akhir.index') }}" class="sidebar-item {{ request()->is('dashboard/tugas-akhir') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/TA.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Tugas Akhir</span>
        </a>

        @elseif(Auth::user()->mahasiswa && !Auth::user()->mahasiswa->tugas_akhir)
        <a href="{{ route('tugas-akhir.create') }}" class="sidebar-item {{ request()->is('dashboard/tugas-akhir/create') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/TA.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Tugas Akhir</span>
        </a>

        @elseif(Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir)
        <a href="{{ route('tugas-akhir.show', ['tugasAkhir' => Auth::user()->mahasiswa->tugas_akhir->id]) }}" class="sidebar-item {{ request()->is('dashboard/tugas-akhir') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/TA.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Tugas Akhir</span>
        </a>
        @endif
    @endauth

    <h5 class="sidebar-title">Others</h5>

    <!-- Bagian otentikasi menu seminar proposal -->
    @auth
        {{-- arahkan ke halaman index --}}
        @if (Auth::user()->role->nama == 'admin' || (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji()->first()))
        <a href="{{ route('seminar-proposal.index') }}" class="sidebar-item {{ request()->is('dashboard/seminar-proposal') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/sempro.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Seminar Proposal</span>
        </a>

        {{-- arahkan ke halaman create --}}
        @elseif (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && !Auth::user()->mahasiswa->tugas_akhir->seminar_proposal)
        <a href="{{ route('seminar-proposal.create') }}" class="sidebar-item {{ request()->is('dashboard/seminar-proposal/create') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/sempro.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Seminar Proposal</span>
        </a>

        {{-- arahkan ke halaman show --}}
        @elseif (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && Auth::user()->mahasiswa->tugas_akhir->seminar_proposal)
        <a href="{{ route('seminar-proposal.show', ['seminarProposal' => Auth::user()->mahasiswa->tugas_akhir->seminar_proposal->id]) }}" class="sidebar-item {{ request()->is('dashboard/seminar-proposal/detail/' . Auth::user()->mahasiswa->tugas_akhir->seminar_proposal->id) ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/sempro.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Seminar Proposal</span>
        </a>
        @endif
    @endauth

    <!-- Bagian otentikasi menu seminar penelitian -->
    @auth
        {{-- arahkan ke halaman index --}}
        @if ( Auth::user()->role->nama == 'admin' || (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji()->first()))
        <a href="{{ route('seminar-penelitian.index') }}" class="sidebar-item {{ request()->is('dashboard/seminar-penelitian') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/Sempen.png') }}" width="24" height="24" class="sidebar-icon"> 

            <span style="margin-left: 8px;">Seminar Penelitian</span>
        </a>

        {{-- arahkan ke halaman create --}}
        @elseif (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && !Auth::user()->mahasiswa->tugas_akhir->seminar_penelitian)
        <a href="{{ route('seminar-penelitian.create') }}" class="sidebar-item {{ request()->is('dashboard/seminar-penelitian/create') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/Sempen.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Seminar Penelitian</span>
        </a>

        {{-- arahkan ke halaman show --}}
        @elseif (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && Auth::user()->mahasiswa->tugas_akhir->seminar_penelitian)
        <a href="{{ route('seminar-penelitian.show', ['seminarPenelitian' => Auth::user()->mahasiswa->tugas_akhir->seminar_penelitian->id]) }}" class="sidebar-item {{ request()->is('dashboard/seminar-penelitian/detail/' . Auth::user()->mahasiswa->tugas_akhir->seminar_penelitian->id) ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/Sempen.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Seminar Penelitian</span>
        </a>
        @endif
    @endauth

    <!-- Bagian otentikasi menu sidang akhir -->
    @auth
        {{-- arahkan ke halaman index --}}
        @if (Auth::user()->role->nama == 'admin' || (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji()->first()))
        <a href="{{ route('sidang-akhir.index') }}" class="sidebar-item {{ request()->is('dashboard/sidang-akhir') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/siakh.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Sidang Akhir</span>
        </a>

        {{-- arahkan ke halaman create --}}
        @elseif (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && !Auth::user()->mahasiswa->tugas_akhir->sidang_akhir)
        <a href="{{ route('sidang-akhir.create') }}" class="sidebar-item {{ request()->is('dashboard/sidang-akhir/create') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/siakh.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Sidang Akhir</span>
        </a>

        {{-- arahkan ke halaman show --}}
        @elseif (Auth::user()->mahasiswa && Auth::user()->mahasiswa->tugas_akhir && Auth::user()->mahasiswa->tugas_akhir->sidang_akhir)
        <a href="{{ route('sidang-akhir.show', ['sidangAkhir' => Auth::user()->mahasiswa->tugas_akhir->sidang_akhir->id]) }}" class="sidebar-item {{ request()->is('dashboard/sidang-akhir/detail/' . Auth::user()->mahasiswa->tugas_akhir->sidang_akhir->id) ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/siakh.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Sidang Akhir</span>
        </a>
        @endif
    @endauth

    <!-- Bagian menu nilai -->
    @auth
        @if (Auth::user()->role->nama == 'admin' || (Auth::user()->dosen && Auth::user()->dosen->dosen_penguji()->first()))
            <a href="{{ route('seminar-proposal-nilai.index') }}" class="sidebar-item {{ request()->is('dashboard/seminar-proposal-nilai') ? 'active' : '' }}" onclick="toggleActive(this)">
                <img src="{{ asset('dashboard/assets/img/global/nilaisempro.png') }}" width="24" height="24" class="sidebar-icon">

                <span style="margin-left: 8px;">Nilai Seminar Proposal</span>
            </a>
            <a href="{{ route('seminar-penelitian-nilai.index') }}" class="sidebar-item {{ request()->is('dashboard/seminar-penelitian-nilai') ? 'active' : '' }}" onclick="toggleActive(this)">
                <img src="{{ asset('dashboard/assets/img/global/nilaisempen.png') }}" width="24" height="24" class="sidebar-icon">

                <span style="margin-left: 8px;">Nilai Seminar Penelitian</span>
            </a>
            <a href="{{ route('sidang-akhir-nilai.index') }}" class="sidebar-item {{ request()->is('dashboard/sidang-akhir-nilai') ? 'active' : '' }}" onclick="toggleActive(this)">
                <img src="{{ asset('dashboard/assets/img/global/nilaisiakh.png') }}" width="24" height="24" class="sidebar-icon">

                <span style="margin-left: 8px;">Nilai Sidang Akhir</span>
            </a>
        @endif
    @endauth

    <!-- Bagian menu jurusan dan role -->
    @auth
        @if (Auth::user()->role->nama == 'admin')
        <a href="{{ route('jurusan.index') }}" class="sidebar-item {{ request()->is('dashboard/jurusan') ? 'active' : '' }}" onclick="toggleActive(this)">
                    <img src="{{ asset('dashboard/assets/img/global/jurusan.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Jurusan</span>
        </a>
        <a href="{{ route('role.index') }}" class="sidebar-item {{ request()->is('dashboard/role') ? 'active' : '' }}" onclick="toggleActive(this)">
            <img src="{{ asset('dashboard/assets/img/global/role.png') }}" width="24" height="24" class="sidebar-icon">

            <span style="margin-left: 8px;">Role</span>
        </a>
        @endif
    @endauth

    <!-- Bagian logout -->
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidebar-item">
        <img src="{{ asset('dashboard/assets/img/global/logout.png') }}" width="24" height="24" class="sidebar-icon">

        <span style="margin-left: 8px;">Logout</span>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </a>

</aside>
