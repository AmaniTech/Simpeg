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
                    <div class="col-md-9">
                        <select class="form-control" name="matkul_id" id="matkul_id">
                            @foreach ($matkul as $key)
                                <option {{ $jadwal->matkul_id == $key->id ? 'selected' : '' }} value="{{ $key->id }}">
                                    {{ $key->nama_matkul }}</option>
                            @endforeach
                        </select>
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
