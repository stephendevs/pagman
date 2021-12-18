<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('stephendevs/pagman/icons/favicon.png') }}" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Styles please put this in the app-->
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('stephendevs/pagman/css/app.css') }}" rel="stylesheet">
        
        <link href="{{ asset('font-awesome/css/all.min.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        <script src="{{ asset('jquery/jquery.min.js') }}" defer></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('stephendevs/pagman/js/app.js') }}" defer></script>

        @yield('requiredJs')

    </head>
    <body id="body">

        <header id="header" class="mb-4">
            @include('pagman::core.includes.navbar.navbar')
        </header>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6"><h1 class="h3 mb-0 text-gray-800 page-heading">@yield('pageHeading')</h1></div>
                <div class="col-12 col-lg-6 mt-4 mt-lg-0 text-lg-right text-center pr-5 page-actions"> @yield('pageActions')</div>
            </div>
        </div>

        <div class="container p-0">
            @yield('content')
        </div>
        
    </body>

</html>
