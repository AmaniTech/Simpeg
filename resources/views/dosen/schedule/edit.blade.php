@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('schedule.updates', $jadwal->id) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Edit Jadwal
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="pertemuan" class="col-sm-3 col-form-label font-weight-normal">Pertemuan</label>
                    <div class="col-md-9">
                        <input type="text" id="pertemuan" name="pertemuan" class="form-control" placeholder="PERTEMUAN"
                            value="{{ $jadwal->pertemuan }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-3 col-form-label font-weight-normal">Kelas</label>
                    <div class="col-md-9">
                        <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas"
                            value="{{ $jadwal->kelas }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal" class="col-sm-3 col-form-label font-weight-normal">Tanggal</label>
                    <div class="col-md-2">
                        <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal"
                            value="{{ $jadwal->tanggal }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jam" class="col-sm-3 col-form-label font-weight-normal">JAM</label>
                    <div class="col-md-2">
                        <input type="time" id="jam" name="jam" class="form-control" placeholder="Jam"
                            value="{{ $jadwal->jam }}" required>
                    </div>
                </div>

                <div class="form-group row border-bottom pb-4">
                    <label for="matkul_id" class="col-sm-3 col-form-label font-weight-normal">Nama Matkul</label>
                    <div class="col-md-2">
                        <p>{{ $jadwal->matkul->nama_matkul }}</p>
                    </div>
                </div>
                <div class="form-group row border-bottom pb-4">
                    <label for="matkul_id" class="col-sm-3 col-form-label font-weight-normal">Penanggung Jawab Absensi</label>
                    <div class="col-md-2">
                        <p>{{ $jadwal->mahasiswa->user->name }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jam" class="col-sm-3 col-form-label font-weight-normal">Jumlah Mahasiswa</label>
                    <div class="col-md-2">
                        <input type="number" name="jml_mhs" class="form-control"
                            value="{{ $jadwal->jml_mhs }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jam" class="col-sm-3 col-form-label font-weight-normal">Jumlah Mahasiswa Masuk</label>
                    <div class="col-md-2">
                        <input type="number" name="jml_mhs_masuk" class="form-control"
                            value="{{ $jadwal->jml_mhs_masuk }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jam" class="col-sm-3 col-form-label font-weight-normal">Materi</label>
                    <div class="col-md-2">
                        <textarea name="materi_dosen" cols="100" rows="10">{{ $jadwal->materi_dosen }}</textarea>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>
    </form>
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{ url('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection


