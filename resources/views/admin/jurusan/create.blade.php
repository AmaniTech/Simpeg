@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('jurusan.store') }}"  enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Tambah Jurusan
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama_jurusan" class="col-sm-3 col-form-label font-weight-normal">Nama Jurusan</label>
                    <div class="col-md-9">
                        <input type="text" id="nama_jurusan" name="nama_jurusan" class="form-control"
                            placeholder="Nama Jurusan" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_jurusan" class="col-sm-3 col-form-label font-weight-normal">Kode Jurusan</label>
                    <div class="col-md-9">
                        <input type="text" id="kode_jurusan" name="kode_jurusan" class="form-control"
                            placeholder="Kode Jurusan" required>
                    </div>
                </div>
                <div class="card-footer text-right">
                <button class="btn btn-success" type="submit">Submit</button>
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
