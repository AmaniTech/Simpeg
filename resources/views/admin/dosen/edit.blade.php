@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('dosen.updates', $dosen->id) }}"  enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Edit Dosen
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="nidn" class="col-sm-3 col-form-label font-weight-normal">NIDN</label>
                    <div class="col-md-9">
                        <input type="text" id="nidn" name="nidn" class="form-control"
                            placeholder="NIDN" value="{{ $dosen->nip }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label font-weight-normal">Nama</label>
                    <div class="col-md-9">
                        <input type="text" id="nama" name="nama" class="form-control"
                            placeholder="Nama" value="{{ $dosen->nama }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label font-weight-normal">Alamat</label>
                    <div class="col-md-9">
                        <input type="text" id="alamat" name="alamat" class="form-control"
                            placeholder="Alamat" value="{{ $dosen->alamat }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="prodi" class="col-sm-3 col-form-label font-weight-normal">Prodi</label>
                    <div class="col-md-9">
                        <input type="text" id="prodi" name="prodi" class="form-control"
                            placeholder="Prodi" value="{{ $dosen->prodi }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jenjang" class="col-sm-3 col-form-label font-weight-normal">Jenjang</label>
                    <div class="col-md-9">
                        <input type="text" id="jenjang" name="jenjang" class="form-control"
                            placeholder="Jenjang" value="{{ $dosen->jenjang }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gelar" class="col-sm-3 col-form-label font-weight-normal">Gelar</label>
                    <div class="col-md-9">
                        <input type="text" id="gelar" name="gelar" class="form-control"
                            placeholder="Gelar" value="{{ $dosen->gelar }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tahunmasuk" class="col-sm-3 col-form-label font-weight-normal">Tahun Masuk</label>
                    <div class="col-md-9">
                        <input type="text" id="tahunmasuk" name="tahunmasuk" class="form-control"
                            placeholder="Tahun Masuk" value="{{ $dosen->tahun_masuk }}" required>
                    </div>
                </div>


            </div>
        </div>

        {{-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Account Data</h3>
            </div>
            <div class="card-body"> --}}
                {{-- <form action=""> --}}
                    {{-- <div class="form-group row">
                        <label for="iaAccountEmail" class="col-sm-3 col-form-label font-weight-normal">Account Email</label>
                        <div class="col-md-9">
                            <input type="email" id="iaAccountEmail" name="accountEmail" class="form-control"
                                placeholder="Account Email">
                        </div>
                    </div> --}}
                    {{-- <div class="form-group row">
                        <label for="pass" class="col-sm-3 col-form-label font-weight-normal">Account Password</label>
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="pass" class="form-control" placeholder="Password" autocomplete="false" minlength="8">
                                <div class="input-group-append" id="togglepwd">
                                    <a class="btn btn-default" role="button" style="width:50px">
                                        <span class="fas fa-eye"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                {{-- </form> --}}
            {{-- </div> --}}
        {{-- </div> --}}
        <div class="card">
            <div class="card-footer text-right">
                <a href="{{ route('admin.dosen') }}" class="btn btn-default border-info float-left">Cancel
                    Registration</a>
                <span class="mr-4 font-italic">Make sure all data filled correctly before submit</span>
                {{-- <input type="hidden" id="id" name="id" class="form-control"> --}}
                <button class="btn btn-success" type="submit">Submit Registration Data</button>
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
