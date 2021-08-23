<!doctype html>
<html lang="en">
  <head>
  	<title>Sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/signup_css/style.css') }}">

    <style rel="stylesheet">
		::placeholder{
			font-style:italic;
			font-weight:bold;
		}

		.form-control{
			border:1px solid white;
		}

		.error_message{
			color:red;
			font-style:italic;
			font-size:14px;
			font-weight:bold;
		}

		body{
				background-image:url('login.jpg');
				background-repeat:no-repeat;
				background-size:100% 100%;
		}

		#blood_group option{
			color:black;
		}

		#signup_title{
			color:red;
			text-shadow:0px 0px 10px red;
			letter-spacing:10px;
		}
	</style>

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<center>
				@if(session('failed')) 
				<div class="alert alert-danger alert-dismissible col-lg-6" id="divs">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{session('failed')}}
				</div>
				@endif
			</center>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      			<a><h3 class="mb-4 text-center" id="signup_title">SIGN UP</h3></a>

				<!-- SIGNUP FORM -->
		      	<form method="POST" action="{{ route('sign_up') }}" class="signup-form" enctype='multipart/form-data' autocomplete="off">
					@csrf
                    <!-- First Name -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="First Name" name="first_name" >
						@error('first_name')
							<p class="error_message"> {{ $message }}</p>
						@enderror
		      		</div>

                    <!-- Last Name -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Last Name" name="last_name" >
						@error('last_name')
							<p class="error_message"> {{ $message }}</p>
						@enderror
		      		</div>

					  <!-- Username -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" name="username" >
		      			@error('username')
							<p class="error_message"> {{ $message }}</p>
						@enderror
					</div>

                    <!-- E-Mail -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="E-Mail" name="e_mail" autocomplete="off">
						  @error('e_mail')
							<p class="error_message"> {{ $message }}</p>
						@enderror
		      		</div>

                    <!-- Mobile -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Mobile" name="mobile" pattern="[0-9]{3} [0-9]{3} [0-9]{4}">
						@error('mobile')
							<p class="error_message"> {{ $message }}</p>
						@enderror
		      		</div>

                    <!-- CNIN -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="CNIC" name="cnic" >
						  @error('cnic')
							<p class="error_message"> {{ $message }}</p>
						@enderror
		      		</div>

                    <!-- Age -->
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Age" name="age" >
						  @error('age')
							<p class="error_message"> {{ $message }}</p>
						@enderror
		      		</div>

                    <!-- Blood group -->
		      		<div class="form-group">
						<select name="blood_group" id="blood_group" class='form-control py-1' name="blood_group" >
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
						<strong>Address</strong>
						<textarea name="address" id="address" cols="50" rows="10" class='form-control'></textarea>
						@error('address')
							<p class="error_message"> {{ $message }}</p>
						@enderror
		      		</div>

                    <!-- Date of Birth -->
		      		<div class="form-group">
		      			<input type="date" class="form-control" placeholder="Date of Birth" name="dob" >
						  @error('dob')
							<p class="error_message"> {{ $message }}</p>
						@enderror
		      		</div>

					<!-- Picture -->
		      		<div class="form-group">
		      			<input type="file" class="form-control" placeholder="Picture" name="profile_img" >
						@error('profile_img')
							<p class="error_message""> {{ $message }}</p>
						@enderror
		      		</div>

                    <!-- Password 1 -->
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" id='password-field1'>
                        <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						@error('password')
							<p class="error_message""> {{ $message }}</p>
						@enderror
                    </div>

                    <!-- Password 2 -->
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password"  id="password-field2">
                        <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						@error('confirm_password')
							<p class="error_message""> {{ $message }}</p>
						@enderror
                    </div>
                    
                    <!-- Gender -->
					<div class="form-row d-flex flex-wrap justify-content-around">
						<div class="form-group">
							<input type="radio" class="form-input-control" name="gender" value="male" >Male
						</div>	
						<div class="form-group">
							<input type="radio" class="form-input-control" name="gender" value='female' >Female
						</div>	
						<div class="form-group">
							<input type="radio" class="form-input-control" name="gender" value='other' >Other
						</div>	
					</div>
					<hr>
					<input type="hidden" name="role" value="user">

                    <!-- Sign up button -->
                    <div class="form-group">
                        <button type="submit" class="form-control btn submit px-3" style="color:white; background-color:#2d2828; font-weight:bold; border:none;">Sign Up</button>
                    </div>
	          </form>

					<p class="w-100 text-center">&mdash; If You've Already Account &mdash;</p>
					<a href="{{ route('login') }}" class="btn btn-light col-lg-12">login</a>
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
		$('#divs').fadeOut(3000);
	</script>
    
    

	</body>
</html>

