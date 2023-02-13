<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;

use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(){
        $data = BarangMasuk::all();
        $data_lunas = BarangMasuk::where('status','=','Lunas')->get();
        $data_kredit = BarangMasuk::where('status','=','On Kredit')->get();

        $total = count($data);
        $total_lunas = count($data_lunas);
        $total_kredit = count($data_kredit);

        return view('contents.barangmasuk.index', compact('data', 'total', 'total_lunas', 'total_kredit'));
    }

    public function create(){
        return view('contents.barangmasuk.add');
    }

    public function store(Request $request){
        $id = $request->id;
        if ($request->nominal_kredit == '') {

            BarangMasuk::updateOrCreate([
                'id' => $id
            ],[
                'tanggal' => $request->tanggal,
                'nama_distributor' => $request->nama_distributor,
                'harga' => $request->harga,
                'nominal_cash' => $request->harga,
                'status' => $request->status,
                'nominal_kredit' => 0,
            ]);
        } else {
            $cash = $request->harga - $request->nominal_kredit;
            BarangMasuk::updateOrCreate([
                'id' => $id
            ],[
                'tanggal' => $request->tanggal,
                'nama_distributor' => $request->nama_distributor,
                'harga' => $request->harga,
                'nominal_cash' => $request->nominal_kredit,
                'status' => $request->status,
                'nominal_kredit' => $cash,
            ]);
        }
        return redirect()->route('bm.index');
    }

    public function barangKredit(){
        $data = BarangMasuk::where('status', '=', 'On Kredit')->get();
        return view('contents.barangmasuk.index_credit', compact('data'));
    }

    public function updateData(Request $request, $id){
        
        $lunas = $request->nominal_cash + $request->nominal_kredit; 
        BarangMasuk::findOrFail($id)->update([
            'nominal_cash' => $lunas,
            'nominal_kredit' => 0,
            'status' => 'Lunas'
        ]);

        return redirect()->route('bmk.index');

    }

    public function destroy($id){
        BarangMasuk::findOrFail($id)->delete();

        return redirect()->route('bm.index');

    }

}
