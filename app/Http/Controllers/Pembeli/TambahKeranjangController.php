<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\keranjang;

class TambahKeranjangController extends Controller
{
    public function tambah_barang(Request $request)
    {

        $keranjang = keranjang::where('user_id',auth()->user()->id)->where('barang_id',$request->barang_id)->first();
        $pesanan = keranjang::where('user_id',auth()->user()->id)->first();
        // Cek keranjang , barang yang dipesan  harus sama preorder / ready
        if($pesanan){
            $barang = barang::find($request->barang_id);
            if($pesanan->barang->status != $barang->status){
                return redirect('keranjang')->with("failed","Pesanan yang dapat di tambahkan hanya barang yang ".$pesanan->barang->status);
            }
        }
        // Cek Stok Barang
        $barang = barang::find($request->barang_id);
        $jumlah_permintaan = $keranjang ? $keranjang->jumlah +  $request->jumlah : $request->jumlah;
        if( $jumlah_permintaan > ($barang->jumlah_barang - $barang->pesanan_terjual[0]->jumlah_terjual) && $barang->status == "tersedia"){
            return redirect()->back()->with("failed","Stok Barang tidak cukup");
        }

        // tambah ke keranjang
        if($keranjang){
            $keranjang->update([
                'jumlah'=> $keranjang->jumlah + $request->jumlah
            ]);
        }else{
            keranjang::create([
                'user_id'=>auth()->user()->id,
                'barang_id'=>$request->barang_id,
                'jumlah'=>$request->jumlah
            ]);
        }

        return redirect('keranjang')->with("success","Barang Berhasil ditambahkan");
    }
}
