@extends('storefront.base.app')
@section('title','Registrasi')
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
						<li>Register</li>
					</ul>
			</div>
			</div>
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Buat Akun Baru</h3> <small class="float-right pt-2" style="color:red;">* wajib diisi</small>
					<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
					<div class="form_container">
						<div class="form-group">
							<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email_2" placeholder="Email*">				
							@error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="form-group">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="reg_password" required autocomplete="new-password" placeholder="Password*">
							@error('reg_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="reg_password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Ulang Password*">
                        </div>
						<hr>
						<div class="private box">
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<div class="form-group">
										<span>Profile Photo</span>
									</div>
								</div>
								<div class="col-6 pl-1">
									<div class="form-group">
										<div class="fileupload">
											<input id="avatar" type="file" class="form-control" name="avatar" required placeholder="Avatar">
										</div>
										
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
      			                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Lengkap*">
									</div>
									@error('name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12">
									<div class="form-group">
										<div class="custom-select-form">
											<select class="wide add_bottom_10 @error('gender') is-invalid @enderror" name="gender" id="gender">
													<option value="" selected>Jenis Kelamin*</option>
													<option value="1">Pria</option>
													<option value="0">Wanita</option>
											</select>
										</div>
									</div>
									@error('gender')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                               	@enderror
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat Lengkap*" required name="address">
									</div>
									@error('address')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                               	@enderror
								</div>
							</div>
							<!-- /row -->							
							<div class="row no-gutters">
								<div class="col-12">
									<div class="form-group">
										<div class="form-group">
											<input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City*" name="city" required>
										</div>
									</div>
									@error('city')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                               	@enderror
								</div>
								<div class="col-12">
									<div class="form-group"> 
										<input type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="Telephone *" required name="telephone">
									</div>
									@error('telephone')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                               	@enderror
								</div>
							</div>
							<!-- /row -->
							
						</div>
						<hr>
						<div class="form-group">
							<label class="container_check">Accept <a href="#0">Terms and conditions</a>
								<input type="checkbox" name="term_and_condition" required>
								<span class="checkmark"></span>
							</label>
						</div>

						<div class="text-center">
							<input type="submit" value="Register" class="btn_1 full-width"></div>
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