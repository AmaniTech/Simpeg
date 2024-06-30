<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\DosenMatkul;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HitungController extends Controller
{

    public function hitung()
    {
        // $dosen = DosenMatkul::all();
        $dosen = Dosen::all();
        return view('admin.dosenmatkul.index',[
            'pageTitle' => 'List Dosen Matkul',
            'dosen'   =>  $dosen
        ]);
    }

    public function totalgaji()
    {
        $dosen = Dosen::select(
            'dosen.nip',
            'dosen.nama',
            'dosen.alamat',
            'dosen.prodi',
            DB::raw('(SUM(dosen_gaji.jumlah_sks) * (SELECT harga FROM sks LIMIT 1)) AS total_gaji')
        )
        ->leftJoin('dosen_gaji', 'dosen.id', '=', 'dosen_gaji.id_dosen')
        ->groupBy('dosen.nip', 'dosen.nama', 'dosen.alamat', 'dosen.prodi')
        ->get();

        return view('admin.totalgaji.index', [
            'pageTitle' => 'Total Gaji',
            'dosen' => $dosen
        ]);
    }

    public function editHitung($id)
    {
        
        $dosen = Dosen::where('id', $id)->first();

        $matkul = Matkul::all();

        return view('admin.dosenmatkul.edit',[
            'pageTitle' => 'Edit Dosen Matkul',
            'dosen'   =>  $dosen,
            'matkul'   =>  $matkul
        ]);
    }

    public function showHitung($id)
    {
        
        $dosen = Dosen::where('id', $id)
                ->firstOrFail();

        $matkul = DosenMatkul::where('id_dosen', $id)->get();


        return view('admin.dosenmatkul.show',[
            'pageTitle' => 'Edit Sks',
            'dosen'   =>  $dosen,
            'matkul'   =>  $matkul,
        ]);
    }

    public function update(Request $request, $id)
    {
      
        $id_dosen = $id;

       
        $listmatkulIds = $request->listmatkul;

        
        foreach ($listmatkulIds as $id_matkul) {
            
            $matkul = Matkul::find($id_matkul);

           
            $dosematkul = new DosenMatkul();
            $dosematkul->id_dosen = $id_dosen;
            $dosematkul->id_matkul = $id_matkul;
            $dosematkul->bulan = $request->bulan;
            $dosematkul->matkul = $matkul->nama_matkul; 
            $dosematkul->jumlah_sks = $matkul->sks; 
            $dosematkul->save();
        }

        toastr()->success('Dosen Matkul berhasil diubah');

        return \redirect()->route('admin.dosen');

    }

    public function deleteMatkul($id)
    {
        $dosen = DosenMatkul::where('id', $id)->first();
        $dosen->delete();

        toastr()->success('Matkul berhasil dihapus');
        return \redirect()->back();
    }
}