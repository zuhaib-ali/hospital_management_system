@extends('layouts.admin')
@section('title', 'Sign up')

@section('admin_custom_css')
<style>
    .card{
        margin:50px 0px;        
        box-shadow:0px 0px 3px lightgrey;
        border:1px solid rgba(255,0,0,0.1);
    }

    .form-group{
        margin:20px 0px;
    }
</style>
@endsection

@section('content')
<main class="container-fluid">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            @if(strlen(session()->has('success')) > 0)
                <p class='text-center text-white mt-5 py-2' style='background-color:lightgreen; font-weight:bold;'>Successfully Inserted</p>
            @elseif(strlen(session()->has('failed')) > 0)
                <p class='text-center text-white mt-5 py-2' style='background-color:lightgreen; font-weight:bold;'>Successfully Inserted</p>
            @endif
            
            <div class="card">
                <!-- Login card header -->
                <div class="card-header" style='color:blue;'>
                    <h2><i class='fas fa-user-plus'> Sign up</i></h2>
                </div>

                <!-- Login card body -->
                <div class="card-body">

                    <!-- Login form -->
                    <form class="form" method='POST' action='{{ route("sign_up") }}'>
                        @csrf

                        <!-- Full Name -->
                        <div class="form-group">
                            <input type="text" class="form-control" name='full_name' placeholder='Full Name'>
                            @error('full_name') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>
                        

                        <!-- E-Mail -->
                        <div class="form-group">
                            <input type="email" class="form-control" name='e_mail' placeholder='E-Mail'>
                            @error('e_mail') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Mobile Number -->
                        <div class="form-group">
                            <input type="text" class="form-control" name='mobile' placeholder='Mobile'>
                            @error('mobile') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>

                        <!-- CNIC -->
                        <div class="form-group">
                            <input type="text" class="form-control" name='cnic' placeholder='CNIC (without dashes "-")'>
                            @error('cnic') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Age -->
                        <div class="form-group">
                            <input type="text" class="form-control" name='age' placeholder='Age'>
                            @error('age') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Blood Group -->
                        <select name="blood_group" id="blood_group" class="form-select"  aria-label="Default select example">
                            <option>Blood Group</option>
                            <option value="A+" selected>A+</option>
                            <option value="A-" selected>A-</option>
                            <option value="B+" selected>B+</option>
                            <option value="B-" selected>B-</option>
                            <option value="AB+" selected>AB+</option>
                            <option value="AB-" selected>AB-</option>
                            <option value="O+" selected>O+</option>
                            <option value="O-" selected>O-</option>
                            
                        </select>
                        @error('blood_group') 
                            <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                        @enderror

                        <!-- Address -->
                        <div class="form-group">
                            Address
                            <textarea name="address" id="" cols="30" rows="10" class='form-control'></textarea>
                            @error('address') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <input type="password" class="form-control" name='password1' placeholder='Password' id='password1'>
                            @error('password1') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <input type="password" class="form-control" name='password2' placeholder='Confirm Password' id='password2'>
                            @error('password2') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                            <p id='match_password' style='color:red; font-style:italic;'></p>
                        </div>

                        <!-- Date of Birth -->
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name='dob'>
                            @error('dob') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class='d-flex flex-wrap justify-content-around'>
                            <div class="form-check">
                                Male <input type="radio" class="form-check-input" name='gender' value='male' checked>
                            </div>
                            <div class="form-check">
                                Female<input type="radio" class="form-check-input" name='gender' value='female'>
                            </div>
                            <div class="form-check">
                                Other<input type="radio" class="form-check-input" name='gender' value='other'>
                            </div>
                            @error('gender') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Sign up button -->
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-outline-primary" value="SIGN UP" >
                        </div>
                    </form>
                    <hr>
                    <!-- Forgot password  or  create account -->
                    <section class="d-flex flex-wrap justify-content-around">
                        <a href="#" style='color:red;'><i class='fas fa-key'> Forgot password ?</i></a>
                        <a href="{{ route('login') }}" ><i class='fas fa-sign-in-alt'> Sign in</i></a>
                    </section>    
                </div>
            </div>
        </div>
    </div>
</main>

@section('jquery')
<script>

    var pass1 = null;
    var pass2 = null;
    $(document).ready(function(){
        $('#match_password').hide();
        $('#password2').keyup(function(){
            if($('#password1').val() == $('#password2').val() && $('#password2').val() != 0){
                $('#match_password').show();
                $('#match_password').text('Password matched!');
                $('#match_password').css('color','blue');
            }else{
                $('#match_password').show();
                $('#match_password').text('Password not matched.');
                $('#match_password').css('color','red');
            }
        });
    });
</script>
@endsection

@endsection