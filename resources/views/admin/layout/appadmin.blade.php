@include('admin.layout.top')
@include('admin.layout.menu')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            @yield('content')
            {{-- Yield  ini adalah Mendeklarasikan yang akan diisi konten ketika yield nya
                dipanggil ke dalam konten masing-masing, contoh yield yang di atas menggunakan value--}}

        </div>
    </main>
</div>

@include('admin.layout.bottom')
