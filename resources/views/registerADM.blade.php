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
                <h2><strong>Add Admin Account</strong></h2>
                <form action="/regadm" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="nama_admin" class="form-control @error('nama_admin') is-invalid @enderror" placeholder="Nama Admin" value="{{ old('nama_admin') }}">
                        @error('nama_admin')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="email" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}">
                        @error('username')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" name="repassword" class="form-control @error('repassword') is-invalid @enderror" placeholder="Konfirmasi Password" value="{{ old('repassword') }}">
                        @error('repassword')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>
                    
                    {{-- <button type="submit" class="btn btn-primary">Daftar</button> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambahkan
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