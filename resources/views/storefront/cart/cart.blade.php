@extends('storefront.base.app')
@section('title','Keranjang')
@section('custom_css')
    <link href="{{ asset('storefront/css/cart.css') }}" rel="stylesheet">
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

		@if(Cart::count() > 0)
		<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{route('home')}}">Beranda</a></li>
					<li><a href="{{route('cart')}}">Keranjang</a></li>
				</ul>
			</div>
			<h1>Cart page</h1>
		</div>
		<!-- /page_header -->
		<form method="POST" action="{{route('updateCart')}}">
			@csrf
			<table class="table table-striped cart-list">
				<thead>
					<tr>
						<th>
							Product
						</th>
						<th>
							Price
						</th>
						<th>
							Quantity
						</th>
						<th>
							Subtotal
						</th>
						<th>
							
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($carts as $cart)
					<tr>
						<td>
							<div class="thumb_cart">
								<img src="{{asset('storefront/img/product_placeholder.png')}}" data-src="{{ asset('productImage/'. $cart->options->image) }}" class="lazy" alt="Image">
							</div>
							<span class="item_cart">{{$cart->name}}</span>
						</td>
						<td>
							<strong>Rp. {{$cart->price}}</strong>
						</td>
						<td>
							<div class="numbers-row">
								<input type="text" value="{{$cart->qty}}" id="quantity_1" class="qty2" name="quantity[{{$cart->id}}]">
								<div class="inc button_inc">+</div>
								<div class="dec button_inc">-</div>
							</div>
						</td>
						<td>
							<strong>Rp. {{$cart->subtotal}}</strong>
						</td>
						<td class="options">
							<a href="{{route('removeCart',['rowId' => $cart->rowId])}}"><i class="ti-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		

		<div class="row add_top_30 flex-sm-row-reverse cart_actions">
			<div class="col-sm-4 text-right">
				<a href="{{route('removeAllCart')}}"><button type="button" class="btn_1 gray">Remove Cart</button></a>
				<button type="submit" class="btn_1 gray">Update Cart</button>
			</div>
			<div class="col-sm-4 text-right">
				
			</div>
		</div>
	</form>
	<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		<div class="box_cart">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
			<ul>
				<li>
					<span>Subtotal</span> Rp. {{$subtotal}}
				</li>
				<!--<li>
					<span>Shipping</span> Rp. 7.00
				</li>-->
				<li>
					<span>Total</span> Rp. {{$total}}
				</li>
			</ul>
			<a href="{{route('checkout')}}" class="btn_1 full-width cart">Proceed to Checkout</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /box_cart -->
		@else
		<div class="container margin_30">
			<div class="row">
				<div class="col-12 justify-content-center text-center" style="padding: 150px;">
					<strong>Keranjang Kosong</strong>
				</div>
			</div>
		</div>
		@endif
		
	</main>
	<!--/main-->
@endsection