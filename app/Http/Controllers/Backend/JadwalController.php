<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::sortByTanggal()->with(['matkul', 'dosen'])->get();
        return view('admin.jadwal.index', [
            'pageTitle' => 'Jadwal',
            'jadwal' => $jadwal
        ]);
    }

    public function schedule()
    {
        $schedule = Jadwal::sortByTanggal()->with(['matkul', 'dosen'])->get();
        return view('mahasiswa.schedule.index', [
            'pageTitle' => 'Lihat Jadwal',
            'schedule' => $schedule
        ]);
    }


    public function ubah(string $id)
    {
        $jadwal = Jadwal::where('id', $id)
            ->firstOrFail();
        $matkul = Matkul::get(['id', 'nama_matkul']);
        $dosen = Dosen::get(['id', 'nama']);
        $mahasiswa = Mahasiswa::get(['id', 'nama']);
        $user = Auth::user();
        \Log::info('User ID: ' . $user->id);
        \Log::info('Mahasiswa: ' . $user->mahasiswa);

        if (!$user->mahasiswa) {
            return redirect()->route('mahasiswa.schedule')->with('error', 'Akun ini tidak memiliki data mahasiswa.');
        }

        if ($jadwal->mahasiswa_id != $user->mahasiswa->id) {
            return redirect()->route('mahasiswa.schedule')->with('error', 'Anda tidak memiliki izin untuk mengedit jadwal ini.');
        }
        return view('mahasiswa.schedule.edit', [
            'pageTitle' => 'Validasi Keterangan',
            'jadwal' => $jadwal,
            'matkul' => $matkul,
            'dosen'   =>  $dosen,
            'mahasiswa' => $mahasiswa,
            'user' => $user
        ]);
    }

    public function updateKeterangan(Request $request, string $id)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $user = Auth::user();
        if ($jadwal->mahasiswa_id != $user->mahasiswa->id) {
            return redirect()->route('mahasiswa.schedule')->with('error', 'Anda tidak memiliki izin untuk mengedit jadwal ini.');
        }

        $jadwal->update($request->all());

        toastr()->success('Keterangan telah diperbarui.');
        return \redirect()->route('mahasiswa.schedule');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matkul = Matkul::get(['id', 'nama_matkul']);
        // $dosen = Dosen::get('id');
        $mahasiswa = Mahasiswa::get(['id', 'nama']);
        $dosen = Dosen::with('user')->get();

        return view('dosen.jadwal.create', [
            'matkul' => $matkul,
            'dosen' => $dosen,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertemuan' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'matkul_id' => 'required|exists:matkuls,id',
            'dosen_id' => 'required|exists:dosen,id',
            'mahasiswa_id' => 'required|exists:mahasiswa,id'
        ]);

        Jadwal::create($request->all());

        toastr()->success('Jurusan berhasil diubah');
        return \redirect()->route('dosen.jadwal');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwal::where('id', $id)
            ->firstOrFail();
        $matkul = Matkul::get(['id', 'nama_matkul']);
        $dosen = Dosen::get(['id', 'nama']);
        $mahasiswa = Mahasiswa::get(['id', 'nama']);
        return view('admin.matkul.edit', [
            'pageTitle' => 'Edit Jadwal',
            'jadwal' => $jadwal,
            'matkul' => $matkul,
            'dosen'   =>  $dosen,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pertemuan' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'matkul_id' => 'required|exists:matkuls,id',
            'dosen_id' => 'required|exists:dosens,id',
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        toastr()->success('Jadwal berhasil diperbarui.');
        return \redirect()->route('dosen.jadwal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::where('id', $id)->first();
        $jadwal->delete();

        toastr()->success('Jadwal berhasil dihapus');
        return \redirect()->route('dosen.jadwal');
    }
}
