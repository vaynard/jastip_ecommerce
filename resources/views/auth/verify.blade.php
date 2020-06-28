@extends('storefront.base.app')
@section('title','Verifikasi Email')
@section('custom_css')
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
                    <h3>Verifikasi Email Anda</h3>
                    
                    <div class="form_container">
                        <div class="form-group">
                            <label>
                                Sebelum melanjutkan , mohon cek email Anda untuk verifikasi email Anda.
                                <br>Jika anda tidak mendapat email verifikasi :
                            </label>
                        </div>
                        @if (session('resent'))
                        <div class="form-group">
                            <div class="alert alert-success" role="alert">
                                {{ __('Email verifikasi terbaru berhasil dikirim') }}
                            </div>
                        </div>
                        @endif
                        <hr>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="text-center">
                            <input type="submit" value="Kirim Ulang Email Verifikasi" class="btn_1 full-width"></div>
                        <!-- /form_container -->
                        </form>
                    </div>
                    
                </div>
                <!-- /box_account -->
            </div>
        </div>
        </div>
    </main>
@endsection
