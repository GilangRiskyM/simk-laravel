<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditKendaraanRequest;
use App\Http\Requests\TambahKendaraanRequest;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KendaraanController extends Controller
{
    function index()
    {
        $sql = Kendaraan::get();
        return view('kendaraan', ['kendaraan' => $sql]);
    }

    function create()
    {
        return view('kendaraan_tambah');
    }

    function store(TambahKendaraanRequest $request)
    {
        $sql = Kendaraan::create($request->all());
        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Kendaraan Berhasil!!!');
        }

        return redirect('/kendaraan');
    }

    function edit($id)
    {
        $sql = Kendaraan::findOrFail($id);
        return view('kendaraan_edit', ['kendaraan' => $sql]);
    }

    function update(EditKendaraanRequest $request, $id)
    {
        $sql = Kendaraan::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Kendaraan Berhasil!!!');
        }

        return redirect('/kendaraan');
    }

    function delete($id)
    {
        $sql = Kendaraan::findOrFail($id);
        return view('kendaraan_hapus', ['data' => $sql]);
    }

    function destroy($id)
    {
        $sql = Kendaraan::findOrFail($id);
        $destroy = $sql->delete();
        if ($destroy) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Kendaraan Berhasil!!!');
        }

        return redirect('/kendaraan');
    }
}
