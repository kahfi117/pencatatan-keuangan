@extends('layouts.app')

@section('title', 'DataTables')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

    <link rel="stylesheet"
        href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Barang Masuk Dalam Kredit</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">Data Pembelian Barang Masuk</div>
                </div>
            </div>

            <div class="section-body">

                {{-- <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Transaksi</h4>
                                </div>
                                <div class="card-body">
                                    10
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Transaksi Selesai</h4>
                                </div>
                                <div class="card-body">
                                    1,201
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-circle"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Transaksi Berlangsung</h4>
                                </div>
                                <div class="card-body">
                                    47
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-striped table" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Tanggal</th>
                                        <th>Distributor</th>
                                        <th>Total Terbayar</th>
                                        <th>Total Utang</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                $no=1;
                                @endphp
                                <tbody>
                                @forelse ($data as $item)
                                <tr>
                                    <td>
                                        {{$no++}}
                                    </td>
                                    <td>{{$item->tanggal}}</td>
                                    <td>
                                        {{$item->nama_distributor}}
                                    </td>
                                    <td>Rp. {{number_format($item->nominal_cash,2,',','.')}}</td>
                                    <td>Rp. {{number_format($item->nominal_kredit,2,',','.')}}</td>
                                    <td>Rp. {{number_format($item->harga,2,',','.')}}</td>
                                    @if ($item->status == 'Lunas')
                                    <td>
                                        <div class="badge badge-success">Lunas</div>
                                    </td>
                                    @else
                                    <td>
                                        <div class="badge badge-warning">On Kredit</div>
                                    </td>
                                    @endif
                                    <td>
                                        {{-- <a href="#" class="btn btn-secondary">Detail</a> --}}
                                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalEdit_{{$item->id}}">Lunasi</button>
                                        {{-- <a href="#" class="btn btn-danger">Hapus</a> --}}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        NO DATA
                                    </td>
                                </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('contents.barangmasuk.modal')   
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset() }}"></script> --}}
    {{-- <script src="{{ asset() }}"></script> --}}
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
