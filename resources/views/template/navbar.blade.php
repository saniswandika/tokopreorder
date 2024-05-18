<?php
    $notif_pesanan = App\Models\transaksi::where('status','pembayaran')->get();
?>

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="#"><img src="{{asset('image/logo-dark-svg.svg')}}"
                alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img
                src="{{asset('image/logo-mini-svg.svg')}}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">

            @if(auth()->user()->role == 'admin')
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count-symbol bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0 bg-primary text-white py-4">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    
                    @forelse($notif_pesanan as $notif)
                    <a class="dropdown-item preview-item" href="{{url('pesanan-barang')}}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-cart"></i>
                            </div>
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">{{$notif->updated_at->format('d/m/Y')}}</h6>
                            <p class="text-gray ellipsis mb-0"> {{$notif->user->name}} Melakukan Pesanan
                            </p>
                        </div>
                    </a>
                    @empty
                    <p class="p-3 mb-0 text-center" >Tidak Ada Pesanan</p>
                    @endforelse


                    

                    <div class="dropdown-divider"></div>

                    <h6 class="p-3 mb-0 text-center">
                        <a href="{{url('pesanan-barang')}}" class="p-3 mb-0 text-center">Lihat Semua Pesanan</a>
                    </h6>
                </div>
            </li>
            @endif

            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{asset('template/assets/images/faces-clipart/pic-4.png')}}">
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{auth()->user()->name}}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                    aria-labelledby="profileDropdown" data-x-placement="bottom-end">

                    <div class="p-2">

                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                            href="{{url('profile-admin')}}">
                            <span>Profil</span>
                            <i class="mdi mdi-settings"></i>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>

                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <span>Log Out</span>
                            <i class="mdi mdi-logout ml-1"></i>
                        </a>
                    </div>
                </div>
            </li>





        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>