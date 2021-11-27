<?php

namespace App\Http\Controllers;

use App\Models\dataBurung;
use App\Models\dataPeternak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class form_perbaruiDataBurungInvestasi extends Controller
{
    public function view($nama_burung) {
        $burung = dataBurung::where('nama_burung',$nama_burung)->get();
        foreach ($burung as $burung) {
        }
        $peternak = dataPeternak::where('id',$burung['id_peternak'])->get();
        foreach ($peternak as $peternak) {
            # code...
        }
        return view('form_perbaruiDataBurungInvestasi',['burung'=>$burung,'peternak'=>$peternak]);
    }

    protected function simpan($nama_burung,Request $req) {
        $raw_data = $req -> validate([
            'nama_burung'           => 'required',
            'id_peternak'           => 'required',
            'tanggal_menetas'       => 'required',
            'tanggal_max_investasi' => 'nullable',
            'jenis_kelamin'         => 'required',
            'berat'                 => 'required',
            'riwayat_medis'         => 'nullable',
            'biaya_tambahan'        => 'nullable',
            'jadwal_perawatan'      => 'required',
            'status'                => 'required',
        ]);

        $tanggal = $raw_data['tanggal_menetas'];
        $tanggal = date('Y-m-d', strtotime($tanggal . " + 275 day"));
        $raw_data['tanggal_max_investasi'] = $tanggal;

        $burung = dataBurung::where('nama_burung',$nama_burung)->get();
        foreach ($burung as $burung) {
            # code...
        }

        DB::table('data_burungs')
            ->where('id', $burung['id'])
            ->update(['nama_burung' => $raw_data['nama_burung'], 
            'tanggal_menetas' => $raw_data['tanggal_menetas'],
            'tanggal_max_investasi' => $raw_data['tanggal_max_investasi'],
            'jenis_kelamin' => $raw_data['jenis_kelamin'],
            'berat' => $raw_data['berat'],
            'riwayat_medis' => $raw_data['riwayat_medis'],
            'biaya_tambahan'                => $raw_data['biaya_tambahan'],
            'jadwal_perawatan'              => $raw_data['jadwal_perawatan'],
            'status' => $raw_data['status']
            ]);

        $peternak = dataPeternak::where('id',$burung['id_peternak'])->get();
        foreach ($peternak as $peternak) {
            # code...
        }
        
        $balik = new InvestasiController;
        return $balik->view_detail_burung_pet($burung['id'],$peternak['email']);
    }
}
