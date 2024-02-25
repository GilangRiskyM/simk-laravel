@extends('layout.main')
@section('title', 'Tambah Data Kendaraan')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card my-4" style="width: 500px;">
            <div class="card-header">
                <center>
                    <h3>Form Tambah Data Kendaraan</h3>
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
                <form action="/tambah-kendaraan" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Nomor Polisi</span>
                        <input type="text" class="form-control" name="nopol">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Merek</span>
                        <input type="text" class="form-control" name="merek">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jenis Kendaraan</span>
                        <select name="jenis_kendaraan" id="" class="form-select">
                            <option value="">Pilih Salah Satu</option>
                            <option value="Roda 2 (dua)">Roda 2 (dua)</option>
                            <option value="Roda 4 (empat)">Roda 4 (empat)</option>
                        </select>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Nama Pegawai</span>
                        <input type="text" class="form-control" name="nama_pegawai">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">NIP</span>
                        <input type="text" class="form-control" name="nip">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 170px;">Jabatan</span>
                        <input type="text" class="form-control" name="jabatan">
                    </div>
                    <div class="mb-1">
                        <center>
                            <a href="/kendaraan" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-danger mx-5" type="reset">Batal</button>
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
