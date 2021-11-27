<?php

namespace App\Http\Controllers;

use App\Models\dataInvestor;
use App\Models\dataPeternak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatTransaksiController extends Controller
{
    public function view_list_pet($email_pet) {
        $data_investor = DB::table('data_investasis')
                        ->join('data_riwayat_transaksi_bulanans','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                        ->join('data_investors','data_investors.id','data_investasis.id_investor')
                        ->join('data_burungs','data_burungs.id','data_investasis.id_burungs')
                        ->select('data_investasis.id','data_burungs.nama_burung','data_investors.nama','data_investasis.tgl_investasi')
                        ->where('data_riwayat_transaksi_bulanans.riwayat_transaksi','=','Lunas')
                        ->get();
        $dash_data = dataPeternak::where('email',$email_pet)->get();
        foreach ($dash_data as $dash_data) {
        }
        return view('listInvestorPET',['dash_data'=>$dash_data,'data_investor'=>$data_investor]);
    }

    public function view_list_detail_pet($email_pet,$id_investasi) {
        $data_transaksi=DB::table('data_investasis')
                        ->join('data_investors','data_investors.id','data_investasis.id_investor')
                        ->join('data_detail_investors','data_investors.id','data_detail_investors.id_investor')
                        ->join('data_burungs','data_burungs.id','data_investasis.id_burungs')
                        ->select('data_investors.nama','data_investors.nik','data_detail_investors.alamat','data_investors.phone','data_burungs.nama_burung','data_burungs.tanggal_menetas','data_burungs.berat','data_burungs.jenis_kelamin','data_burungs.riwayat_medis','data_burungs.jadwal_perawatan')
                        ->where('data_investasis.id','=',$id_investasi)
                        ->get();
        foreach ($data_transaksi as $data_transaksi) {
        }
        $data_riwayat=DB::table('data_riwayat_transaksi_bulanans')
                    ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                    ->select('data_riwayat_transaksi_bulanans.tgl_transaksi','data_riwayat_transaksi_bulanans.biaya_perawatan','data_riwayat_transaksi_bulanans.biaya_tambahan')
                    ->where('data_riwayat_transaksi_bulanans.riwayat_transaksi','=','Lunas')
                    ->where('data_investasis.id','=',$id_investasi)
                    ->get();
        $dash_data = dataPeternak::where('email',$email_pet)->get();
        foreach ($dash_data as $dash_data) {
        }
        return view('riwayatTransaksiDetail',['dash_data'=>$dash_data,'data_transaksi'=>$data_transaksi,'data_riwayat'=>$data_riwayat]);
    }

    public function view_list_inv($email_inv) {
        $dash_data = dataInvestor::where('email',$email_inv)->get();
        foreach ($dash_data as $dash_data) {
        }
        $data_burung=DB::table('data_investasis')
                        ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                        ->select('data_investasis.id','data_investasis.id_burungs','data_investasis.tgl_investasi','data_burungs.nama_burung')
                        ->where('data_investasis.id_investor','=',$dash_data['id'])
                        ->get();
        return view('listBurungINV',['dash_data'=>$dash_data,'data_burung'=>$data_burung]);
    }

    public function view_list_detail_inv($email_inv,$id_investasi) {
        $data_transaksi=DB::table('data_investasis')
                        ->join('data_investors','data_investors.id','data_investasis.id_investor')
                        ->join('data_detail_investors','data_investors.id','data_detail_investors.id_investor')
                        ->join('data_burungs','data_burungs.id','data_investasis.id_burungs')
                        ->select('data_investors.nama','data_investors.nik','data_detail_investors.alamat','data_investors.phone','data_burungs.nama_burung','data_burungs.tanggal_menetas','data_burungs.berat','data_burungs.jenis_kelamin','data_burungs.riwayat_medis','data_burungs.jadwal_perawatan')
                        ->where('data_investasis.id','=',$id_investasi)
                        ->get();
        foreach ($data_transaksi as $data_transaksi) {
        }
        $data_riwayat=DB::table('data_riwayat_transaksi_bulanans')
                    ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                    ->select('data_riwayat_transaksi_bulanans.tgl_transaksi','data_riwayat_transaksi_bulanans.biaya_perawatan','data_riwayat_transaksi_bulanans.biaya_tambahan')
                    ->where('data_riwayat_transaksi_bulanans.riwayat_transaksi','=','Lunas')
                    ->where('data_investasis.id','=',$id_investasi)
                    ->get();
        $dash_data = dataInvestor::where('email',$email_inv)->get();
        foreach ($dash_data as $dash_data) {
        }
        return view('riwayatTransaksiDetailINV',['dash_data'=>$dash_data,'data_transaksi'=>$data_transaksi,'data_riwayat'=>$data_riwayat]);

    }
}
