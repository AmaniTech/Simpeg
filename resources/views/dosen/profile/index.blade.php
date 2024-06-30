@extends('layouts.base')

@section('content')
<div class="row">
    <!-- Profile Column -->
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center">{{ $dosen->nama }}</h3>
                <p class="text-muted text-center">{{ $dosen->gelar }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>NIP</b> <a class="float-right">{{ $dosen->nip }}</a>
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
                    <li class="list-group-item">
                        <b>Tahun Keluar</b> <a class="float-right">{{ $dosen->tahun_keluar }}</a>
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
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $dosen->nip }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $dosen->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $dosen->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $dosen->prodi }}">
                    </div>
                    <div class="form-group">
                        <label for="jenjang">Jenjang</label>
                        <input type="text" class="form-control" id="jenjang" name="jenjang" value="{{ $dosen->jenjang }}">
                    </div>
                    <div class="form-group">
                        <label for="gelar">Gelar</label>
                        <input type="text" class="form-control" id="gelar" name="gelar" value="{{ $dosen->gelar }}">
                    </div>
                    <div class="form-group">
                        <label for="tahun_masuk">Tahun Masuk</label>
                        <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" value="{{ $dosen->tahun_masuk }}">
                    </div>
                    <div class="form-group">
                        <label for="tahun_keluar">Tahun Keluar</label>
                        <input type="text" class="form-control" id="tahun_keluar" name="tahun_keluar" value="{{ $dosen->tahun_keluar }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" onclick="hideEditProfileForm()">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Riwayat Jabatan Column -->
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Riwayat Jabatan</h3>
                <a href="{{ route('dosen.profile.createJabatan',['id' => $dosen->id]) }}" class="btn btn-primary bg-info btn-tool ml-auto">Tambah Riwayat Jabatan</a>
            </div>
            <div class="card-body">
                @if($dosen->rjabatans)
                    @if($dosen->rjabatans->isEmpty())
                        <p>Tidak ada riwayat jabatan yang tersedia.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Jabatan</th>
                                    <th>Tahun Awal</th>
                                    <th>Tahun Akhir</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dosen->rjabatans as $jabatan)
                                    <tr>
                                        <td>{{ $jabatan->nama_jabatan }}</td>
                                        <td>{{ $jabatan->tahun_awal }}</td>
                                        <td>{{ $jabatan->tahun_akhir }}</td>
                                        <td class="x-grid-cell-inner">
                                            <div class="row">
                                                <a href="{{ route('dosen.profile.editJabatan', ['id' => $dosen->id, 'jabatanId' => $jabatan->id]) }}" class="btn btn-sm btn-outline-warning mx-2" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('dosen.deleteJabatan', ['id' => $dosen->id, 'jabatanId' => $jabatan->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat jabatan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @else
                    <p>Tidak ada riwayat jabatan yang tersedia.</p>
                @endif
            </div>
        </div>
        <!-- Riwayat Penelitian Column -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Riwayat Penelitian</h3>
                <a href="{{ route('dosen.profile.createPenelitian',['id' => $dosen->id]) }}" class="btn btn-primary bg-info btn-tool" id="btn-create">Tambah
                    Riwayat Penelitian</a>
            </div>
            <div class="card-body">
                @if($dosen->rpenelitian)
                    @if($dosen->rpenelitian->isEmpty())
                        <p>Tidak ada riwayat penelitian yang tersedia.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Judul Penelitian</th>
                                    <th>Tahun Penelitian</th>
                                    <th>Bukti Penelitian</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dosen->rpenelitian as $penelitian)
                                    <tr>
                                        <td>{{ $penelitian->judul_penelitian }}</td>
                                        <td>{{ $penelitian->tahun_penelitian }}</td>
                                        <td>{{ $penelitian->bukti_penelitian }}</td>
                                        <td class="x-grid-cell-inner">
                                            <div class="row">
                                                <a href="{{ route('dosen.profile.editrpenelitian', ['id' => $dosen->id, 'penelitianId' => $penelitian->id]) }}" class="btn btn-sm btn-outline-warning mx-2" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('dosen.deletePenelitian', ['id' => $dosen->id, 'penelitianId' => $penelitian->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat penelitian ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @else
                    <p>Tidak ada riwayat penelitian yang tersedia.</p>
                @endif
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Riwayat Pendidikan</h3>
                <a href="{{ route('dosen.profile.createPendidikan',['id' => $dosen->id]) }}" class="btn btn-primary bg-info btn-tool" id="btn-create">Tambah
                    Riwayat Pendidikan</a>
            </div>
            <div class="card-body">
                @if($dosen->rpendidikan)
                    @if($dosen->rpendidikan->isEmpty())
                        <p>Tidak ada riwayat pendidikan yang tersedia.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Institusi</th>
                                    <th>Jenjang</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Keluar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dosen->rpendidikan as $pendidikan)
                                    <tr>
                                        <td>{{ $pendidikan->nama_institusi }}</td>
                                        <td>{{ $pendidikan->jenjang }}</td>
                                        <td>{{ $pendidikan->tahun_masuk }}</td>
                                        <td>{{ $pendidikan->tahun_keluar }}</td>
                                        <td class="x-grid-cell-inner">
                                            <div class="row">
                                                <a href="{{ route('dosen.profile.editrpendidikan', ['id' => $dosen->id, 'pendidikanId' => $pendidikan->id]) }}" class="btn btn-sm btn-outline-warning mx-2" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('dosen.deletePendidikan', ['id' => $dosen->id, 'pendidikanId' => $pendidikan->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat pendidikan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @else
                    <p>Tidak ada riwayat pendidikan yang tersedia.</p>
                @endif
            </div>
        </div>

        <!-- Create/Edit Riwayat Penelitian Form -->
        <div class="card card-primary" id="edit-penelitian-form" style="display: none;">
            <div class="card-header">
                <h3 class="card-title">Edit Riwayat Penelitian</h3>
            </div>
            <div class="card-body">
                <form id="penelitian-form" action="{{ route('dosen.profile.updatePenelitian', [$dosen->id, 'penelitianId']) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="judul_penelitian">Judul Penelitian</label>
                        <input type="text" class="form-control" id="judul_penelitian" name="judul_penelitian" value="">
                    </div>
                    <div class="form-group">
                        <label for="tahun_penelitian">Tahun Penelitian</label>
                        <input type="text" class="form-control" id="tahun_penelitian" name="tahun_penelitian" value="">
                    </div>
                    <div class="form-group">
                        <label for="bukti_penelitian">Bukti Penelitian</label>
                        <input type="text" class="form-control" id="bukti_penelitian" name="bukti_penelitian" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" onclick="hideEditPenelitianForm()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to show/hide forms -->
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
