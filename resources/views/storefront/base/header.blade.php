<header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <a class="phone_top" href="#"><strong><span>Bantuan Hubungi</span>08123445677</strong></a>
                </div>
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="{{ url('/') }}" style="height: 35; "><!--<img src="img/logo.svg" alt="" width="100" height="35">--> {{ config('app.name', 'Web Titip Barang') }}</a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-6 d-lg-flex align-items-center justify-content-end text-right">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="#"><img src="#" alt="" width="100" height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            @auth
                            <li>
                                <a href="{{route('confirmPayment')}}">Konfirmasi Pembayaran</a>
                            </li>
                            @endauth
                            <li>
                                <a href="{{route('checkTransaction')}}">Cek Transaksi</a>
                            </li>
                            <li>
                                <a href="{{route('aboutUs')}}">Tentang Kami</a>
                            </li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3 d-lg-flex align-items-center justify-content-center">
                    <div class="categories text-center clearfix">
                         <a href="{{ url('/') }}"><strong><span>{{ config('app.name', 'Web Titip Barang') }}</span></strong></a>                       
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <div class="custom-search-input">
                        <form action="{{route('product')}}" method="get">
                            <input name="search_query" type="text" placeholder="Cari barang yg diingin dititipkan..." value="{{old('search_query')}}">
                            <button type="submit">
                                <i class="header-icon_search_custom"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        @guest
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">Daftar</a>
                        </li>
                         @endif
                         @if (Route::has('register'))
                        <li>
                            <a href="{{route('login')}}">Masuk</a>
                        </li>
                        @endif
                        @else
                            <li>
                                <div class="dropdown dropdown-cart">
                                    <a href="{{route('cart')}}" class="cart_bt"><strong>{{Cart::count()}}</strong></a>
                                    @include('storefront.cart.cart_list_header')
                                <!-- /dropdown-cart-->
                            </li>
                            <li>
                                <div class="dropdown dropdown-access">
                                    <a href="#" class="access_link"><strong>{{Auth::user()->unreadNotifications->count()}}</strong><span>Account</span></a>
                                    <div class="dropdown-menu">
                                        <a href="{{route('productAdd')}}" class="btn_1">Tambahkan Product</a>
                                        <ul>
                                            <li>
                                                <a href="{{route('account')}}"><i class="ti-user"></i>Akun Saya</a>
                                            </li>
                                            <li>
                                                <a href="{{route('notification')}}"><i class="ti-bell"></i>Notifikasi ({{Auth::user()->unreadNotifications->count()}})</a>
                                            </li>
                                            <li>
                                                <a href="{{route('myProduct')}}"><i class="ti-package"></i>Product Saya</a>
                                            </li>
                                            <li>
                                                <a href="{{route('myOrder')}}"><i class="ti-truck"></i>Pesanan Saya</a>
                                            </li>
                                            <!--<li>
                                                <a href="#"><i class="ti-help-alt"></i>Bantuan</a>
                                            </li>-->
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    <i class="ti-shift-left"></i>{{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /dropdown-access-->
                            </li>

                        @endguest
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                        </li>

                        <li>
                            <a href="{{ url('/') }}" class="btn_cat_mob">
                                {{ config('app.name', 'Web Titip Barang') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <input type="text" class="form-control" placeholder="Search over 10.000 products">
            <input type="submit" class="btn_1 full-width" value="Search">
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>
<!-- /header -->