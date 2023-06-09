<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <a href="{{ route('frontend.home') }}" class="logo me-auto"><img src="{{ asset('frontend/assets/img/5 copy.png') }}" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar ml-auto">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#mekanisme">Mekanisme</a></li>
                <li><a class="nav-link scrollto" href="#layanan">Layanan</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                @if (Auth::check())
                <li><a class="nav-link scrollto" href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
                @if (Auth::check())
                <li>
                    <div class="dropdown">
                        <a class="getstarted scrollto dropdown-toggle overflow-hidden" href="#" role="button" id="dropdownMenuProfile" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello! {{ Auth::user()->nama }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuProfile">
                            <li>
                                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off"></i>{{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <li><a href="{{ route('login') }}" class="getstarted scrollto">Login</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
