<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} | Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('bundle/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bundle/font-awesome/css/font-awesome.min.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">

  <style>
    body {
      margin: 0;
      font-family: 'Source Sans Pro', sans-serif;
      background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      display: flex;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 14px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      max-width: 960px;
      width: 100%;
    }

    .login-left,
    .login-right {
      flex: 1;
      padding: 40px 30px;
    }

    .login-left {
      background: #fff;
    }

    .login-right {
      background: rgba(255, 255, 255, 0.95);
      border-left: 1px solid #e5e7eb;
    }

    /* Logo */
    .login-logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-logo img {
      width: 60px;
      margin-bottom: 8px;
    }

    .login-logo span {
      font-size: 22px;
      font-weight: 700;
      color: #0001ee;
      display: block;
    }

    .login-logo small {
      color: #64748b;
      font-size: 14px;
    }

    /* Form */
    .login-box-msg {
      font-size: 15px;
      margin-bottom: 18px;
      text-align: center;
      color: #374151;
    }

    .form-control {
      border-radius: 6px;
      border: 1px solid #cbd5e1;
      padding: 10px 12px;
      font-size: 14px;
      margin-bottom: 15px;
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
      width: 100%;
    }

    .btn-primary:hover {
      background: #274bb5;
    }

    /* History Box */
	.history-header {
	display: inline-block;
	background: #376bdc;
	color: #fff;
	padding: 10px 18px;
	border-radius: 8px;
	font-size: 15px;
	font-weight: 600;
	margin-bottom: 20px;
	text-align: center;
	width: 100%;
	box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
	}

    .history-list {
      list-style: none;
      padding: 0;
      margin: 0;
      max-height: 400px;
      overflow-y: auto;
    }

    .history-list li {
      padding: 10px 0;
      border-bottom: 1px solid #e5e7eb;
      font-size: 14px;
    }

    .history-list li strong {
      display: block;
      color: #111827;
    }

    .history-list li small {
      color: #555;
      font-size: 13px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
      }

      .login-right {
        border-left: none;
        border-top: 1px solid #e5e7eb;
      }
    }
  </style>
</head>

<body>
  <div class="login-container">
    <!-- Kiri: Login -->
    <div class="login-left">
      <div class="login-logo">
        <img src="{{ asset('img/SIK.png') }}" alt="Logo">
        <span>PT. SUMI INDO KABEL Tbk.</span>
        <small>Bunching Label Automobile - Cable Plant 1</small>
      </div>

      @if($errors->any())
        <div class="alert alert-danger text-center">
          {{ $errors->first() }}
        </div>
      @endif

      <p class="login-box-msg">Sign in to your account</p>

      <form action="{{ route('web.admin.signin') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="NSK">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>

    <!-- Kanan: History -->
	<div class="login-right">
	<div style="text-align:center;">
		<div class="history-header">Latest Lot History</div>
	</div>
	<ul class="history-list">
		@forelse($latestLots as $lot)
		<li>
			<strong>Lot: {{ $lot->lot_number }}</strong>
			<small>
			<i class="fa fa-user"></i> {{ $lot->operator->name ?? 'Unknown' }} <br>
			<i class="fa fa-clock-o"></i> {{ $lot->created_at->format('d M Y H:i') }}
			</small>
		</li>
		@empty
		<li style="text-align:center; color:#666;">No lot history available.</li>
		@endforelse
	</ul>
	</div>

  <!-- jQuery -->
  <script src="{{ asset('bundle/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('bundle/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>
