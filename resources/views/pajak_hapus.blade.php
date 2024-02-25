@include('fungsi.fungsi_tanggal_indo')
@extends('layout.main')
@section('title', 'Hapus Data Pajak')
@section('content')
    <center>
        <h2>Hapus Data Pajak</h2>
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
                        <td>Merek</td>
                        <td>:</td>
                        <td>{{ $pajak->merek }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Polisi</td>
                        <td>:</td>
                        <td>{{ $pajak->nopol }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Kendaraan</td>
                        <td>:</td>
                        <td>{{ $pajak->tahun_kendaraan }}</td>
                    </tr>
                    <tr>
                        <td>Jatuh Tempo</td>
                        <td>:</td>
                        <td>{{ tgl_indonesia3($pajak->jatuh_tempo) }}</td>
                    </tr>
                    <tr>
                        <td>5 Tahunan</td>
                        <td>:</td>
                        <td>{{ $pajak->lima_tahun_awal }} / {{ $pajak->lima_tahun_akhir }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>
                            @if ($data->keterangan == '')
                                -
                            @else
                                {{ $data->keterangan }}
                            @endif
                        </td>
                    </tr>
                </table>
                <div class="mt-3">
                    <form action="/destroy-pajak/{{ $pajak->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="/pajak" class="btn btn-secondary mx-3">Kembali</a>
                        <button class="btn btn-danger mx-3">Hapus</button>
                    </form>
                </div>
            </h4>
        </center>
    </div>
@endsection
