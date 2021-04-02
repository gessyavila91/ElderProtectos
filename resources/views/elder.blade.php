@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>{{ config('app.name') }}</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')  }}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css"/>
    <script src="{{asset('assets/js/particle/vector2.js')}}"></script>
    <script src="{{asset('assets/js/particle/perlin.js')}}"></script>
    <script src="{{asset('assets/js/particle/script.js')}}"></script>
    <script src="{{asset('assets/js/landing.js')}}"></script>

</head>

<body>

<div class="loader-center" id="onload">
    <div class="lds-roller">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<div>
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


        <a href="{{ url('/custom') }}" title="Shop">
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


<script>
    $(window).ready(function() {

        $('#onload').fadeOut();

    });
</script>

</html>


