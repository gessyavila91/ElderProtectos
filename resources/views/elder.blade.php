<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>{{ config('app.name') }}</title>

    <meta charset="utf-8">

    <meta name="description" content="High Quality Game Supplies">
    <meta name="author" content="Elder Protectors">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="robots" content="noindex, nofollow"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes">

    <link href="{{asset('assets/img/logo-icon.png')}}" rel="icon" type="image/x-icon"/>
    <link href="{{asset('assets/img/logo-icon.png')}}" rel="icon" type="image/png"/>
    <link href="{{asset('assets/img/logo-icon.png')}}" rel="icon" type="image/gif"/>

    {{--<link rel="stylesheet" href="{{asset('assets/fontawesome-free-5.15.2-web/css/all.css')}}" type="text/css">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')  }}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css"/>

    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/landing.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/particle/vector2.js')}}"></script>
    <script src="{{asset('assets/js/particle/perlin.js')}}"></script>
    <script src="{{asset('assets/js/particle/script.js')}}"></script>

</head>

<body>

    <div >
        <div class="intro">
            <img class="logo animated fadeIn slower" src="{{asset('assets/img/logo-white.svg')}}" alt="logotype">
        </div>

        <div class="icon-list animated fadeIn slower delay-1s">

        <a href="https://www.facebook.com/elderprotectors" target="_blank" title="Facebook">
          <span class="fa-stack fa-lg" style="vertical-align: top; color: #ffffff">
          <i class="far fa-circle fa-stack-2x"></i>
          <i class="fab fa-facebook-f fa-stack-1x"></i>
          </span> </a>

        <a href="https://www.etsy.com/shop/ElderProtectors" target="_blank" title="Etsy">
          <span class="fa-stack fa-lg" style="vertical-align: top; color: #ffffff">
          <i class="far fa-circle fa-stack-2x"></i>
          <i class="fab fa-etsy fa-stack-1x"></i>
          </span> </a>

        <a href="https://bit.ly/elderprotectors" target="_blank" title="Ebay">
          <span class="fa-stack fa-lg" style="vertical-align: top; color: #ffffff">
          <i class="far fa-circle fa-stack-2x"></i>
          <i class="fab fa-ebay fa-stack-1x"></i>
          </span> </a>

        <a href="https://bit.ly/35VQvM0" target="_blank" title="Mercado Libre (México)">
          <span class="fa-stack fa-lg" style="vertical-align: top; color: #ffffff">
          <i class="far fa-circle fa-stack-2x"></i>
          <i class="fab "><img alt="" src="{{asset('assets/img/mercadolibre.png')}}" height="36" width="36"/></i>
          </span> </a>


        <a href="https://elderprotectors.com/shop" title="Shop">
          <span class="fa-stack fa-lg" style="vertical-align: top; color: #ffffff">
          <i class="far fa-circle fa-stack-2x"></i>
          <i class="fas fa-shopping-cart fa-stack-1x"></i>
          </span> </a>

        </div>

        <canvas class="canvas"><p class="count"></p></canvas>

    </div>

</body>

<footer>
    <a  class="notice animated fadeInUp slower delay-2s" href="mailto:hi@elderprotectors.com">
        <p class="animated fadeIn slower delay-5s">{{ __('elder.contactUs') }}</p>
    </a>
</footer>

</html>
