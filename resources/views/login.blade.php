<!DCOTYPE html>
<html lang="en">
  	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- <link rel="stylesheet" href="css/style.css"> -->
		<link rel="stylesheet" href="{{ asset('css/login_css/style.css') }}">

		<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

		<!-- <link rel="stylesheet" href="{{ asset('css/login_css/bootstrap.min.css') }}"> -->

		<!-- Internal Styling -->
		<style rel="stylesheet">
			::placeholder{
				font-style:italic;
				font-weight:bold;
			}
			body{
				background-image:url('login.jpg');
				background-repeat:no-repeat;
				background-size:100% 100%;
			}

			#login_title{
				color:red;
				text-shadow:0px 0px 10px red;
				letter-spacing:10px;
			}
		</style>
	</head>
	<body class="">
		<!-- SECTION -->
		<section class="ftco-section">
			<!-- CONTAINER -->
			<div class="container">

				<!-- CENTER -->
				<center>
				@if(session('success'))
					<div class="alert alert-success alert-dismissible col-lg-6" id="divs">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						{{session('success')}}
					</div>
					@endif

					@if(session('login_failed'))
					<div class="alert alert-danger alert-dismissible col-lg-6" id="divs">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						{{session('login_failed')}}
					</div>
					@endif

					@if(session('null'))
					<div class="alert alert-primary alert-dismissible col-lg-6" id="divs">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						{{session('null')}}
					</div>
					@endif

					@if(session('logout'))
					<div class="alert alert-warning alert-dismissible col-lg-6" id="divs">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						{{session('logout')}}
					</div>
					@endif
				</center>
				<!-- /CENTER -->

				<!-- <div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Login</h2>
					</div>
				</div> -->

				<!-- main content -->
				<div class="row justify-content-center  main_content">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<a><h3 class="mb-4 text-center" id="login_title" >LOGIN</h3></a>

							<!-- Login Form -->
							<form method='POST' action="{{ route('login') }}" class="signin-form">
								@csrf

								<!-- E-Mail field -->
								<div class="form-group">
									<input type="email" name='email' class="form-control" placeholder="E-Mail"  style="border:2px solid white;">
								</div>

								<!-- Password field -->
								<div class="form-group">
									<input id="password-field" name='password' type="password" class="form-control" placeholder="Password"   style="border:2px solid white;">
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>

								<!-- Sign in button -->
								<div class="form-group">
									<input type="submit" class="form-control btn submit px-3" value='Sign In' style="background-color:#2d2828; font-weight:bold;">
								</div>

								<div class="form-group d-md-flex">

									<!-- Remember me -->
									<div class="w-50">
										<input type="checkbox" checked > Remember Me
									</div>

									<!-- Forgort password -->
									<div class="w-50 text-md-right">
										<a href="#" style="color:white;">Forgot Password</a>
									</div>
								</div>
							</form>

							<p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
							<div class="social d-flex text-center">
								<a href="#" class="px-2 py-2 mr-md-1 rounded" style="background-color:#4267B2; color:white;"><span class="ion-logo-facebook mr-2"></span><span class="iconify" data-icon="ion-logo-facebook" data-inline="false"></span> Facebook</a>
								<a href="#" class="px-2 py-2 ml-md-1 rounded" style="background-color:#1DA1F2; color:white;"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
							</div>
							<br>

							<p class="w-100 text-center">&mdash; Don't Have An Account &mdash;</p>

							<a href="{{ route('signup') }}" class="btn btn-light col-lg-12">
								Signup
							</a>
						</div>
					</div>
					<!-- /COLUMN -->
				</div>
				<!-- /ROW -->
			</div>
		</section>
		<!-- END SECTION -->

		<script src="{{ asset('js/login_js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/login_js//popper.js') }}"></script>
		<script src="{{ asset('js/login_js/main.js') }}"></script>
		<script src="{{ asset('js/login_js/bootstrap.min.js') }}"></script>

		<script>
			$(document).ready(function(){

				$('#divs').fadeOut(4000);
			});
		</script>
	</body>
</html>
