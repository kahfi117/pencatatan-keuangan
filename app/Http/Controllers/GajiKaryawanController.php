<?php

namespace App\Http\Controllers;

use App\Models\GajiKaryawan;
use Illuminate\Http\Request;

class GajiKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GajiKaryawan::all();

        return view('contents.gajikaryawan.index', compact('data'));
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
        GajiKaryawan::updateOrCreate([
            'id' => $id
        ],[
            'tanggal' => $request->tanggal,
            'karyawan_name' => $request->karyawan_name,
            'nominal' => $request->nominal
        ]
        );

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GajiKaryawan  $gajiKaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(GajiKaryawan $gajiKaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GajiKaryawan  $gajiKaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(GajiKaryawan $gajiKaryawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GajiKaryawan  $gajiKaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GajiKaryawan $gajiKaryawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GajiKaryawan  $gajiKaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = GajiKaryawan::findOrFail($id);
        $data->delete();
        
        return redirect()->back();
    }
}
