@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('mahasiswa.schedule.updates', $jadwal->id) }}"  enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Validasi Jadwal
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-3 col-form-label font-weight-normal">Validasi Keterangan</label>
                    <div class="col-md-9">
                        <select id="keterangan" name="keterangan" class="form-control" required>
                            <option value="Valid" {{ $jadwal->keterangan == 'Valid' ? 'selected' : '' }}>Valid</option>
                            <option value="Menunggu" {{ $jadwal->keterangan == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer text-right">
                    {{-- <input type="hidden" id="id" name="id" class="form-control"> --}}
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
