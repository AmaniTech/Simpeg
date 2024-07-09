<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Dosen;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::sortByTanggal()->with(['matkul', 'dosen'])->get();
        return view('dosen.schedule.index', [
            'pageTitle' => 'Schedule',
            'jadwal' => $jadwal
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertemuan' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'matkul_id' => 'required|exists:matkuls,id',
            'dosen_id' => 'required|exists:dosen,id',
        ]);

        Jadwal::create($request->all());

        toastr()->success('Schedule berhasil disimpan');
        return \redirect()->route('dosen.schedule');
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
        $dosen = Dosen::with('user')->get();
        return view('dosen.schedule.edit', [
            'pageTitle' => 'Edit Jadwal',
            'jadwal' => $jadwal,
            'matkul' => $matkul,
            'dosen'   =>  $dosen,

        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update([
            'pertemuan' => $request->pertemuan,
            'kelas' => $request->kelas,
            'tanggal'  => $request->tanggal,
            'jam' => $request->jam,
            'materi_dosen' => $request->materi_dosen,
            'jml_mhs' => $request->jml_mhs,
            'jml_mhs_masuk' => $request->jml_mhs_masuk
        ]);

        toastr()->success('Jadwal berhasil diperbarui.');
        return \redirect()->route('dosen.schedule');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::where('id', $id)->first();
        $jadwal->delete();

        toastr()->success('Jadwal berhasil dihapus');
        return \redirect()->route('dosen.schedule');
    }
}
