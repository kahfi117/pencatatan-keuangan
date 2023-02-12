<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index(){
        $penjualan = Penjualan::all();

        foreach($penjualan as $pj){
            $pjl_penjualan[] = $pj->nominal_penjualan;
            $pjl_laba_rugi[] = $pj->nominal_laba_rugi;
            $pjl_kembalian_konsumen[] = $pj->nominal_kembalian_konsumen;
            $pjl_modal_kasir[] = $pj->nominal_modal_kasir;
        }
        $jumlah_penjualan =array_sum($pjl_penjualan);
        $jumlah_laba_rugi =array_sum($pjl_laba_rugi);
        $jumlah_kembalian_konsumen =array_sum($pjl_kembalian_konsumen);
        $jumlah_modal_kasir =array_sum($pjl_modal_kasir);

        $total_penjualan = $jumlah_penjualan + $jumlah_modal_kasir - $jumlah_kembalian_konsumen - $jumlah_laba_rugi;


        return view('contents.dashboard',compact('total_penjualan'));
    }
}
