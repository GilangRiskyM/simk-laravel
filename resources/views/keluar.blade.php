@include('fungsi.fungsi_tanggal_indo')
@extends('layout.main')
@section('title', 'Pengeluaran Stok BBM')
@section('content')
    @php
        $no = 1;
    @endphp
    <h1 class="my-3">Pengeluaran BBM</h1>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="/keluar_tambah_bbm" class="btn btn-primary">Tambah Pengeluaran</a>
            <hr>
            <div class="my-2 col-12 col-sm-8 col-md-4">
                <label for="" class="mb-2">Cari Data</label>
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control ml-2" name="cari" placeholder="Kata Kunci" required>
                        <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt-2'></i> Cari</button>
                        <a href="/keluar" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
            <div class="mb-2 col-md-8">
                <label class="mb-2">Filter Data</label>
                <form action="" method="get">
                    <div class="input-group">
                        <span class="input-group-text">Dari Tanggal : </span>
                        <input type="date" class="form-control" name="tgl_awal" required>
                        <span class="input-group-text">Sampai Tanggal : </span>
                        <input type="date" name="tgl_akhir" class="form-control" required>
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="/keluar" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
            <hr>
            <div class="mb-2 col-md-8">
                <label class="mb-2">Export Data</label>
                <form action="/export-pengeluaran-bbm" method="post">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text">Dari Tanggal : </span>
                        <input type="date" class="form-control" name="tgl_awal" required>
                        <span class="input-group-text">Sampai Tanggal : </span>
                        <input type="date" name="tgl_akhir" class="form-control" required>
                        <button type="submit" class="btn btn-success">Export</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Polisi</th>
                            <th>Jenis Kendaraan</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Jenis BBM</th>
                            <th>Jumlah(Liter)</th>
                            <th>Tanggal Memasukan Data</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keluar as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nopol }}</td>
                                <td>{{ $data->jenis_kendaraan }}</td>
                                <td>{{ $data->nama_pegawai }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->bbm->jenis_kendaraan }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ tgl_indonesia2($data->created_at) }}</td>
                                <td>
                                    <center>
                                        <a href="/keluar_edit/{{ $data->id }}" class="btn btn-warning mx-2 my-2">
                                            <i class="bx bxs-edit"></i> Edit
                                        </a>
                                        <a href="/keluar_hapus/{{ $data->id }}" class="btn btn-danger mx-2 my-2">
                                            <i class="bx bxs-trash"></i> Hapus
                                        </a>
                                        <a href="/surat_tugas_tambah/{{ $data->id }}"
                                            class="btn btn-primary mx-2 my-2">
                                            <i class='bx bx-envelope'></i> Tambah Surat Tugas
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
