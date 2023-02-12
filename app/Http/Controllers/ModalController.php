<?php

namespace App\Http\Controllers;

use App\Models\Modal;
use App\Models\Tenant;
use App\Models\Penjualan;
use App\Models\SumberNonCash;
use App\Models\GajiKaryawan;
use App\Models\Operasional;
use App\Models\ListingFee;
use Illuminate\Http\Request;
use DB;

class ModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sb = SumberNonCash::select(DB::raw('SUM(nominal_bni) as `bni`, SUM(nominal_mandiri) as `mandiri`'),
                                    DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
                                    ->groupby('year','month')
                                    ->orderBy('year','ASC')
                                    ->orderBy('month','ASC')
                                    ->get();

        $penjualan = Penjualan::select(DB::raw('SUM(nominal_penjualan) as penjualan, SUM(nominal_laba_rugi) as laba, SUM(nominal_modal_kasir) as kasir, SUM(nominal_kembalian_konsumen) as konsumen'),
                                        DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
                                        ->groupby('year', 'month')
                                        ->orderBy('month','ASC')
                                        ->orderBy('year','ASC')
                                        ->get();

                                        // dd($penjualan);

        $tenant = Tenant::select(DB::raw('SUM(nominal) as nominal'),
                                    DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
                                    ->groupby('year','month')
                                    ->orderBy('year','ASC')
                                    ->orderBy('month','ASC')
                                    ->get();

        $fee = ListingFee::select(DB::raw('SUM(nominal) as nominal'),
                                    DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
                                    ->groupby('year','month')
                                    ->orderBy('year','ASC')
                                    ->orderBy('month','ASC')
                                    ->get();


        $gaji = GajiKaryawan::select(DB::raw('SUM(nominal) as nominal'),
                                        DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
                                        ->groupby('year','month')
                                        ->orderBy('year','ASC')
                                        ->orderBy('month','ASC')
                                        ->get();

        $operasional = Operasional::select(DB::raw('SUM(nominal) as nominal'),
                                            DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
                                            ->groupby('year','month')
                                            ->orderBy('year','ASC')
                                            ->orderBy('month','ASC')
                                            ->get();

        foreach($sb as $sumber){
            $cek[] = $sumber->mandiri + $sumber->bni;
        }

        foreach($penjualan as $pj){
            $penj [] = $pj->penjualan - $pj->laba + $pj->kasir - $pj->konsumen;
        }

        foreach($tenant as $tn){
            $ten[] = $tn->nominal;
        }

        foreach($gaji as $gj){
            $gji[] = $gj->nominal;
        }

        foreach($operasional as $op){
            $oper[] = $op->nominal;
        }

        foreach($fee as $f){
            $lf[] = $f->nominal;
        }

        // Pemasukan
        $jumlah_tenant = array_sum($ten);
        $jumlah_cek = array_sum($cek);
        $jumlah_penj = array_sum($penj);
        $jumlah_fee = array_sum($lf);

        $kas_masuk = $jumlah_cek + $jumlah_penj + $jumlah_tenant + $jumlah_fee;

        // Pengeluaran
        $jumlah_gaji = array_sum($gji);
        $jumlah_operasional = array_sum($oper);

        $kas_keluar = $jumlah_tenant + $jumlah_gaji;



        $total = $kas_masuk - $kas_keluar;

        return view('contents.modal.index', compact('kas_masuk',
                                                    'kas_keluar',
                                                    'total',
                                                    'sb',
                                                    'penjualan',
                                                    'tenant',
                                                    'gaji',
                                                    'operasional',
                                                    'jumlah_penj',
                                                    'jumlah_cek',
                                                    'jumlah_fee',
                                                    'jumlah_tenant',
                                                    'jumlah_gaji',
                                                    'jumlah_operasional',
                                                    'fee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function show(Modal $modal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function edit(Modal $modal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modal $modal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modal $modal)
    {
        //
    }
}
