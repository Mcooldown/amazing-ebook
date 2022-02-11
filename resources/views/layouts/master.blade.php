<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Amazing E-Book') }} | @yield('title')</title>

</head>

<body>
    @include('include.navbar')

    <div class="py-5 main-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>

    @include('include.footer')
</body>

</html>
