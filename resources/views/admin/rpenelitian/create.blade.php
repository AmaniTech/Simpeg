@extends('layouts.base')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Tambah Riwayat Penelitian</div>

            <div class="card-body">
                <form method="POST" action="{{ route('dosen.storePenelitian', $dosen->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="judul_penelitian">Judul Penelitian</label>
                        <input type="text" class="form-control" id="judul_penelitian" name="judul_penelitian" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun_penelitian">Tahun Penelitian</label>
                        <input type="number" class="form-control" id="tahun_penelitian" name="tahun_penelitian" required>
                    </div>
                    <div class="form-group">
                        <label for="bukti_penelitian">Bukti Penelitian</label>
                        <input type="text" class="form-control" id="bukti_penelitian" name="bukti_penelitian">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
