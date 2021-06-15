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

	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

	<!-- <link rel="stylesheet" href="{{ asset('css/login_css/bootstrap.min.css') }}"> -->

	<!-- Internal Styling -->
	<style rel="stylesheet">
		::placeholder{
			font-style:italic;
			font-weight:bold;
		}


		.swal-text{
			color:blue;
		}

		.swal-modal{
			background-color:#CFDEE8 ;

		}

		.swal-button{
			background-color:red;
			color:white;
		}
	</style>

	</head>
	<body class="" style="background-image: url( {{ asset('login.jpg') }} ); background-size:100%;">
		<section class="ftco-section">
			<div class="container">
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

				<!-- @if(session('logout')) 
                <div class="alert alert-warning alert-dismissible col-lg-6" id="divs">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session('logout')}}
                </div>
                @endif -->
			</center>

				
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Login</h2>
					</div>
				</div>

				<!-- main content -->
				<div class="row justify-content-center  main_content">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
						<a href="{{ route('sign_up') }}"><h3 class="mb-4 text-center" style="color:#c30000;">Don't have an account?</h3></a>

					<!-- Login Form -->
					<form method='POST' action="{{ route('login') }}" class="signin-form">
						@csrf

						<!-- E-Mail field -->
						<div class="form-group">
							<input type="text" name='username' class="form-control" placeholder="Username"  style="border:2px solid white;">
						</div>
						
						<!-- Password field -->
						<div class="form-group">
							<input id="password-field" name='password' type="password" class="form-control" placeholder="Password"   style="border:2px solid white;">
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>

						<!-- Sign in button -->
						<div class="form-group">
							<input type="submit" class="form-control btn btn-dark submit px-3" value='Sign In' style="background-color:black; font-weight:bold;">
						</div>

					<div class="form-group d-md-flex">

						<!-- Remember me -->
						<div class="w-50">
							<label class="checkbox-wrap checkbox" style="color:#1c0694; font-weight:bold;">Remember Me
								<input type="checkbox" checked >
								<span class="checkmark"></span>
							</label>
						</div>

						<!-- Forgort password -->
						<div class="w-50 text-md-right">
							<a href="#" style="color:#c30000; font-weight:bold;">Forgot Password</a>
						</div>
					</div>
				</form>

				<p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
				<div class="social d-flex text-center">
					<a href="#" class="px-2 py-2 mr-md-1 rounded" style="background-color:#4267B2; color:white;"><span class="ion-logo-facebook mr-2"></span><span class="iconify" data-icon="ion-logo-facebook" data-inline="false"></span> Facebook</a>
					<a href="#" class="px-2 py-2 ml-md-1 rounded" style="background-color:#1DA1F2; color:white;"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
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

		<!-- SWEET ALERT -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<script>
			$(document).ready(function(){
				$('#divs').fadeOut(4000);
			});
			
			@if(Session::has('logout'))
				// LOGOUT
				swal("{{ Session::get('logout') }}", {
					buttons: false,
					timer: 3000,
					closeOnEsc: true,
					buttons:{cancel:'CLOSE'},
				});
			@endif

		</script>
	</body>
</html>