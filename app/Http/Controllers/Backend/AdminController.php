<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\DosenMatkul;
use App\Models\Matkul;
use App\Models\Sks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Gaji;
use Illuminate\Support\Facades\Hash;
use App\Models\Rjabatan;
use App\Models\Rpenelitian;

class AdminController extends Controller
{

    public function dashboard()
    {
        // dd(Auth::user()->role);
        $jumlahDosen = Dosen::getJumlahDosen();
        $getGaji = Gaji::getGaji();
        $jumlahMahasiswa = Mahasiswa::getMahasiswa();
        return view('admin.index', [
            'jumlahDosen' => $jumlahDosen,
            'getGaji' => $getGaji,
            'jumlahMahasiswa' => $jumlahMahasiswa
        ]);
    }

    public function dosen()
    {
        $dosen = Dosen::all();
        return view('admin.dosen.dosen', [
            'pageTitle' => 'Data Dosen',
            'dosen'   =>  $dosen
        ]);
    }

    public function showDosen($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.dosen.show', [
            'dosen' => $dosen
        ]);
    }

    public function createJabatan($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.rjabatan.create', compact('dosen'));
    }

    public function storeJabatan(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'tahun_awal' => 'required|numeric',
            'tahun_akhir' => 'nullable|numeric',
        ]);

        $dosen = Dosen::findOrFail($id);
        $jabatan = new Rjabatan($request->all());
        $dosen->rjabatans()->save($jabatan);

        return redirect()->route('dosen.showProfile', $id)->with('success', 'Riwayat jabatan berhasil ditambahkan');
    }

    public function editJabatan($id, $jabatanId)
    {
        $dosen = Dosen::findOrFail($id);
        $jabatan = Rjabatan::findOrFail($jabatanId);

        return view('admin.rjabatan.edit', compact('dosen', 'jabatan'));
    }

    public function updateJabatan(Request $request, $id, $jabatanId)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'tahun_awal' => 'required|numeric',
            'tahun_akhir' => 'nullable|numeric',
        ]);

        $jabatan = Rjabatan::findOrFail($jabatanId);
        $jabatan->update($request->all());

        return redirect()->route('dosen.showProfile', $id)->with('success', 'Riwayat jabatan berhasil diperbarui');
    }

    public function createPenelitian($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.rpenelitian.create', compact('dosen'));
    }

    public function storePenelitian(Request $request, $id)
    {
        $request->validate([
            'judul_penelitian' => 'required',
            'tahun_penelitian' => 'required|numeric',
            'bukti_penelitian' => 'nullable|string',
        ]);

        $dosen = Dosen::findOrFail($id);
        $penelitian = new Rpenelitian($request->all());
        $dosen->rpenelitian()->save($penelitian);

        return redirect()->route('dosen.showProfile', $id)->with('success', 'Riwayat penelitian berhasil ditambahkan');
    }

    public function editPenelitian($id, $penelitianId)
    {
        $dosen = Dosen::findOrFail($id);
        $penelitian = Rpenelitian::findOrFail($penelitianId);

        return view('admin.rpenelitian.edit', compact('dosen', 'penelitian'));
    }

    public function updatePenelitian(Request $request, $id, $penelitianId)
    {
        $request->validate([
            'judul_penelitian' => 'required',
            'tahun_penelitian' => 'required|numeric',
            'bukti_penelitian' => 'nullable|string',
        ]);

        $penelitian = Rpenelitian::findOrFail($penelitianId);
        $penelitian->update($request->all());

        return redirect()->route('dosen.showProfile', $id)->with('success', 'Riwayat penelitian berhasil diperbarui');
    }


    public function user()
    {
        $user = User::all();
        return view('admin.user.user', [
            'pageTitle' => 'Data User',
            'user' => $user
        ]);
    }

    public function createUser()
    {
        return view('users.create', [
            'pageTitle' => 'Create User'
        ]);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'image' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:admin,dosen,mahasiswa',
            'status' => 'required|in:active,inactive',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $role = $request->input('role');

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'image' => $request->image,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        if ($role == 'dosen') {
            $userId = User::where('name', $request->name)->value('id');
            Dosen::create([
                'user_id' => $userId,
                'nama' => $request->name
            ]);
        }
        if ($role == 'mahasiswa') {
            $userIds = User::where('name', $request->name)->value('id');
            Mahasiswa::create([
                'user_id' => $userIds,
                'nama' => $request->name
            ]);
        }

        toastr()->success('User berhasil ditambahkan');
        return redirect()->route('admin.users');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|string|max:15',
            'role' => 'required|in:admin,dosen,mahasiswa',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function destroyUser($id)
    {
        User::destroy($id);

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }


    public function mahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa.mahasiswa', [
            'pageTitle' => 'Data Mahasiswa',
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function sks()
    {
        $sks = Sks::all();
        return view('admin.sks.index', [
            'pageTitle' => 'List Sks',
            'sks'   =>  $sks
        ]);
    }

    public function createSks()
    {
        return view('admin.sks.create');
    }

    public function storeSks(Request $request)
    {
        $request->validate([
            'item' => 'required|string',
            'harga' => 'required|string',
        ]);

        Sks::create($request->all());

        toastr()->success('SKS berhasil disimpan');
        return \redirect()->route('admin.sks');
    }

    public function create()
    {
        $user = User::where('role', 'dosen')->get(['id', 'name']);
        return view('admin.dosen.create', [
            'pageTitle' => 'Create Dosen',
            'user' => $user
        ]);
    }

    public function createMahasiswa()
    {
        $user = User::where('role', 'mahasiswa')->get(['id', 'name']);
        return view('admin.mahasiswa.create', [
            'pageTitle' => 'Create Mahasiswa',
            'user' => $user
        ]);
    }

    public function addMahasiswa(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'prodi' => 'required',
            'jurusan' => 'required',
            'tahun_angkatan' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        Mahasiswa::create($request->all());

        toastr()->success('Jurusan berhasil ditambahkan');
        return \redirect()->route('admin.mahasiswa');
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $users = User::where('role', 'mahasiswa')->get();
        return view('admin.mahasiswa.edit', [
            'pageTitle' => 'Edit Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'users' => $users
        ]);
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:20',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'tahun_angkatan' => 'required|string|max:100',
            'user_id' => 'required|exists:users,id'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());

        return redirect()->route('admin.mahasiswa')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroyMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'prodi' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'jenjang' => 'required',
            'gelar' => 'required',
            'tahun_masuk' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        Dosen::create($request->all());


        toastr()->success('Dosen berhasil ditambah⚡️');

        return \redirect()->route('admin.dosen');
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required|date',
            'prodi' => 'required',
            'jenjang' => 'required',
            'gelar' => 'required',
            'tahun_masuk' => 'required',
            'user_id' => 'required|exists:user,id'
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());

        toastr()->success('Dosen berhasil diubah');

        return \redirect()->route('admin.dosen');
    }

    public function updateSks(Request $request, $id)
    {
        $sks = Sks::where('id', $id)
            ->firstOrFail();
        $sks->harga = $request->harga;
        $sks->save();


        toastr()->success('Sks berhasil diubah');

        return \redirect()->route('admin.sks');
    }

    public function edit($id)
    {
        $dosen = Dosen::where('id', $id)
            ->firstOrFail();
        return view('admin.dosen.edit', [
            'pageTitle' => 'Edit Dosen',
            'dosen'   =>  $dosen,
        ]);
    }

    public function editSks($id)
    {

        $sks = Sks::where('id', $id)
            ->firstOrFail();
        return view('admin.sks.edit', [
            'pageTitle' => 'Edit Sks',
            'sks'   =>  $sks
        ]);
    }


    public function delete($id)
    {
        $dosen = Dosen::where('id', $id)->first();
        $dosen->delete();

        toastr()->success('Dosen berhasil dihapus');
        return \redirect()->back();
    }
}
