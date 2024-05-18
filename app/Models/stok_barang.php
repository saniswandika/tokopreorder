<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\barang;

class stok_barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah',
        'barang_id'
    ];

    public function barang(){
        return $this->belongsTo(barang::class,'barang_id');
    }

    public static function laporan_modal_ready()
    {
        return stok_barang::join("barangs","barangs.id","stok_barangs.barang_id")
        ->selectRaw("DATE_FORMAT(stok_barangs.created_at, '%M %Y') bulan,sum(stok_barangs.jumlah * barangs.harga_ambil) as total")
        ->groupBy('bulan')->get();
    }
    public static function laporan_modal_preorder(){
        return barang::join("pesanans","pesanans.barang_id","barangs.id")
        ->join("transaksis","transaksis.id","pesanans.transaksi_id")
        ->where("barangs.status","pre-order")
        ->whereIn('transaksis.status',['diproses','selesai'])
        ->selectRaw("DATE_FORMAT(transaksis.created_at, '%M %Y') bulan,sum(pesanans.jumlah * barangs.harga_ambil) as total")
        ->groupBy('bulan')->get();
    }

}
