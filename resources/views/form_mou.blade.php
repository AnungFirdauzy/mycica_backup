@extends('layouts.main')
@section('konten')
<div class="container-fluid bg-dark text-light h-100 p-4">

    @if(session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert">
            {{ session('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="container py-3">
        <div class="container p-5 shadow-lg" style="width: 60%">
            <h2><strong>Formulir Data Lengkap</strong></h2>
            <form class="text-dark" action="/mou/{{ $burung }}" method="POST">
                @csrf

                <input type="hidden" name="id_investor" value="{{ $data['id'] }}" required>

                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" name="alamat" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 305px"></textarea>
                            <label for="floatingTextarea2">Alamat (sesuai KTP)</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-4">
                                    <input type="text" name="rtRw" class="form-control @error('rtrw') is-invalid @enderror" id="floatingInput" placeholder="RT/RW" required>
                                    <label for="floatingInput">RT/RW</label>
                                    @error('rtrw')
                                        
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-4">
                                    <input type="text" name="kabupatenkota" class="form-control @error('kabupatenkota') is-invalid @enderror" id="floatingInput" placeholder="Kabupate/Kota" required>
                                    <label for="floatingInput">Kabupaten/Kota</label>
                                    @error('kabupatenkota')
                                        
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-4">
                                    <input type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror" id="floatingInput" placeholder="Provinsi" required>
                                    <label for="floatingInput">Provinsi</label>
                                    @error('provinsi')
                                        
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-4">
                                    <input type="text" name="kodepos" class="form-control @error('kodepos') is-invalid @enderror" id="floatingInput" placeholder="Kodepos" required>
                                    <label for="floatingInput">Kode Pos</label>
                                    @error('kodepos')
                                        
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" name="ttl" class="form-control @error('ttl') is-invalid @enderror" id="floatingInput" placeholder="Tempat Tanggal Lahir" required>
                    <label for="floatingInput">Tempat, tanggal lahir</label>
                    @error('ttl')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input type="text" name="rekening" class="form-control @error('rekening') is-invalid @enderror" id="floatingInput" placeholder="Nomor Rekening" required>
                    <label for="floatingInput">Nomor Rekening</label>
                    @error('rekening')
                        
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                </div>

                <div class="container-fluid ms-0 mb-4 text-light">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Scan KTP</label>
                        <input class="form-control form-control" id="formFile" name="ktp" type="file">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Pas Foto 3x4</label>
                        <input class="form-control form-control" id="formFile" name="foto" type="file">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Surat Persetujuan</label>
                        <input class="form-control form-control" id="formFile" name="persetujuan" type="file">
                    </div>

                    <button type="button" class="btn btn-outline-primary btn-sm">Download Surat Pernyataan</button>
                </div>
                
                
                <a href="" style="text-decoration: none;color:red"><div class="container-flex text-center pt-1 d-inline-block rounded" style="border: 1px solid red;width:80px;height:39px">Batal</div></a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Simpan
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title" id="staticBackdropLabel"><strong>Perhatian ! Apakah Anda membaca dan setuju dengan ketentuan kami?</strong></h5>
                                <small>Data akan disimpan setelah anda klick "Setuju"</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Setuju</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
