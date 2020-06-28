@extends('storefront.base.app')
@section('title','Check Transaksi')
@section('custom_css')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('storefront/css/error_track.css') }}" rel="stylesheet">

@endsection
@section('custom_js')
@endsection
@section('content')
<main class="bg_gray">
		<div id="track_order">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-7 col-lg-9">
						<img src="{{ asset('storefront/img/track_order.svg') }}" alt="" class="img-fluid add_bottom_15" width="200" height="177">
						<p>Cek Status Transaksi Saya</p>
						<form method="POST" action="{{route('checkTransactionPost')}}">
							@csrf
							<div class="search_bar">
								<input type="text" name='order_id' class="form-control" placeholder="Order ID">
								<input type="submit" value="Cari">
							</div>
						</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /track_order -->
	</main>
@endsection