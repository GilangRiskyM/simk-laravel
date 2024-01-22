<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Requests\EditSuratTugasRequest;
use App\Http\Requests\TambahSuratTugasRequest;

class SuratTugasController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        if (isset($request->tgl_awal)) {
            $sql = SuratTugas::orderBy('id', 'desc')
                ->whereDate('tanggal', '>=', $tgl_awal)
                ->whereDate('tanggal', '<=', $tgl_akhir)
                ->get();
        } elseif (isset($request->cari)) {
            $sql = SuratTugas::orderBy('id', 'desc')
                ->where('nopol', 'LIKE', '%' . $cari . '%')
                ->orWhere('jenis_kendaraan', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama_pegawai', 'LIKE', '%' . $cari . '%')
                ->orWhere('nip', 'LIKE', '%' . $cari . '%')
                ->orWhere('jabatan', 'LIKE', '%' . $cari . '%')
                ->orWhere('keperluan', 'LIKE', '%' . $cari . '%')
                ->orWhere('keperluan_2', 'LIKE', '%' . $cari . '%')
                ->orWhere('penumpang', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama_camat', 'LIKE', '%' . $cari . '%')
                ->orWhere('tanggal', 'LIKE', '%' . $cari . '%')
                ->orWhere('jumlah_bbm', 'LIKE', '%' . $cari . '%')
                ->get();
        } else {
            $sql = SuratTugas::get();
        }

        return view('surat_tugas', ['surat' => $sql]);
    }

    function create($id)
    {
        $sql = Keluar::findOrFail($id);
        return view('surat_tugas_tambah', ['data' => $sql]);
    }

    function store(TambahSuratTugasRequest $request)
    {
        $nopol = $request['nopol'];
        $jenis_kendaraan = $request['jenis_kendaraan'];
        $nama_pegawai = $request['nama_pegawai'];
        $nip = $request['nip'];
        $jabatan = $request['jabatan'];
        $keperluan = $request['keperluan'];
        $keperluan2 = $request['keperluan_2'];
        $penumpang = $request['penumpang'];
        $nama_camat = $request['nama_camat'];
        $nip_camat = $request['nip_camat'];
        $tanggal = $request['tanggal'];
        $waktu_huruf = $request['waktu_huruf'];
        $waktu_angka = $request['waktu_angka'];
        $nama_kasubbag = $request['nama_kasubbag'];
        $jumlah_bbm = $request['jumlah_bbm'];
        $harga_bbm = $request['harga_bbm'];
        $nilai_voucher = $jumlah_bbm * $harga_bbm;

        $sql = SuratTugas::create([
            'nopol' => $nopol,
            'jenis_kendaraan' => $jenis_kendaraan,
            'nama_pegawai' => $nama_pegawai,
            'nip' => $nip,
            'jabatan' => $jabatan,
            'keperluan' => $keperluan,
            'keperluan_2' => $keperluan2,
            'penumpang' => $penumpang,
            'nama_camat' => $nama_camat,
            'nip_camat' => $nip_camat,
            'tanggal' => $tanggal,
            'waktu_huruf' => $waktu_huruf,
            'waktu_angka' => $waktu_angka,
            'nama_kasubbag' => $nama_kasubbag,
            'nilai_voucher' => $nilai_voucher,
            'jumlah_bbm' => $jumlah_bbm,
            'harga_bbm' => $harga_bbm
        ]);

        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Surat Tugas Berhasil!!!');
        }

        return redirect('/surat_tugas');
    }

    function edit($id)
    {
        $sql = SuratTugas::findOrFail($id);
        return view('surat_tugas_edit', ['data' => $sql]);
    }

    function update(EditSuratTugasRequest $request, $id)
    {
        $harga_bbm = $request['harga_bbm'];
        $jumlah_bbm = $request['jumlah_bbm'];
        $nilai_voucher = $harga_bbm * $jumlah_bbm;

        $sql = SuratTugas::findOrFail($id);
        $update = $sql->update([
            'keperluan' => $request['keperluan'],
            'keperluan_2' => $request['keperluan_2'],
            'penumpang' => $request['penumpang'],
            'nama_camat' => $request['nama_camat'],
            'nip_camat' => $request['nip_camat'],
            'tanggal' => $request['tanggal'],
            'waktu_huruf' => $request['waktu_huruf'],
            'waktu_angka' => $request['waktu_angka'],
            'nama_kasubbag' => $request['nama_kasubbag'],
            'nilai_voucher' => $nilai_voucher,
            'harga_bbm' => $request['harga_bbm']
        ]);

        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Surat Tugas Berhasil!!!');
        }

        return redirect('/surat_tugas');
    }

    function delete($id)
    {
        $sql = SuratTugas::findOrFail($id);
        return view('surat_tugas_hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = SuratTugas::findOrFail($id);
        $hapus = $sql->delete();

        if ($hapus) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Surat Tugas Berhasil!!!');
        }

        return redirect('/surat_tugas');
    }

    function SuratTugas($id)
    {
        $sql = SuratTugas::findOrFail($id);
        return view('cetak_surat', ['data' => $sql]);
    }

    function Voucher($id)
    {
        $sql = SuratTugas::findOrFail($id);
        return view('cetak_voucher', ['data' => $sql]);
    }

    function export(Request $request)
    {
        $tgl_awal = $request['tgl_awal'];
        $tgl_akhir = $request['tgl_akhir'];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nomor Polisi');
        $sheet->setCellValue('C1', 'Jenis Kendaraan');
        $sheet->setCellValue('D1', 'Nama Pegawai');
        $sheet->setCellValue('E1', 'NIP');
        $sheet->setCellValue('F1', 'Keperluan');
        $sheet->setCellValue('G1', 'Jumlah Penumpang');
        $sheet->setCellValue('H1', 'Nama Camat');
        $sheet->setCellValue('I1', 'NIP Camat');
        $sheet->setCellValue('J1', 'Tanggal');
        $sheet->setCellValue('K1', 'Waktu');
        $sheet->setCellValue('L1', 'Kassubag Umum & Kepeg.');
        $sheet->setCellValue('M1', 'Jumlah BBM');
        $sheet->setCellValue('N1', 'Harga BBM');
        $sheet->setCellValue('O1', 'Nilai Voucher');

        $sql = SuratTugas::orderBy('id', 'desc')
            ->whereDate('tanggal', '>=', $tgl_awal)
            ->whereDate('tanggal', '<=', $tgl_akhir)
            ->get();

        $rows = 2;
        $no = 1;
        $filename = "Laporan Surat Tugas " . date($tgl_awal) . " sampai " . date($tgl_akhir) . ".xlsx";

        foreach ($sql as $data) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $data->nopol);
            $sheet->setCellValue('C' . $rows, $data->jenis_kendaraan);
            $sheet->setCellValue('D' . $rows, $data->nama_pegawai);
            $sheet->setCellValue('E' . $rows, $data->nip);
            $sheet->setCellValue('F' . $rows, $data->keperluan . " " . $data->keperluan_2);
            $sheet->setCellValue('G' . $rows, $data->penumpang);
            $sheet->setCellValue('H' . $rows, $data->nama_camat);
            $sheet->setCellValue('I' . $rows, $data->nip_camat);
            $sheet->setCellValue('J' . $rows, $data->tanggal);
            $sheet->setCellValue('K' . $rows, $data->waktu_angka . " (" . $data->waktu_huruf . ") hari");
            $sheet->setCellValue('L' . $rows, $data->nama_kasubbag);
            $sheet->setCellValue('M' . $rows, $data->jumlah_bbm);
            $sheet->setCellValue('N' . $rows, $data->harga_bbm);
            $sheet->setCellValue('O' . $rows, $data->nilai_voucher);
            $rows++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
