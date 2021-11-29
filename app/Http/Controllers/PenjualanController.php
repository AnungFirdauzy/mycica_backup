<?php

namespace App\Http\Controllers;

use App\Models\dataBurung;
use App\Models\dataInvestor;
use App\Models\dataPeternak;
use Illuminate\Http\Request;
use App\Models\dataInvestasi;
use App\Models\dataPenjualanBurung;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function view_jual($email_inv,$id_transaksi){
        $get_id_burung = dataInvestasi::where('id',$id_transaksi)->get();
        foreach ($get_id_burung as $key) {
            # code...
        }
        $dash_data = dataInvestor::where('email',$email_inv)->get();
        foreach ($dash_data as $dash_data) {
        }
        $data_burung = dataBurung::where('id',$key['id'])->get();
        foreach ($data_burung as $burung) {
            # code...
        }
        return view('penjualanBurung',['dash_data'=>$dash_data,'burung'=>$burung,'investasi'=>$key]);
    }

    public function jual_inv($email_inv,$id_transaksi){
        $data = dataInvestasi::find($id_transaksi);
        $data->status_transaksi = 'Menunggu terjual';
        $data->save(); 

        $dash = new DashController;
        return $dash->view($email_inv,'investor');
    }

    public function form_jual_pet($email_pet,$id_transaksi) {
        $dash_data = dataPeternak::where('email',$email_pet)->get();
        foreach ($dash_data as $dash_data) {
        }
        $data_investor = DB::table('data_investasis')
                        ->join('data_investors','data_investasis.id_investor','data_investors.id')
                        ->join('data_detail_investors','data_detail_investors.id_investor','data_investors.id')
                        ->select('data_investors.nama','data_investors.nik','data_detail_investors.alamat','data_investors.phone')
                        ->where('data_investasis.id','=',$id_transaksi)
                        ->get();
        foreach ($data_investor as $data_investor) {
        }
        $data_burung = DB::table('data_investasis')
                        ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                        ->select('data_burungs.nama_burung','data_burungs.tanggal_menetas','data_burungs.berat','data_burungs.jenis_kelamin','data_burungs.riwayat_medis','data_burungs.jadwal_perawatan')
                        ->where('data_investasis.id','=',$id_transaksi)
                        ->get();
        foreach ($data_burung as $data_burung) {
        }
        return view('persetujuanPenjualanBurung',['dash_data'=>$dash_data,'data_investor'=>$data_investor,'data_burung'=>$data_burung,'id_transaksi'=>$id_transaksi]);
    }

    public function form_jual_pet_terjual($email_pet,$id_transaksi,Request $req) {
        $raw_data = $req->validate([
            'id_investasi'     => 'required',
            'tgl_terjual'       => 'required',
            'nama_pembeli'      => 'required',
            'phone'             => 'required',
            'status_penjualan'  => 'required',
            'harga_jual'        => 'required',
            'nominal_transfer'  => 'required',
        ]);

        $data_transaksi = dataInvestasi::find($id_transaksi);
        $data_transaksi->status_transaksi = 'Terjual';
        $data_transaksi->save();

        dataPenjualanBurung::create($raw_data);
        $dash = new DashController;
        return $dash->view($email_pet,'peternak');
    }
    public function konfirmasiPenjualan($email_inv,$id_transaksi) {
        $dash_data = dataInvestor::where('email',$email_inv)->get();
        foreach ($dash_data as $dash_data) {
        }
        $burung= DB::table('data_investasis')
                ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                ->select('data_burungs.nama_burung','data_burungs.tanggal_menetas','data_burungs.berat','data_burungs.jenis_kelamin','data_burungs.riwayat_medis','data_burungs.jadwal_perawatan','data_burungs.biaya_tambahan')
                ->where('data_investasis.id','=',$id_transaksi)
                ->get();
        foreach ($burung as $burung) {
            # code...
        }
        $penjualan = DB::table('data_investasis')
                    ->join('data_penjualan_burungs','data_penjualan_burungs.id_investasi','data_investasis.id')
                    ->select('data_penjualan_burungs.nama_pembeli','data_penjualan_burungs.tgl_terjual','data_penjualan_burungs.phone','data_penjualan_burungs.harga_jual','data_penjualan_burungs.nominal_transfer')
                    ->where('data_investasis.id','=',$id_transaksi)
                    ->get();
        foreach ($penjualan as $penjualan) {
        }
        return view('detailPenjualanINV',['dash_data'=>$dash_data,'investor'=>$dash_data,'burung'=>$burung,'penjualan'=>$penjualan,'id_transaksi'=>$id_transaksi]);
    }

    public function terima($email_inv,$id_transaksi){
        $data_investasi = DB::table('data_investasis')
                        ->join('data_penjualan_burungs','data_penjualan_burungs.id_investasi','data_investasis.id')
                        ->select('data_penjualan_burungs.id')
                        ->where('data_investasis.id','=',$id_transaksi)
                        ->get();
        foreach ($data_investasi as $data_investasi) {
            # code...
        }

        $query = dataPenjualanBurung::find($data_investasi->id);
        $query->status_penjualan = 'Dikonfirmasi';
        $query->save();

        $dash_data = dataInvestor::where('email',$email_inv)->get();
        foreach ($dash_data as $dash_data) {
        }
        $dash = new DashController;
        return $dash->view($email_inv,'investor');
    }
}
