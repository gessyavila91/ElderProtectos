<!DOCTYPE html>

<html lang="en">

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
                                            style="height: 3rem"></h1>
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
