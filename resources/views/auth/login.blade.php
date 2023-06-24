@extends('layouts.app')
@section('title')
    MyTA | Login
@endsection

@section('content')
    <section class="vh-100">
        <div class="container-fluid min-vh-100">
            <div class="row d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <a href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/assets/img/buatfavicon.png') }}" class="img-fluid rounded" alt="MyTA LOGO"></a>
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="youremail@example.com" value="{{ old('email') }}" required autocomplete="email">
                            <label class="form-label" for="email">Email address</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                            <label class="form-label" for="password">Password</label>
                            <span style="font-style:italic; color:gray;">Default: Tanggal Lahir (YYYY-MM-DD)</span>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">
                                <div class="alert alert-warning" role="alert">
                                    Lupa Password? Hubungi Admin Akademik!
                                </div>
                            </a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Login') }}</button>
                            {{-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!" class="link-primary">Register</a></p> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright MyTA All Rights Reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div class="mb-3 mb-md-0">
                <div class="text-white me-4">
                    Developed by MyTA Team.
                </div>
            </div>
            <!-- Right -->
        </div>
    </section>
@endsection
