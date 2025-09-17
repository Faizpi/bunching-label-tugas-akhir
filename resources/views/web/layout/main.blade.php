<!DOCTYPE html>
<html lang="ID">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('app')['name'] }}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('bundle/bootstrap/dist/css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('bundle/font-awesome/css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset('bundle/Ionicons/css/ionicons.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<style>
		.v-align-middle {
			vertical-align: middle;
		}
	</style>
	@stack('styles')

	<div class="wrapper">
		<!-- Header -->
		@include('web.layout.header')

		<!-- Sidebar -->
		@include('web.layout.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper"
			style="margin-top:40px; padding:10px;">
			<!-- Main content -->
			<section class="content">
				@yield('content')
			</section>
		</div>
	</div>
	@include('web.layout.footer')
	</div>

	<!-- jQuery 3 -->
	<script src="{{asset('bundle/jquery/dist/jquery.min.js')}}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{asset('bundle/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<!-- FastClick -->
	<script src="{{asset('bundle/fastclick/lib/fastclick.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('js/adminlte.min.js')}}"></script>
	<!-- Sparkline -->
	<script src="{{asset('bundle/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
	<!-- SlimScroll -->
	<script src="{{asset('bundle/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.notify.js')}}"></script>
	<script>
		setTimeout(function() {
			window.location.assign("{{route('web.auth.signout')}}");
		}, (1000 * 60 * 120));
	</script>
	@if(session('type') && session('message'))
	<script>
		//Global alert/notif
		$.notify({
			// options
			title: "{{ ucfirst(session('type')) }}",
			message: "{{ ucfirst(session('message')) }}",
		}, {
			// settings
			element: 'body',
			position: null,
			type: "{{ session('type') }}",
			allow_dismiss: true,
			newest_on_top: true,
			placement: {
				from: "top",
				align: "right"
			},
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
				'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
				'<span data-notify="title">{1}: </span> ' +
				'<span data-notify="message">{2}</span>' +
				'</div>'
		});
	</script>
	@endif

	@stack('scripts')
</body>

</html>