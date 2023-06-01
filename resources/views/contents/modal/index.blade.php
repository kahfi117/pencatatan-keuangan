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
                <h1>Modal</h1>
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
                                    <h4>Jumlah Kas</h4>
                                </div>
                                <div class="card-body">
                                    Rp. {{number_format($total,2,',','.')}}
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
                                    <h4>Kas Masuk</h4>
                                </div>
                                <div class="card-body">
                                    Rp. {{number_format($kas_masuk,2,',','.')}}
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
                                    <h4>Kas Keluar</h4>
                                </div>
                                <div class="card-body">
                                    Rp. {{number_format($kas_keluar,2,',','.')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 style="color:#6777ef">DATA KAS MASUK</h2>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <h5>Data Penjualan Bulanan</h5><br>
                                        <div class="table-responsive">
                                            <table class="table-striped table" id="table-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                @foreach ($penjualan as $pj)
                                                <tr>
                                                    <td class="text-center">
                                                        {{$no++}}
                                                    </td>
                                                    <td class="text-right">
                                                        {{$pj->month}}-{{$pj->year}}
                                                    </td>
                                                    <td class="text-right">Rp.{{number_format($pj->penjualan - $pj->laba + $pj->kasir - $pj->konsumen, 2,',','.')}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Total
                                                        </b>
                                                    </td>
                                                    <td colspan="2" class="text-right">
                                                    Rp.{{number_format($jumlah_penj,2,',','.')}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-6 text-center">
                                        <h5>Data Sumber Non Cash</h5><br>
                                        <div class="table-responsive">
                                            <table class="table-striped table" id="table-3">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                @foreach ($sb as $sumber)
                                                <tr>
                                                    <td class="text-center">
                                                        {{$no++}}
                                                    </td>
                                                    <td class="text-right">
                                                        {{$sumber->month}}-{{$sumber->year}}
                                                    </td>
                                                    <td class="text-right">Rp.{{number_format($sumber->mandiri + $sumber->bni, 2,',','.')}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Total
                                                        </b>
                                                    </td>
                                                    <td colspan="2" class="text-right">
                                                    Rp.{{number_format($jumlah_cek,2,',','.')}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-6 text-center">
                                        <h5>Data Listing Fee</h5><br>
                                        <div class="table-responsive">
                                            <table class="table-striped table" id="table-3">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                @foreach ($fee as $f)
                                                <tr>
                                                    <td class="text-center">
                                                        {{$no++}}
                                                    </td>
                                                    <td class="text-right">
                                                        {{$f->month}}-{{$f->year}}
                                                    </td>
                                                    <td class="text-right">Rp.{{number_format($f->nominal, 2,',','.')}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Total
                                                        </b>
                                                    </td>
                                                    <td colspan="2" class="text-right">
                                                    Rp.{{number_format($jumlah_fee,2,',','.')}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-6 text-center">
                                        <h5>Data Sewa Tenant</h5><br>
                                        <div class="table-responsive">
                                            <table class="table-striped table" id="table-3">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                @foreach ($tenant as $tn)
                                                <tr>
                                                    <td class="text-center">
                                                        {{$no++}}
                                                    </td>
                                                    <td class="text-right">
                                                        {{$tn->month}}-{{$tn->year}}
                                                    </td>
                                                    <td class="text-right">Rp.{{number_format($tn->nominal, 2,',','.')}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Total
                                                        </b>
                                                    </td>
                                                    <td colspan="2" class="text-right">
                                                    Rp.{{number_format($jumlah_tenant,2,',','.')}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 style="color:#6777ef">DATA KAS KELUAR</h2>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <h5>Data Gaji Karyawan</h5><br>
                                        <div class="table-responsive">
                                            <table class="table-striped table" id="table-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                @foreach ($gaji as $gj)
                                                <tr>
                                                    <td class="text-center">
                                                        {{$no++}}
                                                    </td>
                                                    <td class="text-right">
                                                        {{$gj->month}}-{{$gj->year}}
                                                    </td>
                                                    <td class="text-right">Rp.{{number_format($gj->nominal, 2,',','.')}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Total
                                                        </b>
                                                    </td>
                                                    <td colspan="2" class="text-right">
                                                    Rp.{{number_format($jumlah_gaji,2,',','.')}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-6 text-center">
                                        <h5>Data Operasional</h5><br>
                                        <div class="table-responsive">
                                            <table class="table-striped table" id="table-3">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                @foreach ($operasional as $op)
                                                <tr>
                                                    <td class="text-center">
                                                        {{$no++}}
                                                    </td>
                                                    <td class="text-right">
                                                        {{$op->month}}-{{$op->year}}
                                                    </td>
                                                    <td class="text-right">Rp.{{number_format($op->nominal, 2,',','.')}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Total
                                                        </b>
                                                    </td>
                                                    <td colspan="2" class="text-right">
                                                    Rp.{{number_format($jumlah_operasional,2,',','.')}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th class="text-right">Bulan</th>
                                                        <th class="text-right">Nominal</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
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
