<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    // status [pending,pembayaran,proses,ditolak,selesai]
    use HasFactory;
    protected $fillable = [
        'kode_transaksi',
        'kode_unik',
        'total',
        'status',
        'user_id',
        'etimasi_ready',
        'etimasi_dikirim',
        'total_bayar',
        'bank'
    ];

    public static function laporan_transaksi()
    {
        return transaksi::whereIn('status',['diproses','selesai'])
        ->selectRaw("DATE_FORMAT(created_at, '%M %Y') bulan,sum(total) as total")
        ->groupBy('bulan')->get();
    }

    public static function  rekapitulasi()
    {
        return transaksi::whereIn('status',['diproses','selesai'])
        ->with('pesanan')->get();
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function pesanan(){
        return $this->hasMany(pesanan::class)->with('barang');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }



}
