@extends('layouts.main')

@section('konten')

    <section class="container-flex text-light bg-dark vh-100 pt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2><a href="/dashboard/{{ $data->email }}/investor"><i class="bi bi-arrow-left-square" style="color:white;margin-right:10px"></a></i>Datail Burung</h2>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="row">
                        <div class="container shadow-lg p-3">
                            <img src="{{ asset("storage/".$data->foto_burung) }}" class="border p-1 d-block" alt="" style="width: 300px; margin:auto">
                            <a href="" style="text-decoration: none;color: white"><p>{{ $data->ownername }}</p></a>
                            @if("A"=="A")
                            <div class="container p-1">
                                @if($data->riwayat_transaksi=='Belum dibayar')<a href="/tagihan/{{ $data->email }}/{{ $data->id_burungs }}" class="btn btn-primary" role="button">Bayar tagihan</a>@else
                                <a href="#" class="btn btn-outline-secondary disabled" tabindex="-1" role="button" aria-disabled="true">Belum ada tagihan</a>@endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <div class="container shadow-lg p-5">
                            <h5><strong>Detail Burung</strong></h5><small>Terakhir diperbarui {{ $data->updated_at }}</small>
                            <form class="container-flex text-dark" action="">

                                <div class="form-floating mb-3">
                                    <input type="text" name="nama_burung" class="form-control" id="floatingInput" value="{{ $data->nama_burung }}" readonly>
                                    <label for="floatingInput">Nama Burung</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="tanggal_menetas" class="form-control" id="floatingInput" value="{{ $data->tanggal_menetas }}" readonly>
                                    <label for="floatingInput">Tanggal Menetas</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="jenis_kelamin" class="form-control" id="floatingInput" value="{{ $data->jenis_kelamin }}" readonly>
                                    <label for="floatingInput">Jenis Kelamin</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="berat" class="form-control" id="floatingInput" value="{{ $data->berat }}" readonly>
                                    <label for="floatingInput">Berat</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="riwayat_medis" class="form-control" id="floatingInput" value="{{ $data->riwayat_medis }}" readonly>
                                    <label for="floatingInput">Riwayat Medis</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="jadwal_perawatan" class="form-control" id="floatingInput" value="{{ $data->jadwal_perawatan }}" readonly>
                                    <label for="floatingInput">Jadwal Perawatan</label>
                                </div>

                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="biaya_perawatan_tambahan" class="form-control" id="floatingInput" value="{{ $data->biaya_tambahan }}" readonly>
                                    <label for="floatingInput">Biaya Perawatan Tambahan</label>
                                </div>
                            

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