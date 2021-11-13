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
            <form class="text-dark" action="/profil/investor/edit/{{ $data_profil["email"] }}" method="POST">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["nama"] }}">
                    <label for="floatingInput">Nama</label>
                    @error('nama')
                        
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
                    <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["age"] }}">
                    <label for="floatingInput">Umur</label>
                    @error('age')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

                <div class="mb-3 form-floating">
                    <select class="form-select" name="gender" id="gender-form" aria-label="Default select example">
                        <option selected>{{ $data_profil["gender"] }}</option>
                        @if ($data_profil["gender"]==='laki-laki')
                            <option value="perempuan">perempuan</option>
                        @else
                            <option value="laki-laki">laki-laki</option>
                        @endif
                    </select>
                    <label for="gender-form">Jenis Kelamin</label>

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

                <div class="form-floating mb-3">
                    <input type="text" name="job" class="form-control @error('job') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["job"] }}">
                    <label for="floatingInput">Pekerjaan</label>
                    @error('job')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["reason"] }}">
                    <label for="floatingInput">Alasan Berinvestasi</label>
                    @error('reason')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="income" class="form-control @error('income') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["income"] }}">
                    <label for="floatingInput">Pendapatan Bersih</label>
                    @error('income')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="netincome" class="form-control @error('netincome') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["netincome"] }}">
                    <label for="floatingInput">Pendapatan Kotor</label>
                    @error('netincome')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <a href="/dashboard/{{ $data_profil["email"] }}/investor" style="text-decoration: none;color:red"><div class="container-flex text-center pt-1 d-inline-block rounded" style="border: 1px solid red;width:80px;height:39px">Batal</div></a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Simpan
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title" id="staticBackdropLabel">Data akan disimpan pastikan</h5>
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
