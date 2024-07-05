<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Penelitian Luaran</h3>
        <button type="button" class="btn-create bg-warning" data-toggle="modal" data-target="#add-pen-luaran">
            Tambah
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($dosen->penelitian_luaran->isEmpty())
                <p>Tidak ada data.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Penelitian</th>
                            <th>Tanggal</th>
                            <th>Bukti Penelitian</th>
                            <th>Surat Tugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($dosen->penelitian_luaran as $ja)
                            <tr>
                                <td>{{ $ja->penelitian }}</td>
                                <td>{{ $ja->tanggal }}</td>
                                <td>
                                    @if ($ja->bukti_penelitian)
                                        <a href="{{ asset('storage/' . $ja->bukti_penelitian) }}" download><i
                                                class="fa fa-download"></i></a>
                                    @else
                                        Tidak ada sertifikat
                                    @endif
                                </td>
                                <td>
                                    @if ($ja->surat_tugas)
                                        <a href="{{ asset('storage/' . $ja->surat_tugas) }}" download><i
                                                class="fa fa-download"></i></a>
                                    @else
                                        Tidak ada sertifikat
                                    @endif
                                </td>
                                <td class="x-grid-cell-inner">
                                    <div class="row">
                                        <form action="/del/penluar/{{ $ja->id }}" method="POST">
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

        </div>

    </div>
</div>



{{-- modal add pendidikan --}}
<div class="modal fade" id="add-pen-luaran" tabindex="-1" aria-labelledby="add-pen-luaranLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-pen-luaranLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/add/penluar/{{$dosen->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="penelitian">Penelitian</label>
                                <input type="text" class="form-control" id="penelitian" name="penelitian">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="bukti_penelitian">Bukti Penelitian</label>
                                <input type="file" class="form-control" id="bukti_penelitian" name="bukti_penelitian"
                                    accept="application/pdf">
                            </div>
                            <div class="form-group">
                                <label for="surat_tugas">Surat Tugas</label>
                                <input type="file" class="form-control" id="surat_tugas" name="surat_tugas"
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
