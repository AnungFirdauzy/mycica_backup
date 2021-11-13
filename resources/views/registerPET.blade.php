@extends('layouts.main')
@section('konten')
    <div class="bg-image w-100 pt-5" style="background-image: url('Images/Register bg.png');height: 100vh">
        <div class="container">
        @if(session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert">
            {{ session('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="container" style="margin-top: 10%">
            <div class="container rounded bg-light p-5" style="width: 50%; border: 1px solid black">
                <h2><strong>Register</strong></h2>
                <form action="/registerPET" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" placeholder="Nama Peternakan/Perusahaan" value="{{ old('company') }}">
                        @error('company')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" name="ownername" class="form-control @error('ownername') is-invalid @enderror" placeholder="Nama Pemilik/Peternak" value="{{ old('ownername') }}">
                        @error('ownername')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="Nomor Induk Kependudukan (NIK)" value="{{ old('nik') }}">
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" name="npwp" class="form-control @error('npwp') is-invalid @enderror" placeholder="NPWP" value="{{ old('npwp') }}">
                        @error('npwp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Nomor Telepon" aria-label="Nomor Telepon" aria-describedby="basic-addon1" value="{{ old('phone') }}">
                        @error('phone')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{ old('email') }}">
                        @error('email')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" name="repassword" class="form-control @error('repassword') is-invalid @enderror" placeholder="Konfirmasi Password">
                        @error('repassword')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>
                    
                    {{-- <button type="submit" class="btn btn-primary">Daftar</button> --}}
                    <!-- Button trigger modal -->
                    <button type="button" style="width: 100px" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Daftar
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>Apakah data diri yang dimasukkan sudah benar ?</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-dark" data-bs-dismiss="modal">Ya</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection