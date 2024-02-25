<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pajak;
use App\Models\StokBBM;
use Carbon\Carbon;

class IndexController extends Controller
{
    function index()
    {
        $bbm = StokBBM::get();

        return view('index', ['bbm' => $bbm]);
    }
}
