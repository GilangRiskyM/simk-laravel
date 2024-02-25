@extends('layout.main')
@section('title', 'Edit Stok BBM')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card my-4" style="width: 500px;">
            <div class="card-header">
                <center>
                    <h3>Form Edit Stok BBM</h3>
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
                <form action="/edit-masuk-bbm/{{ $masuk->id }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px">Jenis Kendaraan</span>
                        <input type="text" class="form-control bg-secondary bg-opacity-25"
                            value="{{ $masuk->bbm->jenis_kendaraan }}" readonly>
                        <input type="hidden" name="id_bbm" value="{{ $masuk->bbm->id }}">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Tahun Anggaran</span>
                        <input type="text" class="form-control" name="keterangan" value="{{ $masuk->keterangan }}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 170px;">Jumlah</span>
                        <input type="number" class="form-control" name="jumlah" placeholder="Liter"
                            value="{{ $masuk->jumlah }}">
                    </div>
                    <div class="mb-1">
                        <center>
                            <a href="/masuk" class="btn btn-secondary mx-5">Kembali</a>
                            <button class="btn btn-success mx-5" type="submit">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
