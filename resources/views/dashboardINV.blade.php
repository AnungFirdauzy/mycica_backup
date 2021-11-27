@extends('layouts.main')
@include('partials.navbarINV')
@section('konten')
    <div class="bg-dark w-100 vh-100" style="color:white">
        <div class="container-fluid pt-5 ps-5">
            <div class="row">
                <div class="col-1">
                    <div class="card bg-dark border-white shadow p-1">
                        <img src="{{ URL::asset("Images/Profil Pict.png") }}" alt="" class="card-img-top">
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-dark shadow" style="height: 135px">
                        <div class="card-body">
                            <div class="row p-3">
                                <div class="col">
                                    <div class="row">
                                        <div class="col"><h3>{{ $dash_data['nama'] }}</h3></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Total biaya yang telah diinvestasikan adalah</div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><a href="/investor/listburung/{{ $dash_data['email'] }}" style="text-decoration: None">Lihat riwayat transaksi</a></div>
                                    </div>
                                </div>
                                <div class="col p-1 text-end">
                                    <h1>Rp {{ $nominal_invest }},-</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow bg-dark" style="width: 780px;height: 135px">
                        <div class="card-body">
                            <div class="row p-3">
                                <div class="col">
                                    <div class="row">
                                        <div class="col"><h4>Harga burung murai hari ini</h4></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Naik x% dari harga kemarin</div>
                                    </div>
                                </div>
                                <div class="col p-1 text-end">
                                    <h1>Rp 0</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card bg-dark shadow p-3" style="width: 650px;height: 725px">
                        <h3 class="card-title">Investasi Saya :</h3>
                        <div class="card-body overflow-auto">
                            @if ($burungINV!='None')
                                @foreach ($burungINV as $burungINV)
                                    <a href="/detail/investasi/{{ $burungINV->id_burungs }}" style="text-decoration: none;color:white"><div class="row mb-3 shadow">
                                        <div class="col-3"><img src="{{ URL::asset("Images/dummy-pict.jpg") }}" alt="" style="width: 100px"></div>
                                        <div class="col text-start"><h4 class="h4">{{ $burungINV->nama_burung }}</h4></div>
                                        <div class="col text-end"><h4 class="h4">{{ $burungINV->tgl_jatuhTempo }}</h4></div>
                                    </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-dark shadow p-3" style="width: 650px;height: 725px">
                        <h3 class="card-title">Katalog Peternak :</h3>
                        <div class="card-body overflow-auto">
                            @foreach ($burung as $burung)
                                <a href="/katalog/profil/{{ $burung['nama_burung'] }}/{{ $dash_data['email'] }}" style="text-decoration: none;color:white"><div class="row mb-3 shadow">
                                    <div class="col-3"><img src="{{ URL::asset("Images/dummy-pict.jpg") }}" alt="" style="width: 100px"></div>
                                    <div class="col text-start"><h4 class="h4">{{ $burung['nama_burung'] }}</h4></div>
                                    <div class="col text-end"><h4 class="h4">{{ $burung['tanggal_max_investasi'] }}</h4></div>
                                </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-dark shadow p-3" style="width: 444px;height: 725px">
                        <h3 class="card-title">Pemberitahuan Saya :</h3>
                        <div class="card-body overflow-auto">
                            <div class="row">
                                <div class="alert alert-success alert-dismissible mf-auto fade show" id="popup" role="alert" style="width: 400px;">
                                    <strong>Selamat</strong>, Anda berhasil login.
                                    <button type="button" id="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            @foreach ($notiftagihan as $tagihan)
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible mf-auto fade show" id="popup" role="alert" style="width: 400px;">
                                        <p>Anda memiliki tagihan untuk {{ $tagihan->nama_burung }} </p>
                                        <hr>
                                        <a href="/tagihan/{{ $dash_data['email'] }}/{{ $tagihan->id_burungs }}" class="btn btn-primary">Lihat Tagihan</a>
                                        <button type="button" id="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($notifjual as $jual)
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible mf-auto fade show" id="popup" role="alert" style="width: 400px;">
                                        <p>Burung {{ $jual->nama_burung }} mencapai usia maksimal !</p>
                                        <hr>
                                        <a href="/jual/{{ $dash_data['email'] }}/{{ $jual->id }}" class="btn btn-primary">Jual Sekarang</a>
                                        <button type="button" id="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection