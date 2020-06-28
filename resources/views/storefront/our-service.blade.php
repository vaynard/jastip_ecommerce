@extends('storefront.base.app')
@section('title','Tentang Kami')
@section('custom_css')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('storefront/css/about.css') }}" rel="stylesheet">

@endsection
@section('custom_js')
@endsection
@section('content')
	<main class="bg_gray">
			<div class="container margin_60_35 add_bottom_30">
				<div class="main_title">
					<h2>Jasa {{ config('app.name', 'Web Titip Barang') }}</h2>
					<p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p>
				</div>
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-5">
						<div class="box_about">
							<h2>Mudah</h2>
							<p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
							<p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
							<img src="{{ asset('storefront/img/arrow_about.png') }}" alt="" class="arrow_1">
						</div>
					</div>
					<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
							<img src="{{ asset('storefront/img/about_1.svg') }}" alt="" class="img-fluid" width="350" height="268">
					</div>
				</div>
				<!-- /row -->
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
							<img src="{{ asset('storefront/img/about_2.svg') }}" alt="" class="img-fluid" width="350" height="268">
					</div>
					<div class="col-lg-5">
						<div class="box_about">
							<h2>Cepat</h2>
							<p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
							<p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
							<img src="{{ asset('storefront/img/arrow_about.png') }}" alt="" class="arrow_2">
						</div>
					</div>
				</div>
				<!-- /row -->
				<div class="row justify-content-center align-items-center ">
					<div class="col-lg-5">
						<div class="box_about">
							<h2>Mantap</h2>
							<p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
							<p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
						</div>

					</div>
					<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
							<img src="{{ asset('storefront/img/about_3.svg') }}" alt="" class="img-fluid" width="350" height="316">
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		
			<div class="bg_white">
				<div class="container margin_60_35">
					<div class="main_title">
						<h2>Mengapa memilih {{ config('app.name', 'Web Titip Barang') }}?</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="box_feat">
								<i class="ti-gift"></i>
								<h3>Mudah</h3>
								<p>Santai duduk dirumah</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="box_feat">
								<i class="ti-wallet"></i>
								<h3>Ekonomis</h3>
								<p>Titip Barang dengan Mudah </p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="box_feat">
								<i class="ti-headphone-alt"></i>
								<h3>24/7 Support</h3>
								<p>Layanan Support 24 Jam</p>
							</div>
						</div>
					</div>
					<!--/row-->
				</div>
			</div>
			<!-- /bg_white -->
		</div>
		<!-- /container -->
	</main>
@endsection