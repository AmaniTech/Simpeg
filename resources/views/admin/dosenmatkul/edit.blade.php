@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card demo-icons">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h5 class="card-title">Input Matkul Dosen Periode <span class="badge bg-gradient-info" style="color: aliceblue">{{ now()->isoFormat('MMMM Y') }}</span></h5>
            </div>
          </div>
          {{-- <!-- <h5 class="card-title">Edit Data {{ $karyawan->nama }}</h5> --> --}}
          <span class="d-flex">(<p class="text-danger">*</p>) wajib diisi</span>
        </div>
        <div class="card-body">
          <form class="user" method="POST" action="{{ route('update.hitung', $dosen->id) }}">
            @csrf
            @method('patch')
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label>Bulan</label>
                  <input type="text" class="form-control" value="{{ now()->isoFormat('MMMM') }}" name="bulan" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Dosen</label>
                  {{-- <input type="text" class="form-control" value="{{ $tunjangan->id }}" name="id_tunjangan" hidden> --}}
                  <input type="text" class="form-control" value="{{ $dosen->nama }}" name="nama" disabled>
                  <input type="text" class="form-control" value="{{ $dosen->id }}" name="id" hidden>
                  <input type="text" class="form-control" value="{{  now()->isoFormat('MMMM') }}" name="bulan" hidden>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  {{--<label>Nominal (Rupiah)</label> --}}
                  {{-- <input type="text" class="form-control" value="{{ separate($tunjangan->nilai) }}" name="nilai" disabled> --}}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <label>Tambahkan Matkul <span class="text-danger">*</span></label>
                <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Matkul" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" name="listmatkul[]" required>
                    @foreach ($matkul as $value)
                    {{-- <option value="{{ $matkul->id }}" @if (in_array($matkul->id)) selected @endif>{{ $matkul->name }}</option> --}}
                    <option value="{{ $value->id }}"> {{ $value->nama_matkul }} </option>
                    @endforeach
                </select>
                {{-- @error('karyawan')
                <div class="text-danger">{{ $message }}</div>
                @enderror --}}
              </div>
            </div>
            <br><br>
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-outline-warning"> UBAH </button>
                <a href="{{ route('admin.hitung') }}" class="btn btn-outline-primary">kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('page-css')
<link rel="stylesheet" href="{{ url('plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="/plugins/bootstrap-hijridate/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
<style>
    .select2 {
        margin-right: 10px;
    }

    .select2-container--default .select2-selection--single {
        padding: 0px !important;
    }

    .select2-container .select2-selection--multiple {
        border-color: #007bff !important;
        background-color: #fff !important;
    }

    .select2-container .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff !important;
        color: #fff !important;
        border-color: #007bff !important;
    }

    .select2-container .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #80bdff !important;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>
@endsection


@section('page-js')
<script src="/js/xhr-helper.js"></script>
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Moment -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/bootstrap-hijridate/js/bootstrap-hijri-datetimepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        const form = $('#iaForm')[0]
        $("#iaCommercialRecordIssueDateHijri").hijriDatePicker({
            hijri: true
        });


        let pwd = true
        $('#togglepwd').click(function() {
            if (pwd) {
                pwd = false
                $('input[name="accountPassword"]').attr('type', 'text')
                $('#togglepwd span').removeClass("fa-eye")
                $('#togglepwd span').addClass("fa-eye-slash")
            } else {
                pwd = true
                $('input[name="accountPassword"]').attr('type', 'password')
                $('#togglepwd span').removeClass("fa-eye-slash")
                $('#togglepwd span').addClass("fa-eye")
            }
        })
    })
</script>
@endsection
