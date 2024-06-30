@extends('layouts.base')


@section('content')
    <div class="row">
        <!-- Company -->
        <div class="col-3 d-flex flex-column">
            <div class="small-box bg-info h-100">
                <div class="inner pb-4">
                    <h3 class="mb-0">{{ $jumlahDosen }}</h3>
                    <p>Jumlah Dosen</p>
                    <p class="mt-3"><br></p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-building"></i>
                </div>
                <a href="{{ route('admin.dosen') }}" class="small-box-footer pb-2">Manage <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Warehouses -->
        <div class="col-3 d-flex flex-column">
            <div class="small-box bg-success h-100">
                <div class="inner pb-4">
                    <h3 class="mb-0">{{ $getGaji }}</h3>
                    <p>Lihat Gaji Dosen</p>
                    <p class="mt-3"><br></p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-warehouse"></i>
                </div>
                <a href="{{ route('admin.gaji') }}" class="small-box-footer pb-2">Manage <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Inventories -->
        <div class="col-3 d-flex flex-column">
            <div class="small-box bg-warning h-100">
                <div class="inner pb-4">
                    <h3 class="mb-0">{{ $jumlahMahasiswa }}</h3>
                    <p>Jumlah Mahasiswa</p>
                    <p class="mt-3"><br></p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-location-arrow"></i>
                </div>
                <a href="{{ route('admin.mahasiswa') }}" class="small-box-footer pb-2">Manage <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Sensors -->
        {{-- <div class="col-3 d-flex flex-column">
        <div class="small-box bg-warning h-100">
            <div class="inner pb-3">
                <h3 class="mb-0">45</h3>
                <p>Sensors</p>
                <p class="mt-3" id="status-summary-device">Loading ...</p>
            </div>
            <div class="icon">
                <i class="fas fa-satellite-dish"></i>
            </div>
            <a href="" class="small-box-footer">Manage <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> --}}

        <!-- Health Check -->
        {{-- <div class="col-6 d-flex flex-column">
        <div class="card flex-grow-1">
            <div class="card-header">
                <h3 class="card-title">
                    Health Check
                </h3>
                <div class="card-tools">
                    <button class="btn btn-tool"><i class="fas fa-sync"></i></button>
                </div>
            </div>
            <div class="card-body" style="overflow-x: auto;">
                <table class="table">
                    <tr>
                        <td><i class="fab fa-watchman-monitoring mr-3"></i>Monitor Service</td>
                        <td>
                            <span class="badge badge-success" id="statusMon">Online</span>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="far fa-bell mr-3"></i> Alarm Service</td>
                        <td>
                            <span class="badge badge-success" id="statusAlarm">Online</span>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-briefcase mr-3"></i> Wasl Service</td>
                        <td>
                            <span class="badge badge-success" id="statusWasl">Online</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div> --}}

    </div>
@endsection

@section('page-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <style>
        .select2 {
            margin-right: 10px;
        }

        .select2-container--default .select2-selection--single {
            padding: 0px !important;
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
    <script></script>
@endsection
