@include('fungsi.fungsi_tanggal_indo')
@extends('layout.main')
@section('title', 'Surat Tugas')
@section('content')
    @php
        $no = 1;
    @endphp
    <h1 class="my-3">Surat Tugas</h1>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="my-2 col-12 col-sm-8 col-md-4">
                <label for="" class="mb-2">Cari Data</label>
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control ml-2" name="cari" placeholder="Kata Kunci" required>
                        <button type="submit" class="btn btn-primary"><i class='bx bx-search-alt-2'></i> Cari</button>
                        <a href="/surat_tugas" class="btn btn-danger">Batal</a>
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
                        <a href="/surat_tugas" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
            <hr>
            <div class="mb-2 col-md-8">
                <label class="mb-2">Export Data</label>
                <form action="/export-surat-tugas" method="post">
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
                            <th>No. Polisi</th>
                            <th>Jenis Kendaraan</th>
                            <th>Nama Pegawai</th>
                            <th>NIP Pegawai</th>
                            <th>Jabatan</th>
                            <th>Keperluan</th>
                            <th>Penumpang</th>
                            <th>Nama Camat</th>
                            <th>NIP Camat</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Nama Kasubbag</th>
                            <th>Nilai Voucher</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nopol }}</td>
                                <td>{{ $data->jenis_kendaraan }}</td>
                                <td>{{ $data->nama_pegawai }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->keperluan }}&nbsp;{{ $data->keperluan_2 }}</td>
                                <td>{{ $data->penumpang }}</td>
                                <td>{{ $data->nama_camat }}</td>
                                <td>{{ $data->nip_camat }}</td>
                                <td>{{ tgl_indonesia3($data->tanggal) }}</td>
                                <td>{{ $data->waktu_angka }}&nbsp;({{ $data->waktu_huruf }})&nbsp;hari</td>
                                <td>{{ $data->nama_kasubbag }}</td>
                                <td>Rp. {{ $data->nilai_voucher }},- / {{ $data->jumlah_bbm }} liter</td>
                                <td>
                                    <center>
                                        <a href="/surat_tugas_edit/{{ $data->id }}" target="_blank"
                                            class="btn btn-warning mx-2 my-2">
                                            <i class="bx bxs-edit"></i> Edit
                                        </a>
                                        <a href="/surat_tugas_hapus/{{ $data->id }}" class="btn btn-danger mx-2 my-2">
                                            <i class="bx bxs-trash"></i> Hapus
                                        </a>
                                        <a href="/cetak_surat/{{ $data->id }}" target="_blank"
                                            class="btn btn-info mx-2 my-2">
                                            <i class='bx bxs-printer'></i> Surat Tugas
                                        </a>
                                        <a href="/cetak_voucher/{{ $data->id }}" class="btn btn-info mx-2 my-2">
                                            <i class='bx bxs-printer'></i> Voucher BBM
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
