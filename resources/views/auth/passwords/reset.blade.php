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
            <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="box_account">
                    <h3>Reset Password</h3> <small class="float-right pt-2" style="color:red;">* wajib diisi</small>
                    <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form_container">
                        <div class="form-group" style="display: none">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>                
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password*">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password*">
                        </div>
                        <hr>
                        <div class="text-center">
                            <input type="submit" value="Reset Password" class="btn_1 full-width"></div>
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
