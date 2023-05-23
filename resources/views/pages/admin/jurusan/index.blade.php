@extends('layouts.admin')

@section('title')
    Jurusan Page
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">MENU</h2>
            <h5 class="content-desc mb-4">DATA JURUSAN</h5>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jurusans as $jurusan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jurusan->nama }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

