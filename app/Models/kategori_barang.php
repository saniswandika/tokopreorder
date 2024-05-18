<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori_barang extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'kategori'
    ];

    protected $dates = ['deleted_at'];
    
    public function barang(){
        return $this->hasMany(barang::class);
    }
}
