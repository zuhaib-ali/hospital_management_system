<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- <link rel="stylesheet" href="css/style.css"> -->
	<link rel="stylesheet" href="{{ asset('css/login_css/style.css') }}">
	<!-- <link rel="stylesheet" href="{{ asset('css/login_css/bootstrap.min.css') }}"> -->

	</head>
	<body class="" style="background-image: url({{ asset('login.jpg') }}); background-size:100%;">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Login</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
					<h3 class="mb-4 text-center">Have an account?</h3>

					<!-- Login Form -->
					<form method='POST' action="{{ route('login') }}" class="signin-form">
						@csrf

						<!-- E-Mail field -->
						<div class="form-group">
							<input type="text" name='e_mail' class="form-control" placeholder="E-Mail" required>
						</div>
						
						<!-- Password field -->
						<div class="form-group">
							<input id="password-field" name='password' type="password" class="form-control" placeholder="Password" required>
						<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>
						<div class="form-group">
							<input type="submit" class="form-control btn btn-primary submit px-3" value='Sign In'>
						</div>
					<div class="form-group d-md-flex">

						<!-- Remember me -->
						<div class="w-50">
							<label class="checkbox-wrap checkbox-primary">Remember Me
								<input type="checkbox" checked>
								<span class="checkmark"></span>
							</label>
						</div>

						<!-- Forgort password -->
						<div class="w-50 text-md-right">
							<a href="#" style="color: #fff">Forgot Password</a>
						</div>
					</div>
				</form>

				<p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
				<div class="social d-flex text-center">
					<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
					<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
				</div>
				</div>
					</div>
				</div>
			</div>
		</section>
		<script src="{{ asset('js/login_js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/login_js//popper.js') }}"></script>
		<script src="{{ asset('js/login_js/main.js') }}"></script>
		<script src="{{ asset('js/login_js/bootstrap.min.js') }}"></script>
	</body>
</html>

