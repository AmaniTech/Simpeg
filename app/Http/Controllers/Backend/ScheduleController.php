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
        $jadwal = Jadwal::sortByTanggal()->with(['matkul','dosen'])->get();
        return view('dosen.schedule.index',[
            'pageTitle' => 'Schedule',
            'jadwal' => $jadwal
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matkul = Matkul::get(['id','nama_matkul']);
        $dosen = Dosen::get(['id','nama']);
        return view('dosen.schedule.create',[
            'matkul' => $matkul,
            'dosen' => $dosen
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
        $matkul = Matkul::get(['id','nama_matkul']);
        $dosen = Dosen::get(['id','nama']);
        return view('dosen.schedule.edit',[
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
        $request->validate([
            'pertemuan' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'matkul_id' => 'required|exists:matkuls,id',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        toastr()->success( 'Jadwal berhasil diperbarui.');
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
