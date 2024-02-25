@extends('layout.main')
@section('title', 'Edit Pengeluaran BBM')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card my-4" style="width: 500px;">
            <div class="card-header">
                <center>
                    <h3>Form Edit Pengeluaran BBM</h3>
                </center>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger my-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/edit-keluar-bbm/{{ $keluar->id }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px">Nomor Polisi</span>
                        <input type="text" class="form-control bg-secondary bg-opacity-25" value="{{ $keluar->nopol }}"
                            readonly>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jenis Kendaraan</span>
                        <input type="text" class="form-control bg-secondary bg-opacity-25"
                            value="{{ $keluar->jenis_kendaraan }}" readonly>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Nama Pegawai</span>
                        <input type="text" class="form-control bg-secondary bg-opacity-25"
                            value="{{ $keluar->nama_pegawai }}" readonly>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">NIP</span>
                        <input type="text" class="form-control bg-secondary bg-opacity-25" value="{{ $keluar->nip }}"
                            readonly>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jabatan</span>
                        <input type="text" class="form-control bg-secondary bg-opacity-25" value="{{ $keluar->jabatan }}"
                            readonly>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jenis BBM</span>
                        <input type="text" class="form-control bg-secondary bg-opacity-25"
                            value="{{ $keluar->bbm->jenis_kendaraan }}" readonly>
                        <input type="hidden" name="id_bbm" value="{{ $keluar->bbm->id }}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 170px;">Jumlah</span>
                        <input type="text" class="form-control" name="jumlah" value="{{ $keluar->jumlah }}">
                    </div>
                    <div class="mb-1">
                        <center>
                            <a href="/keluar" class="btn btn-secondary mx-5">Kembali</a>
                            <button class="btn btn-success mx-5" type="submit">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
