<head>
    <title>{{ config('app.name') }} Custom Mat</title>

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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')  }}" type="text/css"/>



</head>

<style>

    .fondo {
        position: relative;
        top: 0;
        left: 0;
    }
    .marco {
        position: absolute;
        top: 0px;
        left: 0px;
    }
    .centro {
        position: absolute;
        top: 0px;
        left: 0px;
    }

</style>


<div class="parent">

    <div id="matPreview">
        <img id="fondo"  class="fondo"  src="{{asset('customMat/AppImg/fondo1.png')}}" />
        <img id="marco"  class="marco"  src="{{asset('customMat/AppImg/marco1.png')}}" />
        <img id="centro" class="centro" src="{{asset('customMat/AppImg/centro1.png')}}" />
    </div>
    <div id="selectMatOpc">
        <select id="selecFondo" onchange="document.getElementById('fondo').src = this.value" name="selectFondo">
            <option value="{{asset('customMat/AppImg/fondo1.png')}}">fondo1</option>
            <option value="{{asset('customMat/AppImg/fondo2.png')}}">fondo2</option>
        </select>

        <select id="selecMarco" onchange="document.getElementById('marco').src = this.value" name="selectMarco">
            <option value="{{asset('customMat/AppImg/marco1.png')}}">marco1</option>
            <option value="{{asset('customMat/AppImg/marco2.png')}}">marco2</option>
        </select>

        <select id="selecCentro" onchange="document.getElementById('centro').src = this.value" name="selectCentro">
            <option value="{{asset('customMat/AppImg/centro1.png')}}">centro1</option>
            <option value="{{asset('customMat/AppImg/centro2.png')}}">centro2</option>
        </select>
    </div>
</div>