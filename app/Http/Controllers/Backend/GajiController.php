<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Matkul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaji = Gaji::with('dosen')->get();
        return view('admin.gaji.index',[
            'pageTitle' => 'Gaji',
            'gaji' => $gaji
        ]);
    }

    public function gajiSaya()
    {
        // $user = Auth::user();

        // if ($user->role !== 'dosen') {
        //     abort(403, 'Unauthorized action.');
        // }
        // $gajis = Gaji::where('dosen_id', $user->id)->get();

        // Ambil data gaji berdasarkan dosen yang sedang login
        $user = Auth::user();

        if ($user->role !== 'dosen') {
            abort(403, 'Unauthorized action.');
        }

        $dosen = $user->dosen()->with(['gaji'])->first();

        $totalSks = Jadwal::where('dosen_id', $dosen->id)
        ->where('keterangan', 'valid')
        ->join('matkuls', 'jadwals.matkul_id', '=', 'matkuls.id')
        ->sum('matkuls.sks');

        return view('dosen.gaji.index', [
            'gaji' => $dosen->gaji,
            'dosen' => $dosen,
            'user' => $user,
            'totalSks' => $totalSks
            // 'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::get(['id','nama']);
        return view('admin.gaji.create',[
            'dosen' => $dosen
        ]);
    }

    // public function hitungSalary($dosen_id)
    // {

    //     $data = $request->all();

    //     // Hitung total SKS dari jadwal
    //     $totalSks = Jadwal::where('dosen_id', $data['dosen_id'])
    //         ->where('keterangan', 'valid')
    //         ->join('matkuls', 'jadwals.matkul_id', '=', 'matkuls.id')
    //         ->sum('matkuls.total_sks');

    //     // Hitung total ngajar
    //     $totalNgajar = $data['total_ngajar'];

    //     // Hitung total gaji sesuai rumus
    //     $totalGaji = ($totalNgajar - 4) / $data['jumlah_minggu'] * 3000 * $totalSks;

    //     // Simpan data gaji baru ke database
    //     Gaji::create([
    //         'dosen_id' => $data['dosen_id'],
    //         'total_ngajar' => $totalNgajar,
    //         'minimal_mengajar' => $data['minimal_mengajar'],
    //         'jumlah_minggu' => $data['jumlah_minggu'],
    //         'honor_sks' => $totalGaji,
    //     ]);

    //     // Redirect ke halaman index dengan pesan sukses
    //     return redirect()->route('gaji.index')->with('success', 'Gaji berhasil disimpan');
    // }

    /**
     * Store a newly created resource in storage.
     */
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

        // $jumlahMingguDalamSatuBulan = (int) now()->endOfMonth()->format('W');

        $currentDate = Carbon::now();
        $startOfMonth = $currentDate->copy()->startOfMonth();
        $endOfMonth = $currentDate->copy()->endOfMonth();
        $totalDaysInMonth = $startOfMonth->diffInDays($endOfMonth) + 1;
        $jumlahMingguDalamSatuBulan = ceil($totalDaysInMonth / 7);
        // Hitung total gaji sesuai rumus
        // $totalGaji = ($totalNgajar - 4) / $data['jumlah_minggu'] * 3000 * $totalSks;
        // $totalGaji = ($totalNgajar - 4) / ($jumlahMingguDalamSatuBulan * 3000 * $totalSks);
        // $totalGaji = ($jumlahMingguDalamSatuBulan * 3000 * $totalSks) / ($totalNgajar - 4);
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
}
