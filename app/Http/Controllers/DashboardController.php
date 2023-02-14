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

        $lunas = []; $harga = []; $kredit = [];
        $pjl_penjualan = []; $pjl_kembalian_konsumen = []; $pjl_modal_kasir = []; $pjl_laba_rugi = [];
        $lf = []; $cek = []; $ten = []; $gji = []; $oper = [];

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




        return view('contents.dashboard',compact('total_penjualan', 
        'total_barang_masuk', 'jumlah_lunas', 'jumlah_kredit', 
        'jumlah_sumber_non_cash', 'jumlah_fee', 'jumlah_tenant',
        'jumlah_tenant', 'jumlah_gaji', 'jumlah_operasional'));
    }
}
