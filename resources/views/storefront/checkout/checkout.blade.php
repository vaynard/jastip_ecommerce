@extends('storefront.base.app')
@section('title','Checkout')
@section('custom_css')
    <link href="{{ asset('storefront/css/checkout.css') }}" rel="stylesheet">

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
@endsection
@section('content')
	<main class="bg_gray">
	
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('index')}}">Beranda</a></li>
					<li><a href="{{route('cart')}}">Keranjang</a></li>
					<li>Checkout</li>
				</ul>
		</div>
		<h1>Checkout</h1>
			
	</div>
	<!-- /page_header -->
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="step first">
						<h3>Info Pembeli dan Alamat Pengiriman</h3>
					<div class="checkout box_general">
							<div class="row no-gutters">
								<div class="col-4 form-group pr-1">
									<span>Nama</span><span style="float: right;">:</span>
								</div>
								<div class="col-8 form-group pl-1">
									<span>{{$current_user->name}}</span>
								</div>
							</div>
							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-4 form-group pr-1">
									<span>Alamat Lengkap</span><span style="float: right;">:</span>
								</div>
								<div class="col-8 form-group pl-1">
									<span>{{$current_user->address}} ,{{$current_user->city}}</span>
								</div>
							</div>
							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-4 form-group pr-1">
									<span>Nomor Telepon</span><span style="float: right;">:</span>
								</div>
								<div class="col-8 form-group pl-1">
									<span>{{$current_user->phone_number}}</span>
								</div>
							</div>
						<!-- /tab_1 -->
					</div>
					</div>
					<!-- /step -->
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step middle payments">
						<h3>Pembayaran</h3>
							<ul>
								<li>
									<label class="container_radio">Transfer Bank<a href="#0" data-toggle="modal" data-target="#payments_method"></a>
										<input type="radio" name="payment" checked>
										<span class="checkmark"></span>
									</label>
								</li>
							</ul>
							<div class="box_general summary payment_info d-none d-sm-block"><p>Transfer Bank ke Rekening BCA dengan No.Rekening : 232535 a/n Titip Jasa</p></div>
													
					</div>
					<!-- /step -->
					
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="step last">
						<h3>Pesanan Anda</h3>
					<div class="box_general summary">
						@if(!empty(Cart::content()))
							<ul>
								@foreach(Cart::content() as $cart)
								<li class="clearfix">
									<em>{{$cart->qty}}x {{$cart->name}}</em>  
									<span>Rp.{{$cart->price}}</span>
								</li>
								@endforeach
							</ul>
							<ul>
								<li class="clearfix"><em><strong>Subtotal</strong></em>  <span>Rp. {{Cart::subtotal()}}</span></li>							
							</ul>
							<div class="total clearfix">TOTAL <span>Rp. {{Cart::total()}}</span></div>
						@endif
						<form action="{{route('checkoutPost')}}" method="POST">
							@csrf
							<button type='submit' class="btn_1 full-width">Checkout</button>
						</form>
					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection