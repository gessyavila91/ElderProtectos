<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
    body {
        background-color: black;
    }

    .loader-center {

        height: 100vh;
        background-color: black;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .lds-roller {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
    }

    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #fff;
        margin: -4px 0 0 -4px;
    }

    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }

    .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
    }

    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }

    .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
    }

    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }

    .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
    }

    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }

    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }

    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }

    .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
    }

    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }

    .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
    }

    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }

    .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
    }

    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }

    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
    }

    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }


    .canvas {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: -999;
    }

    .count {
        display: none;
    }

    .hidden {
        overflow: hidden;
    }

    .intro {
        position: fixed;
        display: block;
        top: 30%;
        width: 100%;
        color: #ffffff;
        text-align: center;
    }

    .icon-list {
        text-align: center;
        position: fixed;
        display: block;
        top: 50%;
        width: 97%;

    }

    .icon-list i {
        color: #ffffff;

    }

    .icon-list i:hover {
        color: #6d6e71;
        transition: 0.5s;
        -moz-transition: 0.5s;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        -webkit-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        -moz-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        -ms-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        -o-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
    }


    .icon-list ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .icon-list a {
        text-decoration: none;

    }

    .notice {
        position: fixed;
        text-align: center;
        bottom: 10%;
        width: 100%;
        height: 70px;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .notice p {
        display: inline-block !important;
        font-family: sans-serif !important;
        font-size: 20px !important;
        color: white !important;
        font-weight: bold !important;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .logo:hover {
        transition: 0.5s;
        -moz-transition: 0.5s;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        -webkit-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        -moz-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        -ms-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        -o-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
    }

    .img-fluid {
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
    }

    .img-fluid:hover {
        transition: 0.5s;
        -moz-transition: 0.5s;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        -webkit-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        -moz-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        -ms-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        -o-filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
        filter: drop-shadow(0 1px 10px rgba(255, 255, 255, 0.3));
    }

    .modal-dialog {
        position: absolute;
        z-index: 999 !important;
    }


    @media only screen and (min-width: 960px) {
        .logo {
            width: 30rem;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
        }

        .img-fluid {
            width: 200px;
        }

    }

    @media only screen and (min-width: 199px) and (max-width: 959px) {
        .logo {
            width: 15rem;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
        }

        .icon-list i {

        }

        .img-fluid {
            width: 100px;
        }

        .invisible-on-mobile {
            display: none;
        }
    }


</style>

<script type='text/javascript'>
    document.oncontextmenu = function () {
        return false
    }
</script>
<script type="text/JavaScript">

    function disableselect(e) {
        return false
    }

    function reEnable() {
        return true
    }

    document.onselectstart = new Function("return false")

    if (window.sidebar) {
        document.onmousedown = disableselect
        document.onclick = reEnable
    }
</script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-106759176-1');
</script>
<!DOCTYPE html>
<body>

<title>Elder Protectors</title>

<meta charset="utf-8">

<meta name="description" content="High Quality Game Supplies">
<meta name="author" content="Elder Protectors">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="robots" content="noindex, nofollow"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="mobile-web-app-capable" content="yes">

<meta property="og:site_name" content="Elder Protectors">
<meta property="og:url" content="https://elderprotectors.com/">
<meta property="og:title" content="Elder Protectors | High Quality Game Supplies">
<meta property="og:description" content="Elder Protectors">

<meta property="og:type" content="website">
<meta property="og:image" content="https://elderprotectors.com/img/social.png">
<meta property="og:image:width" content="">
<meta property="og:image:height" content="">

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@gruas4-7">
<meta name="twitter:title" content="Grúas 24-7">
<meta name="twitter:description" content="High Quality Game Supplies">
<meta name="twitter:image" content="https://elderprotectors.com/img/icon.png">
<meta name="msapplication-TileColor" content="#FFFFFF"/>
<meta name="msapplication-TileImage" content="https://elderprotectors.com/img/logo-icon.png"/>

<link id="favicon" rel="shortcut icon" href="https://elderprotectors.com/img/icon.png" sizes="16x16 32x32 48x48"
      type="image/png"/>
<link rel="icon" type="image/x-icon" href="https://elderprotectors.com/img/logo-icon.png"/>
<link rel="icon" type="image/png" href="https://elderprotectors.com/img/logo-icon.png"/>
<link rel="icon" type="image/gif" href="https://elderprotectors.com/img/logo-icon.png"/>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<link href="../public/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>

<link href="../public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../public/assets/css/gallery.css" rel="stylesheet" type="text/css"/>

<div>
    <!-- partial:index.partial.html -->
    <div class="hidden">

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

    <div class="intro">
        <img class="logo animated fadeIn slower" src="../public/assets/img/logo-white.svg" alt="logotype">
    </div>


    <ul class="icon-list animated fadeIn slower delay-1s">
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
      <i> <img src="../public/assets/img/mercadolibre.png" height="38" width="38"/></i>
      </span> </a>

        <a href="https://elderprotectors.com/shop" title="Shop">
      <span class="fa-stack fa-lg" style="vertical-align: top; color: #ffffff">
      <i class="far fa-circle fa-stack-2x"></i>
      <i class="fas fa-shopping-cart fa-stack-1x"></i>
      </span> </a>
    </ul>


    <div class="notice animated fadeInUp slower delay-2s"><a href="mailto:hi@elderprotectors.com"><p
                    class="animated fadeIn slower delay-5s">You want to be a reseller? [Contact us]</p></a></div>

    <canvas class="canvas"></canvas>

    <p class="count"></p>
    </div>
</div>

<!-- partial -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="assets/js/loader.js"></script>
<script src="assets/js/vector2.js"></script>
<script src="assets/js/perlin.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/lightbox.js"></script>


</body>
</body>

</html>
