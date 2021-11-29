<?php

namespace App\Http\Controllers;

use App\Models\dataBurung;
use App\Models\dataPeternak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatalogADMController extends Controller
{
    public function view($email){
        $burung = DB::table('data_burungs')
                    ->select('*')
                    ->get();
        return view('katalogADM',['email'=>$email,'burung'=>$burung]);
    }

    public function detail($email,$id){
        $burung = dataBurung::where('id',$id)->get();
        foreach ($burung as $burung) {
            # code...
        }
        $peternak = dataPeternak::where('id',$burung['id_peternak'])->get();
        foreach ($peternak as $peternak) {
            # code...
        }
        return view('katalogADMDetail',['email'=>$email,'data_burung'=>$burung,'peternak'=>$peternak]);
    }
}
