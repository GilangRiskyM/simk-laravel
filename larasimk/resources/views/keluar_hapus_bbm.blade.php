@extends('layout.main')
@section('title', 'Hapus Pengeluaran BBM')
@section('content')
    <center>
        <h2>Hapus Pengeluaran BBM</h2>
    </center>
    <div class="my-3">
        <center>
            <h3>Apakah anda yakin ingin menghapus data dibawah ini?</h3>
            <div class="alert alert-danger" role="alert">
                <h3><i class="bx bx-error"></i> Data yang dihapus tidak dapat dikembalikan!</h3>
            </div>
            <h4>
                <table>
                    <tr>
                        <td>Nomor Polisi</td>
                        <td>:</td>
                        <td>{{ $keluar->nopol }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kendaraan</td>
                        <td>:</td>
                        <td>{{ $keluar->jenis_kendaraan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Pegawai</td>
                        <td>:</td>
                        <td>{{ $keluar->nama_pegawai }}</td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td>{{ $keluar->nip }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ $keluar->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis BBM</td>
                        <td>:</td>
                        <td>{{ $keluar->bbm->jenis_kendaraan }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td>{{ $keluar->jumlah }}</td>
                    </tr>
                </table>
                <div class="mt-3">
                    <form action="/destroy-keluar/{{ $keluar->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="/keluar" class="btn btn-secondary mx-3">Kembali</a>
                        <button class="btn btn-danger mx-3">Hapus</button>
                    </form>
                </div>
            </h4>
        </center>
    </div>
@endsection
