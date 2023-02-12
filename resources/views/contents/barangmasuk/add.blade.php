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
                    <div class="breadcrumb-item">Tambah Pemasukan Harian</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Buat Data Pemasukan Baru</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="distributir_name" class="col-sm-3 col-form-label">Nama Distributor</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="distributir_name" name="distributir_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="harga" name="harga">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type_bayar" class="col-sm-3 col-form-label">Type Pembayaran</label>
                                    <div class="col-sm-9">
                                        <select name="type_bayar" id="type_bayar" class="form-control">
                                            <option value="1">Cash</option>
                                            <option value="kredit">Kredit (If Credit Tambahkan Form Jumlah Bayar Awal)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row paid_kredit">
                                    <label for="harga" class="col-sm-3 col-form-label">Total Bayar Awal</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="paid_kredit" name="paid_kredit">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" data-height="150" placeholder="(Opsional)"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
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

    <script>
        $(document).('change', '#type_bayar', function(){
            var type_bayar = $(this).val();

            if (type_bayar == 'kredit') {
                $('.paid_kredit').show();
            }else{
                $('.paid_kredit').hide();
            }
        });
    </script>
    <!-- Page Specific JS File -->
@endpush
