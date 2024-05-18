<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;


class HistoryPesananController extends Controller
{
    public function index()
    {
        $pesanans = transaksi::where("user_id",auth()->user()->id)->where('status','selesai')
        ->get();
        return view('pembeli.histori_pesanan',compact('pesanans'));
    }
}
