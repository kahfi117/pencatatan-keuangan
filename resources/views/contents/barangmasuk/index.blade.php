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
                <h1>Barang Masuk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">Data Pembelian Barang Masuk</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
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
                                    {{$total}}
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
                                    {{$total_lunas}}
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
                                    {{$total_kredit}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h4>Data Pembelian Barang Masuk</h4>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 text-right">
                                    <a class="btn btn-primary" href="{{route('bm.create')}}">Tambah Data</a>
                                </div>
                            </div>

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
                                                <th class="text-right">Harga</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-right">Action</th>
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
                                            <td>{{date('d F Y',strtotime($item->tanggal))}}</td>
                                            <td>
                                                {{$item->nama_distributor}}
                                            </td>
                                            <td class="text-right">Rp. {{number_format($item->harga)}}</td>
                                            @if ($item->status == 'Lunas')
                                            <td class="text-center">
                                                <div class="badge badge-success">Lunas</div>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <div class="badge badge-warning">On Kredit</div>
                                            </td>
                                            @endif
                                            <td class="text-right">
                                                {{-- <a href="#" class="btn btn-secondary">Detail</a> --}}
                                                {{-- <a href="#" class="btn btn-info">Update</a> --}}
                                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalLihat_{{$item->id}}">Bukti Bayar</button>
                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalDelete_{{$item->id}}">Hapus</button>

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
