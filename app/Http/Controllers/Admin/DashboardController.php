<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pesanan;


class DashboardController extends Controller
{
    public function index()
    {
        $penjualan = pesanan::penjualan();
        // dd($penjualan);
        return view('admin.dashboard.index',compact('penjualan'));
    }
}
