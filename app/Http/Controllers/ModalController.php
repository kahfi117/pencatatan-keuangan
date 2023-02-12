<?php

namespace App\Http\Controllers;

use App\Models\Modal;
use App\Models\Tenant;
use App\Models\Penjualan;
use App\Models\SumberNonCash;
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
        $sb = SumberNonCash::select(DB::raw('SUM(nominal_bni) as `bni`, SUM(nominal_mandiri) as `mandiri\ovo`'),   
                                    DB::raw('YEAR(tanggal) year, MONTH(tanggal) month'))
                                    ->groupby('year','month')
                                    ->get();
        
        $penjualan = Penjualan::select();
        
        foreach($sb as $sumber){
            $cek[] = $sumber->bni;
        }

        dd($cek, array_sum($cek));


        $data = Tenant::all();
        return view('contents.modal.index', compact('data'));
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
