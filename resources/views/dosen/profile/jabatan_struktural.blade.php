<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Jabatan Struktural</h3>
        <a href="{{ route('dosen.profile.createJabatan', ['id' => $dosen->id]) }}"
            class="btn btn-primary bg-info btn-tool ml-auto">Tambah</a>
    </div>
    <div class="card-body">
        @if ($dosen->rjabatans)
            @if ($dosen->rjabatans->isEmpty())
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
                        @foreach ($dosen->rjabatans as $jabatan)
                            <tr>
                                <td>{{ $jabatan->nama_jabatan }}</td>
                                <td>{{ $jabatan->tahun_awal }}</td>
                                <td>{{ $jabatan->tahun_akhir }}</td>
                                <td class="x-grid-cell-inner">
                                    <div class="row">
                                        <a href="{{ route('dosen.profile.editJabatan', ['id' => $dosen->id, 'jabatanId' => $jabatan->id]) }}"
                                            class="btn btn-sm btn-outline-warning mx-2" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                        <form
                                            action="{{ route('dosen.deleteJabatan', ['id' => $dosen->id, 'jabatanId' => $jabatan->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat jabatan ini?');">
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
            <p>Tidak ada riwayat jabatan yang tersedia.</p>
        @endif
    </div>
</div>
