@extends('layouts.main')
@include('partials.navbarADM')
@section('konten')

<div class="container-fluid bg-dark p-5" style="min-height: 100%">
    <div class="container bg-light p-5 text-center">
        <h3>Selamat Datang {{ $name }}</h3>
        <p>Apa yang akan Anda lakukan hari ini ?</p>
        <div class="container" style="margin: auto">
            <div class="row mb-5">
                <div class="col-3">
                    <a href="/adm/investasi/{{ $email }}" class="btn btn-outline-dark p-1">
                        <img src="{{ URL::asset("Images/Icon Investasi.png") }}" alt="" class="img-fluid img-thumbnail" style="max-height: 200px">
                        <h4>Riwayat Investasi</h4>
                    </a>
                </div>
                <div class="col-3">
                    <a href="/adm/katalog/{{ $email }}" class="btn btn-outline-dark p-1">
                        <img src="{{ URL::asset("Images/Icon Catalog.png") }}" alt="" class="img-fluid img-thumbnail" style="max-height: 200px">
                        <h4>Katalog Burung</h4>
                    </a>
                </div>
                <div class="col-3">
                    <a href="/adm/investor/{{ $email }}" class="btn btn-outline-dark p-1">
                        <img src="{{ URL::asset("Images/Icon Investor.png") }}" alt="" class="img-fluid img-thumbnail" style="max-height: 200px">
                        <h4>Daftar Investor</h4>
                    </a>
                </div>
                <div class="col-3">
                    <a href="/adm/peternak/{{ $email }}" class="btn btn-outline-dark p-1">
                        <img src="{{ URL::asset("Images/Icon Breeder.png") }}" alt="" class="img-fluid img-thumbnail" style="max-height: 200px">
                        <h4>Daftar Petenak</h4>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection
@section('script')
@endsection