<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\dataBurung;
use App\Models\dataInvestor;
use Illuminate\Http\Request;
use App\Models\dataInvestasi;
use App\Models\dataDetailInvestor;
use App\Models\dataPeternak;
use App\Models\dataRiwayatTransaksiBulanan;
use Illuminate\Support\Facades\DB;

class InvestasiController extends Controller
{

    protected function mou($id,$nama_burung) {
        $old_data = dataInvestor::find($id)->get();
        foreach ($old_data as $data) {
        }
        return view('form_mou',['data'=>$data, 'burung' =>$nama_burung]);
    }

    protected function simpan_mou($nama_burung,Request $req) {
        $data_mou=$req->validate(
            [
                'id_investor'   => "required|max:255",
                'alamat'        => "required|max:255",
                'rtRw'          => "required|max:255",
                'kabupatenkota' => "required|max:255",
                'provinsi'      => "required|max:255",
                'kodepos'       => "required|numeric",
                'ttl'           => "required|max:255",
                'rekening'      => "required|numeric",
            ]
        );
        // ddd($data_mou);
        $data_investor=dataInvestor::find($data_mou['id_investor']);
        dataDetailInvestor::create($data_mou);
        return $this->view($nama_burung,$data_investor->email);
    }

    protected function view($nama_burung, $data_investor){
        $investor = dataInvestor::where('email',$data_investor)->get();
        $data_burung = dataBurung::where('nama_burung',$nama_burung)->get();
        foreach ($investor as $investor) {
        }
        foreach ($data_burung as $burung) {
        }
        $owner=dataBurung::find($burung['id']);
        $owner=$owner->datapeternak->company;
        $mou = dataDetailInvestor::where('id_investor',$investor['id'])->get();
        foreach ($mou as $mou) {
        }
        if (isset($mou['id_investor'])) {
            return view("detailBurungINV", ['burung' => $burung, 'investor' => $investor,'owner' =>$owner ]);
        } else {
            return $this->mou($investor['id'],$nama_burung);
        }
        
    }

    public function view_tagihan($hash,$id_burung) {

        $investor=DB::table('data_detail_investors')
                ->join('data_investors','data_detail_investors.id_investor','=','data_investors.id')
                ->select('data_investors.nama','data_investors.nik','data_detail_investors.alamat','data_investors.phone')
                ->get();

        foreach ($investor as $investor) {
        }

        $dash_data = dataInvestor::where('email',$hash)->get();
        foreach ($dash_data as $dash_data) {
        }

        $burung=DB::table('data_burungs')->select('*')->where('id','=',$id_burung)->get();

        foreach ($burung as $burung) {
        }

        $investasi=DB::table('data_riwayat_transaksi_bulanans')
                    ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                    ->select('*')
                    ->where('riwayat_transaksi','=','Belum dibayar')
                    ->get();
        
        foreach ($investasi as $investasi) {
        }

        return view('tagihanBiayaBulanan',['investor'=>$investor,'burung' => $burung,'dash_data'=>$dash_data,'investasi'=>$investasi]);
    }

    public function cek_tagihan($email) {
        $investor = dataInvestor::where('email',$email)->get();
        foreach ($investor as $investor) {
            # code...
        }
        $current = Carbon::now();
        $investasi = dataInvestasi::where(['tgl_jatuhTempo','<=',$current->toDateString(),'id_investor'=>$investor['id']])->get();
        foreach ($investasi as $investasi) {
            $this->generate_tagihan($investasi['id']);
        }
        return;
    }

    public function generate_tagihan($id_investasi) {
        dataRiwayatTransaksiBulanan::create([
            'id_investasi' => $id_investasi,
            'tgl_transaksi' => 'belum ada',
            'biaya_perawatan' => 500000,
            'biaya_tambahan' => 0,
            'riwayat_transaksi'=> 'Belum dibayar'
        ]);
        return;
    }

