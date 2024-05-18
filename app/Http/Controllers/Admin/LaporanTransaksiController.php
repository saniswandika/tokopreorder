<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;

class LaporanTransaksiController extends Controller
{
    public function index()
    {
        $datas = transaksi::laporan_transaksi();
        return view('admin.laporan.transaksi',compact('datas'));
    }
}
