<?php

namespace App\Http\Controllers;

use App\Models\ListingFee;
use Illuminate\Http\Request;

class ListingFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ListingFee::all();
        return view('contents.listingfee.index', compact('data'));
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
        ListingFee::updateOrCreate([
            'id' => $id
        ],[
            'tanggal' => $request->tanggal,
            'item' => $request->item,
            'nominal' => $request->nominal,
        ]
        );

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListingFee  $listingFee
     * @return \Illuminate\Http\Response
     */
    public function show(ListingFee $listingFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListingFee  $listingFee
     * @return \Illuminate\Http\Response
     */
    public function edit(ListingFee $listingFee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListingFee  $listingFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListingFee $listingFee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListingFee  $listingFee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ListingFee::findOrFail($id);
        $data->delete();
        
        return redirect()->back();
        
    }
}
