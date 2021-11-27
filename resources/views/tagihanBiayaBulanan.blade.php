@extends('layouts.main')
@include('partials.navbarINV')
@section('konten')
    <div class="container-fluid bg-dark h-100 pt-5">
        <div class="container bg-light p-3">
            <h3 class="h3">Tagihan pembayaran</h3>
            <div class="container border">
                <div class="row p-3">
                    <div class="col">
                        <div class="row">
                            <h4 class="h4">Untuk</h4></div>
                            <div class="row">
                                <form action="">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama" class="form-control" id="floatingInput" value="{{ $investor->nama }}" readonly>
                                        <label for="floatingInput">Nama Investor</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nik" class="form-control" id="floatingInput" value="{{ $investor->nik }}" readonly>
                                        <label for="floatingInput">NIK</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="alamat" class="form-control" id="floatingInput" value="{{ $investor->alamat }}" readonly>
                                        <label for="floatingInput">Alamat</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="phone" class="form-control" id="floatingInput" value="{{ $investor->phone }}" readonly>
                                        <label for="floatingInput">Nomot Telp.</label>
                                    </div>
                                </form>
                            </div>
                    </div>
                    <div class="col">
                        <h4 class="h4">Detail Burung</h4>
                        <form action="">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_burung" class="form-control" id="floatingInput" value="{{ $burung->nama_burung }}" readonly>
                                <label for="floatingInput">Nama Burung</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value="{{ $burung->berat }}" readonly>
                                <label for="floatingInput">Berat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value="{{ $burung->jenis_kelamin}}" readonly>
                                <label for="floatingInput">Jenis Kelamin</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value="{{ $burung->riwayat_medis}}" readonly>
                                <label for="floatingInput">Riwayat Medis</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value="{{ $burung->jadwal_perawatan }}" readonly>
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
                                        <td>Rp {{ $burung->biaya_tambahan/1000 }}@if ($burung->biaya_tambahan/1000==0)
                                            @else.000,-
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total pembayaran</strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="container text-center p-3 border w-50">
                                Rekening transfer atas nama Xxxx <br>
                                Mandiri : 098-098-098-098 <br>
                                BCA : 098-098-098-098 <br>
                                BNI : 098-098-098-098 <br>
                            </div>
                        </div>
                    </div>
                    <div class="col p-5">
                        <div class="container-fluid text-center border p-3 w-60">
                            <p class="p">Apakah Anda sudah transfer biaya perwatan?</p>
                            <a href="/paid/{{ $investasi->id }}/{{ $dash_data['email'] }}" class="btn btn-primary">Ya, Saya sudah transfer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection