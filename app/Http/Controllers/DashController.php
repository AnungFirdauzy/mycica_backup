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
    protected function get_nominal_transaksi($id_investor){
        $nominal = 0;
        $data_extract = DB::table('data_riwayat_transaksi_bulanans')
                        ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                        ->select('data_riwayat_transaksi_bulanans.biaya_perawatan','data_riwayat_transaksi_bulanans.biaya_tambahan')
                        ->where('data_riwayat_transaksi_bulanans.riwayat_transaksi','=','Lunas')
                        ->get();
        foreach ($data_extract as $data_extract) {
            $keeper = $data_extract->biaya_perawatan+$data_extract->biaya_tambahan;
            $nominal += $keeper;
        }
        return $nominal;
    }
    protected function get_jumlah_investasi($id_peternak){
        $data_investasi = DB::table('data_investasis')
                        ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                        ->select('data_burungs.nama_burung')
                        ->where('data_burungs.id_peternak','=',$id_peternak)
                        ->where('data_investasis.status_transaksi','!=','Terjual')
                        ->get();
        return count($data_investasi);
    }
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

    public function notif_jual($id_inv) {
        $current = Carbon::now();
        $data = DB::table('data_investasis')
                ->join('data_burungs','data_burungs.id','data_investasis.id_burungs')
                ->join('data_riwayat_transaksi_bulanans','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                ->select('data_investasis.id','data_investasis.id_burungs','data_burungs.nama_burung','data_burungs.tanggal_menetas','data_burungs.berat','data_burungs.jenis_kelamin','data_burungs.riwayat_medis','data_burungs.jadwal_perawatan')
                ->where("data_investasis.id_investor",'=',$id_inv)
                ->where('data_burungs.tanggal_max_investasi','>=',$current->toDateString())
                ->where('data_investasis.status_transaksi','=','Berjalan')
                ->where('data_riwayat_transaksi_bulanans.riwayat_transaksi','!=','Belum dibayar')
                ->get();
        return $data;
    }

    public function notif_jual_pet($id_pet) {
        $data=DB::table('data_investasis')
            ->join('data_burungs','data_burungs.id','data_investasis.id_burungs')
            ->join('data_investors','data_investasis.id_investor','data_investors.id')
            ->select('data_burungs.nama_burung','data_investasis.id','data_investors.nama')
            ->where('data_investasis.status_transaksi','=','Menunggu terjual')
            ->where('data_burungs.id_peternak','=',$id_pet)
            ->get();
        return $data;
    }

    public function notif_permintaan($id_pet) {
        $data = DB::table('data_riwayat_transaksi_bulanans')
                ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                ->join('data_investors','data_investasis.id_investor','data_investors.id')
                ->select('data_investasis.id_burungs','data_burungs.nama_burung','data_riwayat_transaksi_bulanans.id_investasi')
                ->where('data_burungs.id_peternak','=',$id_pet)
                ->where('data_riwayat_transaksi_bulanans.riwayat_transaksi','=','Menunggu verifikasi')
                ->get();
        return $data;
    }

    public function view($id,$role) {
        if ($role==='peternak') {
            $dash_data = dataPeternak::where('email',$id)->get();
            foreach ($dash_data as $data_pet) {
            }
            $notif=$this->notif_permintaan($data_pet['id']);
            $data_bur = dataBurung::where('id_peternak',$data_pet['id'])->where('status','tersedia')->get();
            $get_data_inv = new InvestasiController;
            $data_inv=$get_data_inv->get_data_invest($data_pet['id']);
            $data_banyakInvestasi=$this->get_jumlah_investasi($data_pet['id']);

            $notifjual = $this->notif_jual_pet($data_pet['id']);

            return view('dashboardPET',['dash_data' => $data_pet,'burung' => $data_bur,'notifpermintaan'=>$notif,'burungINV'=>$data_inv,'jumlah_investasi'=>$data_banyakInvestasi,'notifjual'=>$notifjual]);
        }elseif ($role==='investor') {
            $dash_data = dataInvestor::where('email',$id)->get();
            foreach ($dash_data as $key) {
            }
            $notiftagihan=$this->notif_tagihan($key['id']);
            $data_bur = dataBurung::where('status','tersedia')->get();
            $get_data_inv = new InvestasiController;
            $data_inv=$get_data_inv->get_data_invest($key['id']);
            $nominal_invest = $this->get_nominal_transaksi($key['id']);

            $notifjual=$this->notif_jual($key['id']);

            return view('dashboardINV',['dash_data' => $key,'burung' => $data_bur,'notiftagihan' => $notiftagihan,'burungINV'=>$data_inv,'nominal_invest' => $nominal_invest,'notifjual'=>$notifjual]);
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
