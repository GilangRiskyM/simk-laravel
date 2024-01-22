@extends('layout.main')
@section('title', 'Pengeluaran Stok BBM')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card my-4" style="width: 500px;">
            <div class="card-header">
                <center>
                    <h3>Form Tambah Pengeluaran BBM</h3>
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
                <form action="/tambah-keluar-bbm" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Nomor Polisi</span>
                        <select class="form-select" id="selectOption">
                            <option value="">Pilih Nomor Polisi</option>
                            @foreach ($kendaraan as $item)
                                <option value="{{ $item->id }}">{{ $item->nopol }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="nopol" id="autofillNopol">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jenis Kendaraan</span>
                        <input type="text" name="jenis_kendaraan" class="form-control bg-secondary bg-opacity-25"
                            id="autofillJenisKendaraan" readonly>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Nama Pegawai</span>
                        <input type="text" name="nama_pegawai" class="form-control bg-secondary bg-opacity-25"
                            id="autofillNamaPegawai" readonly>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">NIP</span>
                        <input type="text" name="nip" class="form-control bg-secondary bg-opacity-25"
                            id="autofillNIP" readonly>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jabatan</span>
                        <input type="text" name="jabatan" class="form-control bg-secondary bg-opacity-25"
                            id="autofillJabatan" readonly>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" style="width: 170px;">Jenis BBM</span>
                        <select name="id_bbm" class="form-select" id="">
                            <option value="">Pilih BBM</option>
                            @foreach ($stok as $data)
                                <option value="{{ $data->id }}">{{ $data->jenis_kendaraan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width: 170px;">Jumlah BBM</span>
                        <input type="number" name="jumlah" class="form-control" placeholder="Liter">
                    </div>
                    <div class="mb-1">
                        <center>
                            <a href="/keluar" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-danger mx-5" type="reset">Batal</button>
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#selectOption').change(function() {
                var optionValue = $(this).val();

                if (optionValue != '') {
                    $.ajax({
                        url: '/get-data-keluar-kendaraan',
                        type: 'GET',
                        data: {
                            id: optionValue
                        },
                        success: function(response) {
                            $('#autofillNopol').val(response.nopol);
                            $('#autofillJenisKendaraan').val(response.jenis_kendaraan);
                            $('#autofillNamaPegawai').val(response.nama_pegawai);
                            $('#autofillNIP').val(response.nip);
                            $('#autofillJabatan').val(response.jabatan);
                        }
                    });
                } else {
                    $('#autofillNopol').val('');
                    $('#autofillJenisKendaraan').val('');
                    $('#autofillNamaPegawai').val('');
                    $('#autofillNIP').val('');
                    $('#autofillJabatan').val('');
                }
            });
        });
    </script>
@endsection
