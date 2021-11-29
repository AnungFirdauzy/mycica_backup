@extends('layouts.main')
@include('partials.navbarADM')
@section('konten')
    <div class="container-fluid bg-dark text-center p-5" style="min-height: 100%">
        <div class="container bg-light p-5" style="max-width: 45%">
            <img src="{{ asset("Images/Profil Pict.png") }}" class="img-thumbnail mb-3" alt="scanktp" style="max-width:300px;min-width:200px">
            <form action="">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $data->company }}" readonly>
                    <label for="floatingInput">Nama Peternakan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $data->ownername }}" readonly>
                    <label for="floatingInput">Nama Pemilik</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $data->nik }}" readonly>
                    <label for="floatingInput">NIK</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $data->npwp }}" readonly>
                    <label for="floatingInput">NPWP</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="+62{{ $data->phone }}" readonly>
                    <label for="floatingInput">Nomor Telp</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $data->email }}" readonly>
                    <label for="floatingInput">Email</label>
                </div>
                

            </form>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus">Hapus Akun</button>


            <!-- Modal 3 -->
            <div class="modal fade" id="hapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Peringatan!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    Akun akan dihapus, apakah anda yakin ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
                        <a href="" type="button" class="btn btn-secondary">Iya, Hapus akun</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection