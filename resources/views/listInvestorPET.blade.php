@extends('layouts.main')
@include('partials.navbarPET')
@section('konten')
    <div class="container-fluid bg-dark p-5" style="min-height: 100%">
        <div class="container text-center bg-light p-5">
            <h2 class="h2 mb-5">Daftar Investor Anda</h2>    
                @foreach ($data_investor as $data_investor)
                    <div class="row my-3 p-2 text-start shadow">
                        <div class="col col-2">
                            <img src="{{ URL::asset("/Images/dummy-pict.jpg") }}" class="border p-1 d-block" alt="" style="max-height:100px; margin:auto">
                        </div>
                        <div class="col py-3 ">
                            <div class="row">
                                <h5 class="h5">{{ $data_investor->nama}}</h5>
                            </div>
                            <div class="row">
                                <p class="p">{{ $data_investor->nama_burung }}</p>
                            </div>
                        </div>
                        <div class="col col-2 text-center py-3">
                            <div class="row">
                                <p>{{ $data_investor->tgl_investasi }}</p>
                            </div>
                            <div class="row">
                                <a href="/peternak/investorlist/{{ $dash_data['email'] }}/{{ $data_investor->id }}" style="text-decoration: none">Lihat riwayat transaksi</a>
                            </div>
                        </div>
                    </div>
                @endforeach

        </div>
    </div>
@endsection