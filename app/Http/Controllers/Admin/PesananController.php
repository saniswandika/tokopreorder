<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;

class PesananController extends Controller
{
    public function index()
    {
        $datas = transaksi::where('status','pembayaran')->get();
        return view('admin.pesanan.index',compact('datas'));
    }

    public function terima_pembayaran($id, Request $request)
    {
        $transaksi = transaksi::find($id);
        if($transaksi->pesanan[0]->barang->status == "pre-order"){
            $transaksi->update([
                "status"=>"diproses",
                "etimasi_ready"=>$request->etimasi_ready,
                "etimasi_dikirim"=>$request->etimasi_dikirim,
                "total_bayar"=>$request->total_bayar
            ]);
        }else{
            $transaksi->update([
                "status"=>"diproses",
                "total_bayar"=>$transaksi->total
            ]);
        }
        return redirect()->back()->with("success","Pembayaran diterima");
    }

    public function tolak_pembayaran($id)
    {
        $transaksi = transaksi::find($id);
        $transaksi->update([
            "status"=>"ditolak",
        ]);
        return redirect()->back()->with("Failed","Pembayaran ditolak");
    }

}
