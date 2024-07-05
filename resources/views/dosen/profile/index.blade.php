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
                            <b>Prodi</b> <a class="float-right">{{ $dosen->prodi }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Jenjang</b> <a class="float-right">{{ $dosen->jenjang }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tahun Masuk</b> <a class="float-right">{{ $dosen->tahun_masuk }}</a>
                        </li>
                    </ul>
                    <button class="btn btn-primary btn-block" onclick="showEditProfileForm()">Edit Profile</button>
                </div>
            </div>
        </div>

        <!-- Edit Profile Form -->
        <div class="col-md-4" id="edit-profile-form" style="display: none;">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <form action="{{ route('dosen.profile.update', $dosen->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" name="nidn"
                                value="{{ $dosen->nidn }}">
                        </div>
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis"
                                value="{{ $dosen->nis }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $dosen->user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $dosen->alamat }}">
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <input type="text" class="form-control" id="prodi" name="prodi"
                                value="{{ $dosen->prodi }}">
                        </div>
                        <div class="form-group">
                            <label for="jenjang">Jenjang</label>
                            <input type="text" class="form-control" id="jenjang" name="jenjang"
                                value="{{ $dosen->jenjang }}">
                        </div>
                        <div class="form-group">
                            <label for="gelar">Gelar</label>
                            <input type="text" class="form-control" id="gelar" name="gelar"
                                value="{{ $dosen->gelar }}">
                        </div>
                        <div class="form-group">
                            <label for="tahun_masuk">Tahun Masuk</label>
                            <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk"
                                value="{{ $dosen->tahun_masuk }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" onclick="hideEditProfileForm()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Riwayat Jabatan Column -->
        <div class="col-md-8">
            @include('dosen.profile.pendidikan')


            @include('dosen.profile.jabatan_struktural')

            {{-- jabatan fungsional --}}
            @include('dosen.profile.jabatan_fungsional')
            {{-- end jabatan fungsional --}}

            {{-- penelitian luaran --}}
            @include('dosen.profile.penelitian_luaran')
            {{-- end penelitian luaran --}}

            {{-- jurnal --}}
            @include('dosen.profile.jurnal')
            {{-- end jurnal --}}




            <!-- Create/Edit Riwayat Penelitian Form -->
            <div class="card card-primary" id="edit-penelitian-form" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">Edit Riwayat Penelitian</h3>
                </div>
                <div class="card-body">
                    <form id="penelitian-form"
                        action="{{ route('dosen.profile.updatePenelitian', [$dosen->id, 'penelitianId']) }}"
                        method="POST">
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
                        <button type="button" class="btn btn-secondary"
                            onclick="hideEditPenelitianForm()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showEditProfileForm() {
            document.getElementById('edit-profile-form').style.display = 'block';
        }

        function hideEditProfileForm() {
            document.getElementById('edit-profile-form').style.display = 'none';
        }


        function hideEditPenelitianForm() {
            document.getElementById('edit-penelitian-form').style.display = 'none';
        }
    </script>
@endsection
