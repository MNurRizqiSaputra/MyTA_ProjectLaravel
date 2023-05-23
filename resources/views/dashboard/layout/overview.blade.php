@extends('dashboard.layout.index')

@section('content')

<div class="col-12 col-xl-9">
            <div class="nav">
                <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
                    <div class="d-flex justify-content-start align-items-center">
                        <button id="toggle-navbar" onclick="toggleNavbar()">
                            <img src="./assets/img/global/burger.svg" class="mb-2" alt="">
                        </button>
                        <h2 class="nav-title">Overview</h2>
                    </div>
                    <button class="btn-notif d-block d-md-none"><img src="./assets/img/global/bell.svg" alt=""></button>
                </div>

                <div class="d-flex justify-content-between align-items-center nav-input-container">
                    <div class="nav-input-group">
                        <input type="text" class="nav-input" placeholder="Search people, team, project">
                        <button class="btn-nav-input"><img src="./assets/img/global/search.svg" alt=""></button>
                    </div>

                    <button class="btn-notif d-none d-md-block"><img src="./assets/img/global/bell.svg" alt=""></button>
                </div>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-title">MENU</h2>
                        <h5 class="content-desc mb-4">FOR ADMIN</h5>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h5 class="content-desc">DATA</h5>

                                    <h3 class="statistics-value">USER</h3>
                                </div>

                                <button class="btn-statistics">
                                    <img src="./assets/img/global/times.svg" alt="">
                                </button>
                            </div>



                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h5 class="content-desc">DATA</h5>

                                    <h3 class="statistics-value">MAHASISWA</h3>
                                </div>

                                <button class="btn-statistics">
                                    <img src="./assets/img/global/times.svg" alt="">
                                </button>
                            </div>



                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h5 class="content-desc">DATA</h5>

                                    <h3 class="statistics-value">DOSEN PEMBIMBING</h3>
                                </div>

                                <button class="btn-statistics">
                                    <img src="./assets/img/global/times.svg" alt="">
                                </button>
                            </div>



                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h5 class="content-desc">DATA</h5>

                                    <h3 class="statistics-value">DOSEN PEMBIMBING</h3>
                                </div>

                                <button class="btn-statistics">
                                    <img src="./assets/img/global/times.svg" alt="">
                                </button>
                            </div>



                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h5 class="content-desc">DATA</h5>

                                    <h3 class="statistics-value">MAHASISWA</h3>
                                </div>

                                <button class="btn-statistics">
                                    <img src="./assets/img/global/times.svg" alt="">
                                </button>
                            </div>


                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h5 class="content-desc">DATA</h5>

                                    <h3 class="statistics-value">DOSEN PENGUJI</h3>
                                </div>

                                <button class="btn-statistics">
                                    <img src="./assets/img/global/times.svg" alt="">
                                </button>
                            </div>



                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
