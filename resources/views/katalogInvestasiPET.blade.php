@extends('layouts.main')
@include('partials.navbarPET')
@section('konten')
    <div class="container-fluid text-center bg-dark h-100 text-light p-3">
        <h1 class="h1">Daftar Investasi Anda</h1>
        
        <div class="container-fluid pt-5">
            <div class="row row-cols-5">
                @foreach ($katalog as $ktlg)
                        <div class="col text-start p-0">
                            <a href="/katalog/investasi/pet/detail/{{ $ktlg->id }}/{{ $dash_data['email'] }}" style="text-decoration: none; color: black"><div class="card mb-3 shadow" style="width: 330px;">
                                <img src="{{ URL::asset("Images/dummy-pict.jpg") }}" class="card-img-top img-thumbnail mx-auto mt-1" alt="Foto Burung" style="width: 310px">
                                <div class="card-body">
                                    @if ($ktlg->riwayat_transaksi == 'Belum dibayar')
                                        <span class="badge bg-danger">Menunggu Pembayaran</span>
                                    @elseif($ktlg->riwayat_transaksi == 'Menunggu verifikasi')
                                        <span class="badge bg-warning">Permintaan Verifikasi</span>
                                    @else
                                        <span class="badge bg-success">Tidak ada tagihan</span>
                                    @endif
                                    <h5 class="h5">{{ $ktlg->nama_burung }}</h5>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col"><p>Tanggal Investasi </p></div>
                                            <div class="col">: {{ $ktlg->tgl_investasi }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><p>Jenis Kelamin </p></div>
                                            <div class="col">: {{ $ktlg->jenis_kelamin }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><p>Tanggal Jatuh Tempo </p></div>
                                            <div class="col">: {{ $ktlg->tgl_jatuhTempo }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection