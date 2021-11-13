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
                                </div>
                                <div class="col p-1 text-end">
                                    <h1>Rp 1.200.000</h1>
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
                                    <h1>Rp 3.000.000</h1>
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
                        <div class="card-body"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-dark shadow p-3" style="width: 650px;height: 725px">
                        <h3 class="card-title">Katalog Peternak :</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-dark shadow p-3" style="width: 444px;height: 725px">
                        <h3 class="card-title">Pemberitahuan Saya :</h3>
                        <div class="alert alert-success alert-dismissible mf-auto fade show" id="popup" role="alert" style="width: 400px;">
                            <strong>Selamat</strong>, Anda berhasil login.
                            <button type="button" id="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection