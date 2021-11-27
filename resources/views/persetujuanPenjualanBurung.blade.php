@extends('layouts.main')
@include('partials.navbarPET')
@section('konten')
    <div class="container-fluid bg-dark p-3">
        <div class="container bg-light p-5">
            <h4 class="h4">Persetujuan penjualan burung</h4>
            <div class="row p-3">
                <div class="col">
                    <h4 class="h4">Investor</h4>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_investor->nama }}" readonly>
                            <label for="floatingInput">Nama Investor</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_investor->nik }}" readonly>
                            <label for="floatingInput">NIK</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_investor->alamat }}" readonly>
                            <label for="floatingInput">Alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_investor->phone }}" readonly>
                            <label for="floatingInput">Nomor Telp.</label>
                        </div>

                </div>
                <div class="col">
                    <h4 class="h4">Detail burung</h4>
                    
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_burung->nama_burung }}" readonly>
                            <label for="floatingInput">Nama Burung</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_burung->tanggal_menetas }}" readonly>
                            <label for="floatingInput">Tanggal Menetas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_burung->berat }}" readonly>
                            <label for="floatingInput">Berat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_burung->jenis_kelamin }}" readonly>
                            <label for="floatingInput">Jenis Kelamin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_burung->riwayat_medis }}" readonly>
                            <label for="floatingInput">Riwayat Medis</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{ $data_burung->jadwal_perawatan }}" readonly>
                            <label for="floatingInput">Jadwal Perawatan</label>
                        </div>
                    
                </div>
            </div>
            <div class="row p-3">
                <div class="col">
                    <div class="container p-3">
                        <h4 class="h4">Detail penjualan</h4>
                        <small>Mohon isi informasi berikut</small>
                        <form action="/jualpet/{{ $dash_data['email'] }}/{{ $id_transaksi }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_investasi" value="{{ $id_transaksi }}">
                            <div class="form-floating mb-3">
                                <input type="date" name="tgl_terjual" class="form-control @error('tgl_terjual') is-invalid @enderror" id="floatingInput" placeholder="Tanggal Penjualan" value="{{ old('tgl_terjual') }}" required>
                                <label for="floatingInput">Tanggal Penjualan</label>
                                @error('tgl_terjual')
                            
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror" id="floatingInput" placeholder="Nama Pembeli" value="{{ old('nama_pembeli') }}" required>
                                <label for="floatingInput">Nama Pembeli</label>
                                @error('nama_pembeli')
                            
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="Nomor Telp. Pembeli" value="{{ old('phone') }}" required>
                                <label for="floatingInput">Nomor Telp. Pembeli</label>
                                @error('phone')
                            
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror
                            </div>
                            <input type="hidden" name="status_penjualan" value="Menunggu konfirmasi">
                            <div class="form-floating mb-3">
                                <input type="text" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror" id="floatingInput" placeholder="Harga Jual" value="{{ old('harga_jual') }}" required>
                                <label for="floatingInput">Harga Jual</label>
                                @error('harga_jual')
                            
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nominal_transfer" class="form-control @error('nominal_transfer') is-invalid @enderror" id="floatingInput" placeholder="Nominal Transfer" value="{{ old('nominal_transfer') }}" required>
                                <label for="floatingInput">Nominal Transfer</label>
                                @error('nominal_transfer')
                            
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror
                            </div>

                            
                            
                            <div class="container text-center">
                                <p>Apakah Andda telah mentransfer uang investor?</p>
                                <button type="submit" class="btn btn-primary">Ya, Saya telah mentransfernya</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection