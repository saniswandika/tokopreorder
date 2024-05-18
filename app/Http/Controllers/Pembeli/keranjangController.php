<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\keranjang;
use App\Models\alamat;
use App\Models\pembayaran;
use App\Models\transaksi;
use App\Models\pesanan;
use App\Models\metode_pembayaran;
use Illuminate\Support\Str;

class keranjangController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $keranjangs = keranjang::where('user_id',auth()->user()->id)->get();
        return view('pembeli.keranjang',compact('keranjangs'));
    }

    public function hapus_barang($id)
    {
        keranjang::findOrFail($id)->delete();
        return redirect()->back()->with("success","Barang Berhasil Dihapus");
    }

    public function bayar()
    {
        $alamat = alamat::where("user_id",auth()->user()->id)->first();
        $keranjangs = keranjang::where('user_id',auth()->user()->id)->get();
        $pembayarans = pembayaran::all();
        $banks = metode_pembayaran::all();
        if($keranjangs->isEmpty()){
            return redirect()->back()->with("failed","Harap tambahkan barang");
        }
        if(!$alamat){
            return redirect("alamat")->with("failed","Harap isi alamat terlebih dahulu");
        }
        $kode_unik = $this->genrateKodeUnik(keranjang::total_pembayaran(auth()->user()->id)->total_harga);

        return view("pembeli.konfirmasi_pembayaran",compact('keranjangs','pembayarans','banks','kode_unik'));
    }

    public function pembayaran(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "metode_pembayaran_id" =>"required"
        ]);

        $transaksi = transaksi::create([
            "kode_transaksi"=>$this->genrateKodeTransaksi(),
            "kode_unik"=>$request->kode_unik,
            "status"=>"pending",
            "total"=>keranjang::total_pembayaran(auth()->user()->id)->total_harga,
            "user_id"=>auth()->user()->id
        ]);
        $keranjangs = keranjang::where('user_id',auth()->user()->id)->get();
        foreach($keranjangs as $keranjang){
            pesanan::create([
                "jumlah"=>$keranjang->jumlah,
                "barang_id"=>$keranjang->barang_id,
                "transaksi_id"=>$transaksi->id,
                "harga"=>$keranjang->barang->harga
            ]);
        }
        pembayaran::create([
            'transaksi_id'=>$transaksi->id,
            'metode_pembayaran_id'=>$request->metode_pembayaran_id
        ]);
        keranjang::where('user_id',auth()->user()->id)->delete();

        return redirect("pesanan")->with("success","Barang Berhasil dipesan, silahkan melakukan pembayaran");
    }

    public function genrateKodeTransaksi()
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (transaksi::where("kode_transaksi", "=", $code)->first());

        return $code;
    }

    public function genrateKodeUnik($harga)
    {
        do {
            $code = rand(2,250);
        } while (transaksi::where("kode_unik", "=", $code)->where("total", "=", $harga)->first());

        return $code;
    }

}
