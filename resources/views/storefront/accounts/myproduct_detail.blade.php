@extends('storefront.accounts.base.account_base')
@section('title','Produk Saya')
@section('my-product-menu' , 'account-sidebar-menu-active')
<link href="{{ asset('storefront/css/product_page.css') }}" rel="stylesheet">
<link href="{{ asset('storefront/css/cart.css') }}" rel="stylesheet">
<style type="text/css">
.add-product-btn{
	float: right;
	margin-bottom: 20px;
}
</style>
@section('custom_js')
<script  src="{{ asset('storefront/js/carousel_with_thumbs.js') }}"></script>
@endsection
@section('account_content')
<main>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-6">
	                <div class="all">
	                    <div class="slider">
	                        <div class="owl-carousel owl-theme main">
	                            <div style="background-image: url({{asset('productImage/'. $product->product_image)}});" class="item-box"></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <!-- /page_header -->
	                <div class="prod_info">
	                    <h1>{{$product->product_name}}</h1>
	                    <span class="rating">Dibuat pada : </i><em>{{$product->created_at}}</em></span>
	                    <p><small>Kategory Barang: {{$product->category->category_name}}</small><br>{{$product->description}}</p>
	                    <div class="prod_options">
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Harga</strong></label>
	                            <label class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
	                                <span>Rp. {{$product->product_price}}</span>
	                            </label>
	                        </div>
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Asal Barang</strong></label>
	                            <label class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
	                                <span>{{$product->destination->destination_name}}</span>
	                            </label>
	                        </div>
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Kapasitas/Total</strong></label>
	                            <label class="col-xl-4 col-lg-5 col-md-6 col-6">
	                            	<span>{{$product->capacity}} / {{$product->total_capacity}}</span>
	                            </label>
	                        </div>
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Kedatangan</strong></label>
	                            <label class="col-xl-4 col-lg-5 col-md-6 col-6">
	                                <span>{{$product->arrival_date}}</span>
	                            </label>
	                        </div>
	                    </div>
	                </div>
	                <!-- /prod_info -->
	                <div class="product_actions">
	                    <ul>
	                        <li>
	                            <a href="{{route('myProductEdit'  , ['id' =>$product->id])}}"><button class="btn_1">Edit Barang</button></a>
	                        </li>
	                        <li>
	                            <a href="{{route('productSoftDelete'  , ['id' =>$product->id])}}"><button class="btn_1">Hapus Barang</button></a>
	                        </li>
	                    </ul>
	                </div>
	                <!-- /product_actions -->
	            </div>
	        </div>
	        <!-- /row -->
	        <hr>
	        <div class="row">
	        	<div class="col-12"><label style="font-size: 20px;margin-bottom: 5px;">List Titipan Barang</label></div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>
									Order Id
								</th>
								<th>
									Penitip
								</th>
								<th>
									Status
								</th>
								<th>
									Jumlah Barang
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
							@if(!$product->checkoutProduct->isEmpty())
								@foreach($product->checkoutProduct as $checkoutProduct)
								<tr>
									<td>
										<a href="{{route('myOrderDetail'  , ['id' =>$checkoutProduct->checkout->id])}}">
										<span>{{$checkoutProduct->checkout->order_id}}</span>
										</a>
									</td>
									<td>
										<strong>
											{{$checkoutProduct->checkout->user->name}}
										</strong>
									</td>
									<td>
										<strong>{{$checkoutProduct->checkout->status->status_name}}</strong>
									</td>
									<td>
										<strong>{{$checkoutProduct->qty}}</strong>
									</td>
									<td>
										<strong>Rp. {{$checkoutProduct->price*$checkoutProduct->qty}}</strong>
									</td>
									<td>
										<strong>{{$checkoutProduct->checkout->created_at}}</strong>
									</td>
									@if($checkoutProduct->checkout->status_id != 5)
										<td class="options">
											<a href="#process-dialog{{$checkoutProduct->id}}" class="modals-dialog"><button class="btn_1">Update Status</button></a>
										</td>
										@include('storefront.accounts.modal.process_order',['checkoutStatus'=> $checkoutStatus,'checkoutProduct' => $checkoutProduct])
									@endif
								</tr>
								@endforeach
							@else
							<tr >
								<td colspan="7" style="text-align: center;">Data Order Titipan Barang Kosong</td>
							</tr>
							@endif
						</tbody>
					</table>
				</div>
	        </div>
	    </div>
	    <!-- /container -->
	    
	    </div>
	    <!-- /tab_content_wrapper -->
	</main>	
@endsection