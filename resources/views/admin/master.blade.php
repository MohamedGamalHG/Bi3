<!doctype html>
<html lang="ar" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--{{ config('app.name', 'Laravel') }}--}}
    <title>@yield('title','jumia')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @include('admin.header')
    @yield('js')
</head>
<body>
<div class="container-scroller">
    @include('admin.navbar')
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        @include('admin.slider')
        <div class="main-panel">
            <div class="content-wrapper">

                @yield('content')

            </div>
        </div>
        <!-- partial -->
</div>
</div>


@include('admin.footer')
</body>
</html>
