<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;

class RekapitulasiController extends Controller
{
    public function index()
    {
        $datas = transaksi::rekapitulasi() ;
        return view('admin.rekapitulasi.index',compact('datas'));
    }
}
