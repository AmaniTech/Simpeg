@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('jadwal.updates', $jadwal->id) }}"  enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Edit Matkul
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="pertemuan" class="col-sm-3 col-form-label font-weight-normal">Pertemuan</label>
                    <div class="col-md-9">
                        <input type="text" name="pertemuan" class="form-control"
                            placeholder="NAMA MATKUL" value="{{ $jadwal->pertemuan }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="matkul_id" class="col-sm-3 col-form-label font-weight-normal">NAMA MATKUL</label>
                    <div class="col-md-9">
                        <select class="form-control" name="matkul_id">
                           @foreach($matkul as $mat)
                                <option {{ ($jadwal->matkul_id == $mat->id) ? 'selected' : '' }} value="{{ $mat->id }}">
                                    {{ $mat->nama_matkul }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-3 col-form-label font-weight-normal">Tanggal</label>
                    <div class="col-md-9">
                        <input type="date" name="tanggal" class="form-control"
                            placeholder="NAMA MATKUL" value="{{ $jadwal->tanggal }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jam" class="col-sm-3 col-form-label font-weight-normal">Jam</label>
                    <div class="col-md-9">
                        <input type="time" name="jam" class="form-control"
                            placeholder="NAMA MATKUL" value="{{ $jadwal->jam }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dosen_id" class="col-sm-3 col-form-label font-weight-normal">Dosen Pengampu</label>
                    <div class="col-md-9">
                        <select class="form-control" name="dosen_id" >
                            @foreach($dosen as $d)
                                <option {{ ($jadwal->dosen_id == $d->id) ? 'selected' : '' }} value="{{ $d->id }}">{{ $d->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mahasiswa_id" class="col-sm-3 col-form-label font-weight-normal">Penanggung Jawab Absensi</label>
                    <div class="col-md-9">
                        <select class="form-control" name="mahasiswa_id">
                            @foreach($mahasiswa as $m)
                                <option {{ ($jadwal->mahasiswa_id == $m->id) ? 'selected' : '' }} value="{{ $m->id }}">{{ $m->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-success" type="submit">Submit Registration Data</button>
                </div>
            </div>
        </div>

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
