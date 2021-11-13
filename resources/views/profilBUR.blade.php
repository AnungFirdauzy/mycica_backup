@extends('layouts.main')

@section('konten')

    <section class="container-flex text-light bg-dark vh-100 pt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2><a href="/katalog/peternak/{{ $hash }}"><i class="bi bi-arrow-left-square" style="color:white;margin-right:10px"></a></i>Datail Burung</h2>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="container shadow-lg p-3">
                        <img src="{{ URL::asset("/Images/dummy-pict.jpg") }}" class="border p-1" alt="" style="width: 300px; margin:20px">
                        <div class="container p-1">
                            <a href="/katalog/edit/{{ $data_burung['nama_burung'] }}"><button class="btn btn-outline-primary me-1" style="width: 130px">Edit</button></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <div class="container shadow-lg p-5">
                            <h5><strong>Detail Burung</strong></h5>
                            <form class="container-flex text-dark" action="">

                                <div class="form-floating mb-3">
                                    <input type="text" name="nama_burung" class="form-control" id="floatingInput" value="{{ $data_burung["nama_burung"] }}" readonly>
                                    <label for="floatingInput">Nama Burung</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="tanggal_menetas" class="form-control" id="floatingInput" value="{{ $data_burung["tanggal_menetas"] }}" readonly>
                                    <label for="floatingInput">Tanggal Menetas</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="jenis_kelamin" class="form-control" id="floatingInput" value="{{ $data_burung["jenis_kelamin"] }}" readonly>
                                    <label for="floatingInput">Jenis Kelamin</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="berat" class="form-control" id="floatingInput" value="{{ $data_burung["berat"] }}" readonly>
                                    <label for="floatingInput">Berat</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="riwayat_medis" class="form-control" id="floatingInput" value="{{ $data_burung["riwayat_medis"] }}" readonly>
                                    <label for="floatingInput">Riwayat Medis</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="status" class="form-control" id="floatingInput" value="{{ $data_burung["status"] }}" readonly>
                                    <label for="floatingInput">Status Transaksi Burung</label>
                                </div>

                                @if ($data_burung['status'] === 'tersedia')
                                    <div class="form-floating mb-3">
                                        <input type="text" name="tanggal_max_investasi" class="form-control" id="floatingInput" value="{{ $data_burung["tanggal_max_investasi"] }}" readonly>
                                        <label for="floatingInput">Tanggal Maximal Investasi</label>
                                    </div>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



@endsection
@section('script')
@endsection