<?php

namespace App\Http\Controllers;

use App\Models\DataAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerADM extends Controller
{
    public function view_form() {
        return view('registerADM');
    }

    public function tambahkan(Request $req) {
        $raw_data =$req->validate([
            'nama_admin' => 'required|max:255|string',
            'username'   => 'required|unique:data_admins,username',
            'password'   => 'required|string|max:16',
            'repassword' => 'required|same:password'
        ]);
        $raw_data['password'] = Hash::make($raw_data['password']);
        DataAdmin::create($raw_data);
        $req->session()->flash('success','Data admin telah ditambahkan');
        return redirect('/login');
    }
}
