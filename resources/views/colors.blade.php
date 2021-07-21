<?php

use App\Models\matComponent;
use App\Models\Config;

$matComponents = matComponent::where('enable', 1)
    ->where('stock', '>', 0)
    ->where('type', 'B')
    ->get();

//var_dump($matComponents);


?>




<x-app-layout>

    @section('content')

        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <title>{{ config('app.name') }} - Check Out</title>

        </head>

        <style>

            .container-rotate {
                padding: 0;
                perspective: 1000px;
                background-color: #f3f3f3;
                box-shadow: 0 0 3px #f3f3f3;
                border-radius: 3px;
                color: white;
            }
            .parent {
                transition: transform 1s cubic-bezier(.55, -.62, .27, 1.2);
                transform-style: preserve-3d;
            }

            .childA, .childB {
                -webkit-perspective: 0;
                -webkit-backface-visibility: hidden;
                -webkit-transform: translate3d(0,0,0);
                visibility:visible;
                backface-visibility: hidden;
                top: 0;
                left: 0;
            }
            .childA {
                position: absolute;
            }
            .childB {
                transform: rotateY(180deg);
            }
            .hover {
                transform: rotateY(180deg);
                height: 100%;
            }
        </style>


        <div class="container-fluid">

            <div class="px-lg-5">
                <!-- HEADER -->
                <div class="py-5">
                    <div class="animate__animated animate__fadeInDown">
                        <div class="p-5 shadow-sm rounded text-dark text-center">
                            <h1 class="display-4 m-xl-n1">Aviable Colors</h1>
                            <p class="lead">The leather we use is top quality, and can sometimes become scarce.<br>
                                We always try to have variety, we try to update the stock every week.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End -->

                <hr class="featurette-divider">
                <div class="row">

                    <?php
                    foreach($matComponents->where('type', 'B') as $Component) {
                        echo '
                        <!-- item-->
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="rounded shadow-sm p-2">
                                <div class="container-rotate">
                                    <div class="parent"
                                        id="parent'.$Component->code.'">
                                        <div class="childA">
                                            <img src="'.$Component->fileName.'"
                                                 class="card-img" alt="...">
                                            <div class="card-img-overlay">
                                                <h1 class="card-title">'.$Component->description.'</h1>

                                                <a id="caraA'.$Component->code.'"
                                                   style="top:0; right: 0"
                                                   class="position-absolute badge badge-dark "
                                                   role="button"
                                                   onclick="rotar(this)"
                                                >Example
                                                <i class="fas fa-angle-right"></i></a>

                                                <div style="bottom:0; right: 0"
                                                     class="position-absolute d-flex align-items-center justify-content-between rounded-pill bg-light p-1 m-2">
                                                    <p class="small mb-0 text-success"><i class="far fa-check-circle "></i>
                                                        <span class="font-weight-bold">Available</span></p>
                                                    <div class="bg-success text-white px-2 rounded-circle ml-2">
                                                        <span class="font-weight-bold">'.$Component->stock.'</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="childB">
                                            <img src="'.$Component->exampleFileName.'" class="card-img">
                                            <div class="card-img-overlay">
                                                <p style="top:0" class="text-left position-absolute">Example</p>
                                                <a id="caraA'.$Component->code.'"
                                                   style="top:0; right: 0;"
                                                   class="position-absolute badge badge-dark"
                                                   role="button"
                                                   onclick="rotar(this)"
                                                >
                                                <i class="fas fa-angle-left"> Return</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                    ';
                    }
                    ?>

                </div>
            </div>
        </div>

        </html>

        <div class="alert alert-danger text-center" role="alert">
            *Colors may vary on each screen or monitor.
        </div>
        <hr class="featurette-divider">

        <script>
            function rotar(button) {
                var id = button.id.replace('caraA', '');
                document.querySelector('#parent'+id).classList.toggle('hover');
            }

        </script>
    @endsection
</x-app-layout>

