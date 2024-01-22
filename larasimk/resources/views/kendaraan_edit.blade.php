@extends('layout.main')
@section('title', 'Edit Data Kendaraan')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card my-4" style="width: 500px;">
            <div class="card-header">
                <center>
                    <h3>Form Edit Data Kendaraan</h3>
                </center>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger mx-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/edit-kendaraan/{{ $kendaraan->id }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Nomor Polisi</span>
                        <input type="text" class="form-control" name="nopol" value="{{ $kendaraan->nopol }}">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Merek</span>
                        <input type="text" class="form-control" name="merek" value="{{ $kendaraan->merek }}">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jenis Kendaraan</span>
                        <select name="jenis_kendaraan" id="" class="form-select">
                            <option value="{{ $kendaraan->jenis_kendaraan }}">{{ $kendaraan->jenis_kendaraan }}</option>
                            @if ($kendaraan->jenis_kendaraan == 'Roda 2 (dua)')
                                <option value="Roda 4 (empat)">Roda 4 (empat)</option>
                            @else
                                <option value="Roda 2 (dua)">Roda 2 (dua)</option>
                            @endif
                        </select>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Nama Pegawai</span>
                        <input type="text" class="form-control" name="nama_pegawai"
                            value="{{ $kendaraan->nama_pegawai }}">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">NIP</span>
                        <input type="text" class="form-control" name="nip" value="{{ $kendaraan->nip }}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 170px;">Jabatan</span>
                        <input type="text" class="form-control" name="jabatan" value="{{ $kendaraan->jabatan }}">
                    </div>
                    <div class="mb-1">
                        <center>
                            <a href="/kendaraan" class="btn btn-secondary mx-5">Kembali</a>
                            <button class="btn btn-success mx-5" type="submit">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
