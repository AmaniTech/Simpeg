<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Jabatan Struktural</h3>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen->rjabatans as $jabatan)
                            <tr>
                                <td>{{ $jabatan->nama_jabatan }}</td>
                                <td>{{ $jabatan->tahun_awal }}</td>
                                <td>{{ $jabatan->tahun_akhir }}</td>
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
