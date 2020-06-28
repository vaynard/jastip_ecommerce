@extends('storefront.accounts.base.account_base')
@section('title','Edit Akun')
@section('my-account-menu' , 'account-sidebar-menu-active')

@section('account_content')
			<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="box_account">
					<h3>Edit Profile</h3> <small class="float-right pt-2" style="color:red;">* wajib diisi</small>
					<form method="POST" action="{{ route('updateAccount') }}" enctype="multipart/form-data">
                    @csrf
					<div class="form_container">
						<input id="user_id" type="hidden" name="user_id" value="{{$curr_user->id}}">
						<div class="row no-gutters">
								<div class="col-6">
									<div class="form-group" style="text-align: center;">
										<img src="{{asset('avatar/'.$curr_user->avatar)}}" alt="" style="height: 200px;width: 200px;" />
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input id="avatar" type="file" class="form-control" name="avatar" placeholder="Avatar">
									</div>
								</div>
						</div>
								<hr>
						<div class="private box">
							<div class="row no-gutters">
								<div class="col-12">
									<div class="form-group">
      			                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$curr_user->name}}" required autocomplete="name" autofocus placeholder="Nama*">
									</div>
									@error('name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-12">
									<div class="form-group">
										<div class="custom-select-form">
											<select class="wide add_bottom_10" name="gender" id="gender">
													<option value="" {{$curr_user->gender == '' ? 'selected' : null}}>Jenis Kelamin*</option>
													<option value="1" {{$curr_user->gender == 1 ? 'selected' : null}}>Pria</option>
													<option value="0" {{$curr_user->gender == 0 ? 'selected' : null}}>Wanita</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input name='address' type="text" class="form-control" value="{{$curr_user->address ? $curr_user->address : null}}" required="" placeholder="Alamat Lengkap *">
									</div>
									@error('address')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
							</div>							
							<div class="row no-gutters">
								<div class="col-6 pr-1">
									<div class="form-group">
										<div class="form-group">
											<input name='city' type="text" class="form-control"  value ="{{$curr_user->city ? $curr_user->city : null}}" required="" placeholder="Kota *">
										</div>
									@error('city')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
									</div>
								</div>
								<div class="col-6 pl-1">
									<div class="form-group">
										<input name='phone_number' type="text" class="form-control" value="{{$curr_user->phone_number ? $curr_user->phone_number : null}}" placeholder="Nomor Telepon *">
									</div>
									@error('phone_number')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color: red">{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
							</div>
							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-4 pr-1">
									<div class="form-group">
										<div class="form-group">
											<input name='line_id' type="text" class="form-control" value="{{$curr_user->line_id ? $curr_user->line_id : null}}" placeholder="Line Id">
										</div>
									</div>
								</div>
								<div class="col-4 pl-1">
									<div class="form-group">
										<input name='twitter_id' type="text" class="form-control" value="{{$curr_user->twitter_id ? $curr_user->twitter_id : null}}" placeholder="Twitter Id">
									</div>
								</div>
								<div class="col-4 pl-1">
									<div class="form-group">
										<input name='instagram_id' type="text" class="form-control" value="{{$curr_user->instagram_id ? $curr_user->instagram_id : null}}" placeholder="Instagram Id">
									</div>
								</div>
							</div>	
						</div>
						<hr>
						<div class="text-right">
							<input type="submit" value="Simpan" class="btn_1"></div>
					</div>
					<!-- /form_container -->
					</form>
				</div>
				<!-- /box_account -->
			</div>
		</div>
@endsection