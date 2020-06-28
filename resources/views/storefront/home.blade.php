@extends('storefront.base.app')
@section('title','Jasa Titip Barang')
@section('custom_css')
    <link href="{{ asset('storefront/css/home_1.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <!--<link href="{{ asset('storefront/css/custom.css') }}" rel="stylesheet">-->
@endsection
@section('custom_js')
<script src="{{ asset('storefront/js/carousel-home.min.js') }}"></script>
<script src="{{ asset('storefront/js/carousel-home-2.js') }}"></script>
@endsection
@section('content')
<main>
<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        <div class="owl-slide" style="background-image: url({{ asset('storefront/img/static_img/undraw_quite_town_mg2q.png') }});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-end">
                        <div class="col-lg-6 static">
                            <div class="slide-text text-right white">
                                <h2 class="owl-slide-animated owl-slide-title">Apakah itu Jastip?</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Jasa Titip Barang dengan mudah dan cepat
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{route('ourService')}}" role="button">Telusuri lebih lanjut</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url({{ asset('storefront/img/banner2.jpg') }});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 static">
                            <div class="slide-text white">
                                <h2 class="owl-slide-animated owl-slide-title">Jadi kurir?</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Daftar cepat menjadi Kurir
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{route('register')}}" role="button">Jadi Kurir</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url({{ asset('storefront/img/banner2.jpg') }});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text text-center black">
                                <h2 class="owl-slide-animated owl-slide-title">Macam macam Barang</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Dengan berbagai macam varian barang
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{route('product')}}" role="button">Titip Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
        </div>
    </div>
    <div id="icon_drag_mobile"></div>
</div>
<!--/carousel-->

<div class="feat">
    <div class="container">
        <ul>
            <li>
                <div class="box">
                    <i class="ti-gift"></i>
                    <div class="justify-content-center">
                        <h3>Mudah</h3>
                        <p>Santai duduk dirumah</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="box">
                    <i class="ti-wallet"></i>
                    <div class="justify-content-center">
                        <h3>Ekonomis</h3>
                        <p>Titip Barang dengan Mudah</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="box">
                    <i class="ti-headphone-alt"></i>
                    <div class="justify-content-center">
                        <h3>24/7 Support</h3>
                        <p>Layanan Support 24 Jam</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!--/feat-->

@if($categories)
<div class="container margin_60_35">
            <div class="row small-gutters categories_grid">
                <div class="col-sm-12 col-md-6">
                    <a href="{{route('product')}}">
                        <img src="#" data-src="{{ asset('storefront/img/food3.jpeg') }}" alt="" class="img-fluid lazy">
                        <div class="wrapper">
                            <h2>{{$categories[0]->category_name}}</h2>
                            <p>{{$categories[0]->product->count()}} Titipan</p>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="row small-gutters mt-md-0 mt-sm-2">
                        <div class="col-sm-6">
                            <a href="{{route('product')}}">
                                <img src="#" data-src="{{ asset('storefront/img/food3.jpeg') }}" alt="" class="img-fluid lazy">
                                <div class="wrapper">
                                    <h2>{{$categories[1]->category_name}}</h2>
                                    <p>{{$categories[1]->product->count()}} Titipan</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('product')}}">
                                <img src="#" data-src="{{ asset('storefront/img/food3.jpeg') }}" alt="" class="img-fluid lazy">
                                <div class="wrapper">
                                    <h2>{{$categories[2]->category_name}}</h2>
                                    <p>{{$categories[2]->product->count()}} Titipan</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 mt-sm-2">
                            <a href="{{route('product')}}">
                                <img src="#" data-src="{{ asset('storefront/img/food2.jpg') }}" alt="" class="img-fluid lazy">
                                <div class="wrapper">
                                    <h2>{{$categories[3]->category_name}}</h2>
                                    <p>{{$categories[3]->product->count()}} Titipan</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!--/categories_grid-->
        </div>
