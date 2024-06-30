<!-- resources/views/dosen/rjabatan/edit.blade.php -->

@extends('layouts.base')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Riwayat Jabatan</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('dosen.profile.updateJabatan', ['id' => $dosen->id, 'jabatanId' => $jabatan->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH') <!-- Gunakan PATCH sesuai dengan perubahan rute -->
            <div class="form-group">
                <label for="nama_jabatan">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}" required>
                @error('nama_jabatan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tahun_awal">Tahun Awal</label>
                <input type="number" class="form-control year-picker" id="tahun_awal" name="tahun_awal" value="{{ $jabatan->tahun_awal }}" required>
                @error('tahun_awal')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tahun_akhir">Tahun Akhir</label>
                <input type="number" class="form-control year-picker" id="tahun_akhir" name="tahun_akhir" value="{{ $jabatan->tahun_akhir }}">
                @error('tahun_akhir')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('dosen.profile') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{ url('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('page-js')
    <script src="/js/xhr-helper.js"></script>
    <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Moment -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tambahkan skrip JavaScript khusus jika diperlukan
        });
    </script>
@endsection
