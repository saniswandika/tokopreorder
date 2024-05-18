<?php
    $keranjang = App\Models\keranjang::where('user_id',auth()->user()->id)->count();
    $pesanan = App\Models\transaksi::where('user_id',auth()->user()->id)->whereIn('status',['pending','pembayaran','diproses'])->count();
?>
<div class="sidebar">
        <div class="sidebar_section">
            <div class="sidebar_title">
                <h5>Akun</h5>
            </div>
            <ul class="sidebar_categories">
                <li class="{{request()->is('keranjang') ? 'active' : ''}}"><a href="{{url('keranjang')}}">Keranjang ({{$keranjang}}) </a></li>
                <li class="{{request()->is('pesanan') ? 'active' : ''}}" ><a href="{{url('pesanan')}}">Pesanan ({{$pesanan}}) </a></li>
                <li class="{{request()->is('histori-pesanan') ? 'active' : ''}}" ><a href="{{url('histori-pesanan')}}">Histori Pemesanan</a></li>
                <li class="{{request()->is('alamat') ? 'active' : ''}}" ><a href="{{url('alamat')}}">Alamat</a></li>
                <li class="{{request()->is('profile') ? 'active' : ''}}" ><a href="{{url('profile')}}">Profile</a></li>
            </ul>
        </div>
    </div>