@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">List</h3>
                    <div class="card-tools">
                        {{-- {{ route('mahasiswa.create') }} --}}
                        <a href="{{ route('users.create') }}" class="btn btn-primary bg-info btn-tool" id="btn-create">Tambah
                            User</a>
                    </div>
                </div>
                <section id="loading">
                    <div class="centered">
                        <div id="divSpinner" class="spinner loading">
                            <div class="loading-text">Loading ...</div>
                        </div>
                    </div>
                </section>

                <div class="card-body p-2">
                    <div class="table-responsive" id="dt-container" style="overflow-x: auto;">
                        <table id="dt" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="30">No</th>
                                    <th>NAME</th>
                                    <th>USERNAME</th>
                                    <th>PHONE</th>
                                    <th>EMAIL</th>
                                    <th>ROLE</th>
                                    <th>STATUS</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $value)
                                    <tr>
                                        <td class="x-grid-cell-inner">{{ $key + 1 }}</td>
                                        <td class="x-grid-cell-inner">{{ $value->name ?? '-' }}</td>
                                        <td class="x-grid-cell-inner">{{ $value->username ?? '-' }}</td>
                                        <td class="x-grid-cell-inner">{{ $value->phone ?? '-' }}</td>
                                        <td class="x-grid-cell-inner">{{ $value->email ?? '-' }}</td>
                                        <td class="x-grid-cell-inner">{{ $value->role ?? '-' }}</td>
                                        <td class="x-grid-cell-inner">{{ $value->status ?? '-' }}</td>
                                        <td class="x-grid-cell-inner">
                                            <div class="row">
                                                <a href="{{ route('users.edits', $value->id) }}"
                                                    class="btn btn-sm btn-outline-warning mx-2" data-toggle="tooltip"
                                                    title="Edit"><i class="fa fa-edit"></i></a>
                                                <form method="post"
                                                    onsubmit="return confirm('Hapus Data atas nama {{ $value->nama }}?');"
                                                    action="{{ route('users.delete', $value->id) }}">
                                                    @csrf
                                                    @method('delete')
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
                    </div>

                </div>
            </div>
        </div>
        <div class="row">

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
    <!--  -->

    <style>
        .select2-wrap {
            /* border: 1px solid #777; */
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

        /* div.dataTables_processing { z-index: 1; } */
        .select2-container--default .select2-selection--single {
            padding: 5px !important;
            padding-top: 18px !important;
            height: 3.0rem;
        }

        /* ======NOT USE===== */
        .loading {
            z-index: 20;
            position: absolute;
            top: 0;
            /* left:-5px; */
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .loading-content {
            position: absolute;
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
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

        /* ============== */
    </style>
@endsection

@section('page-js')
    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- <script src="/plugins/datatables/jquery.mockjax.min.js"></script> -->
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <script src="/js/xhr-helper.js"></script>

    <script></script>
@endsection
