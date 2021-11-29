<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatTransaksi extends Controller
{
    public function get_riwayat() {
        $data_riwayat = DB::table('data_investasis')
                        ->join('data_riwayat_transaksi_bulanans','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                        ->join('data_investors','data_investors.id','data_investasis.id_investor')
                        ->join('data_burungs','data_burungs.id','data_investasis.id_burungs')
                        ->select('data_investasis.id','data_investasis.id_investor','data_burungs.nama_burung','data_investors.nama','data_investasis.tgl_investasi')
                        ->where('data_riwayat_transaksi_bulanans.riwayat_transaksi','=','Lunas')
                        ->orderBy('data_investasis.tgl_investasi','asc')
                        ->get();
        return $data_riwayat;
    }

    public function set_riwayat($email) {
        $data=$this->get_riwayat();
        return view('riwayatTransaksiADM',['email'=>$email,'data'=>$data]);

    }

    public function get_riwayat_detail($id_investasi,$email) {
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
        
        return view('riwayatTransaksiDetailADM',['email'=>$email,'data_transaksi'=>$data_transaksi,'data_riwayat'=>$data_riwayat]);
    }
}
