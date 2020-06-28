@extends('storefront.base.app')
@section('title','Tulis Ulasan')
@section('custom_css')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('storefront/css/leave_review.css') }}" rel="stylesheet">

@endsection
@section('custom_js')
@endsection
@section('content')
	<main class="bg_gray">
	<div class="container margin_60_35">
		<form method="POST" action="{{route('reviewPost')}}">
			@csrf
			<input type="hidden" name="user_id" value="{{$user->id}}">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="write_review">
						<h1>Tulis Ulasan untuk {{$user->name}}</h1>
						<div class="rating_submit">
							<div class="form-group">
							<label class="d-block">Nilai</label>
							<span class="rating mb-0">
								<input type="radio" class="rating-input" id="5_star" name="rating" value="5"><label for="5_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="4_star" name="rating" value="4"><label for="4_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="3_star" name="rating" value="3"><label for="3_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="2_star" name="rating" value="2"><label for="2_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="1_star" name="rating" value="1"><label for="1_star" class="rating-star"></label>
							</span>
							</div>
						</div>
						<!-- /rating_submit -->
						<div class="form-group">
							<label>Ulasan anda</label>
							<textarea class="form-control" name="review" style="height: 180px;" placeholder="Tulis ulasan Anda.."></textarea>
						</div>
						<button type="submit" class="btn_1">Tambah Ulasan</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection