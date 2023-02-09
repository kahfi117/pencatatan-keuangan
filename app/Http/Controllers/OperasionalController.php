<?php

namespace App\Http\Controllers;

use App\Models\Operasional;
use Illuminate\Http\Request;

class OperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Operasional::all();
        return view('contents.operasional.index', compact('data'));
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
        Operasional::updateOrCreate([
            'id' => $id
        ],[
            'tanggal' => $request->tanggal,
            'item_name' => $request->item_name,
            'nominal' => $request->nominal
        ]
        );

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operasional  $operasional
     * @return \Illuminate\Http\Response
     */
    public function show(Operasional $operasional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operasional  $operasional
     * @return \Illuminate\Http\Response
     */
    public function edit(Operasional $operasional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operasional  $operasional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operasional $operasional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operasional  $operasional
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Operasional::findOrFail($id);
        $data->delete();
        
        return redirect()->back();
    }
}
