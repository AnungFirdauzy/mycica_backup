@extends('layouts.main')
@include('partials.navbarADM')
@section('konten')
    <div class="container-fluid bg-dark p-5" style="min-height: 100%">
        <div class="container text-center bg-light p-3">
            <h2 class="h2 mb-5">Riwayat Transaksi</h2>
            <div class="container">
                
                @foreach ($data as $data)
                    <div class="row shadow p-3 mb-4">
                        <div class="col text-start">
                            <div class="row"><p class="fs-4 m-0">{{ $data->nama}}</p></div>
                            <div class="row"><p class="fs-5 m-0">{{ $data->nama_burung }}</p></div>
                            <div class="row"><p class="fs-6 m-0">Transfer biaya perawatan</p></div>
                        </div>
                        <div class="col">
                            <table class="table table-borderless text-end h-100">
                                <tbody>
                                    <td class="align-middle">
                                        <a href="/adm/investasi/detail/{{ $data->id }}/{{ $email }}" style="text-decoration: none">Lihat riwayat transaksi</a>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection