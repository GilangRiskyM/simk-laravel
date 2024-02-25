@extends('layout.main')
@section('title', 'Hapus Data Kendaraan')
@section('content')
    <center>
        <h2>Hapus Data Kendaraan</h2>
    </center>
    <div class="my-3">
        <center>
            <h3>Apakah anda yakin ingin menghapus data dibawah ini?</h3>
            <div class="alert alert-danger" role="alert">
                <h3><i class='bx bx-error'></i> Data yang dihapus tidak dapat dikembalikan!</h3>
            </div>
            <h4>
                <table>
                    <tr>
                        <td>No. Polisi</td>
                        <td>:</td>
                        <td>{{ $data->nopol }}</td>
                    </tr>
                    <tr>
                        <td>Merek</td>
                        <td>:</td>
                        <td>{{ $data->merek }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kendaraan</td>
                        <td>:</td>
                        <td>{{ $data->jenis_kendaraan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Pegawai</td>
                        <td>:</td>
                        <td>{{ $data->nama_pegawai }}</td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td>{{ $data->nip }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ $data->jabatan }}</td>
                    </tr>
                </table>
                <div class="mt-3">
                    <form action="/destroy-kendaraan/{{ $data->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="/kendaraan" class="btn btn-secondary mx-3">Kembali</a>
                        <button class="btn btn-danger mx-3">Hapus</button>
                    </form>
                </div>
            </h4>
        </center>
    </div>
@endsection
