@extends('layouts.base')

@section('content')

<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Setting</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/set/setting">
                @csrf
                <div class="form-group">
                    <label for="a">Minimal SKS</label>
                    <input type="number" class="form-control" name="a" value="{{ $min_sks }}">
                </div>
                <div class="form-group">
                    <label for="b">Harga / SKS</label>
                    <input type="number" class="form-control" name="b" value="{{ $hargapersks }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
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


@endsection


