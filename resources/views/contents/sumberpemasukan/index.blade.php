@extends('layouts.app')

@section('title', 'Form')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sumber Pemasukan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{url('dashboard-general-dashboard')}}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ url('buku-kas') }}">Buku Kas</a></div>
                    <div class="breadcrumb-item">Sumber Pemasukan</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <h4>Daftar Data Sumber Pemasukan</h4>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th>No</th>
                                                <th>Sumber Pemasukan</th>
                                                <th>Keterangan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <?php $no=1 ?>
                                        <tbody>
                                            @forelse ($data as $item)

                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>
                                                    {{$item->nama}}
                                                </td>
                                                <td>
                                                    {{$item->keterangan}}
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalEdit_{{$item->id}}">Edit</button>
                                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalDelete_{{$item->id}}">Hapus</button>
                                                </td>
                                                
                                            </tr>
                                                
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center">NO DATA</td>
                                            </tr>
                                                
                                            @endforelse
                                    
                                            

                                        </tbody>
                                        <tfoot>
                                            <tr class="table-secondary">
                                                <th>No</th>
                                                <th>Sumber Pemasukan</th>
                                                <th>Keterangan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </tfoot>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('contents.sumberpemasukan.modal')
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>

    {{-- <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script> --}}
@endpush
