@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">{{ $dosen->user->name }}</h3>
                    <p class="text-muted text-center">{{ $dosen->gelar }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>NIDN</b> <a class="float-right">{{ $dosen->nidn }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>NIS</b> <a class="float-right">{{ $dosen->nis }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Alamat</b> <a class="float-right">{{ $dosen->alamat }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Prodi</b> <a class="float-right">{{ $dosen->prodi }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Jenjang</b> <a class="float-right">{{ $dosen->jenjang }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tahun Masuk</b> <a class="float-right">{{ $dosen->tahun_masuk }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Riwayat Jabatan Column -->
        <div class="col-md-8">
            @include('admin.dosen.new.pendidikan')


            @include('admin.dosen.new.jabatan_struktural')

            {{-- jabatan fungsional --}}
            @include('admin.dosen.new.jabatan_fungsional')
            {{-- end jabatan fungsional --}}

            {{-- penelitian luaran --}}
            @include('admin.dosen.new.penelitian_luaran')
            {{-- end penelitian luaran --}}

            {{-- jurnal --}}
            @include('admin.dosen.new.jurnal')
            {{-- end jurnal --}}




            <!-- Create/Edit Riwayat Penelitian Form -->
            <div class="card card-primary" id="edit-penelitian-form" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">Edit Riwayat Penelitian</h3>
                </div>
                <div class="card-body">
                    <form id="penelitian-form"
                        action="{{ route('dosen.profile.updatePenelitian', [$dosen->id, 'penelitianId']) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="judul_penelitian">Judul Penelitian</label>
                            <input type="text" class="form-control" id="judul_penelitian" name="judul_penelitian"
                                value="">
                        </div>
                        <div class="form-group">
                            <label for="tahun_penelitian">Tahun Penelitian</label>
                            <input type="text" class="form-control" id="tahun_penelitian" name="tahun_penelitian"
                                value="">
                        </div>
                        <div class="form-group">
                            <label for="bukti_penelitian">Bukti Penelitian</label>
                            <input type="text" class="form-control" id="bukti_penelitian" name="bukti_penelitian"
                                value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" onclick="hideEditPenelitianForm()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
