<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penjualan::all();

        return view('contents.penjualan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.penjualan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $kembalian_konsumen = $request->nominal_kembalian_konsumen;
        if($kembalian_konsumen == ''){
            Penjualan::create([
                'tanggal' => $request->tanggal,
                'nominal_penjualan' => $request->nominal_penjualan,
                'nominal_laba_rugi' => $request->nominal_laba_rugi,
                'nominal_modal_kasir' => $request->nominal_modal_kasir,
                'nominal_kembalian_konsumen' => 0,
            ]);
        }
        else{
            Penjualan::create([
                'tanggal' => $request->tanggal,
                'nominal_penjualan' => $request->nominal_penjualan,
                'nominal_laba_rugi' => $request->nominal_laba_rugi,
                'nominal_modal_kasir' => $request->nominal_modal_kasir,
                'nominal_kembalian_konsumen' => $kembalian_konsumen,
            ]);
        }
        
        
        return redirect()->route('penjualan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Penjualan::findOrFail($id);

        return view('contents.penjualan.edit', compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $id = $request->id;

        $kembalian_konsumen = $request->nominal_kembalian_konsumen;
        if($kembalian_konsumen == ''){
            Penjualan::findOrFail($id)->update([
                'tanggal' => $request->tanggal,
                'nominal_penjualan' => $request->nominal_penjualan,
                'nominal_laba_rugi' => $request->nominal_laba_rugi,
                'nominal_modal_kasir' => $request->nominal_modal_kasir,
                'nominal_kembalian_konsumen' => 0,
            ]);
        }
        else{
            Penjualan::findOrFail($id)->update([
                'tanggal' => $request->tanggal,
                'nominal_penjualan' => $request->nominal_penjualan,
                'nominal_laba_rugi' => $request->nominal_laba_rugi,
                'nominal_modal_kasir' => $request->nominal_modal_kasir,
                'nominal_kembalian_konsumen' => $kembalian_konsumen,
            ]);
        }
        
        
        return redirect()->route('penjualan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penjualan::findOrFail($id);
        $data->delete();
        
        return redirect()->back();
    }

    public function buatLaporan(Request $request){
        $start = $request->tanggal_mulai;
        $end = $request->tanggal_selesai;

        $allData = Penjualan::whereBetween('tanggal',[$start,$end])->orderBy('tanggal', 'ASC')->get();
        
        foreach($allData as $item){

            $jml[] = $item->nominal_penjualan - $item->nominal_laba_rugi + $item->nominal_modal_kasir - $item->nominal_kembalian_konsumen;
        }

        $jumlah = array_sum($jml);

        // dd($start, $end);
        return view('pdf.datapenjualan', compact('allData', 'start', 'end', 'jumlah'));
    }
}
