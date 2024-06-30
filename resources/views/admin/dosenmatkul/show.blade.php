@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card demo-icons">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h5 class="card-title">Data {{ $dosen->nama ?? '' }}</h5>
            </div>
          </div>
          {{-- <p class="card-category">Daftar tunjangan dosen yang ada disetiap sekolah dibawah naungan
            <a href="/home">Yayasan Miftahul Huda</a>
          </p> --}}
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between flex-wrap mb-5">
            <div>
              <p class="description">
                <strong>Nama</strong>
                <br> {{ $dosen->nama ?? '-' }}
              </p>
            </div>
            
            <div>
              <p class="description">
                <strong></strong>
                {{-- <br> {{ separate($tunjangan->nilai) ?? '-' }} --}}
              </p>
            </div>
            <div>
              <p class="description">
                <strong></strong>
                {{-- <br> {{ $tunjangan->keterangan ?? '-' }} --}}
              </p>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <th style="width: 5%">No</th>
                <th style="width: 30%">Nama</th>
                <th style="width: 30%">Jumlah Sks</th>
                <th style="width: 30%">Bulan</th>
                <th style="width: 20%">Aksi</th>
              </thead>
              <tbody>
  
                @foreach($matkul as $value)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->matkul ?? '-' }}</td>
                  <td>{{ $value->jumlah_sks ?? '-' }}</td>
                  <td><span class="badge bg-gradient-success" style="color:aliceblue;">{{ $value->bulan ?? '-' }}</span></td>
                  <td>
                    {{-- <form action="{{ route('delete.hitung', $value->id) }}" method="post" onsubmit="return confirm('Hapus Matkul atas nama {{ $dosen->nama }}?');">
                      @csrf
                      @method('delete')
                      <input type="hidden" name="nilai" value="{{ $value->nilai }}">
                      <input type="hidden" name="tunjangan" value="{{ $value->nama }}">
                      <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip" title="Hapus">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form> --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('page-css')
<!-- DataTables -->
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
<!--  -->

<style>

</style>
@endsection

@section('page-js')



<script>
  

</script>

@endsection