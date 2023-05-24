@extends('layouts.frontend')
@section('title')
    MyTA
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Welcome</h1>
                    <h2>Website Sistem Informasi Tugas Akhir</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('frontend/assets/img/5 copy.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-4 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('frontend/assets/img/clients/Kampus Merdeka.png') }}" class="img-fluid" alt=""
                            style="height: auto; max-height: 120px;">
                    </div>

                    <div class="col-lg-4 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('frontend/assets/img/clients/kemendikbud.png') }}" class="img-fluid" alt=""
                            style="height: auto; max-height: 120px;">
                    </div>

                    <div class="col-lg-4 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('frontend/assets/img/clients/msib.jpg') }}" class="img-fluid" alt=""
                            style="height: auto; max-height: 120px;">
                    </div>

                </div>

            </div>
        </section><!-- End Cliens Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About Us</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            MyTA adalah sebuah website yang menyediakan sistem informasi tugas akhir bagi mahasiswa.
                            Dibuat dengan tujuan untuk mempermudah mahasiswa dalam mengelola dan menyelesaikan tugas
                            akhir mereka dengan lebih efisien.
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Platform online yang memudahkan mahasiswa dalam
                                melacak dan mengelola progres tugas akhir mereka.</li>
                            <li><i class="ri-check-double-line"></i> Fitur pengumpulan dan pengolahan data yang
                                membantu dalam penelitian dan analisis untuk tugas akhir.</li>
                            <li><i class="ri-check-double-line"></i> Akses mudah ke sumber daya dan referensi terkini
                                yang relevan dengan bidang studi mahasiswa.</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            MyTA didesain dengan antarmuka yang intuitif dan mudah digunakan, sehingga mahasiswa dapat
                            fokus pada konten tugas akhir mereka. Dengan fitur-fitur lengkap dan dukungan teknologi
                            terkini, MyTA memberikan pengalaman pengguna yang optimal dan efisien.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="mekanisme" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>MEKANISME</h2>
                    <p>Ada 3 tiga tahapan yang akan dilalui mahasiswa dalam perjalanan akhir untuk menjadi sarjana</p>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">Seminar Proposal</a></h4>
                            <p>Tahap awal, mahasiswa mempresentasikan proposal tugas akhir kepada dosen pembimbing dan
                                dewan penguji untuk mendapatkan persetujuan dan masukan.</p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Seminar Hasil</a></h4>
                            <p>Mahasiswa mempresentasikan hasil penelitian kepada dosen pembimbing dan dewan penguji
                                untuk mendapatkan umpan balik dan evaluasi sebelum melanjutkan.</p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">Sidang Akhir</a></h4>
                            <p>Mahasiswa mempresentasikan tugas akhir secara keseluruhan kepada dosen pembimbing, dewan
                                penguji, dan peserta sidang untuk mengevaluasi pemahaman dan memberikan kesempatan untuk
                                pertanyaan dan saran.</p>
                        </div>
                    </div>

                </div>
        </section><!-- End Services Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="layanan" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Layanan</h2>
                    <p>Terdapat layanan-layanan / fitur yang disediakan oleh MyTA sesuai hak akses akun yang didapatkan
                    </p>
                </div>

                <div class="row">

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h4><sup>* </sup>DOSEN</h4>
                            <h3>Dosen Pembimbing & Dosen Penguji</h3>
                            <ul>
                                <li><i class="bx bx-check"></i> Mengakses informasi tugas akhir yang mereka bimbing
                                </li>
                                <li><i class="bx bx-check"></i> Memberikan bimbingan dan masukan kepada mahasiswa</li>
                                <li><i class="bx bx-check"></i> Melacak kemajuan tugas akhir mahasiswa</li>
                                <li><i class="bx bx-check"></i> Meninjau, mengevaluasi, dan menilai tugas akhir yang
                                    diajukan oleh mahasiswa</li>
                                <li><i class="bx bx-check"></i> Berpartisipasi dalam proses penilaian dan pengambilan
                                    keputusan terkait kelulusan tugas akhir mahasiswa</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h4><sup>* </sup>MAHASISWA</h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Mengakses informasi tugas akhir yang mereka kerjakan
                                </li>
                                <li><i class="bx bx-check"></i> Mengakses informasi tentang dosen pembimbing dan dosen
                                    penguji yang ditugaskan kepada mereka</li>
                                <li><i class="bx bx-check"></i> Mengajukan dan memperbarui proposal tugas akhir</li>
                                <li><i class="bx bx-check"></i> Melihat jadwal dan pemberitahuan terkait tugas akhir
                                </li>
                                <li><i class="bx bx-check"></i> Mengunggah dan menyimpan dokumen dan data tugas akhir
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h4><sup>* </sup>ADMIN</h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Mengelola dan mengatur sistem informasi MyTA</li>
                                <li><i class="bx bx-check"></i> Menambahkan, mengedit, dan menghapus data mahasiswa,
                                    dosen pembimbing, dan dosen penguji</li>
                                <li><i class="bx bx-check"></i> Mengelola jadwal dan penugasan dosen pembimbing dan
                                    dosen penguji</li>
                                <li><i class="bx bx-check"></i> Memberikan izin akses dan hak penggunaan sistem</li>
                                <li><i class="bx bx-check"></i> Melakukan pemeliharaan dan pembaruan sistem</li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Pricing Section -->


        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Team</h2>
                    <p>Team Pengembang MyTA</p>
                </div>

                <div class="row">

                    <div class="col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start justify-content-center">
                            <div class="pic"><img src="{{ asset('frontend/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                <div class="member-info">
                                    <h4>Rama Alfin Baehaqi</h4>
                                    <span>Hokage</span>
                                    <div class="social">
                                        <a href=""><i class="ri-twitter-fill"></i></a>
                                        <a href=""><i class="ri-facebook-fill"></i></a>
                                        <a href=""><i class="ri-instagram-fill"></i></a>
                                        <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start justify-content-center">
                            <div class="pic"><img src="{{ asset('frontend/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                <div class="member-info">
                                    <h4>Muhammad Nur Rizqi Saputra</h4>
                                    <span>Jonin</span>
                                    <div class="social">
                                        <a href=""><i class="ri-twitter-fill"></i></a>
                                        <a href=""><i class="ri-facebook-fill"></i></a>
                                        <a href=""><i class="ri-instagram-fill"></i></a>
                                        <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start justify-content-center">
                            <div class="pic"><img src="{{ asset('frontend/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                <div class="member-info">
                                    <h4>Rizqy Arniza</h4>
                                    <span>Chunin</span>
                                    <div class="social">
                                        <a href=""><i class="ri-twitter-fill"></i></a>
                                        <a href=""><i class="ri-facebook-fill"></i></a>
                                        <a href=""><i class="ri-instagram-fill"></i></a>
                                        <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start justify-content-center">
                            <div class="pic"><img src="{{ asset('frontend/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                <div class="member-info">
                                    <h4>Andi Purnomo</h4>
                                    <span>Anbu</span>
                                    <div class="social">
                                        <a href=""><i class="ri-twitter-fill"></i></a>
                                        <a href=""><i class="ri-facebook-fill"></i></a>
                                        <a href=""><i class="ri-instagram-fill"></i></a>
                                        <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= FAQ Section ======= -->
        <section id="faq" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch order-2 order-lg-1">

                        <div class="content">
                            <h3>Pertanyaan Umum<br><strong>Tentang MyTA</strong></h3>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse"
                                        data-bs-target="#accordion-list-1"><span>01</span> Apa itu MyTA dan apa
                                        manfaatnya?</a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p>
                                            MyTA adalah aplikasi sistem informasi yang membantu mahasiswa dalam
                                            menyelesaikan tugas akhir mereka secara efisien. Aplikasi ini mempermudah
                                            alur dan tahapan dari tugas akhir, mengatur jadwal, melakukan tracking
                                            progres, serta memudahkan pengelolaan data dan dokumentasi. Manfaatnya
                                            adalah meningkatkan efektivitas dan kualitas penyelesaian tugas akhir
                                            mahasiswa.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                        class="collapsed"><span>02</span> Bagaimana cara mendaftar di MyTA?</a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            Untuk mendaftar di MyTA, hubungi administrator sistem yang akan memberikan
                                            panduan pendaftaran dan pembuatan akun.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                        class="collapsed"><span>03</span> Apa saja fitur yang disediakan oleh MyTA?</a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            MyTA menyediakan fitur seperti pengelolaan jadwal tugas akhir, pelacakan
                                            progres, manajemen data dan dokumentasi, serta fasilitas komunikasi antara
                                            mahasiswa dan dosen pembimbing. Fitur lainnya termasuk penilaian tugas
                                            akhir, pengiriman file, dan notifikasi otomatis.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("{{ asset('frontend/assets/img/why-us\ copy.png') }}");' data-aos="zoom-in"
                        data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section>
        <!-- End FAQ Section -->

    </main><!-- End #main -->
@endsection
