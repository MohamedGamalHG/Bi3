<!doctype html>
<html lang="ar" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<head>
    <meta charset="utf-8">
    <!-- ** Mobile Specific Metas ** -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Agency HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--{{ config('app.name', 'Laravel') }}--}}
    <title>@yield('title','Bi3')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @include('customer.header')
</head>
<body class="body-wrapper">

    @include('customer.navbar')

       {{-- @if(\Illuminate\Support\Facades\Route::currentRouteName()=='customer.index')
        @include('customer.home')
        @else--}}
        @yield('content')
        {{--@endif--}}



@include('customer.footer')
    @yield('js')
</body>
</html>
