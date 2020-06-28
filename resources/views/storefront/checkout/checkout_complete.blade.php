@extends('storefront.base.app')
@section('title','Checkout')
@section('custom_css')
    <link href="{{ asset('storefront/css/checkout.css') }}" rel="stylesheet">

@endsection
@section('custom_js')
@endsection
@section('content')
	<main class="bg_gray">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-5">
					<div id="confirm">
						<div class="icon icon--order-success svg add_bottom_15">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div>
					<h2>Order {{$checkout->order_id}} berhasil!</h2>
					<p>Transfer Bank ke Rekening BCA dengan No.Rekening : 232535 a/n Titip Jasa</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<div class="row justify-content-center" style="padding-bottom: 25px">
				<div class="col-md-5">
						<a href="{{route('confirmPayment')}}"><button class="btn_1">Konfirmasi Pembayaran</button></a>
				</div>
				<div class="col-md-5">
						<a href="{{route('myOrderDetail'  , ['id' =>$checkout->id])}}"><button class="btn_1">Lihat Detail Pesanan</button></a>
				</div>
			</div>
		</div>
		<!-- /container -->
		
	</main>
	<!--/main-->
@endsection