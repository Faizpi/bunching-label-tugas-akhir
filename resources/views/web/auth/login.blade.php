<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('app.name') }} | Login</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('bundle/bootstrap/dist/css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('bundle/font-awesome/css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset('bundle/Ionicons/css/ionicons.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">

	<style>
		body {
			background: linear-gradient(135deg, #f1f5f9, #e2e8f0) !important;
			font-family: 'Source Sans Pro', sans-serif;
		}

		.login-box {
			margin: 6% auto;
			width: 100%;
			max-width: 380px;
			color: #f8fafc;
			padding: 20px;
			border-radius: 12px;
			box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25);
			text-align: center;
		}

		.login-logo {
			text-align: center;
			margin-bottom: 15px;
		}

		.login-logo img {
			width: 70px;
			margin-bottom: 8px;
		}

		.login-logo p {
			font-size: 16px;
			font-weight: bold;
			color: #fff;
			text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
			margin: 2px 0;
		}

		.login-logo small {
			font-size: 13px;
			color: #cbd5e1;
			display: block;
			margin-top: 2px;
		}

		.login-box-body {
			background: #ffffff;
			border-radius: 10px;
			padding: 22px 25px;
			box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.12);
			text-align: left;
		}

		.form-control {
			border-radius: 6px;
			box-shadow: none;
			border: 1px solid #cbd5e1;
			padding: 10px 12px;
			font-size: 14px;
		}

		.form-control:focus {
			border-color: #376bdc;
			box-shadow: 0 0 4px rgba(55, 107, 220, 0.4);
		}

		.btn-primary {
			background: #376bdc;
			border: none;
			border-radius: 6px;
			padding: 10px;
			font-size: 15px;
			font-weight: 600;
			transition: 0.3s;
		}

		.btn-primary:hover {
			background: #274bb5;
		}

		.login-box-msg {
			font-size: 14px;
			margin-bottom: 18px;
			color: #444;
			text-align: center;
		}

		.alert {
			border-radius: 6px;
			font-size: 13px;
			padding: 8px 12px;
		}
	</style>

</head>

<body class="hold-transition login-page">
	<div class="login-box">

		<!-- Logo & Company Name -->
		<div class="login-logo">
			<a href="{{ route('web.index') }}" style="text-decoration:none;">
				<div style="display:flex; align-items:center; justify-content:center; gap:12px;">
					<!-- Logo image -->
					<img src="{{ asset('img/SIK.png') }}" alt="Logo"
						style="height:52px;width:52px;object-fit:contain;">

					<!-- Logo text -->
					<span class="logo-lg"
						style="font-size:24px;font-weight:700;color:#0001ee;white-space:nowrap;">
						PT. SUMI INDO KABEL Tbk.
					</span>
				</div>
				<p style="margin-top:8px; font-size:18px; color:#444; text-shadow:1px 1px 3px rgba(0,0,0,0.3);">
					Bunching Label Automobile <br> Cable Plant 1
				</p>
			</a>
		</div>

		<!-- Login Box -->
		<div class="login-box-body">
			@if($errors->any())
			<div class="alert alert-danger" role="alert">
				{{ $errors->first() }}
			</div>
			@endif

			<p class="login-box-msg">Sign in to your account</p>

			<form action="{{ route('web.admin.signin') }}" method="post">
				{{ csrf_field() }}

				<div class="form-group has-feedback">
					<input type="text" name="email" value="{{ old('email') ? old('email'):'' }}" class="form-control" placeholder="NSK">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>

				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
					</div>
				</div>
			</form>

		</div>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('bundle/jquery/dist/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('bundle/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>