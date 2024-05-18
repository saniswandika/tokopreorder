<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;

class PembayaranController extends Controller
{
    public function pembayaran($id)
    {
        $transaksi = Transaksi::with(['pembayaran.bank', 'pesanan.barang'])->find($id);

        if (!$transaksi) {
            abort(404, 'Transaksi tidak ditemukan');
        }

        // Debugging untuk melihat isi transaksi dan pembayaran
        // dd($transaksi);

        return view('pembeli.unggah_pembayaran', compact('transaksi'));
    }



    public function unggah_pembayaran($id, Request $request)
    {
        $request->validate([
            "bukti_pembayaran"=>"required"
        ]);

        if($request->has('bukti_pembayaran')){
            $file = $request->file('bukti_pembayaran');
            $tujuan_upload = public_path('/image/bukti_pembayaran');
            $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            transaksi::find($id)->pembayaran->update([
                "bukti_pembayaran"=>$nama_file
            ]);
            transaksi::find($id)->update([
                "status"=>"pembayaran"
            ]);
        }
        return redirect("pesanan")->with("success","Pembayaran berhasil diunggah, admin sedang mengecek pembayaran");

    }
}
