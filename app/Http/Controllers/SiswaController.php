<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //Tempat edit fungsi dan perintah
    public function dataSiswa(){
        $siswa1 = 'Ezekiel';$asal1 = 'Herguantown';
        $siswa2 = 'Marieta';$asal2 = 'Nerbuliam';
        return view ('data_siswa',
        compact('siswa1','siswa2','asal1','asal2')
    );
    }
}
