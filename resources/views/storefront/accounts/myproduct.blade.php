@extends('storefront.accounts.base.account_base')
@section('title','Produk Saya')
@section('my-product-menu' , 'account-sidebar-menu-active')
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
				<a href="{{route('myProductAdd')}}"><button class="btn_1 add-product-btn">Tambah Produk</button></a>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<table class="table table-striped cart-list">
					<thead>
						<tr>
							<th>
								Produk
							</th>
							<th>
								Harga
							</th>
							<th>
								Kapasitas / (Total)
							</th>
							<th>
								Tanggal Kedatangan
							</th>
							<th>
								
							</th>
						</tr>
					</thead>
					<tbody>
						@if(!$products->isEmpty())
							@foreach($products as $product)
							<tr>
								<td>
									<div class="thumb_cart">
										<img src="{{asset('storefront/img/product_placeholder.png')}}" data-src="{{asset('productImage/'. $product->product_image)}}" class="lazy" alt="Image" style="height: 80px;width: 80px;">
									</div>
									<span class="item_cart"><a href="{{route('myProductDetail' ,['id' => $product->id])}}">{{$product->product_name}}</a></span>
								</td>
								<td>
									<strong>Rp. {{$product->product_price}}</strong>
								</td>
								<td>
									<strong>{{$product->capacity}} / {{$product->total_capacity}}</strong>
								</td>
								<td>
									<strong>{{$product->arrival_date}}</strong>
								</td>
								<td class="options">
									<a href="{{route('myProductDetail' ,['id' => $product->id])}}">Detail</a>
								</td>
								<td class="options">
									<a href="{{route('myProductEdit'  , ['id' =>$product->id])}}">Edit</a>
								</td>
								<!--<td class="options">
									<a href="#"><i class="ti-trash"></i></a>
								</td>-->
							</tr>
							@endforeach
						@else
						<tr >
							<td colspan="4" style="text-align: center;">Data Barang Kosong</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
@endsection