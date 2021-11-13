<?php

namespace App\Http\Controllers;

use App\Models\dataInvestor;
use App\Models\dataPeternak;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function view($role,$hash) {
        if ($role === 'Investor') {
            $data_keep=dataInvestor::where('email',$hash)->get();
            foreach ($data_keep as $data_profil) {
            }
            return view('ProfilINV',['data_profil' => $data_profil]);
        }elseif ($role === 'Peternak') {
            $data_keep=dataPeternak::where('email',$hash)->get();
            foreach ($data_keep as $data_profil) {
            }
            return view('ProfilPET',['data_profil' => $data_profil]);
        }
    }
}
