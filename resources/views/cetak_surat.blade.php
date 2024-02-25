@include('fungsi.fungsi_tanggal_indo')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas</title>
    <style>
        table tr td {
            font-size: 13px;
        }

        .isi {
            text-align: left;
        }

        .tanggal {
            text-align: right;
        }

        .tugas {
            text-align: center;
        }
    </style>
</head>

<body>
    <center>
        <table width="625">
            <tr>
                <td>
                    <center>
                        <img src="{{ asset('assets/img/logo.png') }}" width="100" height="110">
                    </center>
                </td>
                <td>
                    <center>
                        <font size="4.5">PEMERINTAH KABUPATEN XYZ</font><br>
                        <font size="5"><b>KECAMATAN XYZ</b></font><br>
                        <font size="2">Jalan XYZ No. X1 Kode Pos X231</font><br>
                        <font size="2">E-mail : email@email Website: pemkab-xyz.xyz
                        </font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></b>
                    </center>
                </td>
            </tr>
        </table>
        <table width="250">
            <tr>
                <td>
                    <center>
                        <font size="6"><u>SURAT TUGAS</u></font>
                        <br>
                        <font size="3">Nomor : 094/............................</font>
                    </center>
                </td>
            </tr>
        </table>
        <br>
        <table width="625" class="isi">
            <tr>
                <td colspan="3">
                    <font size="3">Yang bertandatangan di bawah ini, Camat XYZ Kabupaten XYZ
                        menugaskan :</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp; 1. Nama</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">{{ $data->nama_pegawai }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp; 2. NIP</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">{{ $data->nip }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp; 3. Jabatan</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">{{ $data->jabatan }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp; 4. Alamat Kantor</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">Jalan XYZ No. X1 Kode Pos X231</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp; 5. Keperluan / Uraian Tugas</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">{{ $data->keperluan }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp;</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">{{ $data->keperluan_2 }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp; 6. Jumlah Penumpang</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">{{ $data->penumpang }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp; 7. Tanggal</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">{{ tgl_indonesia($data->tanggal) }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp; 8. Waktu</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">{{ $data->waktu_angka }} ({{ $data->waktu_huruf }}) hari</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">&nbsp; 9. Kendaraan</font>
                </td>
                <td>
                    <font size="3">:</font>
                </td>
                <td>
                    <font size="3">{{ $data->jenis_kendaraan }} / {{ $data->nopol }}</font>
                </td>
            </tr>
        </table>
        <br><br>
        <table width="625" class="tanggal">
            <tr>
                <td>
                    <font size="3">XYZ,
                        {{ tgl_indonesia2($data->tanggal) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </font>
                </td>
            </tr>
        </table>
        <table width="625" class="tugas">
            <tr>
                <td>
                    <font size="3">Penerima Tugas</font>
                </td>
                <td>
                    <font size="3">&nbsp;&nbsp;&nbsp;</font>
                </td>
                <td>
                    <font size="3">Yang Memberi Tugas</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3"><br><br><br></font>
                </td>
                <td>
                    <font size="3"><br><br><br></font>
                </td>
                <td>
                    <font size="3"><br><br><br></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">{{ $data->nama_pegawai }}</font>
                </td>
                <td>
                    <font size="3">&nbsp;&nbsp;&nbsp;</font>
                </td>
                <td>
                    <font size="3">{{ $data->nama_camat }}</font>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="3">NIP. {{ $data->nip }}</font>
                </td>
                <td>
                    <font size="3">&nbsp;&nbsp;&nbsp;</font>
                </td>
                <td>
                    <font size="3">NIP. {{ $data->nip_camat }}</font>
                </td>
            </tr>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>

</html>
