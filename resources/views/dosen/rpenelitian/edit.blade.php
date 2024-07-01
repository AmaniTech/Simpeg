<!-- resources/views/dosen/rpenelitian/edit.blade.php -->

@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Riwayat Penelitian</h3>
        </div>
        <div class="card-body">
            <form method="POST"
                action="{{ route('dosen.profile.updatePenelitian', ['id' => $dosen->id, 'penelitianId' => $penelitian->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="judul_penelitian">Judul</label>
                    <input type="text" class="form-control" id="judul_penelitian" name="judul_penelitian"
                        value="{{ $penelitian->judul_penelitian }}" required>
                    @error('judul_penelitian')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun_penelitian">Tahun Terbit</label>
                    <input type="number" class="form-control year-picker" id="tahun_penelitian" name="tahun_penelitian"
                        value="{{ $penelitian->tahun_penelitian }}" required>
                    @error('tahun_penelitian')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control year-picker" id="penerbit" name="penerbit"
                        value="{{ $penelitian->penerbit }}" required>
                    @error('penerbit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sinta">Status Sinta</label>
                    <input type="text" class="form-control year-picker" id="sinta" name="sinta"
                        value="{{ $penelitian->sinta }}" required>
                    @error('sinta')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link"
                        value="{{ $penelitian->bukti_penelitian }}">
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('dosen.profile', ['id' => $dosen->id]) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
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
            // Tambahkan skrip JavaScript khusus jika diperlukan
        });
    </script>
@endsection
