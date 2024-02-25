@extends('layout.main')
@section('title', 'Kendaraan')
@section('content')
    @php
        $no = 1;
    @endphp
    <h1 class="my-3">Data Kendaraan</h1>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="/kendaraan_tambah" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Polisi</th>
                        <th>Merek</th>
                        <th>Jenis Kendaraan</th>
                        <th>Nama Pegawai</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kendaraan as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nopol }}</td>
                            <td>{{ $data->merek }}</td>
                            <td>{{ $data->jenis_kendaraan }}</td>
                            <td>{{ $data->nama_pegawai }}</td>
                            <td>{{ $data->nip }}</td>
                            <td>{{ $data->jabatan }}</td>
                            <td>
                                <center>
                                    <a href="kendaraan_edit/{{ $data->id }}" class="btn btn-warning mx-2 my-2">
                                        <i class='bx bxs-edit'></i> Edit
                                    </a>
                                    <a href="kendaraan_hapus/{{ $data->id }}" class="btn btn-danger mx-2 my-2">
                                        <i class='bx bxs-trash'></i> Hapus
                                    </a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
