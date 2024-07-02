<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Pendidikan</h3>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen->rpendidikan as $pendidikan)
                            <tr>
                                <td>{{ $pendidikan->nama_institusi }}</td>
                                <td>{{ $pendidikan->jenjang }}</td>
                                <td>{{ $pendidikan->tahun_masuk }}</td>
                                <td>{{ $pendidikan->tahun_keluar }}</td>
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
