@extends('layout.main')
@section('title', 'Edit Surat Tugas')
@section('content')
    <div class="card my-4">
        <div class="card-header">
            <center>
                <h3>Form Edit Surat Tugas</h3>
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
            <form action="/edit-surat-tugas/{{ $data->id }}" method="post">
                @method('PUT')
                @csrf
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px">Nama Pegawai</span>
                    <input type="text" class="form-control bg-secondary bg-opacity-25" value="{{ $data->nama_pegawai }}"
                        readonly>
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">NIP</span>
                    <input type="text" class="form-control bg-secondary bg-opacity-25" value="{{ $data->nip }}"
                        readonly>
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Jabatan</span>
                    <input type="text" class="form-control bg-secondary bg-opacity-25" value="{{ $data->jabatan }}"
                        readonly>
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Keperluan / Uraian Tugas</span>
                    <input type="text" class="form-control" value="{{ $data->keperluan }}" name="keperluan"
                        placeholder="Baris pertama di surat tugas">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;"></span>
                    <input type="text" class="form-control" value="{{ $data->keperluan_2 }}" name="keperluan_2"
                        placeholder="Baris kedua di surat tugas">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Jumlah Penumpang</span>
                    <input type="text" class="form-control" value="{{ $data->penumpang }}" name="penumpang">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Tanggal</span>
                    <input type="date" class="form-control" value="{{ $data->tanggal }}" name="tanggal">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Waktu</span>
                    <input type="number" class="form-control" value="{{ $data->waktu_angka }}" name="waktu_angka">
                    <input type="text" class="form-control" value="{{ $data->waktu_huruf }}" name="waktu_huruf">
                    <span class="input-group-text" style="width: 50px;">hari</span>
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Kendaraan</span>
                    <input type="text" class="form-control bg-secondary bg-opacity-25"
                        value="{{ $data->jenis_kendaraan }}" readonly>
                    <input type="text" class="form-control bg-secondary bg-opacity-25" value="{{ $data->nopol }}"
                        readonly>
                </div>
                <hr>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Harga BBM</span>
                    <input type="text" class="form-control" value="{{ $data->harga_bbm }}" name="harga_bbm">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Jumlah BBM</span>
                    <input type="text" class="form-control bg-secondary bg-opacity-25" value="{{ $data->jumlah_bbm }}"
                        name="jumlah_bbm" readonly>
                    <span class="input-group-text" style="width: 50px;">liter</span>
                </div>
                <div class="input-group">
                    <span class="input-group-text" style="width: 220px;">Nilai Voucher</span>
                    <input type="text" class="form-control bg-secondary bg-opacity-25"
                        value="{{ $data->nilai_voucher }}" readonly>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control bg-info bg-opacity-50"
                        value="Nilai voucher otomatis berubah ketika data disimpan" readonly>
                </div>
                <hr>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">Nama Camat</span>
                    <input type="text" class="form-control" value="{{ $data->nama_camat }}" name="nama_camat">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text" style="width: 220px;">NIP Camat</span>
                    <input type="text" class="form-control" value="{{ $data->nip_camat }}" name="nip_camat">
                </div>
                <hr>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 220px;">Kasubbag Umum & Kepeg.</span>
                    <input type="text" class="form-control" value="{{ $data->nama_kasubbag }}" name="nama_kasubbag">
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
