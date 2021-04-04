<!DOCTYPE html>

<html lang="en">

{{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0" nonce="oxn1VdEx"></script>--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">--}}
{{--<link rel="preconnect" href="https://fonts.gstatic.com">--}}
{{--<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>--}}

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

<style>


    @font-face {
        font-family: Narziss;
        src: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/42764/Narziss_Bold_Drops.woff2);
    }

    @font-face {
        font-family: Narziss-medium;
        src: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/42764/Narziss_Bold_Drops.woff2);
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background: #ffffff;
    }

    h1 {
        font-family: Narziss-medium;
    }

    .banner {
        background: #000000;
        background: -webkit-linear-gradient(90deg, #252e63, #145859, #009796);
        background: linear-gradient(90deg, #252e63, #145859, #009796);
    }

    .banner2 {
        background: #000000;
        background: -webkit-linear-gradient(90deg, #009796, #3a266e, #370063);
        background: linear-gradient(90deg, #009796, #3a266e, #370063);
    }

    .banner3 {
        background: #000000;
        background: -webkit-linear-gradient(90deg, #370063, #06132c, #252e63);
        background: linear-gradient(90deg, #370063, #06132c, #252e63);
    }

    .thumbs {
        max-width: .30rem;
        min-width: 90px;
        height: auto;
        border: 0;
        padding: 0;
        margin: 0;
    }

    .page-header {
        z-index: -1;
        width: 100%;
        height: auto;
        background-image: url();
    }

    .page-header:after {
        animation: grain 8s steps(10) infinite;
        content: "";
        height: 300%;
        left: -50%;
        opacity: 0.10;
        position: fixed;
        top: -110%;
        width: 300%;
        z-index: -1;
    }

</style>

<header>
    <!-- Carousel wrapper -->
    <div id="carousel1" class="carousel slide shadow-lg" data-ride="carousel" style="height: 300px;">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="5000">

                <div class="card border-0 text-center align-middle ">
                    <div class="card-body banner text-white " style="height: 300px">
                        <div class="row h-100">
                            <div class="col-sm-12 my-auto ">
                                <h1 class="animate__animated animate__fadeInDown d-flex justify-content-center"><img
                                            src="{{asset('assets/img/logo-white.svg')}}" class="img-fluid"
                                            style="height: 70px"></h1>
                                <p class="lead animate__animated animate__fadeInDown animate__delay-1s">Hand-made game
                                    supplies.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-interval="7000">
                <div class="card text-center align-middle border-0">
                    <div class="card-body banner2 text-white " style="height: 300px">
                        <div class="row h-100">
                            <div class="col-sm-12 my-auto">
                                <h1 class="animate__animated animate__fadeInDown d-flex justify-content-center"><img
                                            src="{{asset('assets/img/logo-white.svg')}}" class="img-fluid"
                                            style="height: 70px"></h1>
                                <p class="lead animate__animated animate__fadeInDown animate__delay-1s">Hand-made game
                                    supplies.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-interval="5000">
                <div class="card text-center align-middle border-0">
                    <div class="card-body banner3 text-white " style="height: 300px">
                        <div class="row h-100">
                            <div class="col-sm-12 my-auto">
                                <h1 class="animate__animated animate__fadeInDown d-flex justify-content-center"><img
                                            src="{{asset('assets/img/logo-white.svg')}}" class="img-fluid"
                                            style="height: 70px"></h1>
                                <p class="lead animate__animated animate__fadeInDown animate__delay-1s">Hand-made game
                                    supplies.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</header>
@include('layouts.navbar')
