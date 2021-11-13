<?php

namespace App\Http\Controllers;

use App\Models\dataBurung;
use App\Models\dataInvestor;
use App\Models\dataPeternak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOption\None;

class DashController extends Controller
{
    public function view($id,$role) {
        if ($role==='peternak') {
            $dash_data = dataPeternak::where('email',$id)->get();
            foreach ($dash_data as $data_pet) {
            }
            $data_bur = dataBurung::where('id_peternak',$data_pet['id'])->where('status','tersedia')->get();
            return view('dashboardPET',['dash_data' => $data_pet,'burung' => $data_bur]);
        }elseif ($role==='investor') {
            $dash_data = dataInvestor::where('email',$id)->get();
            foreach ($dash_data as $key) {
            }
            return view('dashboardINV',['dash_data' => $key]);
        }
    }

    public function getDataAkun(Request $req) {
        $login_data=$req->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $auth_data1= dataPeternak::where('email',$login_data['email'])->get();
        $auth_data2 = dataInvestor::where('email',$login_data['email'])->get();
        foreach ($auth_data1 as $key) {
        }
        foreach ($auth_data2 as $key2) {
        }
        if (isset($key)) {
            if (Hash::check($login_data['password'], $key["password"])) {
                return $this->view($key['email'],'peternak');
            }else {
                $req->session()->flash('loginError','Login Gagal! Periksa kembali email/password Anda');
                return redirect('/login');
            }
        }elseif (isset($key2)) {
            if (Hash::check($login_data['password'], $key2["password"])) {
                return $this->view($key2['email'],'investor');
            } else {
                $req->session()->flash('loginError','Login Gagal! Periksa kembali email/password Anda');
                return redirect('/login');
            }
        }
    }
}
