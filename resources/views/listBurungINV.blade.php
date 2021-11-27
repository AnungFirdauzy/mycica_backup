@extends('layouts.main')
@include('partials.navbarINV')
@section('konten')
    <div class="container-fluid bg-dark p-5" style="min-height: 100%">
        <div class="container text-center bg-light p-3">
            <h2>List Riwayat Per Burung</h2>
            <div class="container">
                @foreach ($data_burung as $burung)
                    <div class="row my-3 p-2 text-start shadow">
                        <div class="col col-2">
                            <img src="{{ URL::asset("/Images/dummy-pict.jpg") }}" class="border p-1 d-block" alt="" style="max-height:100px; margin:auto">
                        </div>
                        <div class="col py-3 ">
                            <div class="row">
                                <h5 class="h5">{{ $burung->nama_burung }}</h5>
                            </div>
                        </div>
                        <div class="col col-2 text-center py-3">
                            <div class="row">
                                <p>{{ $burung->tgl_investasi }}</p>
                            </div>
                            <div class="row">
                                <a href="/investor/listburung/{{ $dash_data['email'] }}/{{ $burung->id }}" style="text-decoration: none">Lihat riwayat transaksi</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection