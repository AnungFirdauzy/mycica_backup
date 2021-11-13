@extends('layouts.main')

@section('konten')

    <section class="container-flex text-light bg-dark vh-100 pt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2><a href="/dashboard/{{ $data_profil["email"] }}/investor"><i class="bi bi-arrow-left-square" style="color:white;margin-right:10px"></a></i>Profil Pengguna</h2>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="container shadow-lg p-3">
                        <img src="{{ URL::asset("/Images/Profil Pict.png") }}" class="border p-1" alt="" style="width: 100px; margin:20px">
                        <div class="container p-1">
                            <a href="/profil/investor/edit/{{ $data_profil["email"] }}"><button class="btn btn-outline-primary me-1" style="width: 130px">Edit</button></a>
                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 130px">Keluar</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <div class="container shadow-lg p-5">
                            <h5><strong>Detail Profil</strong></h5>
                            <form class="container-flex text-dark" action="">

                                <div class="form-floating mb-3">
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["nama"] }}" readonly>
                                    <label for="floatingInput">Nama Lengkap</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["nik"] }}" readonly>
                                    <label for="floatingInput">Nomor Induk Kependudukan</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["age"] }}" readonly>
                                    <label for="floatingInput">Umur</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="gender" class="form-control @error('gender') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["gender"] }}" readonly>
                                    <label for="floatingInput">Jenis Kelamin</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["phone"] }}" readonly>
                                    <label for="floatingInput">Nomor Telp</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["email"] }}" readonly>
                                    <label for="floatingInput">Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="job" class="form-control @error('job') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["job"] }}" readonly>
                                    <label for="floatingInput">Pekerjaan</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["reason"] }}" readonly>
                                    <label for="floatingInput">Alasan Berinvestasi</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="netincome" class="form-control @error('netincome') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["netincome"] }}" readonly>
                                    <label for="floatingInput">Penghasilan Kotor</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="text" name="income" class="form-control @error('income') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["income"] }}" readonly>
                                    <label for="floatingInput">Penghasilan Bersih</label>
                                </div>
                                
                            </form>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content text-dark">
                                    <div class="modal-body">
                                        <h5 class="modal-title" id="staticBackdropLabel">Apakah anda yakin ingin keluar ?</h5>
                                        <small>Klik "OK" untuk melanjutkan</small>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href="/"><button class="btn btn-primary">OK</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



@endsection
@section('script')
@endsection