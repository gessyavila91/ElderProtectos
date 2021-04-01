<!DOCTYPE html>

<html lang="{{str_replace('_', '-', app()->getLocale())}}">

    <head>
        <title>{{config('app.name')}}</title>

        {{--Metadata--}}
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="High Quality Game Supplies">
        <meta name="author" content="Elder Protectors">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="noindex, nofollow"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="mobile-web-app-capable" content="yes">

        {{--Fav Icon--}}
        <link href="{{asset('assets/img/logo-icon.png')}}" rel="icon" type="image/x-icon"/>
        <link href="{{asset('assets/img/logo-icon.png')}}" rel="icon" type="image/png"/>
        <link href="{{asset('assets/img/logo-icon.png')}}" rel="icon" type="image/gif"/>

        {{--Java Script--}}
        <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- Scripts -->
        <script src="{{asset('js/app.js')}}"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>

    <body class="font-sans antialiased">
        <div >

            @if(!Request::is('/'))
                @include('components.headerbanner')

                <div class="container">
                    @yield('content')
                </div>
            @endif

        </div>
    </body>
    @include('layouts.footer')
</html>
