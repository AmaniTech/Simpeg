<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        $jumlahMhs = Mahasiswa::getMahasiswa();
        return view('mahasiswa.dashboard', ['jumlahMhs' => $jumlahMhs]);
    }
}
