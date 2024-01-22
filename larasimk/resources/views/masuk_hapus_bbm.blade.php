@extends('layout.main')
@section('title', 'Hapus Data Tambah Stok BBM')
@section('content')
    <center>
        <h2>Hapus Data Tambah Stok BBM</h2>
    </center>
    <div class="my-3">
        <center>
            <h3>Apahak anda yakin ingin menghapus data dibawah ini?</h3>
            <div class="alert alert-danger" role="alert">
                <h3><i class='bx bx-error'></i> Data yang dihapus tidak dapat dikembalikan!</h3>
            </div>
            <h4>
                <table>
                    <tr>
                        <td>Jenis Kendaraan</td>
                        <td>:</td>
                        <td>{{ $data->bbm->jenis_kendaraan }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Anggaran</td>
                        <td>:</td>
                        <td>{{ $data->keterangan }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td>{{ $data->jumlah }}</td>
                    </tr>
                </table>
                <div class="mt-3">
                    <form action="/destroy-masuk/{{ $data->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="/masuk" class="btn btn-secondary mx-3">Kembali</a>
                        <button class="btn btn-danger mx-3">Hapus</button>
                    </form>
                </div>
            </h4>
        </center>
    </div>
@endsection
