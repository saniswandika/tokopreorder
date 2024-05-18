<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = transaksi::where("user_id",auth()->user()->id)->whereIn('status',['pending','pembayaran','diproses','ditolak'])
        ->get();
        return view('pembeli.pesanan',compact('pesanans'));
    }
}
