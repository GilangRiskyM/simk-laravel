<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeluarEditBBMRequest;
use App\Models\Keluar;
use App\Models\StokBBM;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\KeluarTambahBBMRequest;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KeluarController extends Controller
{
    function index(Request $request)
    {
        $cari = $request->cari;
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        if (isset($request->tgl_awal)) {
            $sql = Keluar::with(['bbm'])
                ->orderBy('id', 'desc')
                ->whereDate('created_at', '>=', $tgl_awal)
                ->whereDate('created_at', '<=', $tgl_akhir)
                ->get();
        } elseif (isset($request->cari)) {
            $sql = Keluar::with(['bbm'])
                ->orderBy('id', 'desc')
                ->where('nopol', 'LIKE', '%' . $cari . '%')
                ->orWhere('jenis_kendaraan', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama_pegawai', 'LIKE', '%' . $cari . '%')
                ->orWhere('nip', 'LIKE', '%' . $cari . '%')
                ->orWhere('jabatan', 'LIKE', '%' . $cari . '%')
                ->orWhere('jumlah', 'LIKE', '%' . $cari . '%')
                ->get();
        } else {
            $sql = Keluar::with(['bbm'])
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('keluar', ['keluar' => $sql]);
    }

    function create()
    {
        $bbm = StokBBM::get();
        $kendaraan = Kendaraan::get();
        return view('keluar_tambah_bbm', ['stok' => $bbm, 'kendaraan' => $kendaraan]);
    }

    function getDataKeluarKendaraan(Request $request)
    {
        $id = $request->input('id');
        $data = Kendaraan::find($id);
        return response()->json($data);
    }

    function store(KeluarTambahBBMRequest $request)
    {
        $idbbm = $request['id_bbm'];
        $jumlah = $request['jumlah'];
        $cekstok = StokBBM::where('id', $idbbm)->get();
        $stoksekarang = $cekstok->value('stok');

        if ($stoksekarang >= $jumlah) {
            //kalau stok cukup
            $kurangistok = $stoksekarang - $jumlah;
            $sqlbbm = StokBBM::findOrFail($idbbm);
            $updatestok = $sqlbbm->update(['stok' => $kurangistok]);
            $sqlkeluar = Keluar::create($request->all());
            if ($sqlkeluar && $updatestok) {
                Session::flash('status', 'success');
                Session::flash('message', 'Tambah Pengeluaran BBM Berhasil!!!');
            }
            return redirect('/keluar');
        } else {
            // kalau stok tidak cukup
            Session::flash('status', 'success');
            Session::flash('message', 'Stok BBM tidak mencukupi!');
            return redirect('/keluar_tambah_bbm');
        }
    }

    function edit($id)
    {
        $sql = Keluar::findOrFail($id);
        return view('keluar_edit_bbm', ['keluar' => $sql]);
    }

    function update(KeluarEditBBMRequest $request, $id)
    {
        $idbbm = $request['id_bbm'];
        $jumlah = $request['jumlah'];
        $cekstok = StokBBM::where('id', $idbbm)->get();
        $stoksekarang = $cekstok->value('stok');
        $sqlkeluar = Keluar::where('id', $id)->get();
        $qty = $sqlkeluar->value('jumlah');
        $sqlupdate = Keluar::findOrFail($id);

        if ($jumlah > $qty) {
            $selisih = $jumlah - $qty;
            $kurangin = $stoksekarang - $selisih;
            $sqlbbm = StokBBM::findOrFail($idbbm);
            $kurangistok = $sqlbbm->update(['stok' => $kurangin]);
            $update = $sqlupdate->update($request->all());
            if ($update && $kurangistok) {
                Session::flash('status', 'success');
                Session::flash('message', 'Edit Pengeluaran BBM Berhasil!!!');
            }
            return redirect('/keluar');
        } elseif ($jumlah < $qty) {
            $selisih = $qty - $jumlah;
            $tambah = $stoksekarang + $selisih;
            $sqlbbm = StokBBM::findOrFail($idbbm);
            $tambahstok = $sqlbbm->update(['stok' => $tambah]);
            $update = $sqlupdate->update($request->all());
            if ($update && $tambahstok) {
                Session::flash('status', 'success');
                Session::flash('message', 'Edit Pengeluaran BBM Berhasil!!!');
            }
            return redirect('/keluar');
        } elseif ($jumlah = $qty) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Pengeluaran BBM Berhasil!!!');
            return redirect('/keluar');
        }
    }

    function delete($id)
    {
        $sql = Keluar::with(['bbm'])->findOrFail($id);
        return view('keluar_hapus_bbm', ['keluar' => $sql]);
    }

    function destroy($id)
    {
        $sqlkeluar = Keluar::where('id', $id)->get();
        $idbbm = $sqlkeluar->value('id_bbm');
        $jumlah = $sqlkeluar->value('jumlah');
        $sqlstok = StokBBM::where('id', $idbbm)->get();
        $stok = $sqlstok->value('stok');
        $tambah = $jumlah + $stok;
        $sqlbbm = StokBBM::findOrFail($idbbm);
        $kembalikanbbm = $sqlbbm->update(['stok' => $tambah]);
        $sqlhapus = Keluar::findOrFail($id);
        $hapus = $sqlhapus->delete();
        if ($hapus && $kembalikanbbm) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Pengeluaran BBM Berhasil!!!');
        }
        return redirect('/keluar');
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
        $sheet->setCellValue('F1', 'Jabatan');
        $sheet->setCellValue('G1', 'Jenis BBM');
        $sheet->setCellValue('H1', 'Jumlah');
        $sheet->setCellValue('I1', 'Tanggal Memasukan Data');

        $sql = Keluar::with(['bbm'])
            ->orderBy('id', 'asc')
            ->whereDate('created_at', '>=', $tgl_awal)
            ->whereDate('created_at', '<=', $tgl_akhir)
            ->get();

        $rows = 2;
        $no = 1;
        $filename = "Laporan Pengeluaran BBM " . date($tgl_awal) . " sampai " . date($tgl_akhir) . ".xlsx";

        foreach ($sql as $data) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $data->nopol);
            $sheet->setCellValue('C' . $rows, $data->jenis_kendaraan);
            $sheet->setCellValue('D' . $rows, $data->nama_pegawai);
            $sheet->setCellValue('E' . $rows, $data->nip);
            $sheet->setCellValue('F' . $rows, $data->jabatan);
            $sheet->setCellValue('G' . $rows, $data->bbm->jenis_kendaraan);
            $sheet->setCellValue('H' . $rows, $data->jumlah);
            $sheet->setCellValue('I' . $rows, $data->created_at);
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
