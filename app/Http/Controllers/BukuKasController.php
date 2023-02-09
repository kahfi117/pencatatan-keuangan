<?php

namespace App\Http\Controllers;

use App\Models\BukuKas;
use App\Models\SumberPemasukan;
use App\Models\BukuKasDetail;
use Illuminate\Http\Request;

class BukuKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $buku_kas = BukuKas::all();
        $buku_kas = BukuKas::all();
        $sumber_pemasukan = SumberPemasukan::all();

        // dd($buku_kas->buku_kas_detailss);

        // $tes = $buku_kas;

        // dd($tes);
        return view('contents.bukukas.index', compact('sumber_pemasukan', 'buku_kas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sumber_pemasukan = SumberPemasukan::all();
        return view('contents.bukukas.add', compact('sumber_pemasukan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buku_kas = new BukuKas();
        $buku_kas_detail = new BukuKasDetail();

        $id = $request->id;
        $nominal = $request->nominal;

        $buku_kas->tanggal = $request->tanggal;
        $buku_kas->keterangan = $request->keterangan; 

        $buku_kas->save();

        $buku_kas_id = $buku_kas->id;

        for($i=0; $i < count($nominal); $i++){
            $data = [
                'sumber_pemasukan_id' => $id[$i],
                'nominal' => $nominal[$i],
            ];
            BukuKasDetail::create([
                'buku_kas_id' => $buku_kas_id,
                'sumber_pemasukan_id' => $id[$i],
                'nominal' => $nominal[$i],
            ]);
        
        } 
        


        return redirect()->route('buku-kas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BukuKas  $bukuKas
     * @return \Illuminate\Http\Response
     */
    public function show(BukuKas $bukuKas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BukuKas  $bukuKas
     * @return \Illuminate\Http\Response
     */
    public function edit(BukuKas $bukuKas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BukuKas  $bukuKas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BukuKas $bukuKas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BukuKas  $bukuKas
     * @return \Illuminate\Http\Response
     */
    public function destroy(BukuKas $bukuKas)
    {
        //
    }
}
