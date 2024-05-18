<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class pesanan extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'harga',
        'jumlah',
        'barang_id',
        'transaksi_id'
    ];

    public static function penjualan()
    {
        return pesanan::join('transaksis','transaksis.id','pesanans.transaksi_id')
        ->whereIn('transaksis.status',['diproses','selesai'])
        ->selectRaw("DATE_FORMAT(pesanans.created_at, '%M %Y') bulan,sum(pesanans.jumlah) as total")
        ->groupBy('bulan')->get();
    }



    public static function laporan_penjualan()
    {
        return pesanan::join('transaksis','transaksis.id','pesanans.transaksi_id')
        ->join('barangs','barangs.id','pesanans.barang_id')
        ->select("barangs.nama_barang")
        ->selectRaw("DATE_FORMAT(pesanans.created_at, '%M %Y') bulan,SUM(pesanans.jumlah) as total")
        ->whereIn('transaksis.status',['diproses','selesai'])
        ->groupBy('bulan','nama_barang')
        ->get();
    }

    public function barang(){
        return $this->belongsTo(barang::class,'barang_id');
    }

}
