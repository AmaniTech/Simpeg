<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Jurnal</h3>
        <a href="{{ route('dosen.profile.createPenelitian', ['id' => $dosen->id]) }}"
            class="btn btn-primary bg-info btn-tool" id="btn-create">Tambah</a>
    </div>
    <div class="card-body">
        @if ($dosen->rpenelitian)
            @if ($dosen->rpenelitian->isEmpty())
                <p>Tidak ada riwayat jurnal yang tersedia.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tahun Terbit</th>
                            <th>Penerbit</th>
                            <th>Sinta</th>
                            <th style="width:100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen->rpenelitian as $penelitian)
                            <tr>
                                <td>{{ $penelitian->judul_penelitian }}</td>
                                <td>{{ $penelitian->tahun_penelitian }}</td>
                                <td>{{ $penelitian->penerbit }}</td>
                                <td>{{ $penelitian->sinta }}</td>
                                <td class="x-grid-cell-inner">
                                    <div class="row">
                                        <a href="{{ route('dosen.profile.editrpenelitian', ['id' => $dosen->id, 'penelitianId' => $penelitian->id]) }}"
                                            class="btn btn-sm btn-outline-warning mx-2" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                        <form
                                            action="{{ route('dosen.deletePenelitian', ['id' => $dosen->id, 'penelitianId' => $penelitian->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat penelitian ini?');">
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
            <p>Tidak ada riwayat jurnal yang tersedia.</p>
        @endif
    </div>
</div>
