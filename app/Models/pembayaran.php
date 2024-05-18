<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'bukti_pembayaran',
        'transaksi_id',
        'metode_pembayaran_id'
    ];
 
    public function bank(){
        return $this->belongsTo(metode_pembayaran::class,'metode_pembayaran_id');
    }
    // public function bank()
    // {
    //     return $this->belongsTo(metode_pembayaran::class);
    // }
}
