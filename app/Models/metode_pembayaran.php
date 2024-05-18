<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class metode_pembayaran extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'nama_bank',
        'no_rekening',
        'nama'
    ];

    protected $dates = ['deleted_at'];
}
