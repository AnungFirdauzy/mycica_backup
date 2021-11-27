<?php

namespace App\Http\Controllers;

use App\Models\dataInvestor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class form_editProfilINV extends Controller
{
    public function view($hash_code) {
        $data_keep=dataInvestor::where('email',$hash_code)->get();
        foreach ($data_keep as $data_profil) {
        }
        return view('form_editProfilINV',['data_profil' => $data_profil]);
    }

    protected function simpan(Request $request,$hash_code) {
        $raw_data = $request->validate([
            'nama'      => 'required|max:255',
            'nik'       => 'required|min:16|numeric',
            'age'       => 'required|numeric',
            'gender'    => 'required',
            'phone'     => 'required|numeric',
            'email'     => 'required|Email',
            'job'       => 'required|max:50',
            'reason'    => 'max:255',
            'income'    => 'numeric',
            'netincome' => 'numeric',
        ]);

        $keeper = dataInvestor::where('email',$hash_code)->get();
        foreach ($keeper as $key) {
        }

        $query=dataInvestor::find($key['id']);
        $query->nama=$raw_data['nama'];
        $query->nik=$raw_data['nik'];
        $query->age=$raw_data['age'];
        $query->gender=$raw_data['gender'];
        $query->phone=$raw_data['phone'];
        $query->email=$raw_data['email'];
        $query->job=$raw_data['job'];
        $query->reason=$raw_data['reason'];
        $query->income=$raw_data['income'];
        $query->netincome=$raw_data['netincome'];
        $query->save();


        // $data_keep=dataInvestor::where('password',$hash_code)->get();
        // foreach ($data_keep as $data_profil) {
        // }
        $dash= new DashController;
        return $dash->view($hash_code,'investor');
    }
}
