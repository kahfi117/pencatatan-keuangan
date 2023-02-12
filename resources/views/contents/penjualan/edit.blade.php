@extends('layouts.app')

@section('title', 'Form')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                    <div class="breadcrumb-item">Tambah Pemasukan Harian EDIT</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Buat Data Pemasukan Baru</h4>
                            </div>
                            <form action="{{route('penjualan.update', $data->id)}}" method="post">
                                @csrf
                                @method("PUT")
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" value="{{$data->id}}">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$data->tanggal}}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="penjualan" class="col-sm-3 col-form-label">Penjualan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control uang" value="{{$data->nominal_penjualan}}" id="penjualan" name="nominal_penjualan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="laba_rugi" class="col-sm-3 col-form-label">Laba Rugi</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control uang" value="{{$data->nominal_laba_rugi}}" id="laba_rugi" name="nominal_laba_rugi" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="modal_kasir" class="col-sm-3 col-form-label">Modal Kasir</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control uang" id="modal_kasir" value="{{$data->nominal_modal_kasir}}" name="nominal_modal_kasir" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kembalian_konsumen" class="col-sm-3 col-form-label">Kembalian Konsumen</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control uang" id="kembalian_konsumen" value="{{$data->nominal_kembalian_konsumen}}" name="nominal_kembalian_konsumen">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" data-height="150" placeholder="(Opsional)" name="keterangan"></textarea>
                                    </div>
                                </div> --}}
                                
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script type="text/javascript">
        $(document).ready(function(){

            // Format mata uang.
            $( '.uang' ).mask('000.000.000', {reverse: true});

        })
    </script>

    <!-- Page Specific JS File -->
@endpush
