<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\dataBurung;
use App\Models\dataPeternak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class form_editDataKatalog extends Controller
{
    public function index($hash) {
        $burungs = dataBurung::where('nama_burung',$hash)->get();
        foreach ($burungs as $burung) {
        }
        $data_pet = dataPeternak::where('id',$burung['id_peternak'])->get();
        foreach ($data_pet as $data_pet1) {
        }
        return view('profilBUR',['data_burung' => $burung,'hash' => $data_pet1['email']]);
    }

    public function edit($hash) {
        $date = new Carbon('2016-01-23');
        $burungs = dataBurung::where('id',$hash)->get();
        foreach ($burungs as $burung) {
        }
        $data_pet = dataPeternak::where('id',$burung['id_peternak'])->get();
        foreach ($data_pet as $data_pet1) {
        }
        return view('form_editDataKatalog',['data_burung' => $burung,'hash' => $data_pet1['email'],'date' => $date]);
    }

    public function simpan($hash,Request $req) {
        $raw_data = $req -> validate([
            'nama_burung'           => 'required',
            'id_peternak'           => 'required',
            'tanggal_menetas'       => 'required',
            'tanggal_max_investasi' => 'nullable',
            'jenis_kelamin'         => 'required',
            'berat'                 => 'required',
            'riwayat_medis'         => 'nullable',
            'status'                => 'required',
        ]);
        

        $tanggal = $raw_data['tanggal_menetas'];
        $tanggal = date('Y-m-d', strtotime($tanggal . " + 275 day"));
        $raw_data['tanggal_max_investasi'] = $tanggal;

        DB::table('data_burungs')
            ->where('id', $hash)
            ->update(['nama_burung'         => $raw_data['nama_burung'], 
            'tanggal_menetas'               => $raw_data['tanggal_menetas'],
            'tanggal_max_investasi'         => $raw_data['tanggal_max_investasi'],
            'jenis_kelamin'                 => $raw_data['jenis_kelamin'],
            'berat'                         => $raw_data['berat'],
            'riwayat_medis'                 => $raw_data['riwayat_medis'],
            'status'                        => $raw_data['status']
            ]);
        
        $idPeternak = dataBurung::where('id',$hash)->get();
        foreach ($idPeternak as $idPeternak) {
            # code...
        }

        $peternak = dataPeternak::where('id',$idPeternak['id'])->get();
        foreach ($peternak as $peternak) {
            # code...
        }


        return $this->index($idPeternak['nama_burung']);
    }
}
