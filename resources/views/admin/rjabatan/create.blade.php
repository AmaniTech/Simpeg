@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('dosen.profile.rjabatan',$dosen->id) }}"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan</label>
            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }}" required>
            @error('nama_jabatan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tahun_awal">Tahun Awal</label>
            <input type="number" class="form-control year-picker" id="tahun_awal" name="tahun_awal" value="{{ old('tahun_awal') }}" required>
            @error('tahun_awal')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="tahun_akhir">Tahun Akhir</label>
            <input type="number" class="form-control year-picker" id="tahun_akhir" name="tahun_akhir" value="{{ old('tahun_akhir') }}">
            @error('tahun_akhir')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dosen.profile', $dosen->id) }}" class="btn btn-secondary">Batal</a>
    </form>
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

            let pwd = true
            $('#togglepwd').click(function() {
                if (pwd) {
                    pwd = false
                    $('input[name="password"]').attr('type', 'text')
                    $('#togglepwd span').removeClass("fa-eye")
                    $('#togglepwd span').addClass("fa-eye-slash")
                } else {
                    pwd = true
                    $('input[name="password"]').attr('type', 'password')
                    $('#togglepwd span').removeClass("fa-eye-slash")
                    $('#togglepwd span').addClass("fa-eye")
                }
            })
        })
    </script>
@endsection
