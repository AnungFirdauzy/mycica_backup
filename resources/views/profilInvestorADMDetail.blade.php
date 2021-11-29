@extends('layouts.main')
@include('partials.navbarADM')
@section('konten')
    <div class="container-fluid bg-dark text-center p-5" style="min-height: 100%">
        <div class="container bg-light p-5" style="max-width: 45%">
            <img src="{{ asset("storage/".$data->pasfoto) }}" class="img-thumbnail mb-3" alt="scanktp" style="max-width:300px;min-width:200px">
            <form action="">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="{{ $data->nama }}" readonly>
                    <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->nik }}" readonly>
                    <label for="floatingInput">NIK</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->age }}" readonly>
                    <label for="floatingInput">Usia</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->gender }}" readonly>
                    <label for="floatingInput">Jenis Kelamin</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="+62{{ $data->phone }}" readonly>
                    <label for="floatingInput">Phone</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->email }}" readonly>
                    <label for="floatingInput">email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->job }}" readonly>
                    <label for="floatingInput">Pekerjaan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->reason }}" readonly>
                    <label for="floatingInput">Alasan Berinvestasi</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->income }}" readonly>
                    <label for="floatingInput">Penghasilan Kotor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->netincome }}" readonly>
                    <label for="floatingInput">Penghasilan Bersih</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->alamat }}" readonly>
                    <label for="floatingInput">Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->rtRw }}" readonly>
                    <label for="floatingInput">RT/RW</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->kabupatenkota }}" readonly>
                    <label for="floatingInput">Kabupaten Kota</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->kodepos }}" readonly>
                    <label for="floatingInput">Kodepos</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->ttl }}" readonly>
                    <label for="floatingInput">Tempat Tanggal Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" value="{{ $data->rekening }}" readonly>
                    <label for="floatingInput">Nomor Rekening</label>
                </div>

            </form>
            <div class="container-fluid text-start mb-3">
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#scanktp">Lihat Scan KTP</button>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#scanperjanjian">Lihat Scan Surat Perjanjian</button>
            </div>

            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus">Hapus Akun</button>

            <!-- Modal 1 -->
            <div class="modal fade" id="scanktp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $data->nama }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <img src="{{ asset("storage/".$data->ktp) }}" alt="" class="img-thumbnail">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

            <!-- Modal 2 -->
            <div class="modal fade" id="scanperjanjian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Surat Perjanjian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <img src="{{ asset("storage/".$data->persetujuan) }}" alt="" class="img-thumbnail">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

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
                        <a href="/adm/investor/detail/delete/{{ $email }}/{{ $data->id_investor }}" type="button" class="btn btn-secondary">Iya, Hapus akun</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection