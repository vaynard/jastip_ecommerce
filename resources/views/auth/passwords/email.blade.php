@extends('storefront.base.app')
@section('title','Reset Password')
@section('custom_css')
<link href="{{ asset('storefront/css/account.css') }}" rel="stylesheet">
<style type="text/css">
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}

.login,
.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url('{{ asset('storefront/img/static_img/forgot-password-concept-illustration_114360-1123.jpg') }}');
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
  border-radius: 2rem;
}


/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
</style>
@endsection
@section('custom_js')

@endsection
@section('content')
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Reset Password</h3>
                    <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form_container">
                        <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="text-center">
                            <input type="submit" value="Reset Password" class="btn_1 full-width"></div>
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                    <!-- /form_container -->
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
