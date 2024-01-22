<?php

namespace App\Http\Controllers;

use App\Models\StokBBM;
use Illuminate\Http\Request;

class StokBBMController extends Controller
{
    function index()
    {
        $sql = StokBBM::get();
        return view('stok_bbm', ['stok' => $sql]);
    }
}
