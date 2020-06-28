<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->

  <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('admin_assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet"/>

  <link href="{{ asset('admin_assets/demo/demo.css') }}" rel="stylesheet"/>
</head>
<body class="">
	<div class="wrapper ">
		@include('admin.base.sidebar')
		<div class="main-panel" id="main-panel">
		@include('admin.base.header')
		@yield('content')
		@include('admin.base.footer')
		</div>
	</div>
  <script src="{{ asset('admin_assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
  <!-- Chart JS -->
  <script src="{{ asset('admin_assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('admin_assets/js/plugins/bootstrap-notify.js') }}"></script>
  <script src="{{ asset('admin_assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
  <script src="{{ asset('admin_assets/demo/demo.js') }}"></script>
  <script>
    $(document).ready(function() {
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>