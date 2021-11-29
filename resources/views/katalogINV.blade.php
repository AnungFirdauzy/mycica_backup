@extends('layouts.main')

@include('partials.navbarINV')

    @section('konten')
    
        <div class="container-fluid bg-dark text-light pt-3 vh-100 px-5">
            <div class="container text-center">
                <h1>Daftar Katalog</h1>
            </div>

            <div class="container-fluid">
                <div class="row row-cols-5 mt-3">
                    @foreach ($burung as $item)
                        <a href="/katalog/detailBurung/{{ $dash_data['email'] }}" style="text-decoration: none; color: black"><div class="card me-auto mb-3 shadow" style="width: 330px;">
                            <img src="{{ asset("storage/".$item->foto_burung) }}" class="card-img-top img-thumbnail mx-auto mt-1" alt="Foto Burung" style="width: 310px">
                            <div class="card-body">
                                <h5 class="card-title" style="margin-top: -15px">{{ $item->nama_burung }}</h5>
                                <div class="container">
                                    <div class="row">
                                        <div class="col"><p>Tanggal Menetas </p></div>
                                        <div class="col">: {{ $item->tanggal_menetas }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>Jenis Kelamin </p></div>
                                        <div class="col">: {{ $item->jenis_kelamin }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><p>Dapat Dijual Sebelum </p></div>
                                        <div class="col">: {{ $item->tanggal_max_investasi }}</div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection

    @section('script')
    @endsection