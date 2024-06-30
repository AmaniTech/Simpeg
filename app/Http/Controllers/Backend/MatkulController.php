<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Matkul;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkul = Matkul::with('jurusan')->get();
        return view('admin.matkul.index', [
            'pageTitle' => 'Manage Matkul',
            'matkul'   =>  $matkul
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::get(['id','nama_jurusan']);
        return view('admin.matkul.create',[
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_matkul' => 'required|string',
            'sks' => 'required|string',
            'semester' => 'required|string',
            'jurusan_id' => 'required|string',
        ]);

        Matkul::create($request->all());

        toastr()->success('Jurusan berhasil disimpan');

        return \redirect()->route('admin.matkul');
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
        $matkul = Matkul::where('id', $id)
                            ->firstOrFail();
        $jurusan = Jurusan::get(['id','nama_jurusan']);

        return view('admin.matkul.edit',[
            'pageTitle' => 'Edit Jurusan',
            'matkul' => $matkul,
            'jurusan'   =>  $jurusan,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matkul = Matkul::where('id', $id)
                            ->firstOrFail();
        $matkul->nama_matkul = $request->nama_matkul;
        $matkul->sks = $request->sks;
        $matkul->semester = $request->semester;
        $matkul->jurusan_id = $request->jurusan_id;
        $matkul->save();


        toastr()->success('Matkul berhasil diubah');

        return \redirect()->route('admin.matkul');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matkul = Matkul::where('id', $id)->first();
        $matkul->delete();

        toastr()->success('Matkul berhasil dihapus');
        return \redirect()->route('admin.matkul');
    }
}
