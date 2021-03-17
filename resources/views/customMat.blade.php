<?php

use App\Models\matComponent;

$matComponents = matComponent::where('enable', 1)->get();

?>

<x-app-layout>

    @section('content')
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <title>{{ config('app.name') }} - Custom Mat Maker</title>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
                  integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
                  crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                    crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
                    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
                    crossorigin="anonymous"></script>

            {{--<script src="sweetalert2.all.min.js"></script>--}}
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

        </head>

        <style>
            @font-face {
                font-family: elderfont;
                src: url(fonts/elderfont.woff);
                font-weight: bold;
            }

            .epFont {
                font-family: elderfont;

            }

            .container1 {
                position: relative;
            }

            .playmatPreview {
                position: absolute;
                top: 0;
            }

            .btn-xs{
                padding: 3px;
                font-size: 12px;
                border-radius: 5px;
            }

            /*TODO make a Dynamic BreakPoint*/

            /*Small 575*/
            @media screen and (min-width: 575px) {
                .top-left {
                    position: absolute;
                    top: 36px;
                    left: 27px;
                    font-size: 12px;
                }

                .top-right {
                    position: absolute;
                    top: 36px;
                    right: 27px;
                    font-size: 12px;
                }

                .bottom-left {
                    position: absolute;
                    bottom: 36px;
                    left: 27px;
                    font-size: 12px;
                }

                .bottom-right {
                    position: absolute;
                    bottom: 36px;
                    right: 27px;
                    font-size: 12px;
                }

                .centered {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 12px;
                }
            }

            /*Medium 767*/
            @media screen and (min-width: 767px) {
                .top-left {
                    position: absolute;
                    top: 28px;
                    left: 20px;
                    font-size: 8px;
                }

                .top-right {
                    position: absolute;
                    top: 28px;
                    right: 20px;
                    font-size: 8px;
                }

                .bottom-left {
                    position: absolute;
                    bottom: 28px;
                    left: 20px;
                    font-size: 8px;
                }

                .bottom-right {
                    position: absolute;
                    bottom: 28px;
                    right: 20px;
                    font-size: 8px;
                }

                .centered {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 8px;
                }
            }

            /*Large 991*/
            @media screen and (min-width: 991px) {
                .top-left {
                    position: absolute;
                    top: 40px;
                    left: 27px;
                    font-size: 12px;
                }

                .top-right {
                    position: absolute;
                    top: 40px;
                    right: 27px;
                    font-size: 12px;
                }

                .bottom-left {
                    position: absolute;
                    bottom: 38px;;
                    left: 27px;
                    font-size: 12px;

                }

                .bottom-right {
                    position: absolute;
                    bottom: 38px;;
                    right: 27px;
                    font-size: 12px;
                }

                .centered {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 12px;
                }
            }

            /*XL 1200+*/
            @media screen and (min-width: 1200px) {
                .top-left {
                    position: absolute;
                    top: 48px;
                    left: 33px;
                    font-size: 16px;
                }

                .top-right {
                    position: absolute;
                    top: 48px;
                    right: 33px;
                    font-size: 16px;
                }

                .bottom-left {
                    position: absolute;
                    bottom: 48px;
                    left: 33px;
                    font-size: 16px;

                }

                .bottom-right {
                    position: absolute;
                    bottom: 48px;
                    right: 33px;
                    font-size: 16px;
                }

                .centered {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 16px;
                }



            }

        </style>

        <body>

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Custom Playmat</h1>
            <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap
                example. It’s built with default Bootstrap components and utilities with little customization.</p>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">

            <div class="col-md-7">
                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 fw-normal">Preview</h4>
                        </div>
                        <div class="card-body">
                            <div class="container1">
                                <block style="text-align: center;">
                                    <img class="fondo" id="img_Fondo"
                                         src="{{asset('assets/img/customMat/fondo1.png')}}"
                                         alt=""/>
                                    <img class="playmatPreview" id="img_Marco"
                                         src="{{asset('assets/img/customMat/marco1.png')}}"
                                         alt=""/>
                                    <img class="playmatPreview" id="img_Centro"
                                         src="{{asset('assets/img/customMat/centro1.png')}}"
                                         alt=""/>

                                    <div id="divText_top-left" class="top-left epFont" style="display: block"></div>
                                    <div id="divText_top-right" class="top-right epFont" style="display: none"></div>
                                    <div id="divText_bottom-left" class="bottom-left epFont"
                                         style="display: none"></div>
                                    <div id="divText_bottom-right" class="bottom-right epFont"
                                         style="display: none"></div>
                                    <div id="divText_centered" class="centered epFont" style="display: none"></div>

                                    <h6>
                                        <span class="badge badge-primary">Code:</span>
                                        <a id="code">M-CXXX-FXXX-LXXX</a>
                                    </h6>


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Code</span>
                                        </div>
                                        <input type="text" class="form-control" id="code" placeholder="M-CXXX-FXXX-LXXX"
                                               required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                                                        class="fas fa-check"></i></button>
                                        </div>
                                    </div>


                                </block>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 ">
                <form>
                    <label for="select_Fondo">
                        Fondo
                    </label>
                    <select id="select_Fondo" class="custom-select d-block w-100"
                            onchange="sl_OnChange(this)"
                            name="selectFondo">
                        <?php
                        foreach ($matComponents->where('type', 'C') as $Component) {
                            echo '<option value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->code)) . '</option>';
                        }
                        ?>

                    </select>
                    <br>
                    <label for="select_Marco">
                        Marco
                    </label>
                    <select id="select_Marco" class="custom-select d-block w-100"
                            onchange="sl_OnChange(this)"
                            name="selectMarco">

                        <?php
                        foreach ($matComponents->where('type', 'F') as $Component) {
                            echo '<option value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->code)) . '</option>';
                        }
                        ?>
                        <option value="SM">SM</option>

                    </select>
                    <br>
                    <label for="select_Centro">
                        Centro
                    </label>
                    <select id="select_Centro" class="custom-select d-block w-100"
                            onchange="sl_OnChange(this)"
                            name="selectCentro">

                        <?php
                        foreach ($matComponents->where('type', 'L') as $Component) {

                            echo '<option value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->code)) . '</option>';

                        }
                        ?>
                        <option value="SC">SC</option>

                    </select>

                    <div class="d-block my-3">
                        <label for="matText">Mat Text</label>
                        <input id="matText"
                               onkeyup="customTextLabel()"
                               type="text" class="form-control" placeholder="" maxlength="25">
                    </div>

                    <div id="TextLabelRadiobutton" style="display: none">
                        <div class="d-block my-3">
                            <div class="form-check">
                                <input id="rb_top-left"
                                       onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition" checked>
                                <label class="form-check-label" for="rb_top-left">
                                    TopLeft
                                </label>
                            </div>
                            <div class="form-check">
                                <input id="rb_top-right"
                                       onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition">
                                <label class="form-check-label" for="rb_top-right">
                                    TopRight
                                </label>
                            </div>
                            <div class="form-check">
                                <input id="rb_bottom-left"
                                       onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition">
                                <label class="form-check-label" for="rb_bottom-left">
                                    BottomLeft
                                </label>
                            </div>
                            <div class="form-check">
                                <input id="rb_bottom-right"
                                       onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition">
                                <label class="form-check-label" for="rb_bottom-right">
                                    BottomRight
                                </label>
                            </div>
                            <div class="form-check">
                                <input id="rb_centered"
                                       onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition">
                                <label class="form-check-label" for="rb_centered">
                                    Center
                                </label>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <button onclick="bt_ILikeIt_action()" type="button" class="w-100 btn btn-lg btn-outline-primary">
                        i like it!
                    </button>

                    <div class="d-flex justify-content-around">
                        <button onclick="bt_ILikeIt_action()" type="button"
                                class="btn btn-lg btn-outline-success col-6">
                            modify!
                        </button>
                        <button onclick="bt_ILikeIt_action()" type="button" class="btn btn-lg btn-outline-danger col-6">
                            cancel!
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="container">
            <div class="py-5 text-center" id="checkout">
                <h2>Checkout form</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required
                    form group has a validation state that can be triggered by attempting to submit the form without
                    completing it.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>

                        {{-- TODO Count CarItems --}}
                        <span class="badge badge-primary badge-pill">3</span>

                    </h4>
                    <ul class="list-group mb-3" id="ul_productList">

                        <div id="div_ProductCar">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Custom Mat de whit text</h6>
                                    <div>
                                        <small class="text-muted">Code: M-CYLW-FELD-LPWELD</small>
                                    </div>
                                    <div>
                                        <small class="text-muted">Text Top Left: CustomText</small>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="badge badge-light"><i class="fas fa-minus"></i></a>
                                    <span class="badge badge-pill badge-primary">2</span>
                                    <a href="#" class="badge badge-light"><i class="fas fa-plus"></i></a>

                                    {{--<span class="text-muted">X2</span>--}}
                                    <span class="text-muted">$70</span>
                                    <br/>
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                            data-target="#exampleModal"><i class="fas fa-eye"></i></button>
                                    <button type="button" class="btn btn-primary btn-xs"><i
                                                class="fas fa-pencil-alt"></i></button>
                                    <button type="button" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </li>
                        </div>


                        <!-- Modal Preview -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <div class="container1">
                                                <block style="text-align: center;">
                                                    <img class="fondo" id="img_Fondo"
                                                         src="{{asset('assets/img/customMat/fondo1.png')}}"
                                                         alt=""/>
                                                    <img class="playmatPreview" id="img_Marco"
                                                         src="{{asset('assets/img/customMat/marco1.png')}}"
                                                         alt=""/>
                                                    <img class="playmatPreview" id="img_Centro"
                                                         src="{{asset('assets/img/customMat/centro1.png')}}"
                                                         alt=""/>

                                                    <div id="divText_top-left" class="top-left epFont"
                                                         style="display: block"></div>
                                                    <div id="divText_top-right" class="top-right epFont"
                                                         style="display: none"></div>
                                                    <div id="divText_bottom-left" class="bottom-left epFont"
                                                         style="display: none"></div>
                                                    <div id="divText_bottom-right" class="bottom-right epFont"
                                                         style="display: none"></div>
                                                    <div id="divText_centered" class="centered epFont"
                                                         style="display: none"></div>

                                                    <h6>
                                                        <span class="badge badge-primary">Code:</span>
                                                        <a id="code">M-CXXX-FXXX-LXXX</a>
                                                    </h6>
                                                </block>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Preview -->


                        {{-- Standar li 4 PromoCode --}}
                        <div id="div_PromoCode">
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Promo code</h6>
                                    <small>EXAMPLECODE</small>
                                </div>
                                <span class="text-success">-$5</span>
                            </li>

                        </div>

                        {{-- Standar li 4 Total un USD --}}
                        <li id="div_TotalCar" class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>$20</strong>
                        </li>

                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="username" placeholder="Username" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your username is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        {{-- TODO crea auto Metohd 4 fill it --}}
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                <input id="paypal" name="paymentMethod" type="radio"
                                                       class="form-check-input" checked="" required="">
                                                <label class="form-check-label" for="paypal"><i
                                                            class="fab fa-cc-paypal fa-2x"></i></label>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch.
                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                <input id="amazon" name="paymentMethod" type="radio"
                                                       class="form-check-input" required="">
                                                <label class="form-check-label" for="amazon"><i
                                                            class="fab fa-cc-amazon-pay fa-2x"></i></label>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch.
                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                <input id="apple" name="paymentMethod" type="radio"
                                                       class="form-check-input" required="">
                                                <label class="form-check-label" for="apple"><i
                                                            class="fab fa-apple-pay fa-2x"></i></label>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch.
                                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et.
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>

            <hr class="featurette-divider">

        </div>
        </body>
        </html>
        <script>

            function init() {

                let select_Fondo = document.getElementById('select_Fondo');
                let select_Marco = document.getElementById('select_Marco');
                let select_Centro = document.getElementById('select_Centro');

                document.getElementById('code').textContent =
                    'M-C' + select_Fondo[select_Fondo.selectedIndex].text +
                    '-F' + select_Marco[select_Marco.selectedIndex].text +
                    '-L' + select_Centro[select_Centro.selectedIndex].text;
            }

            init();

            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            }

            function bt_ILikeIt_action() {


                let product = {
                    matCode: document.getElementById('code').textContent,
                    quantity: 1,
                    customMsg: getCustomText(),
                };

                //let  myJSON = JSON.stringify(product);

                if (addProduct2Car(product)) {
                    LikeItscroll();
                }

                console.log(document.cookie);

            }

            function addProduct2Car(MatCode = null) {
                var retCallBack = false;

                //TODO Cambiar direccion para tomar valores de ENV
                fetch('http://127.0.0.1:8000/api/product/valid', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(MatCode)
                }).then(function (response) {
                    return response.text();
                })
                    .then(function (payload) {
                        //console.log("API response", payload);

                        var obj = JSON.parse(payload);

                        if (obj.result) {

                            /*TODO Refactor*/

                            var div = document.getElementById('div_ProductCar');

                            var liProduct = document.createElement('li');
                            var divProductDescription = document.createElement('div');
                            var divProductSpan = document.createElement('div');

                            var divSmallProductCode = document.createElement('div');
                            var divSmallProductCustomText = document.createElement('div');

                            var h6Product = document.createElement('h6');

                            var spanProductQuantity = document.createElement('span');
                            var spanProductPrice = document.createElement('span');

                            var smallProductCode = document.createElement('small');
                            var smallProductCustomText = document.createElement('small');

                            liProduct.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'lh-condensed');

                            /*TODO Add id to li and onClick event*/

                            h6Product.classList.add('my-0')
                            h6Product.append('Custom Mat');

                            smallProductCode.classList.add('text-muted');

                            smallProductCode.append('Code: ' + obj['data']['matCode']);


                            spanProductQuantity.classList.add('badge', 'badge-primary', 'badge-pill');
                            spanProductQuantity.append('X1');

                            spanProductPrice.classList.add('text-muted');
                            spanProductPrice.append('$70')

                            //TODO refactor this with new Function getCustomText()
                            //customText matText
                            if (document.getElementById("matText").value.length > 0 && document.getElementById("matText").value.length <= 25) {
                                h6Product.append(' w/cText');
                                smallProductCustomText.classList.add('text-muted');
                                // Check Position
                                // rb_top-left
                                if (document.getElementById('rb_top-left').checked) {
                                    smallProductCustomText.append('Text Top Left: ' + document.getElementById("matText").value);
                                }
                                // rb_top-right
                                if (document.getElementById('rb_top-right').checked) {
                                    smallProductCustomText.append('Text Top Right: ' + document.getElementById("matText").value);
                                }
                                // rb_bottom-left
                                if (document.getElementById('rb_bottom-left').checked) {
                                    smallProductCustomText.append('Text Bottom Left: ' + document.getElementById("matText").value);
                                }
                                // rb_bottom-right
                                if (document.getElementById('rb_bottom-right').checked) {
                                    smallProductCustomText.append('Text Bottom Right: ' + document.getElementById("matText").value);
                                }
                                // rb_centered
                                if (document.getElementById('rb_centered').checked) {
                                    smallProductCustomText.append('Text Centered: ' + document.getElementById("matText").value);
                                }

                            }

                            divSmallProductCode.appendChild(smallProductCode);
                            divSmallProductCustomText.appendChild(smallProductCustomText);

                            divProductDescription.appendChild(h6Product);
                            divProductDescription.appendChild(divSmallProductCode);
                            divProductDescription.appendChild(divSmallProductCustomText);

                            divProductSpan.appendChild(spanProductQuantity);
                            divProductSpan.appendChild(spanProductPrice);

                            liProduct.append(divProductDescription);
                            liProduct.append(divProductSpan);

                            div.append(liProduct);

                            retCallBack = true;
                            /*Swal.fire({
                                title: 'success',
                                text: 'Producto Agregado al carrito',
                                icon: 'success',
                                confirmButtonText: 'Cool!'
                            })*/
                            return true;
                        } else {
                            Swal.fire({
                                title: 'Whoops!!',
                                text: 'Codigo de Producto no Valido: ' + obj.msg,
                                icon: 'error',
                                confirmButtonText: 'oh no'
                            })
                            retCallBack = false;
                        }
                    })
                    .catch(function (err) {
                        Swal.fire({
                            title: 'Whoops!!',
                            text: err,
                            icon: 'error'
                        })
                    });
                return true;
            }

            function getCustomText() {

                if (document.getElementById("matText").value.length > 0 && document.getElementById("matText").value.length <= 25) {
                    if (document.getElementById('rb_top-left').checked) {
                        return 'Top Left: ' + document.getElementById("matText").value;
                    }
                    if (document.getElementById('rb_top-right').checked) {
                        return 'Top Right: ' + document.getElementById("matText").value;
                    }
                    if (document.getElementById('rb_bottom-left').checked) {
                        return 'Bottom Left: ' + document.getElementById("matText").value;
                    }
                    if (document.getElementById('rb_bottom-right').checked) {
                        return 'Bottom Right: ' + document.getElementById("matText").value;
                    }
                    if (document.getElementById('rb_centered').checked) {
                        return 'Centered: ' + document.getElementById("matText").value;
                    }
                }
                return null;
            }


            function LikeItscroll() {
                document.getElementById("checkout").scrollIntoView({
                    behavior: 'smooth'
                });
            }

            function customTextLabel() {
                if (document.getElementById("matText").value.length > 0) {

                    document.getElementById("TextLabelRadiobutton").style.display = "block";

                    document.getElementById("divText_top-left").innerHTML = document.getElementById("matText").value;
                    document.getElementById("divText_top-right").innerHTML = document.getElementById("matText").value;
                    document.getElementById("divText_bottom-left").innerHTML = document.getElementById("matText").value;
                    document.getElementById("divText_bottom-right").innerHTML = document.getElementById("matText").value;
                    document.getElementById("divText_centered").innerHTML = document.getElementById("matText").value;

                } else {
                    document.getElementById("TextLabelRadiobutton").style.display = "none";
                }

            }

            function sl_OnChange(slComponent) {

                if (slComponent.value === 'SC' || slComponent.value === 'SM') {
                    document.getElementById(slComponent.id.replace('select_', 'img_')).src = '';
                } else {
                    document.getElementById(slComponent.id.replace('select_', 'img_')).src = slComponent.value;
                }

                codeModify();
            }

            function codeModify() {

                let select_Fondo = document.getElementById('select_Fondo');
                let select_Marco = document.getElementById('select_Marco');
                let select_Centro = document.getElementById('select_Centro');

                document.getElementById('code').textContent = 'M-C' + select_Fondo[select_Fondo.selectedIndex].text + '-F' + select_Marco[select_Marco.selectedIndex].text + '-L' + select_Centro[select_Centro.selectedIndex].text + '';

            }

            function rbCustomTextPosition_Onchange(rbCustomText) {

                document.getElementById("divText_top-left").style.display = "none";
                document.getElementById("divText_top-right").style.display = "none";
                document.getElementById("divText_bottom-left").style.display = "none";
                document.getElementById("divText_bottom-right").style.display = "none";
                document.getElementById("divText_centered").style.display = "none";

                document.getElementById("divText_" + rbCustomText.id.replace('rb_', '')).style.display = "block";

            }

            function regexCodeMat() {
                let codeRGEX = /^M-C[A-Z]+-F[A-Z]+-L[A-Z]+(-T[A-Z ]+){0,1}$/;
                var codeResult = codeRGEX.test(document.getElementById('code').textContent);

                alert("code:" + codeResult);

            }

            async function asyncSweetAlert() {
                const text = await swal({
                    title: 'Whoops!!',
                    text: 'Codigo de Producto no Valido: ' + obj.msg,
                    icon: 'error',
                    confirmButtonText: 'oh no'
                })
                if (text) {
                    swal(text)
                }
            }


        </script>
    @endsection
</x-app-layout>
