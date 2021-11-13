<?php

namespace App\Http\Controllers;

use App\Models\dataPeternak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerPET extends Controller
{
    public function view() {
        return view('registerPET');
    }

    protected function register(Request $req) {
        $register_data=$req->validate([
            'company'       => 'required|max:255',
            'ownername'     => 'required|max:255',
            'nik'           => 'required|numeric',
            'npwp'          => 'required|max:255',
            'phone'         => 'required|numeric',
            'email'         => 'required|email',
            'password'      => 'required|max:255',
            'repassword'    => 'required|max:255',
        ]);
        if ($register_data['password'] === $register_data['repassword']) {
            $register_data['password'] = Hash::make($register_data['password']);
            dataPeternak::create($register_data);
            $req->session()->flash('success','Selamat, anda telah terdaftar sebagai peternak');
            return redirect('/login');
        }else{
            $req->session()->flash('gagal','Password dan Konfirmasi password harus sama');
            return redirect('/registerPET');
        }
    }
}
