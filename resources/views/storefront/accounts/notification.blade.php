@extends('storefront.accounts.base.account_base')
@section('title','Notifikasi Saya')
@section('my-notification' , 'account-sidebar-menu-active')
<link href="{{ asset('storefront/css/cart.css') }}" rel="stylesheet">
<link href="{{ asset('storefront/css/bootstrap.css') }}" rel="stylesheet">
<style type="text/css">
.add-product-btn{
	float: right;
	margin-bottom: 20px;
}
</style>
@section('account_content')
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				@if(!$notifications->isEmpty())
					@foreach($notifications as $notification)
						<div class="alert alert-primary" role="alert">
	  						{{$notification->data['notification_data']}}
	  						<a href="{{url($notification->data['url'])}}" style="float: right">Lihat</a>
						</div>
					@endforeach
				@else
					<div class="row justify-content-center text-center" >
						<span>Notifikasi Kosong</span>
					</div>
				@endif
			</div>
		</div>
@endsection