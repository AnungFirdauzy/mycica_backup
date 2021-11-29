<?php

namespace App\Http\Controllers;

use App\Models\dataPeternak;
use Illuminate\Http\Request;

class PeternakController extends Controller
{
    public function get_data(){
        $data = dataPeternak::all();
        return $data;
    }

    public function set_data($email){
        $data=$this->get_data();
        return view('profilPeternakADM',['email'=>$email,'peternak'=>$data]);
    }

    public function get_data_detail($id_peternak){
        $data = dataPeternak::where('id',$id_peternak)->get();
        foreach ($data as $data) {
            # code...
        }
        return $data;
    }

    public function set_data_detail($email,$id_peternak) {
        $data = $this->get_data_detail($id_peternak);
        return view('profilPeternakADMDetail',['email'=>$email,'data'=>$data]);
    }
}
