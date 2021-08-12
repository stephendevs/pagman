<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('storage/lpage/favicon.png') }}" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Styles please put this in the app-->
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('lpage/css/app.css') }}" rel="stylesheet">
        
        <link href="{{ asset('font-awesome/css/all.min.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        <script src="{{ asset('jquery/jquery.min.js') }}" defer></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('lpage/js/app.js') }}" defer></script>


    </head>
    <body>

        <header id="header">
            @include('lpage::core.includes.navbar.navbar')
        </header>
        <div class="container">
            @yield('content')
        </div>
        
    </body>

</html>
