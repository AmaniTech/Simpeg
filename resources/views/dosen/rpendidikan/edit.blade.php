<!-- resources/views/dosen/rpenelitian/edit.blade.php -->

@extends('layouts.base')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Riwayat Pendidikan</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('dosen.profile.updatePendidikan', ['id' => $dosen->id, 'pendidikanId' => $pendidikan->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH') <!-- Menggunakan PATCH sesuai dengan rute -->
            <div class="form-group">
                <label for="nama_institusi">Nama Institusi</label>
                <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" value="{{ $pendidikan->nama_institusi }}" required>
                @error('nama_institusi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenjang">Jenjang</label>
                <select class="form-control" id="jenjang" name="jenjang" required>
                    <option value="">-- Pilih Jenjang Pendidikan --</option>
                    <option value="SD/MI" {{ $pendidikan->jenjang == 'SD/MI' ? 'selected' : '' }}>SD/MI</option>
                    <option value="SMP/MTS" {{ $pendidikan->jenjang == 'SMP/MTS' ? 'selected' : '' }}>SMP/MTS</option>
                    <option value="SMA/MA" {{ $pendidikan->jenjang == 'SMA/MA' ? 'selected' : '' }}>SMA/MA</option>
                    <option value="SMU" {{ $pendidikan->jenjang == 'SMU' ? 'selected' : '' }}>SMU</option>
                    <option value="SMK" {{ $pendidikan->jenjang == 'SMK' ? 'selected' : '' }}>SMK</option>
                    <option value="DIPLOMA(D1/D2/D3/D4)" {{ $pendidikan->jenjang == 'DIPLOMA(D1/D2/D3/D4)' ? 'selected' : '' }}>DIPLOMA (D1/D2/D3/D4)</option>
                    <option value="SARJANA(S1)" {{ $pendidikan->jenjang == 'SARJANA(S1)' ? 'selected' : '' }}>SARJANA (S1)</option>
                    <option value="MAGISTER(S2)" {{ $pendidikan->jenjang == 'MAGISTER(S2)' ? 'selected' : '' }}>MAGISTER (S2)</option>
                    <option value="DOKTORAL(S3)" {{ $pendidikan->jenjang == 'DOKTORAL(S3)' ? 'selected' : '' }}>DOKTORAL (S3)</option>
                </select>
                @error('jenjang')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tahun_masuk">Tahun Masuk</label>
                <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" value="{{ $pendidikan->tahun_masuk }}">
                @error('tahun_masuk')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tahun_keluar">Tahun Keluar</label>
                <input type="number" class="form-control" id="tahun_keluar" name="tahun_keluar" value="{{ $pendidikan->tahun_keluar }}">
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
