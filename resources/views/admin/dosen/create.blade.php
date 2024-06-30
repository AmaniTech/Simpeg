@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('dosen.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Pendaftaran Dosen
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="nip" class="col-sm-3 col-form-label font-weight-normal">NIDN</label>
                    <div class="col-md-9">
                        <input type="text" id="nip" name="nip" class="form-control" placeholder="NIDN"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label font-weight-normal">Nama</label>
                    <div class="col-md-9">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label font-weight-normal">Email</label>
                    <div class="col-md-9">
                        <input type="text" id="email" name="email" class="form-control" placeholder="email"
                            required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label font-weight-normal">Alamat</label>
                    <div class="col-md-9">
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat"
                            required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="prodi" class="col-sm-3 col-form-label font-weight-normal">Prodi</label>
                    <div class="col-md-9">
                        <input type="text" id="prodi" name="prodi" class="form-control" placeholder="Prodi"
                            required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jenjang" class="col-sm-3 col-form-label font-weight-normal">Jenjang</label>
                    <div class="col-md-9">
                        <input type="text" id="jenjang" name="jenjang" class="form-control" placeholder="Jenjang"
                            required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gelar" class="col-sm-3 col-form-label font-weight-normal">Gelar</label>
                    <div class="col-md-9">
                        <input type="text" id="gelar" name="gelar" class="form-control" placeholder="Gelar"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nohp" class="col-sm-3 col-form-label font-weight-normal">No HP</label>
                    <div class="col-md-9">
                        <input type="text" id="nohp" name="nohp" class="form-control" placeholder="nohp"
                            required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tahun_masuk" class="col-sm-3 col-form-label font-weight-normal">Tahun Masuk</label>
                    <div class="col-md-9">
                        <input type="number" id="tahun_masuk" name="tahun_masuk" class="form-control"
                            placeholder="Tahun Masuk" min="1900" max="2100" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user_id" class="col-sm-3 col-form-label font-weight-normal">Nama User</label>
                    <div class="col-md-9">
                        <select class="form-control" name="user_id" id="user_id">
                            @foreach ($user as $key)
                                <option {{ old('user_id') == $key->id ? 'selected' : null }} value="{{ $key->id }}">
                                    {{ $key->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-success" type="submit">Submit</button>
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
