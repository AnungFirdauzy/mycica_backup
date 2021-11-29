@extends('layouts.main')
@include('partials.navbarADM')
@section('konten')
    <div class="container-fluid bg-dark text-center p-5" style="min-height: 100%">
        <div class="container bg-light p-3">
            <h2 class="h2">List Akun Peternak</h2>
            <div class="container">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>NPWP</th>
                            <th>Nama Peternakan</th>
                            <th>Nama Pemilik</th>
                            <th>NIK</th>
                            <th>Tanggal bergabung</th>
                            <th></th>
                        </tr>
                        @foreach ($peternak as $peternak)
                            <tr>
                                <td class="align-middle">{{ $peternak['npwp'] }}</td>
                                <td class="align-middle">{{ $peternak['company'] }}</td>
                                <td class="align-middle">{{ $peternak['ownername'] }}</td>
                                <td class="align-middle">{{ $peternak['nik'] }}</td>
                                <td class="align-middle">{{ $peternak['created_at'] }}</td>
                                <td class="text-center"><a href="/adm/peternak/detail/{{ $email }}/{{ $peternak['id'] }}" class="btn btn-primary">Detail Akun</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection