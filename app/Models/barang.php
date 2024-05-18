<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class barang extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nama_barang',
        'status',
        'harga',
        'harga_ambil',
        'jumlah_barang',
        'satuan_barang',
        'kategori_barang_id',
        'foto_barang',
        'deskripsi'
    ];

    protected $dates = ['deleted_at'];

    public static function laporan_barang()
    {
        return barang::withcount(['pesanan AS jumlah_pesanan'=>function($q){
            $q->join('transaksis','transaksis.id','pesanans.transaksi_id'); 
            $q->whereIn('transaksis.status',['diproses','selesai']);
            $q->select(DB::raw("SUM(pesanans.jumlah) as jumlah_pesanan"));
        }])
        ->withcount(['stok_barang AS jumlah_stok'=>function($q){
            $q->select(DB::raw("SUM(jumlah) as jumlah_stok"));
        }])
        ->get();
    }

    public function pesanan()
    {
        return $this->hasMany(pesanan::class);
    }

    public function pesanan_terjual()
    {
        return $this->hasMany(pesanan::class)->join('transaksis','transaksis.id','pesanans.transaksi_id')
        ->whereIn('transaksis.status',['pending','pembayaran','diproses','selesai'])
        ->select(DB::raw("SUM(pesanans.jumlah) as jumlah_terjual"));
    }

    public function stok_barang()
    {
        return $this->hasMany(stok_barang::class);
    }

    public function kategori_barang(){
        return $this->belongsTo(kategori_barang::class,'kategori_barang_id');
    }
}
