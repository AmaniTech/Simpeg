@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Gaji Saya</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">List Gaji</h3>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive" id="dt-container" style="overflow-x: auto;">
                        <table id="dt" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="30">No</th>
                                    <th>Nama Dosen</th>
                                    <th>Total Mengajar</th>
                                    <th>Total SKS</th>
                                    <th>Total Gaji</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($gaji as $key => $value)
                                    <tr>
                                        <td class="x-grid-cell-inner">{{ $key + 1 }}</td>
                                        <td class="x-grid-cell-inner">{{ $dosen->nama ?? '-' }}</td>
                                        <td class="x-grid-cell-inner">{{ $value->total_ngajar ?? '-' }}</td>
                                        <td class="x-grid-cell-inner">{{ $totalSks ?? '-' }}</td>
                                        <td class="x-grid-cell-inner">Rp.
                                            {{ number_format($value->honor_sks, 0, ',', '.') ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada data gaji</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">

    <style>
        .select2-wrap {
            border-radius: 4px;
            padding: 0 5px;
            width: 200px;
            background-color: #fff;
            position: relative;
        }

        .select2-wrap label {
            font-size: 10px;
            text-transform: uppercase;
            color: #777;
            padding: 0 8px;
            position: absolute;
            padding-left: 12px !important;
            top: 6px;
            z-index: 2;
        }

        .centered {
            text-align: center;
        }

        .spinner.loading {
            display: none;
            padding: 50px;
            text-align: center;
        }

        .loading-text {
            width: 90px;
            position: absolute;
            top: calc(50% - 25px);
            font-weight: 600;
            left: calc(50% - 57px);
            text-align: center;
            color: #f3f3f3;
        }

        .spinner.loading:before {
            content: "";
            height: 90px;
            width: 90px;
            margin: -15px auto auto -15px;
            position: absolute;
            top: calc(50% - 45px);
            left: calc(50% - 45px);
            border-width: 8px;
            border-style: solid;
            border-color: #2180c0 #ccc #ccc;
            border-radius: 100%;
            animation: rotation .7s infinite linear;
        }

        @keyframes rotation {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(359deg);
            }
        }

        .select2 {
            margin-right: 10px;
        }

        .select2-container--default .select2-selection--single {
            padding: 5px !important;
            padding-top: 18px !important;
            height: 3.0rem;
        }

        .loading {
            z-index: 20;
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .loading-content {
            position: absolute;
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            top: 40%;
            left: 50%;
            margin-left: -4em;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .modal-header {
            border-bottom: 0 none;
            padding: 1rem;
        }

        .modal-footer {
            border-top: 0 none;
        }

        .error-template {
            text-align: center;
        }

        .modal-dialog {
            justify-content: center !important;
        }

        .mamaba {
            padding-left: 30px;
        }

        .modal-content {
            width: initial !important;
        }
    </style>
@endsection

@section('page-js')
    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <script src="/js/xhr-helper.js"></script>

    <script>
        $(document).ready(function() {
            $('#dt').DataTable();
        });
    </script>
@endsection






{{-- <!-- resources/views/gaji/index.blade.php -->

@extends('layouts.base')

@section('content')
<div class="container">
    <h2>Gaji Dosen: {{ $user->name }}</h2>

    @if ($gajis->isEmpty())
        <p>Belum ada informasi gaji yang tersedia.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Total Ngajar</th>
                    <th>Minimal Mengajar</th>
                    <th>Jumlah Minggu</th>
                    <th>Honor SKS</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gajis as $gaji)
                    <tr>
                        <td>{{ $gaji->total_ngajar }}</td>
                        <td>{{ $gaji->minimal_mengajar }}</td>
                        <td>{{ $gaji->jumlah_minggu }}</td>
                        <td>{{ $gaji->honor_sks }}</td>
                        <td>{{ $gaji->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection --}}
