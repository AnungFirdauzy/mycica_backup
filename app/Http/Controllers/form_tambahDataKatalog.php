<?php

namespace App\Http\Controllers;

use App\Models\dataBurung;
use Carbon\Carbon;
use App\Models\dataPeternak;
use Illuminate\Http\Request;

class form_tambahDataKatalog extends Controller
{
    public function index($hash) {
        $date = new Carbon('2016-01-23');
        $data_pet = dataPeternak::where('email',$hash)->get();
        foreach ($data_pet as $data_pet) {
        }
        return view('form_tambahDataKatalog',['data_pet' => $data_pet,'date' => $date]);
    }

    public function katalog($hash) {
        $ownerdata = dataPeternak::where('email',$hash)->get();
        foreach ($ownerdata as $ownerdata) {
        }
        $burung = dataBurung::where('id_peternak',$ownerdata['email'])->get();
        return view('katalogPET',['burung' => $burung,'dash_data' => $ownerdata]);
    }

    public function simpan($id,Request $req){
        
        $raw_data = $req -> validate([
            'id_peternak'           => 'required',
            'nama_burung'           => 'required|max:255|unique:data_burungs',
            'tanggal_menetas'       => 'required|date',
            'tanggal_max_investasi' => 'required',
            'jenis_kelamin'         => 'required',
            'berat'                 => 'required|numeric',
            'riwayat_medis'         => 'nullable',
            'foto_burung'           => 'nullable',
            'biaya_tambahan'        => 'nullable',
            'jadwal_perawatan'      => 'nullable',
            'status'                => 'required',
        ]);

        
        $tanggal = $raw_data['tanggal_menetas'];
        $tanggal = date('Y-m-d', strtotime($tanggal . " + 275 day"));
        $raw_data['tanggal_max_investasi'] = $tanggal;
        
        $data_pet=dataPeternak::where('id',$id)->get();

        foreach ($data_pet as $data_pet) {
        }

        dataBurung::create($raw_data);
        $katalog = new KatalogController();
        return $katalog->getData($data_pet['email']);
        

    }
}
