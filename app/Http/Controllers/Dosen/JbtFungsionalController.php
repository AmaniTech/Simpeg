<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\JabFungsional;
use Illuminate\Http\Request;

class JbtFungsionalController extends Controller
{
    public function add(Request $request, $id)
    {
        $nameFile = $request->file('sertifikat')->store('setifikat');

        JabFungsional::create([
            'jabatan' => $request->jabatan,
            'kepangkatan' => $request->kepangkatan,
            'golongan' => $request->golongan,
            'sertifikat' => $nameFile,
            'tgl_sertifikasi' => $request->tgl_sertifikasi,
            'dosen_id' => $id
        ]);

        toastr()->success('Data berhasil ditambah');
        return redirect()->back();
    }
    public function delete($id)
    {
        JabFungsional::destroy($id);
        toastr()->success('Data berhasil dihapus');
        return redirect('/dosen/profile');
    }
}
