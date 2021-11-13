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

        <div class="container-fluid d-flex justify-content-start">
            <div class="container rounded bg-light p-5" style="width: 50%; border: 1px solid black">
                <h2><strong>Register</strong></h2>
                <form action="/registerINV" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                        @error('nama')
                            
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
                        <input type="text" name="age" class="form-control @error('text') is-invalid @enderror" placeholder="Umur" value="{{ old('age') }}">
                        @error('age')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="gender" aria-label="Default select example">
                            <option value="">Jenis Kelamin</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Permenpuan</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Nomor Telepom" aria-label="Nomor Telepom" aria-describedby="basic-addon1" value="{{ old('phone') }}">
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
                        <input type="text" name="job" class="form-control @error('job') is-invalid @enderror" placeholder="pekerjaan" value="{{ old('job') }}">
                        @error('job')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror" placeholder="Alasan berinvestasi" value="{{ old('reason') }}">
                        @error('reason')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" name="income" class="form-control @error('income') is-invalid @enderror" placeholder="Pendapatan kotor" value="{{ old('income') }}">
                        @error('income')
                            
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" name="netincome" class="form-control @error('netincome') is-invalid @enderror" placeholder="Pendapatan bersih" value="{{ old('netincome') }}">
                        @error('netincome')
                            
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
                        <input type="password" name="repassword" class="form-control @error('repass') is-invalid @enderror" placeholder="Konfirmasi Password">
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
                            <button type="submit" class="btn btn-dark">Ya</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection