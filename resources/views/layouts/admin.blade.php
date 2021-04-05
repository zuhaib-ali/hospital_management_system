<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts Awesome and Bootstrap css-->
        <link href="{{ asset('./css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('./font-awesome/css/all.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        @yield('admin_custom_css')

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <x-navbar/>
        @yield('content')
        <script src="{{ asset('./js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('./js/jquery.min.js') }}"></script>
        @yield('jquery')
    </body>
</html>
