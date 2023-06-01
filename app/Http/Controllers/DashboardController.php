<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\BarangMasuk;
use App\Models\ListingFee;
use App\Models\GajiKaryawan;
use App\Models\Operasional;
use App\Models\SumberNonCash;
use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index(){
        $penjualan = Penjualan::all();

        $sb = SumberNonCash::all();

        $tenant = Tenant::all();

        $fee = ListingFee::all();

        $gaji = GajiKaryawan::all();

        $operasional = Operasional::all();

        $barang = BarangMasuk::all();

        $lunas = []; 
        $harga = []; 
        $kredit = [];
        $pjl_penjualan = []; 
        $pjl_kembalian_konsumen = []; 
        $pjl_modal_kasir = []; 
        $pjl_laba_rugi = [];
        $lf = []; 
        $cek = []; 
        $ten = []; 
        $gji = []; 
        $oper = [];

        foreach($barang as $bl){
            $lunas[] = $bl->nominal_cash;
            $harga[] = $bl->harga;
            $kredit[] = $bl->nominal_kredit;
        }
        

        $jumlah_lunas = array_sum($lunas);

        $jumlah_kredit = array_sum($kredit);

        $total_barang_masuk = array_sum($harga);

        foreach($penjualan as $pj){
            $pjl_penjualan[] = $pj->nominal_penjualan;
            $pjl_laba_rugi[] = $pj->nominal_laba_rugi;
            $pjl_kembalian_konsumen[] = $pj->nominal_kembalian_konsumen;
            $pjl_modal_kasir[] = $pj->nominal_modal_kasir;
        }

        foreach($sb as $sumber){
            $cek[] = $sumber->nominal_mandiri + $sumber->nominal_bni;
        }

        $jumlah_sumber_non_cash = array_sum($cek);

        foreach($tenant as $tn){
            $ten[] = $tn->nominal;
        }

        $jumlah_tenant = array_sum($ten);

        foreach($gaji as $gj){
            $gji[] = $gj->nominal;
        }

        $jumlah_gaji = array_sum($gji);

        foreach($operasional as $op){
            $oper[] = $op->nominal;
        }

        $jumlah_operasional = array_sum($oper);

        foreach($fee as $f){
            $lf[] = $f->nominal;
        }

        $jumlah_fee = array_sum($lf);


        $jumlah_penjualan = array_sum($pjl_penjualan);
        $jumlah_laba_rugi = array_sum($pjl_laba_rugi);
        $jumlah_kembalian_konsumen = array_sum($pjl_kembalian_konsumen);
        $jumlah_modal_kasir = array_sum($pjl_modal_kasir);

        $total_penjualan = $jumlah_penjualan + $jumlah_modal_kasir - $jumlah_kembalian_konsumen - $jumlah_laba_rugi;

        $chart_penjualan = Penjualan::selectRaw('Month(tanggal) as bulan, sum(nominal_penjualan - nominal_laba_rugi - nominal_kembalian_konsumen + nominal_modal_kasir) as total_penjualan')
                        ->groupBy('bulan')->get();

        $categories = [];
        $data = [];
        foreach ($chart_penjualan as $penjualan) {
            $bulan = date("F", mktime(0, 0, 0, $penjualan->bulan, 1));
            $categories[] = $bulan;
            $data[] = $penjualan->total_penjualan;
        }

        // Lainnya
        $chart_sewa_tenant = Tenant::selectRaw('Month(tanggal)as bulan, sum(nominal) as total_tenant')
                        ->groupBy('bulan')->get();
        $categories_tenant = [];
        $data_tenant = [];
        foreach ($chart_sewa_tenant as $sewa_tenant) {
            $bulan = date("F", mktime(0, 0, 0, $sewa_tenant->bulan, 1));
            $categories_tenant[] = $bulan;
            $data_tenant[] = $sewa_tenant->total_tenant;
        }

        $chart_gaji = GajiKaryawan::selectRaw('Month(tanggal)as bulan, sum(nominal) as total_gaji')
                        ->groupBy('bulan')->get();
        $categories_gaji = [];
        $data_gaji = [];
        foreach ($chart_gaji as $gaji) {
            $bulan = date("F", mktime(0, 0, 0, $gaji->bulan, 1));
            $categories_gaji[] = $bulan;
            $data_gaji[] = $gaji->total_gaji;
        }

        $chart_operasional = Operasional::selectRaw('Month(tanggal)as bulan, sum(nominal) as total_operasional')
                        ->groupBy('bulan')->get();
        $categories_operasional = [];
        $data_operasional = [];
        foreach ($chart_operasional as $operasional) {
            $bulan = date("F", mktime(0, 0, 0, $operasional->bulan, 1));
            $categories_operasional[] = $bulan;
            $data_operasional[] = $operasional->total_operasional;
        }
        $chart_listing = ListingFee::selectRaw('Month(tanggal)as bulan, sum(nominal) as total_listing')
                        ->groupBy('bulan')->get();
        $categories_listing = [];
        $data_listing = [];
        foreach ($chart_listing as $listing) {
            $bulan = date("F", mktime(0, 0, 0, $listing->bulan, 1));
            $categories_listing[] = $bulan;
            $data_listing[] = $listing->total_listing;
        }

        // dd(count($categories_listing), $categories_operasional);

        $categories_lainnya = [];

        if($categories >= $categories_gaji && $categories >= $categories_listing && $categories >= $categories_operasional){
            $categories_lainnya = $categories; 
        }elseif ($categories_gaji >= $categories && $categories_gaji >= $categories_listing && $categories_gaji >= $categories_operasional ){
            $categories_lainnya = $categories_gaji;
        }elseif ($categories_listing >= $categories && $categories_listing >= $categories_gaji && $categories_listing >= $categories_operasional ) {
            $categories_lainnya = $categories_listing;
        }elseif ($categories_operasional >= $categories && $categories_operasional >= $categories_gaji && $categories_operasional >= $categories_listing) {
            $categories_lainnya = $categories_operasional;
        }else{
            $categories_lainnya = [];
        }

        return view('contents.dashboard',compact('total_penjualan', 
        'total_barang_masuk', 'jumlah_lunas', 'jumlah_kredit', 
        'jumlah_sumber_non_cash', 'jumlah_fee', 'jumlah_tenant',
        'jumlah_tenant', 'jumlah_gaji', 'jumlah_operasional'))
        ->with('categories', json_encode($categories))
        ->with('data', json_encode($data))
        ->with('categories_lainnya', json_encode($categories_lainnya))
        ->with('data_tenant', json_encode($data_tenant))
        ->with('data_operasional', json_encode($data_operasional))
        ->with('data_listing', json_encode($data_listing))
        ->with('data_gaji', json_encode($data_gaji));
    }
}
