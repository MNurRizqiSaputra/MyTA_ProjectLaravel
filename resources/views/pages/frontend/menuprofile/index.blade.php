@extends('layouts.frontend')
@section('title')
    MyTA - Profile
@endsection

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ Auth::user()->nama }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-10">
                            <label class="labels">Nama</label>
                            <input type="text" name="nama" id="Nama" class="form-control" placeholder="NIM" value="{{ Auth::user()->nama }}">
                    </div>
                    <div class="col-md-10">
                            <label class="labels">Email</label>
                            <input type="email" name="email" id="Email" class="form-control" placeholder="NIM" value="{{ Auth::user()->email }}">
                    </div>
                    @if (Auth::user()->mahasiswa)
                        <div class="col-md-10">
                            <label class="labels">NIM</label>
                            <input type="text" name="nim" id="NIM" class="form-control" placeholder="NIM" value="">
                        </div>
                    @elseif (Auth::user()->dosen)
                        <div class="col-md-10">
                            <label class="labels">NIP</label>
                            <input type="text" name="nip" id="NIP" class="form-control" value="" placeholder="NIP">
                        </div>
                    @endif
                </div>
                <div class="row mt-3">
                    <div class="col-md-10">
                        <label for="formFile" class="form-label">Foto</label>
                        <input class="form-control" type="file" name="foto" id="Foto">
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
