<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Jurnal</h3>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen->rpenelitian as $penelitian)
                            <tr>
                                <td>{{ $penelitian->judul_penelitian }}</td>
                                <td>{{ $penelitian->tahun_penelitian }}</td>
                                <td>{{ $penelitian->penerbit }}</td>
                                <td>{{ $penelitian->sinta }}</td>
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
