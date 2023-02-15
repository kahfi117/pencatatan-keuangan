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
                            <form action="{{route('bm.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_distributor" class="col-sm-3 col-form-label">Nama Distributor</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_distributor" name="nama_distributor" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="harga" name="harga" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">Type Pembayaran</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="Lunas">Cash</option>
                                            <option value="On Kredit">Kredit </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" id="paid_kredit" style="display: none">
                                    <label for="nominal_kredit" class="col-sm-3 col-form-label">Total Bayar Awal</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="nominal_kredit" name="nominal_kredit" placeholder="Tambahkan Jumlah Pembayaran Awal">
                                    </div>
                                </div>

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

    <script>
    $(document).on('change','#status', function(){
        var paid_status = $(this).val();
        if (paid_status == 'On Kredit') {
            $('#paid_kredit').show();
        }else{
            $('#paid_kredit').hide();
        }
    });
    </script>


    <!-- Page Specific JS File -->
@endpush
