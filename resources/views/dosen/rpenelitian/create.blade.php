@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Jurnal</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dosen.profile.rpenelitian', $dosen->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="judul_penelitian">Judul</label>
                            <input type="text" class="form-control" id="judul_penelitian" name="judul_penelitian"
                                value="{{ old('judul_penelitian') }}" required>
                            @error('judul_penelitian')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis"
                                value="{{ old('penulis') }}" required>
                            @error('penulis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="peran_penulis">Peran Penulis</label>
                            <select class="form-control" id="peran_penulis" name="peran_penulis">
                            <option value="Penulis Pertama">Penulis Pertama</option>
                            <option value="Anggota">Anggota</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_penelitian">Tahun Terbit</label>
                            <input type="number" class="form-control year-picker" id="tahun_penelitian"
                                name="tahun_penelitian" value="{{ old('tahun_penelitian') }}" required>
                            @error('tahun_penelitian')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control year-picker" id="penerbit" name="penerbit"
                                value="{{ old('penerbit') }}" required>
                            @error('penerbit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sinta">Status Sinta (ex. Sinta 3)</label>
                            <input type="text" class="form-control year-picker" id="sinta" name="sinta"
                                value="{{ old('sinta') }}" required>
                            @error('sinta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bukti_penelitian">Link</label>
                            <input type="text" class="form-control" id="bukti_penelitian" name="bukti_penelitian"
                                value="{{ old('bukti_penelitian') }}">
                            @error('bukti_penelitian')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('dosen.profile', $dosen->id) }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
