@extends('layout.main')
@section('title', 'Hapus Data Surat Tugas')
@section('content')
    <center>
        <h2>Hapus Data Surat Tugas</h2>
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
                        <td>Nama Pegawai</td>
                        <td>: </td>
                        <td> {{ $data->nama_pegawai }}</td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>: </td>
                        <td> {{ $data->nip }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>: </td>
                        <td> {{ $data->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Keperluan / Uraian Tugas</td>
                        <td>: </td>
                        <td> {{ $data->keperluan }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>: </td>
                        <td> {{ $data->keperluan_2 }}</td>
                    </tr>
                    <tr>
                        <td>Penumpang</td>
                        <td>: </td>
                        <td> {{ $data->penumpang }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: </td>
                        <td> {{ $data->tanggal }}</td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td>: </td>
                        <td> {{ $data->waktu_angka }} ({{ $data->waktu_huruf }}) hari</td>
                    </tr>
                    <tr>
                        <td>Kendaraan</td>
                        <td>: </td>
                        <td> {{ $data->jenis_kendaraan }} / {{ $data->nopol }}</td>
                    </tr>
                    <tr>
                        <td>Nama Camat</td>
                        <td>: </td>
                        <td> {{ $data->nama_camat }}</td>
                    </tr>
                    <tr>
                        <td>NIP Camat</td>
                        <td>: </td>
                        <td> {{ $data->nip_camat }}</td>
                    </tr>
                    <tr>
                        <td>Nama Kasubbag</td>
                        <td>: </td>
                        <td> {{ $data->nama_kasubbag }}</td>
                    </tr>
                    <tr>
                        <td>Nilai Voucher</td>
                        <td>: </td>
                        <td> Rp. {{ $data->nilai_voucher }},- / {{ $data->jumlah_bbm }} liter</td>
                    </tr>
                </table>
                <div class="mt-3">
                    <form action="/delete-surat-tugas/{{ $data->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="/surat_tugas" class="btn btn-secondary mx-3">Kembali</a>
                        <button type="submit" class="btn btn-danger mx-3">Hapus</button>
                    </form>
                </div>
            </h4>
        </center>
    </div>
@endsection
