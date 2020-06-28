@extends('storefront.accounts.base.account_base')
@section('title','Order Saya')
@section('my-order-menu' , 'account-sidebar-menu-active')
<link href="{{ asset('storefront/css/cart.css') }}" rel="stylesheet">
<style type="text/css">
.add-product-btn{
	float: right;
	margin-bottom: 20px;
}
</style>
@section('account_content')
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>
								Order Id
							</th>
							<th>
								Status
							</th>
							<th>
								Qty
							</th>
							<th>
								Total Harga
							</th>
							<th>
								Waktu Order
							</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@if(!$orders->isEmpty())
							@foreach($orders as $order)
							<tr>
								<td>
									<a href="{{route('myOrderDetail'  , ['id' =>$order->id])}}"><span>{{$order->order_id}}</span></a>
								</td>
								<td>
									<strong>{{$order->status->status_name}}</strong>
								</td>
								<td >
									<strong>{{$order->total_qty}}</strong>
								</td>
								<td>
									<strong>{{$order->total_price}}</strong>
								</td>
								<td>
									<strong>{{$order->created_at}}</strong>
								</td>
								<td class="options">
									<a href="{{route('myOrderDetail'  , ['id' =>$order->id])}}">Detail</a>
								</td>
							</tr>
							@endforeach
						@else
						<tr >
							<td colspan="6" style="text-align: center;">Data Order Kosong</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
@endsection