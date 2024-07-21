<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaji = Gaji::with('dosen')->get();
        return view('admin.gaji.index', [
            'pageTitle' => 'Gaji',
            'gaji' => $gaji
        ]);
    }

    public function gajiSaya()
    {
        return view('dosen.gaji.index', [
            'minimal_sks' => Setting::where('variabel', 'min_sks')->value('value'),
            'hargapersks' => Setting::where('variabel', 'hargapersks')->value('value')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::get(['id', 'nama']);
        return view('admin.gaji.create', [
            'dosen' => $dosen
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required'
        ]);
        $data = $request->all();

        // Hitung total SKS dari jadwal
        $totalSks = Jadwal::where('dosen_id', $data['dosen_id'])
            ->where('keterangan', 'valid')
            ->join('matkuls', 'jadwals.matkul_id', '=', 'matkuls.id')
            ->sum('matkuls.sks');

        // Hitung total ngajar
        $totalNgajar = Jadwal::where('dosen_id', $data['dosen_id'])
            ->where('keterangan', 'Valid')
            ->count();


        $currentDate = Carbon::now();
        $startOfMonth = $currentDate->copy()->startOfMonth();
        $endOfMonth = $currentDate->copy()->endOfMonth();
        $totalDaysInMonth = $startOfMonth->diffInDays($endOfMonth) + 1;
        $jumlahMingguDalamSatuBulan = ceil($totalDaysInMonth / 7);

        $totalGaji = ($totalNgajar / $jumlahMingguDalamSatuBulan) * 30000 * $totalSks;

        // Simpan data gaji baru ke database
        Gaji::create([
            // 'dosen_id' => $data['dosen_id'],
            'dosen_id' => $request->dosen_id,
            'total_ngajar' => $totalNgajar,
            'minimal_mengajar' => 4,
            'jumlah_minggu' => $jumlahMingguDalamSatuBulan,
            'honor_sks' => $totalGaji,
        ]);

        toastr()->success('Gaji berhasil disimpan');
        return redirect()->route('admin.gaji')->with('success', 'Gaji berhasil disimpan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gaji = Gaji::where('id', $id)->first();
        $gaji->delete();

        toastr()->success('Jadwal berhasil dihapus');
        return \redirect()->route('admin.gaji');
    }

    public function perhitungan(Request $request)
    {

        $min_sks = Setting::where('variabel', 'min_sks')->value('value');
        $hargapersks = Setting::where('variabel', 'hargapersks')->value('value');

        $dosenId = Dosen::where('user_id', Auth::user()->id)->value('id');


        $matkul_dosen =
            Jadwal::join('matkuls', 'matkuls.id', '=', 'jadwals.matkul_id')
            ->where('dosen_id', $dosenId)
            ->groupBy('matkul_id', 'matkuls.nama_matkul', 'matkuls.sks')
            ->whereMonth('tanggal', Carbon::parse($request->bulan)->format('m'))
            ->select('matkuls.nama_matkul', 'matkuls.sks', DB::raw('count(*) as jumlah_pertemuan'), DB::raw('matkuls.sks * 2 as total_sks'))
            ->get();



        $patokan = ($matkul_dosen->sum('total_sks') * $hargapersks) - ($min_sks * $hargapersks);

        $jumlah_semua_kelas_valid = Jadwal::where('dosen_id', $dosenId)
            ->whereNotNull(['materi_dosen', 'materi_mhs'])
            ->whereMonth('tanggal', Carbon::parse($request->bulan)->format('m'))
            ->count();

        $harga_total_pertemuan = ($jumlah_semua_kelas_valid * $patokan) / 16;


        $data['harga_total_pertemuan'] = $harga_total_pertemuan;
        $data['matkul_dosen'] = $matkul_dosen;


        return redirect()->back()->with('Gaji', $data);
    }
}
