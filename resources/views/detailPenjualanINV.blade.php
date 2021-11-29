@extends('layouts.main')
@include('partials.navbarINV')
@section('konten')
<section class="container-flex text-light bg-dark pt-5" style="min-height: 100%">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2><a href="/dashboard/{{ $dash_data['email'] }}/peternak"><i class="bi bi-arrow-left-square" style="color:white;margin-right:10px"></a></i>Datail Burung</h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <div class="container shadow-lg p-3">
                    <img src="{{ URL::asset("/Images/dummy-pict.jpg") }}" class="border p-1 d-block" alt="" style="width: 300px; margin:auto">
                    <p class="fs-3">{{ $investor['nama'] }}</p>
                    
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="container shadow-lg p-5">
                        <h5><strong>Detail Burung</strong></h5>
                        <form class="container-flex text-dark" action="">

                            <div class="form-floating mb-3">
                                <input type="text" name="nama_burung" class="form-control" id="floatingInput" value="{{ $burung->nama_burung }}" readonly>
                                <label for="floatingInput">Nama Burung</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="tanggal_menetas" class="form-control" id="floatingInput" value="{{ $burung->tanggal_menetas }}" readonly>
                                <label for="floatingInput">Tanggal Menetas</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="jenis_kelamin" class="form-control" id="floatingInput" value="{{ $burung->jenis_kelamin }}" readonly>
                                <label for="floatingInput">Jenis Kelamin</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="berat" class="form-control" id="floatingInput" value="{{ $burung->berat}}" readonly>
                                <label for="floatingInput">Berat</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="riwayat_medis" class="form-control" id="floatingInput" value="{{ $burung->riwayat_medis }}" readonly>
                                <label for="floatingInput">Riwayat Medis</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="biaya_tambahan" class="form-control" id="floatingInput" value="{{ $burung->biaya_tambahan }}" readonly>
                                <label for="floatingInput">Biaya Tambahan Perawatan</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" name="biaya_tambahan" class="form-control" id="floatingInput" value="{{ $burung->jadwal_perawatan }}" readonly>
                                <label for="floatingInput">Jadwal Perawatan</label>
                            </div>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col bg-light text-dark p-3">
                <h3 class="h3"><strong>Detail penjualan</strong></h3>
                <form action="">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_pembeli" class="form-control" id="floatingInput" value="{{ $penjualan->nama_pembeli }}" readonly>
                                <label for="floatingInput">Nama Pembeli</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_pembeli" class="form-control" id="floatingInput" value="{{ $penjualan->phone }}" readonly>
                                <label for="floatingInput">Nomor Telp</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_pembeli" class="form-control" id="floatingInput" value="{{ $penjualan->tgl_terjual }}" readonly>
                                <label for="floatingInput">Tanggal Penjualan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_pembeli" class="form-control" id="floatingInput" value="{{ $penjualan->harga_jual }}" readonly>
                                <label for="floatingInput">Harga Jual</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_pembeli" class="form-control" id="floatingInput" value="{{ $penjualan->nominal_transfer }}" readonly>
                                <label for="floatingInput">Nominal Transfer</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="container text-center shadow p-5">
                    <p>Apakah Anda telah menerima uang dari investor ?</p>
                    <a href="/jual/terima/{{ $dash_data['email'] }}/{{ $id_transaksi }}" class="btn btn-primary">Ya, telah menerimanya</a>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection