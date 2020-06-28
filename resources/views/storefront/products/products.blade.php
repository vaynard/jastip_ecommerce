@extends('storefront.base.app')
@section('title','Postingan Barang')
@section('custom_css')
    <link href="{{ asset('storefront/css/listing.css') }}" rel="stylesheet">

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
	                <div class="breadcrumbs">
	                    <ul>
	                        <li><a href="{{route('index')}}">Beranda</a></li>
	                        <li>Barang</li>
	                    </ul>
	                </div>
	                <h1>Cari Barang</h1>
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
	                    <div class="sort_select">
	                    	<form action="{{route('product')}}" method="get">
		                        <select name="sort" id="sort" onchange="this.form.submit()">
		                        	<option value="newest" 
		                        	@if(request()->sort == 'newest' || !isset(request()->sort))
		                            		selected="selected"
		                            	@endif
		                        		>Cari paling terbaru</option>
									<option value="popularity"
		                            	@if(request()->sort == 'popularity')
		                            		selected="selected"
		                            	@endif
		                            >Cari paling populer</option>
		                            <option value="lowprice"
		                            	@if(request()->sort == 'lowprice')
		                            		selected="selected"
		                            	@endif
		                            >Harga Paling Murah</option>
		                            <option value="highprice" @if(request()->sort == 'highprice')
		                            		selected="selected"
		                            	@endif>Harga Paling Mahal</option>
		                        </select>
	                    	</form>
	                    </div>
	                </li>
	                <li>
	                    <a href="#0" class="open_filters">
	                        <i class="ti-filter"></i><span>Filters</span>
	                    </a>
	                </li>
	            </ul>
	        </div>
	    </div>
	    <!-- /toolbox -->
	    <div class="container margin_30">
	        <div class="row">
	            <aside class="col-lg-3" id="sidebar_fixed">
	            	<form action="{{route('product')}}" method="get">
		                <div class="filter_col">
		                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
		                    <div class="filter_type version_2">
		                        <h4><a href="#filter_1" data-toggle="collapse" class="opened">Kategory</a></h4>
		                        <div class="collapse show" id="filter_1">
		                            <ul>
		                            	@foreach($categories as $category)
			                                <li>
			                                    <label class="container_check">{{$category->category_name}}
			                                    	<small>
			                                    		{{$category->product->count()}}
			                                    	</small>
			                                        <input type="checkbox" name="category[{{$category->id}}]"
			                                        @if(isset(request()->category[$category->id]))
			                                        	checked
			                                        @else
			                                        	null
			                                        @endif
			                                         >
			                                        <span class="checkmark"></span>
			                                    </label>
			                                </li>
		                                @endforeach
		                            </ul>
		                        </div>
		                        <!-- /filter_type -->
		                    </div>
		                    <!-- /filter_type -->
		                    <div class="filter_type version_2">
		                        <h4><a href="#filter_2" data-toggle="collapse" class="opened">Tujuan</a></h4>
		                        <div class="collapse @if(isset(request()->destination)) show @endif" id="filter_2">
		                            <ul>
		                            	@foreach($destinations as $destination)
			                                <li>
			                                    <label class="container_check">{{$destination->destination_name}}
			                                    	<small>{{$destination->product->count()}}</small>
			                                        <input type="checkbox" name="destination[{{$destination->id}}]"
			                                        @if(isset(request()->destination[$destination->id]))
			                                        	checked
			                                        @endif
			                                        >
			                                        <span class="checkmark"></span>
			                                    </label>
			                                </li>
		                                @endforeach
		                            </ul>
		                        </div>
		                    </div>
		                    <!-- /filter_type -->
		                    <div class="buttons">
		                        <button type='submit' class="btn_1">Filter</button>
		                        <a href="{{route('product')}}" class="btn_1 gray">Reset</a>
		                    </div>
		                </div>
	                </form>
	            </aside>
	            <!-- /col -->
	            <div class="col-lg-9">
	            	@if(isset(request()->search_query))
	            	<div class="row row_item">
	            		<div class="col-12 justify-content-center">
	            			<span style="font-size:30px">Hasil pencarian : {{request()->search_query}}</span>
	            		</div>
	            	</div>
	            	@endif
	            	@if($products->count() > 0)
		            	@foreach($products as $product)
		                <div class="row row_item" style="border: 1px solid #ededed;padding-top: 20px !important;">
		                    <div class="col-sm-4">
		                        <figure>
		                            <a href="{{route('productDetail' , ['id' =>$product->id])}}">
		                                <img class="img-fluid lazy" src="#" data-src="{{ asset('storefront/img/food2.jpg') }}" alt="">
		                            </a>
		                        </figure>
		                    </div>
		                    <div class="col-sm-8">                    
		                    	<ul>
	                        		<li>{{$product->user->instagram_id}}</li>
	                    		</ul>
		                        <a href="{{route('productDetail' , ['id' =>$product->id])}}">
		                            <h3>{{$product->user->name}}</h3>
		                        </a>
								<div style="line-height: 1.5">
			                    <p style="line-height: 0.1">Tujuan : {{$product->destination->destination_name}} | {{$product->arrival_date}}</p>
			                    <p style="line-height: 0.1">Capasitas : {{$product->capacity}}/{{$product->total_capacity}}</p>
			                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
			                	</div>
		                        <ul class=" d-sm-flex justify-content-end" style="margin-bottom: 5px">
		                            <li>
		                            	<form action="{{route('addToCart')}}" method="POST">
		                            		@csrf
		                            		<input type="hidden" name="id" value="{{$product->id}}">
		                            	<button type="submit" class="btn_1">Tambah ke Keranjang</button>
		                            	</form>
		                            </li>
		                        </ul>
		                    </div>
		                </div>
		                @endforeach
		                <!-- /row_item -->
		                <div class="pagination__wrapper">
		                    <ul class="pagination">
		                    	{{ $products->appends(request()->input())->links() }}
		                    </ul>
		                </div>
		            @else
		            	<div class="row row_item" style="border-top: 1px solid grey">
		            		<div class="col-12 justify-content-center text-center">
		            			<br>
		            			<span style="font-size:30px">Barang Tidak ditemukan</span>
		            		</div>
		            	</div>		            	
		            @endif
	            </div>
	            <!-- /col -->
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</main>
@endsection