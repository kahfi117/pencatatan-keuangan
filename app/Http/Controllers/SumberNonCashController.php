<?php

namespace App\Http\Controllers;

use App\Models\SumberNonCash;
use Illuminate\Http\Request;

class SumberNonCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SumberNonCash::all();

        return view('contents.nontunai.index', compact('data'));
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
        $id = $request->id;

        if($request->nominal_bni == '' && $request->nominal_mandiri == ''){
            SumberNonCash::updateOrCreate([
                'id' => $id
            ],[
                'tanggal' => $request->tanggal,
                'nominal_bni' => 0,
                'nominal_mandiri' => 0,
            ]
            );
        }
        elseif($request->nominal_bni == ''){
            SumberNonCash::updateOrCreate([
                'id' => $id
            ],[
                'tanggal' => $request->tanggal,
                'nominal_bni' => 0,
                'nominal_mandiri' => $request->nominal_mandiri,
            ]
            );
        }
        elseif($request->nominal_mandiri == ''){
            SumberNonCash::updateOrCreate([
                'id' => $id
            ],[
                'tanggal' => $request->tanggal,
                'nominal_bni' => $request->nominal_bni,
                'nominal_mandiri' => 0,
            ]
            );
        }
        else{
            SumberNonCash::updateOrCreate([
                'id' => $id
            ],[
                'tanggal' => $request->tanggal,
                'nominal_bni' => $request->nominal_bni,
                'nominal_mandiri' => $request->nominal_mandiri,
            ]
            );
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SumberNonCash  $sumberNonCash
     * @return \Illuminate\Http\Response
     */
    public function show(SumberNonCash $sumberNonCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SumberNonCash  $sumberNonCash
     * @return \Illuminate\Http\Response
     */
    public function edit(SumberNonCash $sumberNonCash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumberNonCash  $sumberNonCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SumberNonCash $sumberNonCash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumberNonCash  $sumberNonCash
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SumberNonCash::findOrFail($id);
        $data->delete();
        
        return redirect()->back();
    }
}
