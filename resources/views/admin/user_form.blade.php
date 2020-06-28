@extends('admin.base.app')
@section('title' , 'User Form')
@section('content_title', 'User Form')
@section('admin_user_menu' , 'active')
@section('content')
 <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit User</h5>
              </div>
              <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{route('adminEditUserPost')}}">
                	@csrf
                	<input type="hidden" name="user_id" value="{{$user->id}}" />
					<div class="row">
						<div class="col-12">
							<div class="form-group" style="text-align: center;">
								<img src="{{asset('avatar/'.$user->avatar)}}" alt="" style="height: 200px;width: 200px;" />
							</div>
						</div>
						<div class="col-12 text-center justify-content-center">
							<div class="form-group">
								<button class="btn btn-round btn-primary"><input id="avatar" type="file" class="form-control" name="avatar" placeholder="Avatar">Choose file...</button>
							</div>
						</div>
					</div>
						<hr>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
			                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus placeholder="Nama*">
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
											<option value="" {{$user->gender == '' ? 'selected' : null}}>Jenis Kelamin*</option>
											<option value="1" {{$user->gender == 1 ? 'selected' : null}}>Pria</option>
											<option value="0" {{$user->gender == 0 ? 'selected' : null}}>Wanita</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<input name='address' type="text" class="form-control" value="{{$user->address ? $user->address : null}}" required="" placeholder="Alamat Lengkap *">
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
									<input name='city' type="text" class="form-control"  value ="{{$user->city ? $user->city : null}}" required="" placeholder="Kota *">
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
								<input name='phone_number' type="text" class="form-control" value="{{$user->phone_number ? $user->phone_number : null}}" placeholder="Nomor Telepon *">
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
									<input name='line_id' type="text" class="form-control" value="{{$user->line_id ? $user->line_id : null}}" placeholder="Line Id">
								</div>
							</div>
						</div>
						<div class="col-4 pl-1">
							<div class="form-group">
								<input name='twitter_id' type="text" class="form-control" value="{{$user->twitter_id ? $user->twitter_id : null}}" placeholder="Twitter Id">
							</div>
						</div>
						<div class="col-4 pl-1">
							<div class="form-group">
								<input name='instagram_id' type="text" class="form-control" value="{{$user->instagram_id ? $user->instagram_id : null}}" placeholder="Instagram Id">
							</div>
						</div>
					</div>		
						<hr>
                  <div class="row" >
                    <div class="col-md-12 d-md-flex align-items-center justify-content-end text-center">
                    <a href="{{ route('adminUser') }}" class="btn btn-round btn-primary" style="margin-right: 15px;">Kembali </a>
                      <input class="btn btn-round btn-primary" type="submit" value="Simpan">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection