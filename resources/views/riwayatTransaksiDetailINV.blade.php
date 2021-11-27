@extends('layouts.main')
@include('partials.navbarINV')
@section('konten')
    <div class="container-fluid p-5 h-100 bg-dark">
        <div class="container bg-light p-5">
            <h4 class="h4">Riwayat Transaksi</h4>
            <div class="row p-5">
                <div class="col p-3">
                    <h5 class="h5">Investor</h5>
                    <form action="">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->nama }}">
                            <label for="floatingInput">Nama Investor</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->nik }}">
                            <label for="floatingInput">NIK</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->alamat }}">
                            <label for="floatingInput">Alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->phone }}">
                            <label for="floatingInput">Nomor Telp.</label>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <h5 class="h5">Detail Burung</h5>
                    <form action="">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->nama_burung }}">
                            <label for="floatingInput">Nama Burung</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->tanggal_menetas }}">
                            <label for="floatingInput">Tanggal Menetas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->berat }}">
                            <label for="floatingInput">Berat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->jenis_kelamin}}">
                            <label for="floatingInput">Jenis Kelamin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->riwayat_medis}}">
                            <label for="floatingInput">Riwayat Medis</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ $data_transaksi->jadwal_perawatan}}">
                            <label for="floatingInput">Jadwal Perawatan</label>
                        </div>
                    </form>
                </div>
            </div>
            @foreach ($data_riwayat as $item)
                <div class="row p-5">
                        <div class="row shadow p-3">
                            <div class="col">
                                <p class="fs-5 m-0">Transfer Biaya Perawatan</p>
                                <p class="fs-6 m-0">Rekening Bank Mandiri {{ $data_transaksi->nama }}</p>
                                <p class="fs-6 m-0">{{ $item->tgl_transaksi }}</p>
                            </div>
                            <div class="col">
                                <table class="ms-auto" style="height: 100%;">
                                    <tbody>
                                        <tr>
                                            <td class="align-middle" style="width: 100%">
                                                <p class="fs-3">Rp {{ ($item->biaya_perawatan+$item->biaya_tambahan)/1000 }}.000,-</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection