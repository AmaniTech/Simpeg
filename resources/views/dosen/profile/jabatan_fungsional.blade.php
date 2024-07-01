<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Jabatan Fungsional</h3>
        <button type="button" class="btn-create bg-warning" data-toggle="modal" data-target="#add-jab-fungsional">
            Tambah
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($dosen->jabatan_fungsional->isEmpty())
                <p>Tidak ada data.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Jabatan</th>
                            <th>Kepangkatan</th>
                            <th>Golongan</th>
                            <th>Tanggal Sertifikasi</th>
                            <th>Sertifikat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($dosen->jabatan_fungsional as $j)
                            <tr>
                                <td>{{ $j->jabatan }}</td>
                                <td>{{ $j->kepangkatan }}</td>
                                <td>{{ $j->golongan }}</td>
                                <td>{{ $j->tgl_sertifikasi }}</td>
                                <td>
                                    @if ($j->sertifikat)
                                        <a href="{{ asset('storage/' . $j->sertifikat) }}" download><i
                                                class="fa fa-download"></i></a>
                                    @else
                                        Tidak ada sertifikat
                                    @endif
                                </td>
                                <td class="x-grid-cell-inner">
                                    <div class="row">
                                        <form action="" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat jabatan ini?');">
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                data-toggle="tooltip" title="Hapus"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>
</div>



{{-- modal add pendidikan --}}
<div class="modal fade" id="add-jab-fungsional" tabindex="-1" aria-labelledby="add-jab-fungsionalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-jab-fungsionalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/add/jbtfung/{{ $dosen->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="jabatan">Nama Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan">
                            </div>
                            <div class="form-group">
                                <label for="kepangkatan">Kepangkatan</label>
                                <input type="text" class="form-control" id="kepangkatan" name="kepangkatan">
                            </div>
                            <div class="form-group">
                                <label for="golongan">Golongan</label>
                                <input type="text" class="form-control" id="golongan" name="golongan">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tgl_sertifikasi">Tanggal Sertifikasi</label>
                                <input type="date" class="form-control" id="tgl_sertifikasi" name="tgl_sertifikasi">
                            </div>
                            <div class="form-group">
                                <label for="sertifikat">Sertifikat</label>
                                <input type="file" class="form-control" id="sertifikat" name="sertifikat"
                                    accept="application/pdf">
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- end modal add pendidikan --}}
