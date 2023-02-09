<?php

namespace App\Http\Controllers;

use App\Models\SumberPemasukan;
use Illuminate\Http\Request;

class SumberPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SumberPemasukan::all();
        return view('contents.sumberpemasukan.index', compact('data'));
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
        SumberPemasukan::updateOrCreate([
            'id' => $id
        ],[
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]
        );

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SumberPemasukan  $sumberPemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(SumberPemasukan $sumberPemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SumberPemasukan  $sumberPemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(SumberPemasukan $sumberPemasukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumberPemasukan  $sumberPemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SumberPemasukan $sumberPemasukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumberPemasukan  $sumberPemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SumberPemasukan::findOrFail($id);
        $data->delete();
        
        return redirect()->back();
    }
}
