@extends('storefront.accounts.base.account_base')
@section('title','Tambah Produk')
@section('my-product-menu' , 'account-sidebar-menu-active')
</style>
@section('account_content')
			<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="box_account">
					<form method="POST" action="{{ route('productAdd') }}" enctype="multipart/form-data">
                    @csrf
					<div class="form_container">
						<div class="row no-gutters">
								<div class="col-6">
									<div class="form-group" style="text-align: center;">
										<img src="{{asset('storefront/img/product_placeholder.png')}}" alt="" style="height: 200px;width: 200px;" />
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input id="product_image" type="file" class="form-control" required name="product_image" placeholder="Avatar">
									</div>
								</div>
						</div>
								<hr>
						<div class="private box">
							<div class="row no-gutters">
								<div class="col-12">
									<div class="form-group">
										<div class="form-group">
											<input name='product_name' type="text" class="form-control"  required placeholder="Nama Barang *">
										</div>
									@error('product_name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<div class="form-group">
											<input name='product_price' type="text" class="form-control"  required placeholder="Harga Barang *">
										</div>
									@error('product_price')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
      			                        <textarea  id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required placeholder="Deskripsikan produk anda.. *"></textarea>
									</div>
									@error('description')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12">
									<div class="form-group">
										<div class="custom-select-form">
											<select class="wide add_bottom_10" name="category" required id="category">
												<option value="" disabled selected>Kategory Produk *</option>
												@foreach($categories as $category)
													<option value="{{$category->id}}">{{$category->category_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<div class="custom-select-form">
											<select class="wide add_bottom_10" name="destination" required id="destination">
												<option value="" selected>Destinasi *</option>
												@foreach($destinations as $destination)
													<option value="{{$destination->id}}">{{$destination->destination_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
							</div>							
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<div class="form-group">
										<div class="form-group">
											<input name='capacity' type="text" class="form-control"  required placeholder="Kapasitas Barang *">
										</div>
									@error('capacity')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
									</div>
								</div>
								<div class="col-6 pl-1">
									<div class="form-group">
										<input  name='arrival_date'  class="form-control" type="text" placeholder="Tanggal Kedatangan *" onfocus="(this.type='date')" onblur="(this.type='text')" >
									</div>
									@error('arrival_date')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
							</div>
							<!-- /row -->	
						</div>
						<hr>
						<div class="text-right">
							<input type="submit" value="Tambah Produk" class="btn_1"></div>
					</div>
					<!-- /form_container -->
					</form>
				</div>
				<!-- /box_account -->
			</div>
		</div>
@endsection