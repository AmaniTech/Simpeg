@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Riwayat Pendidikan</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('dosen.profile.rpendidikan', $dosen->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_institusi">Nama Institusi</label>
                        <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" value="{{ old('nama_institusi') }}" required>
                        @error('nama_institusi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenjang">Jenjang</label>
                        <select class="form-control" id="jenjang" name="jenjang" required>
                            <option value="">-- Pilih Jenjang Pendidikan --</option>
                            <option value="SD/MI">SD/MI</option>
                            <option value="SMP/MTS">SMP/MTS</option>
                            <option value="SMA/MA">SMA/MA</option>
                            <option value="SMU">SMU</option>
                            <option value="SMK">SMK</option>
                            <option value="DIPLOMA(D1/D2/D3/D4)">DIPLOMA (D1/D2/D3/D4)</option>
                            <option value="SARJANA(S1)">SARJANA (S1)</option>
                            <option value="MAGISTER(S2)">MAGISTER (S2)</option>
                            <option value="DOKTORAL(S3)">DOKTORAL (S3)</option>
                        </select>
                        @error('jenjang')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tahun_masuk">Tahun Masuk</label>
                        <input type="number" class="form-control year-picker" id="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk') }}" required>
                        @error('tahun_masuk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun_keluar">Tahun Keluar</label>
                        <input type="number" class="form-control year-picker" id="tahun_keluar" name="tahun_keluar" value="{{ old('tahun_keluar') }}" required>
                        @error('tahun_keluar')
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
