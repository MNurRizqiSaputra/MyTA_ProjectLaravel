@extends('layouts.admin')

@section('title')
    Dosen Page
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <h2 class="content-title">MENU</h2>
            <h5 class="content-desc mb-4">DATA DOSEN</h5>
        </div>

        <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosens as $dosen)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dosen->nip }}</td>
                <td>{{ $dosen->user->nama }}</td>
                <td>{{ $dosen->jurusan->nama }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

