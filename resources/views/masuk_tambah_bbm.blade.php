@extends('layout.main')
@section('title', 'Tambah Stok BBM')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card my-4" style="width: 500px;">
            <div class="card-header">
                <center>
                    <h3>Form Tambah Stok BBM</h3>
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
                <form action="/tambah-masuk-bbm" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jenis Kendaraan</span>
                        <select name="id_bbm" class="form-select">
                            <option value="">Pilih Salah Satu</option>
                            @foreach ($stok as $data)
                                <option value="{{ $data->id }}">{{ $data->jenis_kendaraan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Tahun Anggaran</span>
                        <input type="text" class="form-control" name="keterangan">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 170px;">Jumlah</span>
                        <input type="number" class="form-control" name="jumlah" placeholder="Liter">
                    </div>
                    <div class="mb-1">
                        <center>
                            <a href="/masuk" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-danger mx-5" type="reset">Batal</button>
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
