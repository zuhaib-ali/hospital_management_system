<!doctype html>
<html lang="en">
  <head>
  	<title>Sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/signup_css/style.css') }}">
    

	</head>
	<body style="background-image: url({{ asset('login.jpg') }}); background-repeat:no-repeat; background-size:100% 100%;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sign Up</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<a href="{{ route('login') }}"><h3 class="mb-4 text-center">Have an account?</h3></a>
		      	<form method="POST" action="{{ route('sign_up') }}" class="signin-form" enctype='multipart/form-data'>
					@csrf
                    <!-- First Name -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="First Name" name="first_name" required>
		      		</div>

                    <!-- Last Name -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
		      		</div>

                    <!-- E-Mail -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="E-Mail" name="e_mail" required>
		      		</div>

                    <!-- Mobile -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Mobile" name="mobile" required>
		      		</div>

                    <!-- CNIN -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="CNIC" name="cnic" required>
		      		</div>

                    <!-- Age -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Age" name="age" required>
		      		</div>

                    <!-- Blood group -->
		      		<div class="form-group">
						<select name="blood_group" id="blood_group" class='form-control py-1' name="blood_group" required>
							<option value="a+">A+</option>
							<option value="a-">A-</option>
							<option value="b+">B+</option>
							<option value="b-">B-</option>
							<option value="o+">O+</option>
							<option value="o-">O-</option>
							<option value="ab+">AB+</option>
							<option value="ab-">AB-</option>
						</select>
		      		</div>

                    <!-- Address -->
		      		<div class="form-group">
						Address
						<textarea name="address" id="address" cols="50" rows="10" class='form-control'></textarea>
		      		</div>

                    <!-- Date of Birth -->
		      		<div class="form-group">
		      			<input type="date" class="form-control" placeholder="Date of Birth" name="dob" required>
		      		</div>

					<!-- Picture -->
		      		<div class="form-group">
		      			<input type="file" class="form-control" placeholder="Picture" name="profile_img" required>
		      		</div>

                    <!-- Password 1 -->
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    <!-- Password 2 -->
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    
                    <!-- Gender -->
					<div class="form-row d-flex flex-wrap justify-content-around">
						<div class="form-group">
							<input type="radio" class="form-input-control" name="gender" value="male" required>Male
						</div>	
						<div class="form-group">
							<input type="radio" class="form-input-control" name="gender" value='female' required>Female
						</div>	
						<div class="form-group">
							<input type="radio" class="form-input-control" name="gender" value='other' required>Other
						</div>	
					</div>

                    <!-- Sign up button -->
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                    </div>

                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                            </label>
                        </div>
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
    
    <script src="{{ asset('js/signup_js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/signup_js/popper.js') }}"></script>
    <script src="{{ asset('js/signup_js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/signup_js/main.js') }}"></script>
	<script>
		@if($errors->any())
			@foreach($errors->all() as $error)
				alert("{{ $error }}");
			@endforeach
		@endif

		@if(session()->has('success'))
			alert('user created successfully');
		@elseif(session()->has('failed'))
			alert('user created successfully');
		@endif
	</script>
    
    

	</body>
</html>

