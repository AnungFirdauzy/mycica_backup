<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\dataBurung;
use App\Models\dataInvestor;
use App\Models\dataPeternak;
use Illuminate\Http\Request;
use App\Models\dataInvestasi;
use App\Models\dataDetailInvestor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\dataRiwayatTransaksiBulanan;

class InvestasiController extends Controller
{

    protected function mou($id,$nama_burung) {
        // $old_data = dataInvestor::find($id)->get();
        // foreach ($old_data as $data) {
        // }
        // dd($data->id);
        return view('form_mou',['investor'=>$id, 'burung' =>$nama_burung]);
    }

    public function download_mou() {
        $file="./perjanjian/PERJANJIAN KERJASAMA INVESTASI.docx";
        return Storage::download("PERJANJIAN KERJASAMA INVESTASI.docx");
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
                'ktp'           => "required|image|file|max:1024",
                'pasfoto'       => "required|image|file|max:1024",
                'persetujuan'   => "required|image|file|max:1024",
            ]
        );

        $data_mou['ktp']=$req->file('ktp')->store('scan-satu');
        $data_mou['pasfoto']=$req->file('pasfoto')->store('scan-dua');
        $data_mou['persetujuan']=$req->file('persetujuan')->store('scan-tiga');

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
                ->where('data_investors.email','=',$hash)
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
        $investasi = dataInvestasi::where(['tgl_jatuhTempo','<=',$current->toDateString(),'id_investor'=>$investor['id']])->where('status_transaksi','Berjalan')->get();
        foreach ($investasi as $investasi) {
            $burung=dataBurung::where('id',$investasi['id_burungs'])->get();
            foreach ($burung as $burung) {
                # code...
            }
            $this->generate_tagihan($investasi['id'],$burung['biaya_tambahan']);
            continue;
        }
        return;
    }

    public function generate_tagihan($id_investasi,$biaya_tambahan) {
        dataRiwayatTransaksiBulanan::create([
            'id_investasi' => $id_investasi,
            'tgl_transaksi' => 'belum ada',
            'biaya_perawatan' => 500000,
            'biaya_tambahan' => $biaya_tambahan,
            'riwayat_transaksi'=> 'Belum dibayar'
        ]);
        return;
    }

    protected function investasi($id_burung,$emailinvestor) {
        $investor = dataInvestor::where('email',$emailinvestor)->get();
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

        $this->generate_tagihan($key['id'],$burung->biaya_tambahan);
        return $this->view_tagihan($emailinvestor,$id_burung);
    }

    public function get_data_invest($id_investor) {
        $data_inv  = DB::table('data_investasis')
                    ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                    ->select('data_investasis.id','data_investasis.tgl_investasi','data_investasis.tgl_jatuhTempo','data_burungs.nama_burung','data_burungs.jenis_kelamin','data_investasis.id_burungs','data_burungs.foto_burung')
                    // ->where('data_investasis.id_investor','=',$id_investor)
                    ->where('data_investasis.status_transaksi','=','Berjalan')
                    ->where('data_investasis.id_investor','=',$id_investor)
                    ->get();
        if (count($data_inv)) {
            return $data_inv;
        }else{
            $data_inv = 'None';
            return $data_inv;
        }
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
                            ->select('data_investasis.id','data_investasis.id_burungs','data_investasis.tgl_investasi','data_investasis.tgl_jatuhTempo','data_burungs.nama_burung','data_burungs.jenis_kelamin','data_riwayat_transaksi_bulanans.riwayat_transaksi','data_investasis.status_transaksi','data_burungs.foto_burung')
                            ->where('data_investasis.id_investor','=',$key['id'])
                            ->get();

        return view('katalogInvestasi',['dash_data'=>$key,'katalog'=>$katalogInvestasi]);
    }

    protected function paid($id,$email){
        $current = Carbon::now();

        $tanggal = $current->toDateString();

        $transaksi = DB::table('data_investasis')
                    ->join('data_riwayat_transaksi_bulanans','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                    ->select('data_riwayat_transaksi_bulanans.id')
                    ->where('data_investasis.id','=',$id)
                    ->get();
        foreach ($transaksi as $transaksi) {
            # code...
        }

        $query=dataRiwayatTransaksiBulanan::find($transaksi->id);
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
                ->select('data_burungs.nama_burung','data_burungs.berat','data_burungs.jenis_kelamin','data_burungs.tanggal_menetas','data_burungs.riwayat_medis','data_riwayat_transaksi_bulanans.riwayat_transaksi','data_peternaks.ownername','data_investors.email','data_investasis.id_burungs','data_burungs.biaya_tambahan','data_burungs.jadwal_perawatan','data_burungs.updated_at','data_burungs.foto_burung')
                ->where('data_investasis.id_burungs','=',$id)
                ->get();
        foreach ($detail as $detail) {
        }
        return view('detailBurungInvestasi',['data'=>$detail,'']);
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
                            ->select('data_investasis.id','data_investasis.tgl_investasi','data_investasis.tgl_jatuhTempo','data_burungs.nama_burung','data_burungs.jenis_kelamin','data_riwayat_transaksi_bulanans.riwayat_transaksi','data_burungs.foto_burung')
                            ->where('data_burungs.id_peternak','=',$dash_data['id'])
                            ->where('data_investasis.status_transaksi','=','Berjalan')
                            ->get();
        


        return view('katalogInvestasiPET',['dash_data' => $dash_data,'katalog'=>$katalogInvestasi]);
    }

    public function view_detail_burung_pet($id,$email){
        $dash_data=dataPeternak::where('email',$email)->get();
        foreach ($dash_data as $key) {
            # code...
        }
        foreach ($dash_data as $peternak) {
            # code...
        }
        $idBurung = dataInvestasi::where('id',$id)->get();
        foreach ($idBurung as $idBurung) {
            # code...
        }
        $burung=dataBurung::where('id',$idBurung['id_burungs'])->get();
        foreach ($burung as $burung) {
            # code...
        }
        $data_transaksi = DB::table('data_riwayat_transaksi_bulanans')
                            ->join('data_investasis','data_riwayat_transaksi_bulanans.id_investasi','data_investasis.id')
                            ->select('data_riwayat_transaksi_bulanans.riwayat_transaksi','data_investasis.id_investor')
                            ->where('data_investasis.id_burungs','=',$burung['id'])
                            ->get();
        foreach ($data_transaksi as $data_transaksi) {
            # code...
        }
        $data_investor= dataInvestor::where('id',$data_transaksi->id_investor)->get();
        foreach ($data_investor as $data_investor) {
            # code...
        }
        return view('profilInvestasiBurung',['dash_data'=>$key,'investor'=>$data_investor,'owner'=>$peternak,'burung'=>$burung,'riwayat_transaksi'=>$data_transaksi->riwayat_transaksi]);

    }

    public function view_konfirmasi_pembayaran($nama_burung) {
        $data1= dataBurung::where('nama_burung',$nama_burung)->get();
        foreach ($data1 as $data1) {
            # code...
        }
        $data2 = dataInvestasi::where('id_burungs',$data1['id'])->get();
        foreach ($data2 as $data2) {
            # code...
        }
        $data3 = dataInvestor::where('id',$data2['id_investor'])->get();
        foreach ($data3 as $data3) {
            
        }
        $data4 = dataDetailInvestor::where('id_investor', $data3['id'])->get();
        foreach ($data4 as $data4) {
            # code...
        }
        $data5 = dataRiwayatTransaksiBulanan::where('id_investasi',$data2['id'])->where('riwayat_transaksi','Menunggu verifikasi')->get();
        foreach ($data5 as $data5) {
            # code...
        }
        return view('verifikasiTagihanBiayaBulanan',['dash_data'=>$data3,'burung'=>$data1,'investasi'=>$data2,'detailInvestor'=>$data4,'riwayat'=>$data5]);
    }

    public function verifikasiPembayaran($id) {
        $data = DB::table('data_riwayat_transaksi_bulanans')
                ->join('data_investasis','data_investasis.id','data_riwayat_transaksi_bulanans.id_investasi')
                ->join('data_burungs','data_burungs.id','data_investasis.id_burungs')
                ->select('data_burungs.biaya_tambahan','data_burungs.id')
                ->where('data_riwayat_transaksi_bulanans.id','=',$id)
                ->get();
        foreach ($data as $data) {
            # code...
        }
        
        $data = dataRiwayatTransaksiBulanan::find($id);
        $data->riwayat_transaksi = 'Lunas';
        $data->biaya_tambahan = $data->biaya_tambahan;
        $data->save();

        $getData = dataInvestasi::where('id',$data->id_investasi)->get();
        foreach ($getData as $getData) {
            # code...
        }

        $current = Carbon::createFromFormat('Y-m-d', $getData['tgl_jatuhTempo']);
        $jatuhTempo = date('Y-m-d', strtotime($current . " + 1 month"));

        $data2 = dataInvestasi::find($getData['id']);
        $data2->tgl_jatuhTempo = $jatuhTempo;
        $data2->save();

        $idRiwayatTransaksi = dataRiwayatTransaksiBulanan::where('id',$data->id)->get();
        foreach ($idRiwayatTransaksi as $idRiwayatTransaksi) {
            # code...
        }

        $idInvestasi = dataInvestasi::where('id',$idRiwayatTransaksi['id_investasi'])->get();
        foreach ($idInvestasi as $idInvestasi) {
            # code...
        }

        $idPeternak = dataBurung::where('id',$idInvestasi['id_burungs'])->get();
        foreach ($idPeternak as $idPeternak) {
            # code...
        }

        $peternak = dataPeternak::where('id',$idPeternak['id_peternak'])->get();
        foreach ($peternak as $peternak) {
            # code...
        }
        

        return $this->view_katalog_pet($peternak['email']);

    }

    public function get_data_invest_pet($id_investor) {
        $data_inv  = DB::table('data_investasis')
                    ->join('data_burungs','data_investasis.id_burungs','data_burungs.id')
                    ->select('data_investasis.id','data_investasis.tgl_investasi','data_investasis.tgl_jatuhTempo','data_burungs.nama_burung','data_burungs.jenis_kelamin','data_investasis.id_burungs','data_burungs.foto_burung')
                    ->where('data_burungs.id_peternak','=',$id_investor)
                    ->get();
        if (count($data_inv)) {
            return $data_inv;
        }else{
            $data_inv = 'None';
            return $data_inv;
        }
    }
}
