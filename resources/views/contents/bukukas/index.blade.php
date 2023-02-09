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
                                        <a class="btn btn-primary" href="{{route('buku-kas.create')}}">Tambah Data Pemasukan</a>
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
                                                @foreach ($sumber_pemasukan as $sp)
                                                    <th>
                                                        {{$sp->nama}}
                                                    </th>
                                                @endforeach
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
                                            @foreach ($buku_kas as $bks)
                                                
                                            <tr>
                                                <td>
                                                    {{$no++}} 
                                                </td>
                                                <td>{{$bks->tanggal}}</td>
                                                @foreach ($bks->buku_kas_detailss as $bk)
                                                <td class="text-right">
                                                    Rp. {{number_format($bk->nominal, 2,',','.')}}
                                                </td>
                                                @endforeach
                                                <td class="text-right">
                                                    Rp. 0.000.000,00
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" href="">Edit</a>
                                                    <a class="btn btn-danger" href="">Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
