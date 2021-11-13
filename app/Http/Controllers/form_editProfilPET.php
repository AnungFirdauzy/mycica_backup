<?php

namespace App\Http\Controllers;

use App\Models\dataPeternak;
use Illuminate\Http\Request;

class form_editProfilPET extends Controller
{
    protected function view($hash_code) {
        $data_keep=dataPeternak::where('email',$hash_code)->get();
        foreach ($data_keep as $data_profil) {
        }
        return view('form_editProfilPET',['data_profil' => $data_profil]);
    }

    protected function simpan(Request $request,$hash_code) {
        $raw_data = $request->validate([
            'company'      => 'required|max:255',
            'ownername'    => 'required|max:255',
            'nik'          => 'required|min:16|numeric',
            'npwp'         => 'required',
            'phone'        => 'required|numeric',
            'email'        => 'required|Email',
        ]);

        $keeper = dataPeternak::where('email',$hash_code)->get();
        foreach ($keeper as $key) {
        }

        $query=dataPeternak::find($key['id']);
        $query->company     =$raw_data['company'];
        $query->ownername   =$raw_data['ownername'];
        $query->nik         =$raw_data['nik'];
        $query->npwp        =$raw_data['npwp'];
        $query->phone       =$raw_data['phone'];
        $query->email       =$raw_data['email'];
        $query->save();


        // $data_keep=dataInvestor::where('password',$hash_code)->get();
        // foreach ($data_keep as $data_profil) {
        // }
        return view('dashboardPET',['dash_data' => $key]);
        }
}