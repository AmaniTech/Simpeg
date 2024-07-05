<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Rjabatan;
use App\Models\Rpenelitian;
use App\Models\Rpendidikan;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function dashboard()
    {
        $jumlahJadwal = Jadwal::getJumlahJadwal();
        return view('dosen.dashboard', ['jumlahJadwal' => $jumlahJadwal]);
    }

    public function profile()
    {
        $user = Auth::user();

        if ($user->role !== 'dosen') {
            abort(403, 'Unauthorized action.');
        }

        $dosen = $user->dosen()->with(['rjabatans', 'rpenelitian', 'rpendidikan'])->first();

        return view('dosen.profile.index', [
            'dosen' => $dosen,
            'user' => $user
        ]);
    }

    public function createJabatan($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.rjabatan.create', compact('dosen'));
    }

    public function createPenelitian($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.rpenelitian.create', compact('dosen'));
    }

    public function createPendidikan($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.rpendidikan.create', compact('dosen'));
    }

    public function editJabatan($id, $jabatanId)
    {
        $dosen = Dosen::findOrFail($id);
        $jabatan = Rjabatan::findOrFail($jabatanId);

        return view('dosen.rjabatan.edit', compact('dosen', 'jabatan'));
    }

    public function editPenelitian($id, $penelitianId)
    {
        $dosen = Dosen::findOrFail($id);
        $penelitian = Rpenelitian::findOrFail($penelitianId);

        return view('dosen.rpenelitian.edit', compact('dosen', 'penelitian'));
    }

    public function editPendidikan($id, $pendidikanId)
    {
        $dosen = Dosen::findOrFail($id);
        $pendidikan = Rpendidikan::findOrFail($pendidikanId);

        return view('dosen.rpendidikan.edit', compact('dosen', 'pendidikan'));
    }

    public function storeJabatan(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'tahun_awal' => 'required|string|max:4',
            'tahun_akhir' => 'required|string|max:4',
        ]);

        Rjabatan::create([
            'dosen_id' => $id,
            'nama_jabatan' => $request->nama_jabatan,
            'tahun_awal' => $request->tahun_awal,
            'tahun_akhir' => $request->tahun_akhir,
        ]);

        toastr()->success('Jabatan ditambahkan');
        return redirect()->route('dosen.profile');
    }

    public function storeRpenelitian(Request $request, $id)
    {
        Rpenelitian::create([
            'dosen_id' => $id,
            'judul_penelitian' => $request->judul_penelitian,
            'tahun_penelitian' => $request->tahun_penelitian,
            'bukti_penelitian' => $request->bukti_penelitian,
            'sinta' => $request->sinta,
            'penerbit' => $request->penerbit,
        ]);

        toastr()->success('Data berhasil ditambahkan');
        return redirect()->route('dosen.profile');
    }

    public function storeRpendidikan(Request $request, $id)
    {
        Rpendidikan::create([
            'dosen_id' => $id,
            'nama_institusi' => $request->instansi,
            'jenjang' => $request->jenjang,
            'tahun_masuk' => $request->thn_masuk,
            'tahun_keluar' => $request->thn_lulus,
        ]);

        toastr()->success('Riwayat Pendidikan ditambahkan');
        return redirect()->route('dosen.profile');
    }

    public function updateJabatan(Request $request, $id, $jabatanId)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'tahun_awal' => 'required|numeric',
            'tahun_akhir' => 'required|numeric',
        ]);

        $jabatan = Rjabatan::findOrFail($jabatanId);
        $jabatan->dosen_id = $id;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->tahun_awal = $request->tahun_awal;
        $jabatan->tahun_akhir = $request->tahun_akhir;
        $jabatan->save();;

        return redirect()->route('dosen.profile', ['id' => $id])->with('success', 'Riwayat jabatan berhasil diperbarui');
    }

    public function updatePenelitian(Request $request, $id, $penelitianId)
    {
        Rpenelitian::findOrFail($penelitianId)->update([
            'judul_penelitian' => $request->judul_penelitian,
            'tahun_penelitian' => $request->tahun_penelitian,
            'bukti_penelitian' => $request->link,
            'penerbit' => $request->penerbit,
            'sinta' => $request->sinta,
        ]);

        toastr()->success('Data berhasil di update');
        return redirect('/dosen/profile');
    }
    public function updatePendidikan(Request $request, $id, $pendidikanId)
    {
        $request->validate([
            'nama_institusi' => 'required',
            'jenjang' => 'required',
            'tahun_masuk' => 'required|numeric',
            'tahun_keluar' => 'required|numeric',
        ]);

        $pendidikan = Rpendidikan::findOrFail($pendidikanId);
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->jenjang = $request->jenjang;
        $pendidikan->tahun_masuk = $request->tahun_masuk;
        $pendidikan->tahun_keluar = $request->tahun_keluar;
        $pendidikan->save();

        return redirect('/dosen/profile')->with('success', 'Riwayat penelitian berhasil diperbarui.');
    }

    public function deleteJabatan($id, $jabatanId)
    {
        $jabatan = Rjabatan::findOrFail($jabatanId);
        $jabatan->delete();

        return redirect()->route('dosen.profile', ['id' => $id])->with('success', 'Riwayat jabatan berhasil dihapus.');
    }

    public function deletePenelitian($id, $penelitianId)
    {
        $penelitian = Rpenelitian::findOrFail($penelitianId);
        $penelitian->delete();

        return redirect()->route('dosen.profile', ['id' => $id])->with('success', 'Riwayat penelitian berhasil dihapus.');
    }

    public function deletePendidikan($id, $pendidikanId)
    {
        $pendidikan = Rpendidikan::findOrFail($pendidikanId);
        $pendidikan->delete();

        return redirect()->route('dosen.profile', ['id' => $id])->with('success', 'Riwayat pendidikan berhasil dihapus.');
    }

    public function update_datadiri(Request $request, $id)
    {
        Dosen::where('id', $id)->update([
            'nidn' => $request->nidn,
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'jenjang' => $request->jenjang,
            'gelar' => $request->gelar,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        $dosen = Dosen::find($id);
        $dosen->user->update([
            'name' => $request->nama,
        ]);

        return redirect('/dosen/profile')->with('success', 'Data Berhasil di Update.');
    }
}
