<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\barang;
use App\Models\transaksi;
use App\Models\modal;
use App\Models\stok_barang;
use App\Models\User;
use DB;
use Carbon\Carbon;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        $datas = pesanan::laporan_penjualan();
        return view('admin.laporan.penjualan',compact('datas'));
    }

    public function barang()
    {
        $datas = barang::laporan_barang();
        return view('admin.laporan.barang',compact('datas'));
    }

    public function user()
    {
        $datas = user::where('role','pembeli')->get();
        return view('admin.laporan.user',compact('datas'));
    }

    public function laba()
    {
        // $datas = modal::laporan();
        $pendapatan = transaksi::laporan_transaksi();
        $modal_ready = stok_barang::laporan_modal_ready();
        $modal_preorder = stok_barang::laporan_modal_preorder();

        
        $month = strtotime('2022-10-01');
        $end = strtotime('today Asia/Jakarta');
        $mo = [];
        while($month <= $end)
        {
             $bl =  collect(["bulan"=>date('F Y', $month)]);
             array_push($mo,$bl);
             $month = strtotime("+1 month", $month);
        }

        $datas = collect($mo)->reverse();
        foreach($datas as $bs){
            $bs['pendapatan']= $pendapatan->where('bulan',$bs["bulan"])->first() ? $pendapatan->where('bulan',$bs["bulan"])->first()->total : 0;
            $mready = $modal_ready->where('bulan',$bs["bulan"])->first() ? $modal_ready->where('bulan',$bs["bulan"])->first()->total : 0;
            $mpre = $modal_preorder->where('bulan',$bs["bulan"])->first() ? $modal_preorder->where('bulan',$bs["bulan"])->first()->total : 0;
            $bs["modal"] = $mpre + $mready;
        }

        return view('admin.laporan.laba',compact('datas'));
    }

    public function tambah_modal(Request $request)
    {
        $bulan = new Carbon($request->tahun.'-'.$request->bulan.'-01');
        modal::create([
            'modal'=>$request->modal,
            'bulan'=>$bulan
        ]);
        return redirect()->back()->with('success','Berhasil Menambahkan Modal');
    }

}
