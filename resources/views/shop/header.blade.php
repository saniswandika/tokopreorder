<header class="header trans_300">

    <!-- Top Navigation -->



    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="{{url('')}}">toko<span>duaputra</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="{{url('')}}">home</a></li>
                        </ul>
                        <ul class="navbar_user">

                            <li class="checkout">
                                <a href="{{url('keranjang')}}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        @if(auth()->check())
                                        <span id="checkout_items" class="checkout_items">
                                            {{App\Models\keranjang::where('user_id',auth()->user()->id)->count()}}
                                        </span>
                                        @else
                                        @endif
                                </a>
                            </li>

                            <li class="account">
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                <ul class="account_selection">
                                    @if(auth()->check())
                                    <li><a href="{{ auth()->user()->role == 'admin' || auth()->user()->role == 'pemilik toko' ? url('dashboard') : url('keranjang') }}"><i class="fa fa-user" aria-hidden="true"></i>Account</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
                                        </a></li>

                                    @else
                                    <li><a href="{{url('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign
                                            In</a></li>
                                    <li><a href="{{url('register')}}"><i class="fa fa-user-plus"
                                                aria-hidden="true"></i>Register</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">
            <li class="menu_item"><a href="#">home</a></li>
            <li class="menu_item"><a href="#">shop</a></li>
        </ul>
    </div>
</div>