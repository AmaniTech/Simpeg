@extends('layouts.base')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Riwayat Jabatan</div>

            <div class="card-body">
                <form method="POST" action="{{ route('dosen.updateJabatan', [$dosen->id, $jabatan->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_jabatan">Nama Jabatan</label>
                        <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun_awal">Tahun Awal</label>
                        <input type="number" class="form-control" id="tahun_awal" name="tahun_awal" value="{{ $jabatan->tahun_awal }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun_akhir">Tahun Akhir</label>
                        <input type="number" class="form-control" id="tahun_akhir" name="tahun_akhir" value="{{ $jabatan->tahun_akhir }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
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
