<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        $mahasiswaId = Mahasiswa::where('user_id', auth()->user()->id)->value('id');
        $value = Jadwal::where('mahasiswa_id', $mahasiswaId)->count();
        return view('mahasiswa.dashboard', ['jumlahMhs' => $value]);
    }
}
