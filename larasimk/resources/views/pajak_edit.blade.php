@extends('layout.main')
@section('title', 'Edit Data Pajak')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card my-4" style="width: 500px;">
            <div class="card-header">
                <center>
                    <h3>Form Edit Data Pajak</h3>
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
                <form action="/edit-pajak/{{ $pajak->id }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Merek</span>
                        <input type="text" class="form-control" name="merek" value="{{ $pajak->merek }}">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Nomor Polisi</span>
                        <input type="text" class="form-control" name="nopol" value="{{ $pajak->nopol }}">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Tahun Kendaraan</span>
                        <input type="text" class="form-control" name="tahun_kendaraan"
                            value="{{ $pajak->tahun_kendaraan }}">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jatuh Tempo</span>
                        <input type="date" class="form-control" name="jatuh_tempo" value="{{ $pajak->jatuh_tempo }}">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">5 Tahunan</span>
                        <input type="text" class="form-control" name="lima_tahun_awal" placeholder="awal"
                            value="{{ $pajak->lima_tahun_awal }}">
                        <input type="text" class="form-control" name="lima_tahun_akhir" placeholder="akhir"
                            value="{{ $pajak->lima_tahun_akhir }}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 170px;">Keterangan</span>
                        <input type="text" class="form-control" name="keterangan" value="{{ $pajak->keterangan }}">
                    </div>
                    <div class="mb-1">
                        <center>
                            <a href="/pajak" class="btn btn-secondary mx-5">Kembali</a>
                            <button class="btn btn-success mx-5" type="submit">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
