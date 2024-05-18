<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;


class PesananDiprosesController extends Controller
{
    public function index()
    {
        $datas = transaksi::where('status','diproses')->get();
        return view('admin.pesanan.diproses',compact('datas'));
    }
    public function selesai($id)
    {
        transaksi::find($id)->update(['status'=>"selesai"]);
        return redirect()->back()->with('success',"Barang telah selesai dikirim");
    }
}
