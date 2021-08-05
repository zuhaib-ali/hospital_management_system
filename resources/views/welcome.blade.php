@extends('layouts.admin')
@section('title', 'homepage')

@section('admin_custom_css')
<style>
    .sidebar{
        background-color:whitesmoke;
        position: sticky;
        border-right:1px solid lightgrey;
    }

    .sidebar, .sidebar .nav-link{
        color:black;        
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <x-sidebar/>    
        <div class="col-sm-9">
            <h2>hello world!</h2><br><br><br><br><br>
        </div>
    </div>
</div>
    
    
@endsection