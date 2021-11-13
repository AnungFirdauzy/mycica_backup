@extends('layouts.main')
@section('konten')
<div class="container-fluid bg-dark text-light vh-100 p-4">

    @if(session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert">
            {{ session('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="container py-3">
        <div class="container p-5 shadow-lg" style="width: 50%">
            <h2><strong>Edit</strong></h2>
            <form class="text-dark" action="/profil/peternak/edit/{{ $data_profil["email"] }}" method="POST">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["company"] }}">
                    <label for="floatingInput">Nama Perusahaan/Peternakan</label>
                    @error('company')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="ownername" class="form-control @error('ownername') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["ownername"] }}">
                    <label for="floatingInput">Nama</label>
                    @error('ownername')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["nik"] }}">
                    <label for="floatingInput">NIK</label>
                    @error('nik')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="npwp" class="form-control @error('npwp') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["npwp"] }}">
                    <label for="floatingInput">NPWP</label>
                    @error('npwp')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

                <label class="text-light" for="phone">Nomor Telp</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                    <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"  aria-label="Nomor Telepom" aria-describedby="basic-addon1" value="{{ $data_profil["phone"] }}">
                    @error('phone')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["email"] }}">
                    <label for="floatingInput">Email</label>
                    @error('email')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <a href="/dashboard/{{ $data_profil["email"] }}/peternak" style="text-decoration: none;color:red"><div class="container-flex text-center pt-1 d-inline-block rounded" style="border: 1px solid red;width:80px;height:39px">Batal</div></a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Simpan
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title" id="staticBackdropLabel">Data akan disimpan</h5>
                                <small>Klik "OK" untuk melanjutkan</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
