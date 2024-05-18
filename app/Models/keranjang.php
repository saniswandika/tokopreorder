<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'user_id',
        'jumlah'
    ];

    public function barang(){
        return $this->belongsTo(barang::class,'barang_id');
    }

    public static function total_pembayaran($id)
    {
        return keranjang::join("barangs","barangs.id","keranjangs.barang_id")
        ->where("keranjangs.user_id",$id)
        ->select(DB::raw("SUM(barangs.harga * keranjangs.jumlah) as total_harga"))
        ->first();
    }



}
