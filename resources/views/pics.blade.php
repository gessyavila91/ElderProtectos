<x-app-layout>

    @section('content')

        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


        <title>{{ config('app.name') }} - Pics</title>


        <style>
            .bg-degraded-1 {
                background-color: rgba(255, 255, 255, 0.5);
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
                background: linear-gradient(30deg, #150073 0%, #005c75 50%, #157a7a 100%);
                transition: 0.9s;
            }

            .bg-primary:hover {
                background: linear-gradient(30deg, #3a20ac 0%, #0b97ba 50%, #3ee2b6 100%);
            }

            .fb-post {
                border-radius: 5px 5px 0px 0px !important
            }


        </style>


        <div class="aurora-outer" style="width: 100%;">
            <div class="aurora-inner" style="width: 100%;">

                <body>
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous"
                        src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v11.0" nonce="OUsLbern"></script>
                <script async src="//www.instagram.com/embed.js"></script>

                <div class="container-fluid">
                    <div class="px-lg-5">

                        <!-- HEADER -->
                        <div class="py-5">
                            <div class="animate__animated animate__fadeInDown">
                                <div class="p-5 shadow-sm rounded bg-degraded-1 text-dark  text-center">
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
                        {{--DESACTIVADO
                                                <div class="taggbox-container" style="width:100%;height:100%;overflow: auto;">
                                                    <div class="taggbox-socialwall" data-wall-id="55444"
                                                         view-url="https://widget.taggbox.com/55444"></div>
                                                    <script src="https://widget.taggbox.com/embed.min.js" type="text/javascript"></script>
                                                </div>

                        --}}


                        <div class="row animate__animated animate__fadeIn animate__delay-2s">
                            <!-- Gallery item -->
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                <div class="bg-degraded-1 rounded shadow-sm">
                                    <div class="fb-post"
                                         data-href="https://www.facebook.com/elderprotectors/posts/2885663001687585"
                                         data-width="auto" data-show-text="true">
                                        <blockquote
                                                cite="https://www.facebook.com/elderprotectors/posts/2885663001687585"
                                                class="fb-xfbml-parse-ignore">Publicado por <a
                                                    href="https://www.facebook.com/elderprotectors/">Elder
                                                Protectors</a> en&nbsp;<a
                                                    href="https://www.facebook.com/elderprotectors/posts/2885663001687585">Martes,
                                                13 de abril de 2021</a></blockquote>
                                    </div>

                                    <div class="p-4">
                                        <h5><a href="https://www.facebook.com/elderprotectors/posts/2885663001687585"
                                               target="_blank" class="text-white">Playing with friends - MTG</a></h5>
                                        <p class="small text-white  mb-0">...</p>
                                        <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 px-3 py-2 mt-4">
                                            <p class="small mb-0  text-secondary"><i
                                                        class="fab fa-facebook mr-2"></i><span
                                                        class="font-weight-bold">Facebook</span></p>
                                            <div class="bg-primary text-white px-1 rounded-circle "><i
                                                        class="fas fa-thumbs-up"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End -->

                            <!-- Gallery item -->
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                <div class="bg-degraded-1 rounded shadow-sm">
                                    <div class="img-fluid card-img-top">
                                        <div class="fb-video"
                                             data-href="https://www.facebook.com/elderprotectors/videos/302789317492560/"
                                             data-height="265px" data-show-text="false" style="background-color: black">
                                            <blockquote
                                                    cite="https://developers.facebook.com/elderprotectors/videos/302789317492560/"
                                                    class="fb-xfbml-parse-ignore"><a
                                                        href="https://developers.facebook.com/elderprotectors/videos/302789317492560/">Custom
                                                    Design</a>
                                                <p>Special order.
                                                    Thanks for the confidence.</p>Publicado por <a
                                                        href="https://www.facebook.com/elderprotectors/">Elder
                                                    Protectors</a> en Lunes, 27 de julio de 2020
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h5><a href="https://www.facebook.com/elderprotectors/videos/302789317492560/"
                                               target="_blank" class="text-white">Custom Design</a></h5>
                                        <p class="small text-white  mb-0">Special order.
                                            Thanks for the confidence.</p>
                                        <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 px-3 py-2 mt-4">
                                            <p class="small mb-0  text-secondary"><i
                                                        class="fab fa-facebook mr-2"></i><span
                                                        class="font-weight-bold">Facebook</span></p>
                                            <div class="bg-primary text-white px-1 rounded-circle "><i
                                                        class="fas fa-thumbs-up"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End -->

                            <!-- Gallery item -->
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                <div class="bg-degraded-1 rounded shadow-sm">
                                    <img
                                            src="https://i.ibb.co/JpJnqPR/mXUFtyy.jpg"
                                            alt="" class="img-fluid card-img-top"
                                            style="height: 265px; object-fit: cover; object-position: center center;">
                                    <div class="p-4">
                                        <h5><a href="https://www.etsy.com/shop/ElderProtectors/reviews/1221111454"
                                               target="_blank" class="text-white">Very cool! This is great!!</a></h5>
                                        <p class="small text-white  mb-0">
                                            凄く格好いいです。正にこういう物を求めていたとかな
                                            ...<a href="https://www.etsy.com/shop/ElderProtectors/reviews/1221111454"
                                                  target="_blank">Read more</a></p>
                                        <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 px-3 py-2 mt-4">
                                            <p class="small mb-0  text-secondary"><i class="fab fa-etsy mr-2"></i><span
                                                        class="font-weight-bold">Etsy</span></p>
                                            <div class="bg-primary text-white px-1 rounded-circle "><i
                                                        class="fas fa-eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->

                            <!-- Gallery item -->
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                <div class="bg-degraded-1 rounded shadow-sm">
                                    <blockquote class="instagram-media img-fluid card-img-top"
                                                data-instgrm-permalink="https://www.instagram.com/p/CRAL7C4BLHg/?utm_source=ig_embed&amp;utm_campaign=loading"
                                                data-instgrm-version="13" style="height: 265px;" >
                                    </blockquote>
                                    <div class="p-3">
                                        <h5><a href="https://www.instagram.com/p/CRAL7C4BLHg/" target="_blank" class="text-white ">#elderprotectors</a></h5>
                                        <p class="small text-white mb-0">...</p>
                                        <div class="d-flex align-items-center justify-content-between rounded-pill bg-degraded-2 px-3 py-2 mt-4">
                                            <p class="small mb-0  text-secondary"><i class="fab fa-instagram mr-2"></i><span
                                                        class="font-weight-bold">Instagram</span></p>
                                            <div class="bg-primary text-white px-1 rounded-circle "><i class="far fa-heart"></i>
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


                </body>

        </html>

    @endsection
</x-app-layout>