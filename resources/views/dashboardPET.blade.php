@extends('layouts.main')
@include('partials.navbarPET')
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
                    <a href="/peternak/investorlist/{{ $dash_data['email'] }}" style="text-decoration: none;color: white">
                        <div class="card bg-dark shadow" style="height: 135px">
                            <div class="card-body">
                                <div class="row p-3">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><h3>{{ $dash_data['ownername'] }}</h3></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Total investasi yang anda kelola</div>
                                        </div>
                                    </div>
                                    <div class="col p-1 text-end">
                                        <h1>{{ $jumlah_investasi }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
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
                        <h3 class="card-title">Investasi yang dikelola :</h3>
                        <div class="card-body overflow-auto">
                            @if ($burungINV!='None')
                                @foreach ($burungINV as $burungINV)
                                    <a href="/katalog/investasi/pet/detail/{{ $burungINV->id }}/{{ $dash_data['email'] }}" style="text-decoration: none;color:white">
                                        <div class="row mb-3 shadow">
                                            <div class="col-3"><img src="{{ asset("storage/".$burungINV->foto_burung) }}" alt="" style="max-width: 100px"></div>
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
                        <div class="card-tittle">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Katalog Burung yang tersedia :</h3>
                                </div>
                                <div class="col text-end">
                                    <a href="/katalog/peternak/{{ $dash_data['email'] }}" style="text-decoration: none"><small class="text-secondary">Tampilkan lebih banyak</small></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-auto">
                            @foreach ($burung as $burung)
                                <a href="/katalog/profil/{{ $burung['nama_burung'] }}" style="text-decoration: none;color:white"><div class="row mb-3 shadow">
                                    <div class="col-3"><img src="{{ asset("storage/".$burung['foto_burung']) }}" alt="" style="width: 100px"></div>
                                    <div class="col text-start"><h4 class="h4">{{ $burung['nama_burung'] }}</h4></div>
                                    <div class="col text-end"><h4 class="h4">{{ $burung['tanggal_max_investasi'] }}</h4></div>
                                </div></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-dark shadow p-3" style="width: 444px;height: 725px">
                        <h3 class="card-title">Pemberitahuan Saya :</h3>
                            <div class="row px-3">
                                <div class="alert alert-success alert-dismissible mf-auto fade show" id="popup" role="alert" style="width: 400px;">
                                    <strong>Selamat</strong>, Anda berhasil login.
                                    <button type="button" id="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            @foreach ($notifpermintaan as $notif)
                                <div class="row px-3">
                                    <div class="alert alert-danger alert-dismissible mf-auto fade show" id="popup" role="alert" style="width: 400px;">
                                        <p>Permintaan verifikasi pembayaran untuk {{ $notif->nama_burung }} </p>
                                        <hr>
                                        <a href="/konfirmasi/pembayaran/{{ $notif->nama_burung }}" class="btn btn-primary">Lihat Permintaan</a>
                                        <button type="button" id="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($notifjual as $jual)
                                <div class="row px-3">
                                    <div class="alert alert-danger alert-dismissible mf-auto fade show" id="popup" role="alert" style="width: 400px;">
                                        <p>Burung {{ $jual->nama_burung }} milik {{ $jual->nama }} mengajukan penjualan !</p>
                                        <hr>
                                        <a href="/jualpet/{{ $dash_data['email'] }}/{{ $jual->id }}" class="btn btn-primary">Jual Sekarang</a>
                                        <button type="button" id="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endforeach
                        
                    </div>
                </div>
            </div>
    </div>
@endsection