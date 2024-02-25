@include('fungsi.fungsi_tanggal_indo')
@extends('layout.main')
@section('title', 'Pajak')
@section('content')
    @php
        $no = 1;
    @endphp
    <h1 class="my-3">Informasi Pajak</h1>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="/pajak_tambah" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Merek</th>
                        <th>Nomor Polisi</th>
                        <th>Tahun Kendaraan</th>
                        <th>Jatuh Tempo</th>
                        <th colspan="2">5 Tahunan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pajak as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->merek }}</td>
                            <td>{{ $data->nopol }}</td>
                            <td>{{ $data->tahun_kendaraan }}</td>
                            <td>{{ tgl_indonesia3($data->jatuh_tempo) }}</td>
                            <td>{{ $data->lima_tahun_awal }}</td>
                            <td>{{ $data->lima_tahun_akhir }}</td>
                            <td>
                                <center>
                                    @if ($data->keterangan == '')
                                        -
                                    @else
                                        {{ $data->keterangan }}
                                    @endif
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="pajak_edit/{{ $data->id }}" class="btn btn-warning mx-2 my-2">
                                        <i class='bx bxs-edit'></i> Edit
                                    </a>
                                    <a href="pajak_hapus/{{ $data->id }}" class="btn btn-danger mx-2 my-2">
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
