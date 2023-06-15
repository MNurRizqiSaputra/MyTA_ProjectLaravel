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
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

        <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
        <a href="{{ route('frontend.home') }}" class="logo me-auto"><img src="{{ asset('frontend/assets/img/5 copy.png') }}" alt="" class="img-fluid"></a>
        <nav id="navbar" class="navbar ml-auto">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ route('frontend.home') }}">Home</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>


</body>
</html>
