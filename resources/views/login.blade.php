@extends('layouts.admin')
@section('title', 'Login')

@section('admin_custom_css')
<style>
    .card{
        border:1px solid lightgrey;
        margin:50px 0px;        
        box-shadow:0px 0px 5px lightgrey;
    }
    .form .form-group{
        margin:30px 0px;
    }
</style>
@endsection

@section('content')
<main class="container-fluid">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <div class="card">
                
                <!-- Login card header -->
                <div class="card-header" style='color:blue;'>
                    <h2><i class='fas fa-sign-in-alt'> Login</i></h2>
                </div>

                <!-- Login card body -->
                <div class="card-body">

                    <!-- Login form -->
                    <form class="form" method='POST' action='{{ route("login") }}'>
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" name='e_mail' placeholder='E-Mail'>
                            @error('e_mail') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name='password' placeholder='Password'>
                            @error('password') 
                                <p class='' style='color:red; font-style:italic;'>{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group" style='border:none'>
                            <input type="submit" class="form-control btn btn-outline-primary" value='LOGIN'>
                        </div>
                    </form>
                    <hr style='color:red;'>
                    <!-- Forgot password  or  create account -->
                    <section class="d-flex flex-wrap justify-content-around section">
                            <a href="#" style='color:red;'><i class='fas fa-key'> Forgot password ?</i></a>
                            <a href="{{ route('signUp') }}" ><i class='fas fa-user-plus'> Sign up</i></a>
                    </section>    
                </div>
            </div>
        </div>
    </div>
</main>
@endsection