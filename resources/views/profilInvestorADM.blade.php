@extends('layouts.main')
@include('partials.navbarADM')
@section('konten')
    <div class="container-fluid bg-dark text-center p-5" style="min-height: 100%">
        <div class="container bg-light p-3">
            <h2 class="h2">List Akun Investor</h2>
            <div class="container">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>NIK</th>
                            <th>Username</th>
                            <th>Tanggal bergabung</th>
                            <th></th>
                        </tr>
                        @foreach ($investor as $investor)
                            <tr>
                                <td class="align-middle">{{ $investor['nik'] }}</td>
                                <td class="align-middle">{{ $investor['nama'] }}</td>
                                <td class="align-middle">{{ $investor['created_at'] }}</td>
                                <td class="text-center"><a href="/adm/investor/detail/{{ $email }}/{{ $investor['id'] }}" class="btn btn-primary">Detail Akun</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection