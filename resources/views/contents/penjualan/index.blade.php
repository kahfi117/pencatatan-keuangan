@extends('layouts.app')

@section('title', 'DataTables')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{asset('library/datatables/datatables.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('library/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('library/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

    <link rel="stylesheet"
        href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Pemasukan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Pemasukan</div>
                </div>
            </div>

            <div class="section-body">
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <h4>Data Pemasukan</h4>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6 text-right">
                                        <a class="btn btn-primary text-center" href="{{route('penjualan.create')}}">Tambah Data Penjualan</a>
                                        <button class="btn btn-secondary text-center" type="button" data-toggle="modal" data-target="#modal_laporan">Buat Laporan</button>
                                    </div>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table"
                                        id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Tanggal</th>
                                                <th>Penjualan</th>
                                                <th>Laba Rugi</th>
                                                <th>Modal Kasir</th>
                                                <th>Kembalian Konsumen</th>
                                                <th>
                                                    Total
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1;
                                        @endphp
                                        <tbody>
                                            @forelse ($data as $item)
                                                
                                            <tr>
                                                <td>
                                                    {{$no++}} 
                                                </td>
                                                <td>{{date('d F Y',strtotime($item->tanggal))}}</td>
                                                <td class="text-right">
                                                    Rp.{{ number_format($item->nominal_penjualan, 2,',','.')}}
                                                </td>
                                                <td class="text-right">
                                                    Rp.{{number_format($item->nominal_laba_rugi, 2,',','.')}}
                                                </td>
                                                <td class="text-right">
                                                    Rp.{{number_format($item->nominal_modal_kasir, 2,',','.')}}
                                                </td>
                                                <td class="text-right">
                                                    Rp.{{number_format($item->nominal_kembalian_konsumen, 2,',','.')}}
                                                </td>

                                                <td class="text-right">
                                                   Rp.{{number_format($item->nominal_penjualan - $item->nominal_laba_rugi + $item->nominal_modal_kasir - $item->nominal_kembalian_konsumen, 2,',','.')}}
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route('penjualan.edit', $item->id)}}">Edit</a>
                                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalDelete_{{$item->id}}">Hapus</button>
                                                </td>
                                            </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">NO DATA</td>
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
        @include('contents.penjualan.modal')
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
