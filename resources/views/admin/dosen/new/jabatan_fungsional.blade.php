<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Jabatan Fungsional</h3>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>
</div>
