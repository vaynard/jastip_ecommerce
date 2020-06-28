@extends('storefront.base.app')
@section('title','Konfirmasi Pembayaran')
@section('custom_css')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('storefront/css/account.css') }}" rel="stylesheet">

@endsection
@section('custom_js')
@endsection
@section('content')
	<main class="bg_gray">
		<div class="container margin_30">
			<div class="page_header">
				<div class="breadcrumbs">
					<ul>
						<li><a href="{{url('/')}}">Beranda</a></li>
						<li>Konfirmasi Pemabayaran</li>
					</ul>
			</div>
			<h1>Konfirmasi Pembayaran</h1>
			</div>
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<form method="POST" action="{{ route('confirmPaymentCreate') }}" enctype="multipart/form-data">
                    @csrf
					<div class="form_container">
						<div class="form-group">
							<input type="text" class="form-control @error('order_id') is-invalid @enderror" name="order_id" id="order_id" required placeholder="Order Id*">				
							@error('order_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<hr>
						<div class="private box">	
							<div class="row no-gutters">
								<div class="col-12">
									<div class="form-group">
										<input id="bank_name" type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" required placeholder="Nama Bank*">
										@error('bank_name')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input id="account_name" type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" required placeholder="Atas Nama*">
										@error('account_name')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
      			                        <input id="transfer_figure" type="number" class="form-control @error('name') is-invalid @enderror" name="transfer_figure" value="{{ old('transfer_figure') }}" required autocomplete="transfer_figure" autofocus placeholder="Nominal Transfer*">
									</div>
									@error('transfer_figure')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12">
									<div class="form-group">
										<input name='transfer_date'  class="form-control @error('transfer_date') is-invalid @enderror" type="text" placeholder="Tanggal Transfer*" onfocus="(this.type='date')" onblur="(this.type='text')" >
									</div>
									@error('transfer_date')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
							</div>
							<!-- /row -->
							<hr>
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<div class="form-group">
										<span>Upload Bukti Transfer</span>
									</div>
								</div>
								<div class="col-6 pl-1">
									<div class="form-group">
										<div class="fileupload">
											<input id="transfer_photo" type="file" class="form-control" name="transfer_photo" required placeholder="Transfer Photo">
										</div>
										
									</div>
								</div>
							</div>							
						</div>
						<hr>
						<div class="text-center">
							<input type="submit" value="Konfirmasi Pembayaran" class="btn_1 full-width"></div>
					</div>
					<!-- /form_container -->
					</form>
				</div>
				<!-- /box_account -->
			</div>
		</div>
		</div>
	</main>
@endsection