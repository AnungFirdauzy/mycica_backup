@extends('layouts.main')
@include('partials.navbarPET')
@section('konten')
    <div class="container-fluid bg-dark h-100 pt-5">
        <div class="container bg-light p-3">
            <h3 class="h3">Pemberitahuan pembayaran investasi</h3>
            <div class="container border">
                <div class="row p-3">
                    <div class="col">
                        <div class="row">
                            <h4 class="h4">Dari</h4></div>
                            <div class="row">
                                <form action="">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" value="{{ $dash_data['nama'] }}" readonly>
                                        <label for="floatingInput">Nama Investor</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" value="{{ $dash_data['nik'] }}" readonly>
                                        <label for="floatingInput">NIK</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" value="{{ $detailInvestor['alamat'] }}" readonly>
                                        <label for="floatingInput">Alamat</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" value="{{ $dash_data['phone'] }}" readonly>
                                        <label for="floatingInput">Nomot Telp.</label>
                                    </div>
                                </form>
                            </div>
                    </div>
                    <div class="col">
                        <h4 class="h4">Detail Burung</h4>
                        <form action="">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['nama_burung'] }}" readonly>
                                <label for="floatingInput">Nama Burung</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['tanggal_menetas'] }}" readonly>
                                <label for="floatingInput">Tanggal Menetas</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['berat'] }}" readonly>
                                <label for="floatingInput">Berat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['jenis_kelamin'] }}" readonly>
                                <label for="floatingInput">Jenis Kelamin</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['riwayat_medis'] }}" readonly>
                                <label for="floatingInput">Riwayat Medis</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['jadwal_perawatan'] }}" readonly>
                                <label for="floatingInput">Jadwal Perawatan</label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col">
                        <div class="row">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Jenis Biaya</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Biaya Perwatan 1 Bulan</td>
                                        <td>Rp 500.000,-</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Tambahan</td>
                                        <td>Rp {{ $burung['biaya_tambahan']/1000 }}.000,-</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total pembayaran</strong></td>
                                        <td><strong>Rp {{ 500+($burung['biaya_tambahan'])/1000 }}.000,-</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col px-5">
                        <div class="container-fluid text-center border p-3 w-60">
                            <p class="p">Apakah Anda sudah terima pembayaran ini?</p>
                            <a href="/konfirmasi/pet/{{ $riwayat['id'] }}/{{ $dash_data['email'] }}" class="btn btn-primary">Ya, Saya sudah terima pembayaran ini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection