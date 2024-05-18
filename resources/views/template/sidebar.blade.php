<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
    <li class="nav-item nav-category">Main</li>
        
        @if(auth()->user()->role == 'admin')

        <li class="nav-item {{request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('dashboard')}}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>


        <li
            class="nav-item {{request()->is('kategori-barang*') || request()->is('barang-bangunan*') || request()->is('stok-barang*')  ? 'active' : '' }} ">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Barang</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('kategori-barang')}}">Kategori Barang</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('barang-bangunan')}}">Barang</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('stok-barang')}}">Stok Barang</a></li>
                </ul>
            </div>
        </li>


        <li
            class="nav-item {{request()->is('pesanan-barang*') || request()->is('pesanan-proses*') || request()->is('pesanan-selesai*')  ? 'active' : '' }} ">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                aria-controls="ui-basic2">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Pesanan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('pesanan-barang')}}">Pesananan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('pesanan-proses')}}">Diproses</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('pesanan-selesai')}}">Selesai</a></li>
                </ul>
            </div>
        </li>


        <li
            class="nav-item {{request()->is(['laporan-laba','laporan-user','laporan-penjualan','laporan-barang','laporan-transaksi']) ? 'active' : '' }} ">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false"
                aria-controls="ui-basic4">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic4">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-penjualan')}}">Penjualan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-transaksi')}}">Transaksi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-barang')}}">Barang</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-laba')}}">Pendapatan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-user')}}">User</a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item {{request()->is('/akun-bank/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('akun-bank')}}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Akun Bank</span>
            </a>
        </li>

        @elseif(auth()->user()->role == 'pemilik toko')

        <li class="nav-item {{request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('dashboard')}}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{request()->is('/rekapitulasi/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('rekapitulasi')}}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Rekapitulasi</span>
            </a>
        </li>
        
        <li
            class="nav-item {{request()->is(['laporan-laba','laporan-user','laporan-penjualan','laporan-barang','laporan-transaksi']) ? 'active' : '' }} ">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false"
                aria-controls="ui-basic4">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic4">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-penjualan')}}">Penjualan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-transaksi')}}">Transaksi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-barang')}}">Barang</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-laba')}}">Pendapatan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('laporan-user')}}">User</a></li>
                </ul>
            </div>
        </li>

        @endif

    </ul>
</nav>