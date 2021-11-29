<?php

namespace App\Http\Controllers;

use App\Models\dataInvestor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvestorController extends Controller
{
    public function get_data() {
        $data = dataInvestor::all();
        return $data;

    }

    public function set_data($email) {
        $data = $this->get_data();
        return view('profilInvestorADM',['email'=>$email,'investor'=>$data]);
    }

    public function set_data_detail($email,$id_investor) {
        $data=$this->get_data_detail($id_investor);
        foreach ($data as $data) {
            # code...
        }
        return view('profilInvestorADMDetail',['email'=>$email,'data'=>$data]);
    }

    public function get_data_detail($id_investor) {
        $data = DB::table('data_investors')
                ->join('data_detail_investors','data_detail_investors.id_investor','data_investors.id')
                ->select('*')
                ->where('data_investors.id','=',$id_investor)
                ->get();
        return $data;
    }

    public function hapus($email,$id_investor) {
        DB::table('data_investors')->where('id',$id_investor)->delete();
        DB::table('data_detail_investors')->where('id_investor',$id_investor)->delete();
        $dash = new DashController;
        return $dash->view($email,'admin');
    }
}
