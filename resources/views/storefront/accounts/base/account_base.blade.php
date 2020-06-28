@extends('storefront.base.app')
@section('custom_css')
    <link href="{{ asset('storefront/css/listing.css') }}" rel="stylesheet">
    <link href="{{ asset('storefront/css/account.css') }}" rel="stylesheet">
@endsection
@section('custom_js')
    <!--<script>
    	// Client type Panel
		$('input[name="client_type"]').on("click", function() {
		    var inputValue = $(this).attr("value");
		    var targetBox = $("." + inputValue);
		    $(".box").not(targetBox).hide();
		    $(targetBox).show();
		});
	</script>-->
	<script src="{{ asset('storefront/js/sticky_sidebar.min.js') }}"></script>
	<script src="{{ asset('storefront/js/specific_listing.js') }}"></script>
@endsection
@section('content')
	<main>
	    <div class="top_banner">
	        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
	            <div class="container">
	                <h1>@yield('title')</h1>
	            </div>
	        </div>
	        <img src="{{ asset('storefront/img/banner1.jpg') }}" class="img-fluid" alt="">
	    </div>
	    <!-- /top_banner -->
	    <div id="stick_here"></div>
	    <div class="toolbox elemento_stick">
	        <div class="container">
	            <ul class="clearfix">
	                <li>
	                    <a href="#0" class="open_filters">
	                        <i class="ti-menu"></i><span>Filters</span>
	                    </a>
	                </li>
	            </ul>
	        </div>
	    </div>
	    <!-- /toolbox -->
	    <div class="container margin_30">
	        <div class="row">
	            <aside class="col-lg-3" id="sidebar_fixed">
	                <div class="filter_col">
	                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
	                    <div class="account_sidebar version_2 ">
	                        <h4><a class="@yield('my-account-menu')" href="{{route('account')}}">Akun Saya</a></h4>
	                    </div>
	                    <!-- /filter_type -->
	                    <div class="account_sidebar version_2">
	                        <h4><a class="@yield('my-product-menu')" href="{{route('myProduct')}}">Produk Saya</a></h4>
	                    </div>
	                    <div class="account_sidebar version_2">
	                        <h4><a class="@yield('my-order-menu')" href="{{route('myOrder')}}">Order Saya</a></h4>
	                    </div>
	                    <div class="account_sidebar version_2">
	                        <h4><a class="@yield('my-notification')" href="{{route('notification')}}">Notifikasi Saya <strong style="float: right">({{Auth::user()->unreadNotifications->count()}})</strong></a></h4>
	                    </div>
	                </div>
	            </aside>
	            <!-- /col -->
	            <div class="col-lg-9">
	            	@yield('account_content')
	            </div>
	            <!-- /col -->
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</main>
@endsection