<?php

namespace App\Http\Controllers;

use App\Models\dataBurung;
use App\Models\dataInvestor;
use App\Models\dataPeternak;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function getData($hash) {
        $ownerdata = dataPeternak::where('email',$hash)->get();
        foreach ($ownerdata as $ownerdata) {
        }
        $burung = dataBurung::where('id_peternak',$ownerdata['id'])->get();
        return view('katalogPET',['burung' => $burung,'dash_data' => $ownerdata]);
    }

}
