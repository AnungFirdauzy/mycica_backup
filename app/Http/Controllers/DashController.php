<?php

namespace App\Http\Controllers;

use App\Models\dataBurung;
use App\Models\dataInvestasi;
use App\Models\dataInvestor;
use App\Models\dataPeternak;
use App\Models\dataRiwayatTransaksiBulanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOption\None;

class DashController extends Controller
{
    public function notif_tagihan($id_inv){
        $data = DB::table('data_riwayat_transaksi_bulanans')
                ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','=','data_investasis.id')
                ->join('data_burungs','data_investasis.id_burungs','=','data_burungs.id')
                ->select('data_riwayat_transaksi_bulanans.riwayat_transaksi','data_investasis.id','data_burungs.nama_burung','data_investasis.id_burungs')
                ->where('data_investasis.id_investor','=',$id_inv)
                ->where('data_riwayat_transaksi_bulanans.riwayat_transaksi','=','Belum dibayar')
                ->get();
        return $data;
        
    }

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
            $notiftagihan=$this->notif_tagihan($key['id']);
            $data_bur = dataBurung::where('status','tersedia')->get();
            $get_data_inv = new InvestasiController;
            $data_inv=$get_data_inv->get_data_invest($key['id']);
            return view('dashboardINV',['dash_data' => $key,'burung' => $data_bur,'notiftagihan' => $notiftagihan,'burungINV'=>$data_inv]);
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
