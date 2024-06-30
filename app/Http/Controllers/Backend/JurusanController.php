<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        // dd($sks);
        return view('admin.jurusan.index',[
            'pageTitle' => 'List Jurusan',
            'jurusan'   =>  $jurusan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string',
            'kode_jurusan' => 'required|string',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('admin.jurusan')
            ->with('success', 'Jurusan created successfully');
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
        // return view('admin.jurusan.edit', compact('jurusan'));
        $jurusan = Jurusan::where('id', $id)
                            ->firstOrFail();
        return view('admin.jurusan.edit',[
            'pageTitle' => 'Edit Jurusan',
            'jurusan'   =>  $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jurusan = jurusan::where('id', $id)
                            ->firstOrFail();
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->kode_jurusan = $request->kode_jurusan;
        $jurusan->save();


        toastr()->success('Jurusan berhasil diubah');

        return \redirect()->route('admin.jurusan');

        // return redirect()->route('jurusan.index')
        //     ->with('success', 'Data Jurusan telah di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::where('id', $id)->first();
        $jurusan->delete();

        toastr()->success('Matkul berhasil dihapus');
        return redirect()->route('admin.jurusan');
    }
}
