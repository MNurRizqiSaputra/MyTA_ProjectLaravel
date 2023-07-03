<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/login.css') }}">
    <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <header id="header" class="relative">
        <div class="container d-flex align-items-center">
            <a href="{{ route('frontend.home') }}" class="logo me-auto"><img class="" src="{{ asset('frontend/assets/img/5 copy.png') }}" alt="" class="img-fluid"></a>
            <nav id="navbar" class="navbar ml-auto">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ route('frontend.home') }}">Home</a></li>
                </ul>
                {{-- <i class="bi bi-list mobile-nav-toggle"></i> --}}
            </nav>
        </div>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>
</html>
