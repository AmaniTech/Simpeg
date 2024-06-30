@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('matkul.store') }}"  enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Tambah Mata Kuliah
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama_matkul" class="col-sm-3 col-form-label font-weight-normal">Nama Matkul</label>
                    <div class="col-md-9">
                        <input type="text" id="nama_matkul" name="nama_matkul" class="form-control"
                            placeholder="Nama Matkul" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sks" class="col-sm-3 col-form-label font-weight-normal">SKS</label>
                    <div class="col-md-9">
                        <input type="text" id="sks" name="sks" class="form-control"
                            placeholder="SKS" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="semester" class="col-sm-3 col-form-label font-weight-normal">SEMESTER</label>
                    <div class="col-md-9">
                        <input type="text" id="semester" name="semester" class="form-control"
                            placeholder="SEMESTER" required>
                    </div>
                </div>
                <div class="form-group row border-bottom pb-4">
                    <label for="jurusan_id" class="col-sm-3 col-form-label font-weight-normal   ">Nama Jurusan</label>
                    <div class="col-md-9">
                        <select class="form-control" name="jurusan_id" id="jurusan_id">
                            @foreach($jurusan as $key)
                                <option {{ old('jurusan_id') == $key->id ? 'selected' : null }} value="{{ $key->id }}">{{ $key->nama_jurusan }}</option>
                            @endforeach
                        </select>
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
