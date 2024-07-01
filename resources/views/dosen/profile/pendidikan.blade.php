<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Pendidikan</h3>
        <button type="button" class="btn-create bg-warning" data-toggle="modal" data-target="#add-pendidikan">
            Tambah
        </button>



    </div>
    <div class="card-body">
        @if ($dosen->rpendidikan)
            @if ($dosen->rpendidikan->isEmpty())
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
                        @foreach ($dosen->rpendidikan as $pendidikan)
                            <tr>
                                <td>{{ $pendidikan->nama_institusi }}</td>
                                <td>{{ $pendidikan->jenjang }}</td>
                                <td>{{ $pendidikan->tahun_masuk }}</td>
                                <td>{{ $pendidikan->tahun_keluar }}</td>
                                <td class="x-grid-cell-inner">
                                    <div class="row">
                                        <a href="{{ route('dosen.profile.editrpendidikan', ['id' => $dosen->id, 'pendidikanId' => $pendidikan->id]) }}"
                                            class="btn btn-sm btn-outline-warning mx-2" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                        <form
                                            action="{{ route('dosen.deletePendidikan', ['id' => $dosen->id, 'pendidikanId' => $pendidikan->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat pendidikan ini?');">
                                            @csrf
                                            @method('DELETE')
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
        @else
            <p>Tidak ada riwayat pendidikan yang tersedia.</p>
        @endif
    </div>
</div>



{{-- modal add pendidikan --}}
<div class="modal fade" id="add-pendidikan" tabindex="-1" aria-labelledby="add-pendidikanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-pendidikanLabel">Tambah Data Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/rpendidikan/{{ $dosen->id }}">
                    @csrf
                    <div class="form-group">
                        <label for="jenjang">Jenjang</label>
                        <input type="text" class="form-control" id="jenjang" name="jenjang">
                    </div>
                    <div class="form-group">
                        <label for="instansi">Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi">
                    </div>
                    <div class="form-group">
                        <label for="thn_masuk">Tahun Masuk</label>
                        <input type="number" class="form-control" id="thn_masuk" name="thn_masuk">
                    </div>
                    <div class="form-group">
                        <label for="thn_lulus">Tahun Lulus</label>
                        <input type="number" class="form-control" id="thn_lulus" name="thn_lulus">
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
