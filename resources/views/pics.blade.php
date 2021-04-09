<x-app-layout>

    @section('content')

        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


        <title>{{ config('app.name') }} - Pics</title>


        <style>


            .bg-degraded-1 {
                background-color: rgba(247, 255, 232, 0.1);
                background: -webkit-linear-gradient(135deg, #929292, #242424, #929292, 0.8);
                background: linear-gradient(135deg, #929292, #242424, #929292, 0.8);
            }

            .bg-degraded-2 {
                background-color: rgba(247, 255, 232, 0.3);
                background: -webkit-linear-gradient(135deg, #f7ffe8, #929292, #929292, 0.8);
                background: linear-gradient(135deg, #929292, #242424, #929292, 0.8);
            }

            .banner3 {
                background: #000000;
                background: -webkit-linear-gradient(90deg, #370063, #06132c, #252e63);
                background: linear-gradient(90deg, #370063, #06132c, #252e63);
            }


            .aurora-outer {
                background: linear-gradient(30deg, #150073 0%, #005c75 50%, #4bffc8 100%);
                background-size: 200%;
                animation: aurora 10s infinite;
                width: 200%;
            }

            .aurora-inner {
                background: radial-gradient(rgba(146, 146, 146, 0), rgba(255, 255, 255, 0.1));
                background-size: 200%;
                animation: aurora 7s infinite;
            }

            @keyframes aurora {
                0% {
                    background-position: left top;
                }
                25% {
                    background-position: right top;
                }
                50% {
                    background-position: right bottom;
                }
                75% {
                    background-position: left bottom;
                }
                100% {
                    background-position: left top;
                }
            }


            .bg-primary {
                background: linear-gradient(30deg, #150073 0%, #005c75 50%, #4bffc8 100%);
                animation: aurora 10s infinite;
                transition: .4s ease-out;
            }

            .bg-primary:hover {
                background: linear-gradient(30deg, #3a20ac 0%, #0b97ba 50%, #3ee2b6 100%);
                animation: aurora 5s infinite;
                box-shadow: 0 0 60px 3px #fff, /* inner white */ 0 0 100px 6px #6a00ff, /* middle magenta */ 0 0 140px 9px #0ff; /* outer cyan */
            }


        </style>


        <div class="aurora-outer" style="width: 100%;">
            <div class="aurora-inner" style="width: 100%;">

                <body>
                <div class="container">
                    <div class="px-lg-5">

                        <!-- For demo purpose -->
                        <div class="py-5">
                            <div class="animate__animated animate__fadeInDown">
                                <div class="p-5 shadow-sm rounded bg-degraded-2 text-dark  text-center">
                                    <h1 class="display-4 m-xl-n1">Pics</h1>
                                    <p class="lead ">Elder Protectors</p>
                                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipiscing, elit rhoncus
                                        euismod lectus ad
                                        elementum, purus metus tortor arcu auctor ultrices,
                                        dictum et at mauris convallis. Tellus auctor ultricies sagittis non tortor
                                        lectus fames odio,
                                        egestas faucibus nostra habitasse mattis rhoncus at metus.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <div class="taggbox-container" style="width:100%;height:100%;overflow: auto;">
                            <div class="taggbox-socialwall" data-wall-id="55039"
                                 view-url="https://widget.taggbox.com/55039"></div>
                            <script src="https://widget.taggbox.com/embed.min.js" type="text/javascript"></script>
                        </div>


                {{--Promo Code Input END
                    <!-- For demo purpose -->
                    <div class="py-5">
                        <div class="animate__animated animate__fadeInDown">
                            <div class="p-5 shadow-sm rounded bg-degraded-2 text-dark  text-center">
                                <h1 class="display-4 m-xl-n1">Pics</h1>
                                <p class="lead ">Elder Protectors</p>
                                <p class="lead">Lorem ipsum dolor sit amet consectetur adipiscing, elit rhoncus
                                    euismod lectus ad
                                    elementum, purus metus tortor arcu auctor ultrices,
                                    dictum et at mauris convallis. Tellus auctor ultricies sagittis non tortor
                                    lectus fames odio,
                                    egestas faucibus nostra habitasse mattis rhoncus at metus.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End -->

                    <div class="row">
                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm animate__animated animate__fadeInLeft animate__delay-2s">
                                <img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.6435-9/86601669_2548828178704404_5472064531565903872_n.jpg?_nc_cat=104&ccb=1-3&_nc_sid=8bfeb9&_nc_ohc=pEKTMbmnHlAAX9nTHcl&_nc_ht=scontent.fgdl9-1.fna&oh=42ce77a641c076f2317eea3cb26c9683&oe=608D1D86"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 150px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white" data-toggle="modal" data-target="#modal1">Red
                                            paint cup</a>
                                    </h5>
                                    <p class="small text-white mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm animate__animated animate__fadeInLeft animate__delay-1s">
                                <img
                                        src="https://i.etsystatic.com/iap/a0075d/2402105005/iap_640x640.2402105005_2ynyeq2l.jpg?version=0"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 150px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="" class="text-white " onclick="changeActiveState(1)"
                                           data-toggle="modal"
                                           data-target="">Blorange</a></h5>
                                    <p class="small text-white  mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm animate__animated animate__fadeInRight animate__delay-1s">
                                <img
                                        src="https://i.imgur.com/mXUFtyy.jpg"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 150px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white ">And She Realized</a></h5>
                                    <p class="small text-white  mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm animate__animated animate__fadeInRight animate__delay-2s">
                                <img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.6435-9/98285809_2622574227996465_4400097422412349440_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=8bfeb9&_nc_ohc=8qJAMvyrnHsAX-FuTkw&_nc_ht=scontent.fgdl9-1.fna&oh=3c5ccec868a3aad2edda1fc38d5a28d2&oe=608B1EB8"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 150px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white ">DOSE Juice</a></h5>
                                    <p class="small text-white mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm animate__animated animate__fadeInLeft animate__delay-2s">
                                <img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.6435-9/92570466_1699310096874739_3321270468803035136_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=b9115d&_nc_ohc=kewmWNDtEk4AX9QWLP_&_nc_ht=scontent.fgdl9-1.fna&oh=a98acbc9abd2c30d2f5d5dbda2d7589f&oe=608A939F"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 250px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white">Pineapple</a></h5>
                                    <p class="small text-white mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm animate__animated animate__fadeInLeft"><img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.6435-9/91822387_1699141983558217_2740062540686950400_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=b9115d&_nc_ohc=o6YBz80UgR0AX92C1xl&_nc_ht=scontent.fgdl9-1.fna&oh=2594a5ee14716f7f90bada30e3cf03ed&oe=608D02C7"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 250px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white ">Yellow banana</a></h5>
                                    <p class="small text-white  mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm animate__animated animate__fadeInRight"><img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.6435-9/91909807_1699310026874746_4688421669369282560_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=b9115d&_nc_ohc=gThuV8AHKmsAX-cSs-i&_nc_ht=scontent.fgdl9-1.fna&oh=5c445589f5fc98ad557e4241aa2f33c8&oe=608B1D80"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 250px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white ">Teal Gameboy</a></h5>
                                    <p class="small text-white  mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm animate__animated animate__fadeInRight"><img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.6435-9/79732856_2487837758136780_1400071867192049664_n.jpg?_nc_cat=102&ccb=1-3&_nc_sid=730e14&_nc_ohc=zsdxJ6_NzfMAX92U0K6&_nc_ht=scontent.fgdl9-1.fna&oh=e1a5ebde8db64fbf1af8c38b4313682b&oe=608B1080"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 250px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white ">Color in Guatemala.</a></h5>
                                    <p class="small text-white mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm animate__animated animate__fadeInLeft animate__delay-2s">
                                <img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.6435-9/79228407_2487837661470123_3256753918213881856_n.jpg?_nc_cat=102&ccb=1-3&_nc_sid=730e14&_nc_ohc=N1iCKY_sfAgAX8PRpEI&_nc_ht=scontent.fgdl9-1.fna&oh=ca3a4ed64c3f33936baf459c23272e42&oe=608A8A72"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 250px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white ">Red paint cup</a></h5>
                                    <p class="small text-white mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm"><img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.18169-9/19145747_888221057983651_907898324972280244_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=b9115d&_nc_ohc=kAFxOZTCqTMAX_de9wh&_nc_ht=scontent.fgdl9-1.fna&oh=2a618077b8e9bdf6c682fa1e2a00d782&oe=608A477D"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 250px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white ">Lorem ipsum dolor</a></h5>
                                    <p class="small text-white mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm"><img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.6435-9/91672358_1699310190208063_6350583564928548864_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=b9115d&_nc_ohc=mLGeIEzf9UsAX9Z_-Zm&_nc_ht=scontent.fgdl9-1.fna&oh=1db7d849d323a906b0cee20276342efd&oe=608C679B"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 250px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white ">Lorem ipsum dolor</a></h5>
                                    <p class="small text-white mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Gallery item -->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="bg-degraded-1 rounded shadow-sm"><img
                                        src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t1.18169-9/14568015_1783828445204385_4136103494090579657_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=19026a&_nc_ohc=Yurtg2Gf8HgAX_hEfa8&_nc_ht=scontent.fgdl9-1.fna&oh=45903d198d78efe988a41a0c9f38ccbd&oe=608BBCAF"
                                        alt="" class="img-fluid card-img-top"
                                        style="height: 250px; object-fit: cover; object-position: center center;">
                                <div class="p-4">
                                    <h5><a href="#" class="text-white ">Lorem ipsum dolor</a></h5>
                                    <p class="small text-white mb-0">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</p>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 text-white px-3 py-2 mt-4">
                                        <p class="small mb-0"><i class="fas fa-image mr-2"></i><span
                                                    class="font-weight-bold">JPG</span></p>
                                        <div class="badge bg-primary px-3 rounded-pill font-weight-normal">Trend
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End -->

                    </div>
                    <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me
                            more</a></div>
                </div>
            </div>

--}}
                </body>

        </html>

        </div>
        </div>
    @endsection
</x-app-layout>