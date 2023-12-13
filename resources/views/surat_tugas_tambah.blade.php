@extends('layout.main')
@section('title', 'Tambah Surat Tugas')
@section('content')

    <div class="card my-4">
        <div class="card-header">
            <center>
                <h3>Form Tambah Surat Tugas</h3>
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
            <form action="/tambah-surat-tugas" method="post">
                @csrf
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Nama</span>
                    <input type="text" name="nama_pegawai" value="{{ $data->nama_pegawai }}"
                        class="form-control bg-secondary bg-opacity-25" readonly>
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">NIP</span>
                    <input type="text" name="nip" value="{{ $data->nip }}"
                        class="form-control bg-secondary bg-opacity-25" readonly>
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Jabatan</span>
                    <input type="text" name="jabatan" value="{{ $data->jabatan }}"
                        class="form-control bg-secondary bg-opacity-25" readonly>
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Keperluan / Uraian Tugas</span>
                    <input type="text" name="keperluan" class="form-control"
                        placeholder="Baris pertama pada surat tugas">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;"></span>
                    <input type="text" name="keperluan_2" class="form-control">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Jumlah Penumpang</span>
                    <input type="text" name="penumpang" class="form-control" placeholder="contoh 2 Orang">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Tanggal</span>
                    <input type="date" name="tanggal" class="form-control">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Waktu</span>
                    <input type="number" name="waktu_angka" class="form-control" placeholder="Diisi dengan angka">
                    <input type="text" name="waktu_huruf" class="form-control"
                        placeholder="Diisi dengan huruf contoh 'Dua'">
                    <span class="input-group-text" style="width: 50px">hari</span>
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Kendaraan</span>
                    <input type="text" name="jenis_kendaraan" value="{{ $data->jenis_kendaraan }}"
                        class="form-control bg-secondary bg-opacity-25" readonly>
                    <input type="text" name="nopol" value="{{ $data->nopol }}"
                        class="form-control bg-secondary bg-opacity-25" readonly>
                </div>
                <hr>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Harga BBM</span>
                    <input type="number" name="harga_bbm" class="form-control"
                        placeholder="Diisi dengan angka contoh 10000">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Jumlah BBM</span>
                    <input type="text" name="jumlah_bbm" value="{{ $data->jumlah }}"
                        class="form-control bg-secondary bg-opacity-25" readonly>
                    <span class="input-group-text" style="width: 50px;">liter</span>
                </div>
                <hr>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Nama Camat</span>
                    <input type="text" name="nama_camat" value="Drs. H. Fulan" class="form-control">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">NIP Camat</span>
                    <input type="text" name="nip_camat" value="01000110 01110101 01101100 01100001 01101110"
                        class="form-control">
                </div>
                <hr>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 220px;">Kasubbag Umum & Kepeg.</span>
                    <input type="text" name="nama_kasubbag" value="Fulana" class="form-control">
                </div>
                <div class="mb-1">
                    <center>
                        <a href="/keluar" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-success mx-5" type="submit">Simpan</button>
                    </center>
                </div>
            </form>
        </div>
    </div>

@endsection