    protected function investasi($id_burung,$emailinvestor) {
        $investor = dataInvestor::where('email',$emailinvestor)->get('id');
        foreach ($investor as $investor) {
        }
        $current = Carbon::now();
        $jatuhTempo = date('Y-m-d', strtotime($current . " + 1 month"));
        
        dataInvestasi::create([
            'id_burungs'         => $id_burung,
            'id_investor'       => $investor['id'],
            'tgl_investasi'     => $current->toDateString(),
            'tgl_jatuhTempo'     => $jatuhTempo,
            'status_transaksi'  => "Berjalan",
            'jadwal_perawatan'  => null,
        ]);

        $burung= dataBurung::find($id_burung);
        $burung->status = 'tidak tersedia';
        $burung->save();

        $dataInvestasi = dataInvestasi::where('id_burungs',$id_burung)->get();
        foreach ($dataInvestasi as $key) {
        }

        $this->generate_tagihan($key['id']);
        return $this->view_tagihan($emailinvestor,$id_burung);
    }

    public function get_data_invest($id_investor) {
        $data_inv  = DB::table('data_investasis')
                    ->join('data_burungs','data_investasis.id_burungs','=','data_burungs.id')
                    ->select('data_investasis.id','data_investasis.tgl_investasi','data_investasis.tgl_jatuhTempo','data_burungs.nama_burung','data_burungs.jenis_kelamin','data_investasis.id_burungs')
                    ->get();
        return $data_inv;
    }

    public function view_katalog($email) {
        $data = dataInvestor::where('email',$email)->get();
        foreach ($data as $key) {
        }
        $current=Carbon::now();
        
        // $katalogInvestasi = DB::table('data_investasis')
        //                     ->join('data_burungs','data_investasis.id_burungs','=','data_burungs.id')
        //                     ->select('data_investasis.id','data_investasis.tgl_investasi','data_investasis.tgl_jatuhTempo','data_burungs.nama_burung','data_burungs.jenis_kelamin')
        //                     ->where('data_investasis.id_investor','=',$key['id'])
        //                     ->get();

        $katalogInvestasi = DB::table('data_riwayat_transaksi_bulanans')
                            ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                            ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                            ->select('data_investasis.id','data_investasis.tgl_investasi','data_investasis.tgl_jatuhTempo','data_burungs.nama_burung','data_burungs.jenis_kelamin','data_riwayat_transaksi_bulanans.riwayat_transaksi')
                            ->get();

        return view('katalogInvestasi',['dash_data'=>$key,'katalog'=>$katalogInvestasi]);
    }

    protected function paid($id,$email){
        $current = Carbon::now();

        $tanggal = $current->toDateString();

        $query=dataRiwayatTransaksiBulanan::find($id);
        $query->tgl_transaksi=$tanggal;
        $query->riwayat_transaksi='Menunggu verifikasi';
        $query->save();
        

        $dash = new DashController;
        return $dash->view($email,'investor');
    }

    public function detail($id) {
        $detail = DB::table('data_riwayat_transaksi_bulanans')
                ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                ->join('data_peternaks','data_burungs.id_peternak','data_peternaks.id')
                ->join('data_investors','data_investasis.id_investor','data_investors.id')
                ->select('data_burungs.nama_burung','data_burungs.berat','data_burungs.jenis_kelamin','data_burungs.tanggal_menetas','data_burungs.riwayat_medis','data_riwayat_transaksi_bulanans.riwayat_transaksi','data_peternaks.ownername','data_investors.email','data_investasis.id_burungs')
                ->where('data_investasis.id_burungs','=',$id)
                ->get();
        foreach ($detail as $detail) {
        }
        
        return view('detailBurungInvestasi',['data'=>$detail]);
    }

    public function openkatalog($email){
        $investor = dataInvestor::where('email',$email)->get();
        $data_burung = dataBurung::where('status','tersedia')->get();
        foreach ($investor as $investor) {
        }
        return view('katalogINV',['burung'=>$data_burung,'dash_data'=>$investor]);
    }

    public function view_katalog_pet($email) {
        $dash_data = dataPeternak::where('email',$email)->get();
        foreach ($dash_data as $dash_data) {
        }
        $katalogInvestasi = DB::table('data_riwayat_transaksi_bulanans')
                            ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                            ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                            ->select('data_investasis.id','data_investasis.tgl_investasi','data_investasis.tgl_jatuhTempo','data_burungs.nama_burung','data_burungs.jenis_kelamin','data_riwayat_transaksi_bulanans.riwayat_transaksi')
                            ->where('data_burungs.id_peternak','=',$dash_data['id'])
                            ->get();
        


        return view('katalogInvestasiPET',['dash_data' => $dash_data,'katalog'=>$katalogInvestasi]);
    }
}
