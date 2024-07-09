<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Penelitian Luaran</h3>
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


