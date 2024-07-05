<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenLuaran;
use Illuminate\Support\Facades\File;

class PenelitianLuaranController extends Controller
{
    public function add(Request $request, $id)
    {
        $namaBuktiPenelitian = $request->file('bukti_penelitian')->store('bukti_penelitian');
        $namaSuratTugas = $request->file('surat_tugas')->store('surat_tugas');

        PenLuaran::create([
            'penelitian' => $request->penelitian,
            'tanggal' => $request->tanggal,
            'bukti_penelitian' => $namaBuktiPenelitian,
            'surat_tugas' => $namaSuratTugas,
            'dosen_id' => $id
        ]);

        toastr()->success('Data berhasil ditambah');
        return redirect()->back();
    }

    public function delete($id){

        $data = PenLuaran::where('id', $id)->first();

        File::delete('storage/' . $data->bukti_penelitian);
        File::delete('storage/' . $data->surat_tugas);

        PenLuaran::destroy($id);

        toastr()->success('Data berhasil dihapus');
        return redirect()->back();
    }
}
