<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasukEditBBMRequest;
use App\Models\Masuk;
use App\Models\StokBBM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\MasukTambahBBMRequest;

class MasukController extends Controller
{
    function index()
    {
        $sql = Masuk::with(['bbm'])->get();
        return view('masuk', ['masuk' => $sql]);
    }

    function create()
    {
        $sql = StokBBM::get();
        return view('masuk_tambah_bbm', ['stok' => $sql]);
    }

    function store(MasukTambahBBMRequest $request)
    {
        $idbbm = $request['id_bbm'];
        $jumlah = $request['jumlah'];
        $cekstok = StokBBM::where('id', $idbbm)->get(); //panggil data dari tabel stok_bbm
        $stoksekarang = $cekstok->value('stok'); //ambil nilai attribute stok dari tabel stok_bbm
        $tambahstok = $stoksekarang + $jumlah;
        $sqlbbm = StokBBM::findorFail($idbbm);
        $updatestok = $sqlbbm->update(['stok' => $tambahstok]);
        $sqlmasuk = Masuk::create($request->all());
        if ($updatestok && $sqlmasuk) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Stok BBM Berhasil!!!');
        }

        return redirect('/masuk');
    }

    function edit($id)
    {
        $sql = Masuk::with(['bbm'])->findOrFail($id);
        $bbm = StokBBM::where('id', '!=', $sql->id_bbm)->get(['id', 'jenis_kendaraan']);
        return view('masuk_edit_bbm', ['masuk' => $sql, 'bbm' => $bbm]);
    }

    function update(MasukEditBBMRequest $request, $id)
    {
        $idbbm = $request['id_bbm'];
        $jumlah = $request['jumlah'];
        $lihatstok = StokBBM::where('id', $idbbm)->get(); //panggil data dari tabel stok_bbm
        $stoksekarang = $lihatstok->value('stok'); //ambil nilai attribute stok dari tabel stok_bbm
        $sql = Masuk::where('id', $id)->get(); //panggil data dari tabel masuk
        $jmlskrg = $sql->value('jumlah'); //ambil nilai attribute jumlah dari tabel masuk
        $sqlbbm = StokBBM::findOrFail($idbbm);
        $sqlupdate = Masuk::findOrFail($id);

        if ($jumlah > $jmlskrg) { //jika jumlah lebih besar dari data yang dimasukan sebelumnya
            $selisih = $jumlah - $jmlskrg;
            $tambah = $stoksekarang + $selisih;
            $tambahstoknya = $sqlbbm->update(['stok' => $tambah]);
            $update = $sqlupdate->update($request->all());
            if ($tambahstoknya && $update) {
                Session::flash('status', 'success');
                Session::flash('message', 'Edit Data Tambah Stok BBM Berhasil!!!');
            }
            return redirect('/masuk');
        } elseif ($jumlah < $jmlskrg) { //jika jumlah lebih kecil dari data yang dimasukan sebelumnya
            $selisih = $jmlskrg - $jumlah;
            $kurang = $stoksekarang - $selisih;
            $kurangistoknya = $sqlbbm->update(['stok' => $kurang]);
            $update = $sqlupdate->update($request->all());
            if ($kurangistoknya && $update) {
                Session::flash('status', 'success');
                Session::flash('message', 'Edit Data Tambah Stok BBM Berhasil!!!');
            }
            return redirect('/masuk');
        } elseif ($jumlah = $jmlskrg) {
            $update = $sqlupdate->update($request->all());
            if ($update) {
                Session::flash('status', 'success');
                Session::flash('message', 'Edit Data Tambah Stok BBM Berhasil!!!');
            }
            return redirect('/masuk');
        }
    }

    function delete($id)
    {
        $sql = Masuk::with(['bbm'])->findOrFail($id);
        return view('masuk_hapus_bbm', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sqlmasuk = Masuk::where('id', $id)->get();
        $idbbm = $sqlmasuk->value('id_bbm');
        $jumlah = $sqlmasuk->value('jumlah');
        $sqlstok = StokBBM::where('id', $idbbm)->get();
        $stok = $sqlstok->value('stok');
        $selisih = $stok - $jumlah;
        $sqlhapus = Masuk::findOrFail($id);
        $sqlupdatestok = StokBBM::findOrFail($idbbm);
        $updatestok = $sqlupdatestok->update(['stok' => $selisih]);
        $hapus = $sqlhapus->delete();
        if ($hapus && $sqlupdatestok) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Tambah Stok BBM Berhasil!!!');
        }
        return redirect('/masuk');
    }
}
