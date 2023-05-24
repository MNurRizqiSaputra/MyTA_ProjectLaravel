<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    @stack('prepend-style')
    <link href="{{ asset('dashboard/assets/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    @stack('addon-style')

    <title>@yield('title')</title>
</head>

<body>

    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">
            @include('includes.dashboard.aside')
        </div>


        <div class="col-12 col-xl-9">
            @include('includes.dashboard.nav')

            @yield('content')
        </div>
    </div>

    @stack('prepend-script')
    <script src="{{ asset('dashboard/assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        const navbar = document.querySelector('.col-navbar')
        const cover = document.querySelector('.screen-cover')

        const sidebar_items = document.querySelectorAll('.sidebar-item')

        function toggleNavbar() {
            navbar.classList.toggle('d-none')
            cover.classList.toggle('d-none')
        }

        function toggleActive(e) {
            sidebar_items.forEach(function(v, k) {
                v.classList.remove('active')
            })
            e.closest('.sidebar-item').classList.add('active')

        }

        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    @stack('addon-script')

</body>

</html>
