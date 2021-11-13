@extends('layouts.main')
@section('konten')
    <div class="bg-image w-100 vh-100" style="background-color: #f5f5f5;padding-top:10%">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4 text-center" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show mt-4 text-center" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row shadow-lg rounded align-items-center mx-auto" style="width: 60%;background-color:white;">
            <div class="col px-0">
                <img src="Images/Murai Batu medan edited.png" alt="Murai Batu">
                
            </div>
            <div class="col pt-5 px-5">
                <div class="container">
                    <h4 class="mb-3">Login</h4>
                    <form action="/dashboard" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="row mt-3">
                            <div class="col ps-3"><p>Anda belum bergabung ? <a href="" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#exampleModal">klick disini</a></p></div>
                            <div class="col-3"><button type="submit" class="btn btn-dark ms-4">Masuk</button></div>
                        </div>
                    </form>

                    {{-- Modal --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                            <h4>Anda ingin bergabung sebagai </h4>
                            </div>
                            <div class="modal-footer">
                            <a href="/registerINV"><button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Investor</button></a>
                            <a href="/registerPET"><button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Peternak</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection