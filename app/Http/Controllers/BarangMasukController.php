<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(){
        return view('contents.barangmasuk.index');
    }

    public function create(){
        return view('contents.barangmasuk.add');
    }

    public function store(Request $request){
    
    }
    
    public function barangKredit(){
        return view('contents.barangmasuk.index_credit');
    }

}
