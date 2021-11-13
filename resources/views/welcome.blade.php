@extends('layouts.main')
@section('konten')
    
    {{-- Navbar --}}
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid px-5">
        <a class="navbar-brand" href="#"><img src="Images/Burung Only.png" alt="Logo Mycica" style="width:30px;" class="d-inline-block align-text-top"> MyCica</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Investasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Investor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Peternak</a>
                </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/login"><button class="btn btn-outline-dark" style="width: 100px">Masuk</button></a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Images/Slide show.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h1>MyCica</h1>
            <p>Some representative placeholder content for the first slide.</p>
            <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Bergabung Sekarang</button>
            </div>
        </div>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
            <h4>Anda ingin bergabung sebagai </h4>
            </div>
            <div class="modal-footer">
            <a href="/registerINV"><button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Investor</button></a>
            <a href="/registerPET"><button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Peternak</button></a>
            </div>
        </div>
        </div>
    </div>
    
@endsection
@section('script')
    
@endsection