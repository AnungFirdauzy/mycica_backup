@extends('layouts.main')
@include('partials.navbarINV')
@section('konten')
        <div class="container-fluid bg-dark h-100 p-5">
            <div class="container bg-light p-5">
                <h4 class="h4">Pemberitahuan Penjualan burung</h4>
                <div class="row p-5 border">
                    <div class="col">
                        <h5 class="h5">Datail Burung</h5>
                        <form action="">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['nama_burung'] }}">
                                <label for="floatingInput">Nama Burung</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['tanggal_menetas'] }}">
                                <label for="floatingInput">Tanggal Menetas</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['berat'] }}">
                                <label for="floatingInput">Berat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['jenis_kelamin'] }}">
                                <label for="floatingInput">Jenis Kelamin</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['riwayat_medis'] }}">
                                <label for="floatingInput">Riwayat Medis</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" value="{{ $burung['jadwal_perawatan'] }}">
                                <label for="floatingInput">Jadwal Perawatan</label>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <table class="table table-borderless" style="height:100%">
                            <tbody>
                                <tr>
                                    <td class="align-middle">
                                        <div class="container-fluid border p-3 text-center">
                                            <p>Burung anda telah berada pada umur batas jual.</p>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Jual Sekarang</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Modal --}}
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-dark">
                            <h5 class="modal-title" id="staticBackdropLabel">Burung akan dijual</h5>
                            <small>Klik "Jual Burung" untuk melanjutkan</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Jual Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Modal2 --}}
            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-dark">
                            <h5 class="modal-title" id="staticBackdropLabel">Pengajuan penjualan berhasil</h5>
                            <small>Apabila burung terjual, Anda akan mendapatkan notifikasi untuk detailnya</small>
                        </div>
                        <div class="modal-footer">
                            <a href="/jual/sistemsale/{{ $dash_data['email'] }}/{{ $investasi['id'] }}" class="btn btn-primary">OK</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection