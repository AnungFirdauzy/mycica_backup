@extends('layouts.main')

@section('konten')

    <section class="container-flex text-light bg-dark vh-100 pt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2><a href="/dashboard/{{ $data_profil["email"] }}/peternak"><i class="bi bi-arrow-left-square" style="color:white;margin-right:10px"></a></i>Profil Pengguna</h2>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="container shadow-lg p-3">
                        <img src="{{ URL::asset("/Images/Profil Pict.png") }}" class="border p-1" alt="" style="width: 100px; margin:20px">
                        <div class="container p-1">
                            <a href="/profil/peternak/edit/{{ $data_profil["email"] }}"><button class="btn btn-outline-primary me-1" style="width: 130px">Edit</button></a>
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
                                    <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["company"] }}" readonly>
                                    <label for="floatingInput">Nama Perusahaan/Peternakan</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="ownername" class="form-control @error('ownername') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["ownername"] }}" readonly>
                                    <label for="floatingInput">Nama Lengkap</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["nik"] }}" readonly>
                                    <label for="floatingInput">Nomor Induk Kependudukan</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="npwp" class="form-control @error('npwp') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["npwp"] }}" readonly>
                                    <label for="floatingInput">NPWP</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" value="+62{{ $data_profil["phone"] }}" readonly>
                                    <label for="floatingInput">Nomor Telp</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{ $data_profil["email"] }}" readonly>
                                    <label for="floatingInput">Email</label>
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