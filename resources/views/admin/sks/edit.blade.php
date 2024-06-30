@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('sks.updates', $sks->id) }}"  enctype="multipart/form-data">
        @csrf 
        @method('patch')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Edit Harga per Sks
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label font-weight-normal">Harga Per SKS</label>
                    <div class="col-md-9">
                        <input type="text" id="harga" name="harga" class="form-control"
                            placeholder="Harga" value="{{ $sks->harga }}" required>
                    </div>
                </div>
               
        <div class="card">
            <div class="card-footer text-right">
                <a href="{{ route('admin.dosen') }}" class="btn btn-default border-info float-left">Cancel
                    Registration</a>
                <span class="mr-4 font-italic">Make sure all data filled correctly before submit</span>
                {{-- <input type="hidden" id="id" name="id" class="form-control"> --}}
                <button class="btn btn-success" type="submit">Submit Save Data</button>
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