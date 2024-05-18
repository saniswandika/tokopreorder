<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;

class PesananSelesaiController extends Controller
{
    public function index()
    {
        $datas = transaksi::where('status','selesai')->get();
        return view('admin.pesanan.selesai',compact('datas'));
    }
}
