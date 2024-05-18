<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modal extends Model
{
    use HasFactory;

    protected $fillable = [
        'modal',
        'bulan'
    ];

    public static function laporan()
    {
        $pendapatan = transaksi::laporan_transaksi();
        $modals = modal::selectRaw("DATE_FORMAT(bulan, '%M %Y') bulan_modal,sum(modal) as jumlah_modal")
        ->groupBy('bulan_modal')->get();
        foreach($modals as $m){
            $m['pendapatan']= $pendapatan->where('bulan',$m->bulan_modal)->first() ? $pendapatan->where('bulan',$m->bulan_modal)->first()->total : 0;
        }
        return $modals;
    }
}
