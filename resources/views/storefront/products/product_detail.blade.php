@extends('storefront.base.app')
@section('title','Detail Produk')
@section('custom_css')
    <link href="{{ asset('storefront/css/product_page.css') }}" rel="stylesheet">
    <link href="{{ asset('storefront/css/blog.css') }}" rel="stylesheet">
@endsection
@section('custom_js')
@endsection
@section('content')
	<main class="bg_gray">
	    <div class="container margin_30">
	        <div class="page_header">
	            <h1>{{$product->product_name}}</h1>
	        </div>
	        <!-- /page_header -->
	        <div class="row justify-content-center">
	            <div class="col-lg-8">
	                <div class="owl-carousel owl-theme prod_pics magnific-gallery">
	                    <div class="item">
	                        <a href="{{asset('productImage/'. $product->product_image)}}" title="{{$product->product_name}}" data-effect="mfp-zoom-in"><img src="{{asset('productImage/'. $product->product_image)}}" alt="{{$product->product_name}}"></a>
	                    </div>
	                    <!-- /item -->
	                </div>
	                <!-- /carousel -->
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	    
	    <div class="bg_white">
	        <div class="container margin_60_35">
	            <div class="row justify-content-between">
	                <div class="col-lg-6">
	                    <div class="prod_info version_2">
	                        <span class="rating">
                                	@if($product->user->reviewee->avg('rating') >= 1)
                                	<i class="icon-star"></i>
                                	@else
                                	<i class="icon-star-empty"></i>
                                	@endif
                                	@if($product->user->reviewee->avg('rating') >= 2)
                                	<i class="icon-star"></i>
                                	@else
                                	<i class="icon-star-empty"></i>
                                	@endif
                                	@if($product->user->reviewee->avg('rating') >= 3)
                                	<i class="icon-star"></i>
                                	@else
                                	<i class="icon-star-empty"></i>
                                	@endif
                                	@if($product->user->reviewee->avg('rating') >= 4)
                                	<i class="icon-star"></i>
                                	@else
                                	<i class="icon-star-empty"></i>
                                	@endif
                                	@if($product->user->reviewee->avg('rating') >= 5)
                                	<i class="icon-star"></i>
                                	@else
                                	<i class="icon-star-empty"></i>
                                	@endif
	                        	<em>{{$product->user->reviewee->count()}} reviews</em></span>
	                        <p><small>Di buat pada: {{$product->created_at}}</small><br>
	                        {{$product->description}}
	                    </div>
	                </div>
	                <div class="col-lg-5">
	                    <div class="prod_options version_2">

	                        <div class="row">
	                            <label class="col-xl-7 col-lg-5 col-md-6 col-6"><strong> Tanggal Kedatangan</strong> <a href="#0" data-toggle="modal" data-target="#size-modal"><i class="ti-help-alt"></i></a></label>
	                            <div class="col-xl-5 col-lg-5 col-md-6 col-6">
	                                <div class="custom-select-form">
	                                	<strong>{{$product->arrival_date}}</strong>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <label class="col-xl-7 col-lg-5  col-md-6 col-6 pt-0"><strong>Kapasitas Barang / Total</strong></label>
	                            <div class="col-xl-5 col-lg-5 col-md-6 col-6 colors">
	                                <ul>
	                                    <li><strong>{{$product->capacity}}</strong></li>
	                                    <li><strong>/</strong></li>
	                                    <li><strong>{{$product->total_capacity}}</strong></li>
	                                </ul>
	                            </div>
	                        </div>
	                        @if($product->total_capacity-$product->capacity > 0)
							<form action="{{route('addToCart')}}" method="POST">
                                @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
	                        <div class="row">
	                            <label class="col-xl-7 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
	                            <div class="col-xl-5 col-lg-5 col-md-6 col-6">
	                                <div class="numbers-row">
	                                    <input type="number" min="1" max="{{$product->total_capacity-$product->capacity}}" value="1" id="quantity" class="qty2" name="quantity">
	                                    <div class="inc button_inc">+</div>
	                                    <div class="dec button_inc">-</div>
	                                </div>
	                            </div>
	                        </div>
	                        @endif
	                        <div class="row mt-3">
	                            <div class="col-lg-7 col-md-6 col-sm-6">
	                                <div class="price_main"><span class="new_price">Rp. {{$product->product_price}}</span></div>
	                            </div>
	                            @if($product->total_capacity-$product->capacity > 0)
	                            <div class="col-lg-5 col-md-6 col-sm-6">
	                                <div class="btn_add_to_cart" type="submit"><button type="submit" class="btn_1">Add to Cart</button>
	                                </div>
	                            </div>
	                            @else
								<div class="col-lg-5 col-md-6">
	                                <div class="price_main"><span class="new_price" style="color:red">Kapasitas Barang Full</span></div>
	                            </div>
	                            @endif
	                        </div>
                            </form>
	                    </div>
	                </div>
	            </div>
	            <!-- /row -->
	        </div>
	    </div>
	    <!-- /bg_white -->

	    <div class="tabs_product bg_white version_2">
	        <div class="container">
	            <ul class="nav nav-tabs" role="tablist">
	                <li class="nav-item">
	                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Description</a>
	                </li>
	                <li class="nav-item">
	                    <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">Data Kurir</a>
	                </li>
	                <li class="nav-item">
	                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Reviews ({{$product->user->reviewee->count()}})</a>
	                </li>
	                <li class="nav-item">
	                    <a id="tab-D" href="#pane-D" class="nav-link" data-toggle="tab" role="tab">Tanya Kurir ({{$product->askProduct->count()}})</a>
	                </li>
	            </ul>
	        </div>
	    </div>
	    <!-- /tabs_product -->

	    <div class="tab_content_wrapper">
	        <div class="container">
	            <div class="tab-content" role="tablist">
	                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
	                    <div class="card-header" role="tab" id="heading-A">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
	                                Deskripsi
	                            </a>
	                        </h5>
	                    </div>

	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
	                                <div class="col-lg-6">
	                                    <h3>Details</h3>
	                                    <p>{{$product->description}}</p>
	                                </div>
	                                <div class="col-lg-5">
	                                    <h3>Spesifikasi Barang</h3>
	                                    <div class="table-responsive">
	                                        <table class="table table-sm table-striped">
	                                            <tbody>
	                                                <tr>
	                                                    <td><strong>Dipost oleh</strong></td>
	                                                    <td>{{$product->user->name}}</td>
	                                                </tr>
	                                                <tr>
	                                                    <td><strong>Dipost pada</strong></td>
	                                                    <td>{{$product->created_at}}</td>
	                                                </tr>
	                                                <tr>
	                                                    <td><strong>Tanggal Kedatangan</strong></td>
	                                                    <td>{{$product->arrival_date}}</td>
	                                                </tr>
	                                                <tr>
	                                                    <td><strong>Asal Barang</strong></td>
	                                                    <td>{{$product->destination->destination_name}}</td>
	                                                </tr>
	                                                <tr>
	                                                    <td><strong>Kategory</strong></td>
	                                                    <td>{{$product->category->category_name}}</td>
	                                                </tr>
	                                                <tr>
	                                                    <td><strong>Kapasitas Total</strong></td>
	                                                    <td>{{$product->total_capacity}}</td>
	                                                </tr>
	                                            </tbody>
	                                        </table>
	                                    </div>
	                                    <!-- /table-responsive -->
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>

					<div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
	                    <div class="card-header" role="tab" id="heading-C">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C">
	                                Data Kurir
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
	                        <div class="card-body">
	                        	<div class="row justify-content-center">
	                        		<label style="font-size: 20px;margin-bottom: 20px;">Biodata Kurir</label>
	                        	</div>
	                            <div class="row justify-content-center">
		                                <div class="col-lg-4">
		                                    <div class="review_content">
								                <div class="owl-carousel owl-theme prod_pics magnific-gallery">
								                    <div class="item">
								                        <a href="{{asset('avatar/'. $product->user->avatar)}}" title="{{$product->user->name}}" data-effect="mfp-zoom-in"><img src="{{asset('avatar/'. $product->user->avatar)}}" alt="{{$product->user->name}}" height="300" width="200"></a>
								                    </div>
								                    <!-- /item -->
								                </div>
		                                    </div>
		                                </div>
	                                	<div class="col-lg-4">
		                                    <div class="review_content">
		                                        <div class="table-responsive">
			                                        <table class="table table-sm table-striped">
			                                            <tbody>
			                                                <tr>
			                                                    <td><strong>Nama :</strong></td>
			                                                    <td>{{$product->user->name}}</td>
			                                                </tr>
			                                                <tr>
			                                                    <td><strong>Email :</strong></td>
			                                                    <td>{{$product->user->email}}</td>
			                                                </tr>
			                                                <tr>
			                                                    <td><strong>Gender :</strong></td>
			                                                    <td>
			                                                    	@if($product->user->gender == 1)
			                                                    		Laki -laki
			                                                    	@else
			                                                    		Perempuan
			                                                    	@endif
			                                                    </td>
			                                                </tr>
			                                                <tr>
			                                                    <td><strong>Alamat :</strong></td>
			                                                    <td>{{$product->user->address}}</td>
			                                                </tr>
			                                                <tr>
			                                                    <td><strong>Kota :</strong></td>
			                                                    <td>{{$product->user->city}}</td>
			                                                </tr>
			                                                <tr>
			                                                    <td><strong>Line Id :</strong></td>
			                                                    <td>{{$product->user->line_id}}</td>
			                                                </tr>
			                                                <tr>
			                                                    <td><strong>Twitter Id :</strong></td>
			                                                    <td>{{$product->user->twitter_id}}</td>
			                                                </tr>
			                                                <tr>
			                                                    <td><strong>Instagram Id :</strong></td>
			                                                    <td>{{$product->user->instagram_id}}</td>
			                                                </tr>
			                                            </tbody>
			                                        </table>
			                                    </div>
		                                    </div>
		                                </div>
	                            </div>
	                        </div>
	                        <!-- /card-body -->
	                    </div>
	                </div>
	                <!-- /TAB A -->
	                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
	                    <div class="card-header" role="tab" id="heading-B">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
	                                Reviews
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
	                        <div class="card-body">
	                        	@if(!$product->user->reviewee->isEmpty())
	                            <div class="row justify-content-between">
	                            	@foreach ($product->user->reviewee as $review)
	                                <div class="col-lg-5">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating">
	                                            	@if($review->rating >= 1)
	                                            	<i class="icon-star"></i>
	                                            	@else
	                                            	<i class="icon-star-empty"></i>
	                                            	@endif
	                                            	@if($review->rating >= 2)
	                                            	<i class="icon-star"></i>
	                                            	@else
	                                            	<i class="icon-star-empty"></i>
	                                            	@endif
	                                            	@if($review->rating >= 3)
	                                            	<i class="icon-star"></i>
	                                            	@else
	                                            	<i class="icon-star-empty"></i>
	                                            	@endif
	                                            	@if($review->rating >= 4)
	                                            	<i class="icon-star"></i>
	                                            	@else
	                                            	<i class="icon-star-empty"></i>
	                                            	@endif
	                                            	@if($review->rating >= 5)
	                                            	<i class="icon-star"></i>
	                                            	@else
	                                            	<i class="icon-star-empty"></i>
	                                            	@endif<em>{{$review->rating}}/5</em></span>
	                                            <em>Di review {{$review->created_at}}</em>
	                                        </div>
	                                        <p>{{$review->review}}.</p>
	                                    </div>
	                                </div>
	                                @endforeach
	                            </div>
	                            @else
	                            <div class="row justify-content-between">
	                            	<div class="col-lg-12 justify-content-center text-center" style="margin-bottom: 30px;">
	                            		<strong>Tidak ada ulasan yang ditemukan</strong>
	                            	</div>
	                            </div>
	                            @endif
	                            @auth
	                            @if(Auth::user()->id != $product->user->id)
	                            <p class="text-right"><a href="{{route('review',['id' => $product->user->id])}}" class="btn_1">Tulis ulasan</a></p>
	                            @endif
	                            @endauth
	                        </div>
	                        <!-- /card-body -->
	                    </div>
	                    
	                </div>
	                <!-- /tab B -->
					<div id="pane-D" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-D">
	                    <div class="card-header" role="tab" id="heading-D">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-D" aria-expanded="false" aria-controls="collapse-D">
	                                Tanya Kurir
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-D" class="collapse" role="tabpanel" aria-labelledby="heading-D">
	                        <div class="card-body">
	                            <div class="row justify-content-between">
									<div class="col-12">
					<div id="comments">
						<h5>Tanya Seputar Barang</h5>
						@if($product->askProduct)
							@foreach($product->askProduct as $ask)
							<ul>
								<li>
									<div class="avatar">
										<img src="{{asset('avatar/'. $ask->user->avatar)}}" alt="">
										
									</div>
									<div class="comment_right clearfix">
										<p>
											{{$ask->content}}
										</p>
										<div class="comment_info">
											Oleh {{$ask->user->name}}<span>|</span>{{$ask->created_at}}<span>|</span>
											@auth
											@if(Auth::user()->id == $product->user->id && !$ask->reply)
											<a href="#reply-dialog{{$ask->id}}" class="modals-dialog">Balas</a>
											@include('storefront.products.modal.reply',['ask'=> $ask])
											@endif
											@endauth
										</div>
									</div>
									@if($ask->reply)
									<ul class="replied-to">
										<li>
											<div class="avatar">
												<img src="{{asset('storefront/img/avatar1.jpg')}}" alt="">
												
											</div>
											<div class="comment_right clearfix">
												<p>
													{{$ask->reply->content}}
												</p>
												<div class="comment_info">
													Oleh {{$product->user->name}}<span>|</span>{{$ask->reply->created_at}}<span>
												</div>
											</div>
										</li>
									</ul>
									@endif
								</li>
							</ul>
							@endforeach
						@else
							<div class="row">
								<div class="col-12">
									Belum ada yg menanyai seputar barang ini
								</div>
							</div>
						@endif
					</div>

					<hr>

					@auth
					<h5>Tanya Seputar Brang</h5>
					<form action="{{route('productAsk')}}" method="POST">
						@csrf
						<input type="hidden" name="product_id" value="{{$product->id}}">
					<div class="form-group">
						<textarea class="form-control" name="comments" id="comments2" rows="6" placeholder="Tanya seputar barang disini.."></textarea>
					</div>
					<div class="form-group">
						<button type="submit" id="submit2" class="btn_1 add_bottom_15">Tanya</button>
					</div>
					</form>
					@endauth
	                                </div>
	                            </div>
	                        </div>
	                        <!-- /card-body -->
	                    </div>
	                </div>
	                    
	                </div>
	            </div>
	            <!-- /tab-content -->
	        </div>
	        <!-- /container -->
	    </div>
	    <!-- /tab_content_wrapper -->
	    @if(!$related_products->isEmpty())
	    <div class="bg_white">
	        <div class="container margin_60_35">
	            <div class="main_title">
	                <h2>Related</h2>
	                <span>Barang</span>
	                <p>Barang dengan tempat asal yang sama</p>
	            </div>
	            <div class="owl-carousel owl-theme products_carousel">
			        @foreach ($related_products as $related_product)
			            <div class="item">
			                <div class="grid_item">
			                    <figure>
			                        <a href="{{route('productDetail' , ['id' =>$related_product->id])}}">
			                            <img class="owl-lazy" src="#" data-src="{{asset('productImage/'. $related_product->product_image)}}" alt="">
			                        </a>
			                    </figure>
			                    <a href="{{route('productDetail' , ['id' =>$related_product->id])}}">
			                        <h3>{{$related_product->product_name}}</h3>
			                        <p>{{$related_product->description}}</p>
			                    </a>
			                    <ul>
			                        <li>
			                        	<form action="{{route('addToCart')}}" method="POST" id='addToCart{{$related_product->id}}'>
			                        	<input type="hidden" name="id" value="{{$related_product->id}}">
                                		@csrf
			                        	<a href='javascript:;' class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart" onclick="document.getElementById('addToCart{{$related_product->id}}').submit()"></i><span>Tambahkan ke Keranjang</span></a>
			                        </form>
			                        </li>
			                    </ul>
			                </div>
			            </div>
			        @endforeach
	            </div>
	            <!-- /products_carousel -->
	        </div>
	        <!-- /container -->
	    </div>
	    @endif
	    <!-- /bg_white -->

	</main>
	<!-- /main -->

@endsection