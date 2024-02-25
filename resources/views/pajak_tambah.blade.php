@extends('layout.main')
@section('title', 'Tambah Data Kendaraan')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card my-4" style="width: 500px;">
            <div class="card-header">
                <center>
                    <h3>Form Tambah Data Perpajakan</h3>
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
                <form action="/tambah-pajak" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Merek</span>
                        <input type="text" class="form-control" name="merek">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Nomor Polisi</span>
                        <input type="text" class="form-control" name="nopol">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Tahun Kendaraan</span>
                        <input type="text" class="form-control" name="tahun_kendaraan">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jatuh Tempo</span>
                        <input type="date" class="form-control" name="jatuh_tempo">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">5 Tahunan</span>
                        <input type="text" class="form-control" name="lima_tahun_awal" placeholder="awal">
                        <input type="text" class="form-control" name="lima_tahun_akhir" placeholder="akhir">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 170px;">Keterangan</span>
                        <input type="text" class="form-control" name="keterangan">
                    </div>
                    <div class="mb-1">
                        <center>
                            <a href="/pajak" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-danger mx-5" type="reset">Batal</button>
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
