<?php

namespace App\Http\Controllers;

use App\Models\dataInvestor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerINV extends Controller
{
    public function view() {
        return view('registerINV');
    }

    public function register(Request $req) {
        $register_data=$req->validate([
            'nama' => 'required|max:255',
            'nik'           => 'required|numeric',
            'age'           => 'required|numeric',
            'gender'        => 'required',
            'phone'         => 'required',
            'email'         => 'required|email',
            'job'           => 'required|max:255',
            'reason'        => 'max:255',
            'income'        => 'required|numeric',
            'netincome'     => 'required|numeric',
            'password'      => 'required|min:8|max:16',
            'repassword'    => 'required|min:8|max:16'
        ]);
        
        if ($register_data['password'] === $register_data['repassword']) {
            if ($register_data['age']>=18) {
                $register_data['password'] = Hash::make($register_data['password']);
                dataInvestor::create($register_data);
                $req->session()->flash('success','Selamat, anda telah terdaftar sebagai investor');
                return redirect('/login');
            }else {
                $req->session()->flash('gagal','Anda tidak memenuhi usia minimal untuk mendaftar');
                return redirect('/registerINV');
            }
        }else{
            $req->session()->flash('gagal','Password dan Konfirmasi password harus sama');
            return redirect('/registerINV');
        }
    }
}
