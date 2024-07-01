<!-- resources/views/dosen/rpenelitian/edit.blade.php -->

@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Riwayat Pendidikan</h3>
        </div>
        <div class="card-body">
            <form method="POST"
                action="{{ route('dosen.profile.updatePendidikan', ['id' => $dosen->id, 'pendidikanId' => $pendidikan->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH') <!-- Menggunakan PATCH sesuai dengan rute -->
                <div class="form-group">
                    <label for="nama_institusi">Nama Institusi</label>
                    <input type="text" class="form-control" id="nama_institusi" name="nama_institusi"
                        value="{{ $pendidikan->nama_institusi }}" required>
                    @error('nama_institusi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenjang">Jenjang</label>
                    <input type="text" class="form-control" id="jenjang" name="jenjang"
                        value="{{ $pendidikan->jenjang }}" required>
                    @error('jenjang')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk</label>
                    <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk"
                        value="{{ $pendidikan->tahun_masuk }}">
                    @error('tahun_masuk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun_keluar">Tahun Keluar</label>
                    <input type="number" class="form-control" id="tahun_keluar" name="tahun_keluar"
                        value="{{ $pendidikan->tahun_keluar }}">
                    @error('tahun_keluar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('dosen.profile', ['id' => $dosen->id]) }}" class="btn btn-secondary">Batal</a>
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
