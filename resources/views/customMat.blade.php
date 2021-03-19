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

            .btn-xs {
                padding: 3px;
                font-size: 12px;
                border-radius: 5px;
            }

            ul.social-network {
                list-style: none;
                display: inline;
                margin-left: 0 !important;
                padding: 0;
            }

            ul.social-network li {
                display: inline;
                margin: 0 5px;
            }

            .social-network a.icoRss:hover {
                background-color: #05a9f5;
            }

            .social-network a.icoFacebook:hover {
                background-color: #3B5998;
            }

            .social-network a.icoTwitter:hover {
                background-color: #33ccff;
            }

            .social-network a.icoGoogle:hover {
                background-color: #00a208;
            }

            .social-network a.icoVimeo:hover {
                background-color: #0590B8;
            }

            .social-network a.icoLinkedin:hover {
                background-color: #ff0059;
            }

            .social-network a.icoRss:hover i, .social-network a.icoFacebook:hover i, .social-network a.icoTwitter:hover i,
            .social-network a.icoGoogle:hover i, .social-network a.icoVimeo:hover i, .social-network a.icoLinkedin:hover i {
                color: #fff;
            }

            a.socialIcon:hover, .socialHoverClass {
                color: #44BCDD;
            }

            .social-circle li a {
                display: inline-block;
                position: relative;
                margin: 0 auto 0 auto;
                -moz-border-radius: 50%;
                -webkit-border-radius: 50%;
                border-radius: 50%;
                text-align: center;
                width: 50px;
                height: 50px;
                font-size: 20px;
                background-color: #D3D3D3;
            }

            .social-circle li i {
                margin: 0;
                line-height: 50px;
                text-align: center;
            }

            .social-circle li a:hover i, .triggeredHover {
                -moz-transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
                -ms--transform: rotate(360deg);
                transform: rotate(360deg);
                -webkit-transition: all 0.2s;
                -moz-transition: all 0.2s;
                -o-transition: all 0.2s;
                -ms-transition: all 0.2s;
                transition: all 0.2s;
            }

            .social-circle i {
                color: #fff;
                -webkit-transition: all 0.8s;
                -moz-transition: all 0.8s;
                -o-transition: all 0.8s;
                -ms-transition: all 0.8s;
                transition: all 0.8s;
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
            <p class="lead">Browse through the options we offer and choose the perfect combination.<br>
                The possibilities are many, but if you want something even more unique send us a e-mail: <a
                        href="mailto:hi@elderprotectors.com">hi@elderprotectors.com</a></p>
        </div>




        <hr class="featurette-divider">

        <div class="row featurette">

            <div class="col-md-7">
                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="my-0 fw-normal">Preview</h4>
                            <button class="btn btn-outline-dark" data-toggle="modal" data-target="#sharemodal"
                                    title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
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
                                </block>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Code</span>
                                </div>

                                {{--Code MatFinder/FasCreate--}}
                                <input id="in_matCode" class="form-control" type="text"
                                       placeholder="M-CXXX-FXXX-LXXX" required>
                                <div class="input-group-append">
                                    <button onclick="matCodeFetch()" id="btn_matCodeCheck" type="button"
                                            class="btn btn-outline-primary">
                                        <i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-5 ">
                <form>

                    <label for="select_Fondo">Fondo</label>
                    <select id="select_Fondo" class="custom-select d-block w-100" onchange="sl_OnChange(this)"
                            name="selectFondo">
                        <?php
                        foreach ($matComponents->where('type', 'C') as $Component) {
                            echo '<option value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->code)) . '</option>';
                        }
                        ?>
                    </select>
                    <br>

                    <label for="select_Marco">Marco</label>
                    <select id="select_Marco" class="custom-select d-block w-100" onchange="sl_OnChange(this)"
                            name="selectMarco">
                        <?php
                        foreach ($matComponents->where('type', 'F') as $Component) {
                            echo '<option value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->code)) . '</option>';
                        }
                        ?>
                        <option value="SM">SM</option>
                    </select>
                    <br>

                    <label for="select_Centro">Centro</label>
                    <select id="select_Centro" class="custom-select d-block w-100" onchange="sl_OnChange(this)"
                            name="selectCentro">
                        <?php
                        foreach ($matComponents->where('type', 'L') as $Component) {
                            echo '<option value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->code)) . '</option>';
                        }
                        ?>
                        <option value="SC">SC</option>
                    </select>

                    <div class="d-block my-3">
                        <label for="matText">Mat_Text</label>
                        <input id="matText" onkeyup="customTextLabel()" type="text" class="form-control" placeholder=""
                               maxlength="25">
                    </div>

                    <div id="TextLabelRadiobutton" style="display: none">
                        <div class="d-block my-3">

                            <div class="form-check">
                                <input id="rb_top-left" onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition" checked>
                                <label class="form-check-label" for="rb_top-left">TopLeft</label>
                            </div>
                            <div class="form-check">
                                <input id="rb_top-right" onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition">
                                <label class="form-check-label" for="rb_top-right">TopRight</label>
                            </div>
                            <div class="form-check">
                                <input id="rb_bottom-left" onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition">
                                <label class="form-check-label" for="rb_bottom-left">BottomLeft</label>
                            </div>
                            <div class="form-check">
                                <input id="rb_bottom-right" onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition">
                                <label class="form-check-label" for="rb_bottom-right">BottomRight</label>
                            </div>
                            <div class="form-check">
                                <input id="rb_centered" onchange="rbCustomTextPosition_Onchange(this)"
                                       class="form-check-input" type="radio" name="textPosition">
                                <label class="form-check-label" for="rb_centered">Center</label>
                            </div>

                        </div>
                    </div>

                    <br><br>

                    <div>
                        <button onclick="bt_ILikeIt_action()" type="button"
                                class="w-100 btn btn-lg btn-primary">
                            i like it!
                        </button>
                    </div>

                    <div class="d-flex justify-content-around" style="visibility: hidden">
                        <button onclick="bt_ILikeIt_action()" type="button"
                                class="btn btn-lg btn-success">
                            modify!
                        </button>
                        <button onclick="bt_ILikeIt_action()" type="button"
                                class="btn btn-lg btn-danger">
                            cancel!
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="container">
            <div class="py-5 text-center" id="checkout">
                <h2>Checkout</h2>
                <p class="lead">Check your shopping cart, have a preview <i class="fas fa-eye fa-xs text-success "></i>
                    (if necessary, edit your playmat <i class="fas fa-pencil-alt fa-xs text-primary"></i>).<br>
                    Complete the form with your details and choose the payment method you prefer.</p>
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
                            <li class="list-group-item lh-condensed">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="my-0">Custom Mat de whit text</h6>
                                        <small class="">Code:</small> <small
                                                class="text-muted">M-CYLW-FELD-LPWELD</small><br>
                                        <small class="">Text Top Left:</small> <small
                                                class="text-muted">CustomText</small>
                                        <br>
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                                data-target="#exampleModal"><i class="fas fa-eye"></i></button>
                                        <button type="button" class="btn btn-primary btn-xs"><i
                                                    class="fas fa-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-danger btn-xs"><i
                                                    class="fas fa-trash"></i>
                                        </button>
                                    </div>


                                    <div class="col-4">
                                        {{--<span class="text-muted">X2</span>--}}
                                        <span class="text-muted d-flex justify-content-end"> $70 </span>
                                    </div>


                                </div>


                            </li>
                        </div>


                        <div id="div_ProductCar">
                            <li class="list-group-item lh-condensed">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="my-0">Custom Mat de whit text</h6>
                                        <small class="">Code:</small> <small
                                                class="text-muted">M-CYLW-FELD-LPWELD</small><br>
                                        <small class="">Text Top Left:</small> <small
                                                class="text-muted">CustomText</small>
                                        <br>
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                                data-target="#exampleModal"><i class="fas fa-eye"></i></button>
                                        <button type="button" class="btn btn-primary btn-xs"><i
                                                    class="fas fa-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-danger btn-xs"><i
                                                    class="fas fa-trash"></i>
                                        </button>
                                    </div>


                                    <div class="col-4">
                                        {{--<span class="text-muted">X2</span>--}}
                                        <span class="text-muted d-flex justify-content-end"> $70 </span>
                                    </div>


                                </div>


                            </li>
                        </div>


                        <div id="div_ProductCar">
                            <li class="list-group-item lh-condensed">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="my-0">Custom Mat de whit text</h6>
                                        <small class="">Code:</small> <small
                                                class="text-muted">M-CYLW-FELD-LPWELD</small><br>
                                        <small class="">Text Top Left:</small> <small
                                                class="text-muted">CustomText</small>
                                        <br>
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                                data-target="#exampleModal"><i class="fas fa-eye"></i></button>
                                        <button type="button" class="btn btn-primary btn-xs"><i
                                                    class="fas fa-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-danger btn-xs"><i
                                                    class="fas fa-trash"></i>
                                        </button>
                                    </div>


                                    <div class="col-4">
                                        {{--<span class="text-muted">X2</span>--}}
                                        <span class="text-muted d-flex justify-content-end"> $70 </span>
                                    </div>


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
                    <ul>
                        <li id="input-group" class="list-group-item d-flex justify-content-between">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" name="giftpaper" class="custom-control-input" id="giftpaper"
                                       data-toggle="collapse" data-target="#collapseGift"
                                       aria-expanded="true" aria-controls="collapseGift">
                                <label class="custom-control-label" for="giftpaper">
                                    <span class="label-description">Gift Paper</span></label>
                            </div>
                            <span class="text-success d-flex justify-content-end"> FREE </span>
                        </li>
                        <form class="list-group-item p-2">
                            <div id="collapseGift" class="collapse" data-parent="#collapseGift">
                                <textarea id="giftText" type="text" class="form-control" maxlength="125"> With love from:</textarea>
                            </div>
                        </form>
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
                    <h4 class="mb-3">Shipping address</h4>
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

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                           required>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone <span class="text-muted">(Optional)</span></label>
                                <input type="tel" class="form-control" id="phone" placeholder="1-(555)-555-5555">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>


                        {{-- TODO crea auto Metohd 4 fill it --}}
                        <div class="row">
                            <div class="col-md-3 mb-6">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid country.
                                </div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" placeholder="" required>
                                <div class="invalid-feedback">
                                    City required.
                                </div>
                            </div>

                            <div class="col-md-3 mb-6">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <h4 class="mb-3">Shipping method</h4>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="customRadioInline1" class="custom-control-input"
                                           id="freeship" checked>
                                    <label class="custom-control-label" for="freeship"><strong>Ecconomy Shipping - <a
                                                    style="color: green">Free </a></strong><br>
                                        <span class="label-description">Sent by national post service, it takes 20 to 40 business days.<br><small
                                                    style="color: red">Due to Covid-19 may take longer than normal.</small></span></label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="customRadioInline1" class="custom-control-input"
                                           id="dhlship">
                                    <label class="custom-control-label" for="dhlship"><strong>DHL - $50</strong><br>
                                        <span class="label-description">Shipping by DHL-Express 3 to 6 days - fastest option possible.<br><small
                                                    style="color: red">Due to Covid-19 may take longer than normal.</small></span></label>
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
                                                            class="fab fa-cc-paypal fa-2x"
                                                            style="color:dodgerblue;"></i></label>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            PayPal allows you to make payments using a variety of methods including:
                                            PayPal Cash or PayPal Cash Plus account balance,
                                            a bank account, PayPal Credit, debit or credit cards, and rewards balance.
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
                                                            class="fab fa-cc-amazon-pay fa-2x"
                                                            style="color:orange;"></i></label>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            Amazon Pay accepts credit and debit cards and transfers from your available
                                            Amazon Pay account balance.
                                            Credit cards currently accepted include Visa, Mastercard, Discover, American
                                            Express, Diners Club, and JCB.
                                            An Amazon.com store card is available for use with selected merchants.
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
                                                            class="fab fa-apple-pay fa-2x"
                                                            style="color:grey;"></i></label>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            With your Mac, iPhone, iPad, and Apple Watch, you can use Apple Pay to pay
                                            within apps when you see Apple Pay as a payment option.
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


            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">© 2017-2021 Elder Protectors</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Privacy</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Support</a></li>
                </ul>
            </footer>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="sharemodal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h5 class="modal-title" id="shareModalLabel">Share</h5>
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times fa-xs"></i></span>
                        </button>
                    </div>
                    <div class="modal-body bg-dark text-light">
                        <div class="d-flex justify-content-around">
                            <ul class="social-network social-circle">

                                <li><a href="#" class="icoFacebook" title="Facebook"><i
                                                class="fab fa-facebook-f fa-lg"></i></a></li>
                                <li><a href="#" class="icoTwitter" title="Twitter"><i
                                                class="fab fa-twitter fa-lg"></i></a></li>
                                <li><a href="#" class="icoGoogle" title="Whatsapp"><i
                                                class="fab fa-whatsapp fa-lg"></i></a></li>
                                <li><a href="#" class="icoLinkedin" title="Instagram"><i
                                                class="fab fa-instagram fa-lg"></i></a></li>
                                <li><a href="#" class="icoRss" title="Telegram"><i
                                                class="fab fa-telegram-plane fa-lg"></i></a></li>
                            </ul>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Code</span>
                            </div>

                            <input id="in_matCode" class="form-control" type="text"
                                   placeholder="M-CXXX-FXXX-LXXX" required>
                            <div class="input-group-append">
                                <button onclick="copy" id="copy" type="button"
                                        class="btn btn-primary">
                                    <i class="far fa-copy"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END Modal -->

        </body>
        </html>
        <script>

            function init() {

                let select_Fondo = document.getElementById('select_Fondo');
                let select_Marco = document.getElementById('select_Marco');
                let select_Centro = document.getElementById('select_Centro');

                document.getElementById('in_matCode').value =
                    'M-C' + select_Fondo[select_Fondo.selectedIndex].text +
                    '-F' + select_Marco[select_Marco.selectedIndex].text +
                    '-L' + select_Centro[select_Centro.selectedIndex].text;

                document.getElementById('in_matCode').value = 'M-CBRW-FCLT-LCHDRG-TL-This is a Messaje 4 you';
            }

            init();

            function getCustomText() {

                if (document.getElementById("matText").value.length > 0 && document.getElementById("matText").value.length <= 25) {

                    let matText = document.getElementById("matText").value;

                    if (document.getElementById('rb_top-left').checked) {
                        return 'TL-' + matText;
                    }
                    if (document.getElementById('rb_top-right').checked) {
                        return 'TR-' + matText;
                    }
                    if (document.getElementById('rb_bottom-left').checked) {
                        return 'BL-' + matText;
                    }
                    if (document.getElementById('rb_bottom-right').checked) {
                        return 'BR-' + matText;
                    }
                    if (document.getElementById('rb_centered').checked) {
                        return 'C-' + matText;
                    }
                    return null;
                }
                return null;
            }

            /*Funcion del Input de Mat_Text*/
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

                    document.getElementById("divText_top-left").innerHTML = '';
                    document.getElementById("divText_top-right").innerHTML = '';
                    document.getElementById("divText_bottom-left").innerHTML = '';
                    document.getElementById("divText_bottom-right").innerHTML = '';
                    document.getElementById("divText_centered").innerHTML = '';
                }

                codeModify();

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

                if (document.getElementById('matText').value.length > 0) {
                    document.getElementById('in_matCode').value = 'M-C' +
                        select_Fondo[select_Fondo.selectedIndex].text +
                        '-F' + select_Marco[select_Marco.selectedIndex].text +
                        '-L' + select_Centro[select_Centro.selectedIndex].text +
                        '-' + getCustomText();
                } else {
                    document.getElementById('in_matCode').value = 'M-C' +
                        select_Fondo[select_Fondo.selectedIndex].text +
                        '-F' + select_Marco[select_Marco.selectedIndex].text +
                        '-L' + select_Centro[select_Centro.selectedIndex].text;
                }


            }

            function matCodeFetch() {

                let product = {
                    matCode: document.getElementById('in_matCode').value
                };

                //TODO Cambiar direccion para tomar valores de ENV
                fetch('http://127.0.0.1:8000/api/product/fetch', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(product)
                }).then(function (response) {
                    return response.text();
                })
                    .then(function (payload) {
                        //console.log("API response", payload);

                        var obj = JSON.parse(payload);

                        if (obj.result) {
                            setSelectsByMatCode(obj);
                            Swal.fire({
                                title: 'Cool',
                                text: 'Codigo de Producto encontrado: ' + obj.msg,
                                icon: 'success',
                            })

                        } else {
                            Swal.fire({
                                title: 'Whoops!!',
                                text: 'Codigo de Producto no Valido: ' + obj.msg,
                                icon: 'error',
                                confirmButtonText: 'oh no'
                            })
                        }
                    })
                    .catch(function (err) {
                        Swal.fire({
                            title: 'Whoops!!',
                            text: err,
                            icon: 'error'
                        })
                    });
            }

            function setSelectsByMatCode(obj) {

                $('#select_Fondo').val(obj['data']['matComponnentColor']['fileName']);
                $('#select_Marco').val(obj['data']['matComponnentFrame']['fileName']);
                $('#select_Centro').val(obj['data']['matComponnentLogo']['fileName']);

                sl_OnChange(document.getElementById('select_Fondo'));
                sl_OnChange(document.getElementById('select_Marco'));
                sl_OnChange(document.getElementById('select_Centro'));

                document.getElementById("in_matCode").value = '';
                document.getElementById("matText").value = '';

                if (obj['data']['matComponnentMsg'] != null) {
                    document.getElementById("matText").value = obj['data']['matComponnentMsg'];

                    switch (obj['data']['matMsgPosition']) {
                        case 'TL':
                            document.getElementById("rb_top-left").checked = true;
                            rbCustomTextPosition_Onchange(document.getElementById("rb_top-left"));
                            break;
                        case 'TR':
                            document.getElementById("rb_top-right").checked = true;
                            rbCustomTextPosition_Onchange(document.getElementById("rb_top-right"));
                            break;
                        case 'BL':
                            document.getElementById("rb_bottom-left").checked = true;
                            rbCustomTextPosition_Onchange(document.getElementById("rb_bottom-left"));
                            break;
                        case 'BR':
                            document.getElementById("rb_bottom-right").checked = true;
                            rbCustomTextPosition_Onchange(document.getElementById("rb_bottom-right"));
                            break;
                        case 'C':
                            document.getElementById("rb_centered").checked = true;
                            rbCustomTextPosition_Onchange(document.getElementById("rb_centered"));
                            break;
                    }
                }

                document.getElementById("in_matCode").value = obj['data']['matCode'];

                customTextLabel();

            }

            function rbCustomTextPosition_Onchange(rbCustomText) {

                document.getElementById("divText_top-left").style.display = "none";
                document.getElementById("divText_top-right").style.display = "none";
                document.getElementById("divText_bottom-left").style.display = "none";
                document.getElementById("divText_bottom-right").style.display = "none";
                document.getElementById("divText_centered").style.display = "none";

                document.getElementById("divText_" + rbCustomText.id.replace('rb_', '')).style.display = "block";

                codeModify();

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

            function bt_ILikeIt_action() {

                let product = {
                    matCode: document.getElementById('in_matCode').value,
                    quantity: 1,
                    customMsg: getCustomText(),
                };

                addProduct2Car(product);
                LikeItscroll();

            }

            function addProduct2Car(PriducCode = null) {
                var retCallBack = false;

                //TODO Cambiar direccion para tomar valores de ENV
                fetch('http://127.0.0.1:8000/api/product/valid', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(PriducCode)
                }).then(function (response) {
                    return response.text();
                })
                    .then(function (payload) {
                        //console.log("API response", payload);

                        var obj = JSON.parse(payload);

                        if (obj.result) {

                            Swal.fire({
                                title: 'success',
                                text: 'Producto Agregado al carrito',
                                icon: 'success',
                                confirmButtonText: 'Cool!'
                            })
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

            function LikeItscroll() {
                document.getElementById("checkout").scrollIntoView({
                    behavior: 'smooth'
                });
            }

        </script>
    @endsection
</x-app-layout>