@endif

<div class="container margin_60_35" style="border-bottom: 1px solid #ededed;margin-bottom: 25px">
    <div class="main_title">
        <h2>Terbaru</h2>
        <span>Titip Barang</span>
        <p>Update Titip Barang Terbaru</p>
    </div>
    <div class="row">
        @foreach ($latest_products as $latest_product)
           <div class="col-lg-6">
                <a class="box_news" href="{{route('productDetail' , ['id' =>$latest_product->id])}}">
                    <figure>
                        <img src="{{asset('storefront/img/product_placeholder.png')}}" data-src="{{asset('productImage/'. $latest_product->product_image)}}" alt="" width="400" height="266" class="lazy">
                    </figure>
                    <ul>
                        <li>{{$latest_product->user->instagram_id}}</li>
                    </ul>
                    <h4>{{$latest_product->user->name}}</h4>
                    <div style="line-height: 1.5">
                    <p style="line-height: 0.1">Tujuan : {{$latest_product->destination->destination_name}} | {{$latest_product->arrival_date}}</p>
                    <p style="line-height: 0.1">Capasitas : {{$latest_product->capacity}}/{{$latest_product->total_capacity}}</p>
                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12 d-sm-flex justify-content-center">
            <a href="{{route('product')}}" class="btn_1">Telusuri lebih banyak</a>
        </div>      
    </div>
    <!-- /row -->
</div>
<!-- /container -->
@if(!$destinations->isEmpty())
    <div class="container-fluid">
    <div class="main_title">
        <h2>Top Destinasi</h2>
        <span>Titip Barang</span>
        <p>Titip Barang di Destinasi Favorit Anda</p>
    </div>
<div id="carousel-home-2">
            <div class="owl-carousel owl-theme">
                @foreach($destinations as $destination)
                <div class="owl-slide cover" style="background-image: url({{ asset('storefront/img/england2.jpg') }});">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start">
                                <div class="col-lg-12 static">
                                    <div class="slide-text text-center white">
                                        <h2 class="owl-slide-animated owl-slide-title animatedslide">{{$destination->destination_name}}</h2>
                                        <br>
                                        <div class="owl-slide-animated owl-slide-cta animatedslide"><a class="btn_1" href="{{route('product',['destination['.$destination->id.']'=>1
                                            ])}}" role="button">Telusuri</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div id="icon_drag_mobile"></div>
        </div>
    </div>
@endif

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Terpopuler</h2>
        <span>Titip Barang</span>
        <p>Titip Barang sebelum kehabisan</p>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
        @foreach ($popular_products as $popular_product)
            <div class="item">
                <div class="grid_item">
                    <figure>
                        <a href="{{route('productDetail' , ['id' =>$popular_product->id])}}">
                            <img class="owl-lazy" src="#" data-src="{{asset('productImage/'. $popular_product->product_image)}}" alt="">
                        </a>
                    </figure>
                    <a href="{{route('productDetail' , ['id' =>$popular_product->id])}}">
                        <h3>{{$popular_product->product_name}}</h3>
                        <p>{{$popular_product->description}}</p>
                    </a>
                    <ul>
                        <li>
                            <form action="{{route('addToCart')}}" method="POST" id='addToCart{{$popular_product->id}}'>
                                <input type="hidden" name="id" value="{{$popular_product->id}}">
                                @csrf
                                <a href='javascript:;' class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart" onclick="document.getElementById('addToCart{{$popular_product->id}}').submit()"></i><span>Tambahkan ke Keranjang</span></a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="featured lazy" data-bg="url({{ asset('storefront/img/banner1.jpg') }})">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Jadi Kurir?</h3>
                    <p>Daftar jadi Kurir dengan cepat dan mudah</p>
                    <div class="feat_text_block">
                        <a class="btn_1" href="{{route('register')}}" role="button">Jadi kurir sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection

