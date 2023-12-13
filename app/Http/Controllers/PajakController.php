<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPajakRequest;
use App\Models\Pajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TambahPajakRequest;

class PajakController extends Controller
{
    function index()
    {
        $sql = Pajak::get();
        return view('pajak', ['pajak' => $sql]);
    }

    function create()
    {
        return view('pajak_tambah');
    }

    function store(TambahPajakRequest $request)
    {
        $sql = Pajak::create($request->all());
        if ($sql) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Pajak Berhasil!!!');
        }

        return redirect('/pajak');
    }

    function edit($id)
    {
        $sql = Pajak::findOrFail($id);
        return view('pajak_edit', ['pajak' => $sql]);
    }

    function update(EditPajakRequest $request, $id)
    {
        $sql = Pajak::findOrFail($id);
        $update = $sql->update($request->all());
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit Data Pajak Berhasil!!!');
        }

        return redirect('/pajak');
    }

    function delete($id)
    {
        $sql = Pajak::findOrFail($id);
        return view('pajak_hapus', ['pajak' => $sql]);
    }

    function destroy($id)
    {
        $sql = Pajak::findOrFail($id);
        $destroy = $sql->delete();
        if ($destroy) {
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Pajak Berhasil!!!');
        }

        return redirect('/pajak');
    }
}
