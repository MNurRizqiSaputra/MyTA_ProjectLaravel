@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">Overview</h2>
        </div>

        <div class="col-12 col-md-6 col-lg-12">
            <div class="statistics-card">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column justify-content-between align-items-start">
                        <h5 class="content-desc">WELCOME</h5>

                        <h3 class="statistics-value">DASHBOARD MyTA</h3>
                        <p>MyTA adalah sebuah website yang menyediakan sistem informasi tugas akhir bagi mahasiswa. Dibuat dengan tujuan untuk mempermudah mahasiswa dalam mengelola dan menyelesaikan tugas akhir mereka dengan lebih efisien. </p>
                        <br>
                        <p>MyTA hadir untuk memudahkan Anda dalam mengatur dan melacak tugas akhir Anda dengan lebih efisien. Kami berharap dengan menggunakan MyTA, Anda dapat fokus pada isi tugas akhir Anda dan mencapai hasil terbaik. Selamat menggunakan MyTA dan semoga sukses dalam perjalanan tugas akhir Anda!</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-12" >
            <div class="statistics-card">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column justify-content-between align-items-start">
                        <h5 class="content-desc">Our Support</h5>

                        <div style="display: flex; justify-content: center;">
                            <img src="./assets/img/global/buatfavicon.png" alt="" style="max-width: 100%; height: 150px; margin: 10px; padding: 5px;">
                            <img src="./assets/img/global/Kampus Merdeka.png" alt="" style="max-width: 100%; height: 150px; margin: 10px; padding: 5px;">
                            <img src="./assets/img/global/Kemendikbud.png" alt="" style="max-width: 100%; height: 150px; margin: 10px; padding: 5px;">
                            <img src="./assets/img/global/msib.jpg" alt="" style="max-width: 100%; height: 150px; margin: 10px; padding: 5px;">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


</div>
@endsection
