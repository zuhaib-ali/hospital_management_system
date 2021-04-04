@extends('layouts.admin')
@section('title', 'Sign up')

@section('admin_custom_css')
<style>
    .card{
        border:1px solid lightgrey;
        
    }
    .form .form-group{
        margin:30px 0px;
    }

    input[type='email'], input[type='password']{
        border-bottom:1px solid red;
    }
</style>
@endsection

@section('content')
<main class="container-fluid">
    <div class="row">
        <div class="col-sm-4 mx-auto" style="transform:translateY(100px);">
            <div class="card">
                
                <!-- Login card header -->
                <div class="card-header" style='color:red;'>
                    <h2><i class='fas fa-user-plus'> Sign up</i></h2>
                </div>

                <!-- Login card body -->
                <div class="card-body">

                    <!-- Login form -->
                    <form class="form" method='POST' action=''>
                        <div class="form-group">
                            <label for="e_mail">E-Mail</label>
                            <input type="email" class="form-control" name='e_mail'>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" name='pass'>
                        </div>
                        <div class="form-group" style='border:none'>
                            <input type="submit" class="form-control btn btn-outline-primary" value="SIGN UP">
                        </div>
                    </form>

                    <!-- Forgot password  or  create account -->
                    <section class="d-flex flex-wrap justify-content-around">
                        <a href="#"><i class='fas fa-key'> Forgot password ?</i></a>
                        <a href="{{ route('login') }}" ><i class='fas fa-sign-in-alt'> Sign in</i></a>
                    </section>    
                </div>
            </div>
        </div>
    </div>
</main>
@endsection