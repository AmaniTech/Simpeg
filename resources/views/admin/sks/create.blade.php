@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('sks.store') }}"  enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Tambah SKS
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="item" class="col-sm-3 col-form-label font-weight-normal">Item</label>
                    <div class="col-md-9">
                        <input type="text" id="item" name="item" class="form-control"
                            placeholder="Input Item" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label font-weight-normal">Harga</label>
                    <div class="col-md-9">
                        <input type="text" id="harga" name="harga" class="form-control"
                            placeholder="Harga" required>
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
