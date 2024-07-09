@include('fungsi.fungsi_tanggal_indo')
@extends('layout.main')
@section('title', 'Tambah Stok BBM')
@section('content')
    @php
        $no = 1;
    @endphp
    <h1 class="my-3">Tambah Stok BBM</h1>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="masuk_tambah_bbm" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Kendaraan</th>
                            <th>Tahun Anggaran</th>
                            <th>Jumlah</th>
                            <th>Tanggal Memasukan Data</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($masuk as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->bbm->jenis_kendaraan }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ tgl_indonesia2($data->created_at) }}</td>
                                <td>
                                    <center>
                                        <a href="/masuk_edit/{{ $data->id }}" class="btn btn-warning mx-2 my-2">
                                            <i class='bx bxs-edit'></i> Edit
                                        </a>
                                        <a href="/masuk_hapus/{{ $data->id }}" class="btn btn-danger mx-2 my-2">
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
    </div>
@endsection
