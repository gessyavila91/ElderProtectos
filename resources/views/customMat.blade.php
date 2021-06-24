<?php

use App\Models\matComponent;

$matComponents = matComponent::where('enable', 1)->get();




/*
	* Config for PayPal specific values
*/

// Urls
if(isset($_SERVER['SERVER_NAME'])) {
    $url = @($_SERVER["HTTPS"] != 'on') ? 'http://' . $_SERVER["SERVER_NAME"] : 'https://' . $_SERVER["SERVER_NAME"];
    $url .= ($_SERVER["SERVER_PORT"] !== 80) ? ":" . $_SERVER["SERVER_PORT"] : "";
    $url .= $_SERVER["REQUEST_URI"];
}
else {
    $url = "";
}

define("URL", array(

    "current" => $url,

    "services" => array(
        "orderCreate" => 'api/createOrder.php',
        "orderGet" => 'api/getOrderDetails.php',
		"orderPatch" => 'api/patchOrder.php',
		"orderCapture" => 'api/captureOrder.php'
    ),

	"redirectUrls" => array(
        "returnUrl" => 'pages/success.php',
		"cancelUrl" => 'pages/cancel.php',
    )
));

// PayPal Environment
const PAYPAL_ENVIRONMENT = "sandbox";

// PayPal REST API endpoints
const PAYPAL_ENDPOINTS = array(
    "sandbox" => "https://api.sandbox.paypal.com",
    "production" => "https://api.paypal.com"
);

// PayPal REST App credentials
const PAYPAL_CREDENTIALS = array(
    "sandbox" => [
        "client_id" => "ASCs3KIocN5MuYCn8l7xhrzmqmQxoTYSWZzHFxlFGnXokO4QSOAwtT6kD22RkX3cNfU_R20fBlF8NC_3",
        "client_secret" => "EJLpMe688yrAeT8hzRt57ZfxBDqSm2GazThLKTiCE_XC5Y3pqI2IvoozLTQ5kQGu9JZ2n2A0xT-SIrg0"
    ],
    "production" => [
        "client_id" => "",
        "client_secret" => ""
    ]
);

// PayPal REST API version
const PAYPAL_REST_VERSION = "v2";

// ButtonSource Tracker Code
const SBN_CODE = "PP-DemoPortal-EC-Psdk-ORDv2-php";

$baseUrl = str_replace("index.php", "", URL['current']);
$rootPath = "";

?>

<x-app-layout>

    @section('content')
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <title>{{ config('app.name') }} - Custom Mat Maker</title>

            <script src="https://www.paypal.com/sdk/js?client-id=sb&intent=capture&vault=false&commit=true<?php echo isset($_GET['buyer-country']) ? "&buyer-country=" . $_GET['buyer-country'] : "" ?>"></script>

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


            .backgorundPreview {
                position: relative;
                top: 0;
                width: 100%;
            }

            .playmatPreview{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
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
<div class="container">
        <div class="py-5">
            <div class="animate__animated animate__fadeInDown">
                <div class="p-5 shadow-sm rounded bg-degraded-2 text-dark  text-center">
            <h1 class="display-4">Custom Playmat</h1>
            <p class="lead">Browse through the options we offer and choose the perfect combination.<br>
                The possibilities are many, but if you want something even more unique send us a e-mail:
                <a href="mailto:hi@elderprotectors.com">hi@elderprotectors.com</a></p>
                </div>
            </div>
        </div>

        <div class="row featurette">


            {{--Preview mat --}}
            <div class="col col-md-7">
                <div class="card mb-4 shadow-sm ">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="my-0 fw-normal">Preview</h4>
                        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#sharemodal"
                                title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
                    </div>

                    <div class="card-body">

                        <div class="backgorundPreview">
                            <block style="text-align: center;">

                                <img class="backgorundPreview" id="img_Background"
                                     src="{{asset('assets/img/customMat/fondo1.png')}}"
                                     alt=""/>
                                <img class="playmatPreview" id="img_Frame"
                                     src="{{asset('assets/img/customMat/marco1.png')}}"
                                     alt=""/>
                                <img class="playmatPreview" id="img_Logo"
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
                            {{--Code MatFinder/FasCreate--}}
                            <div class="input-group-prepend">
                                <span class="input-group-text">Code</span>
                            </div>
                            <input id="in_matCode" class="form-control" type="text"
                                   placeholder="M-CXXX-FXXX-LXXX" required>
                            <div class="input-group-append">
                                <button onclick="matCodeFetch()" id="btn_matCodeCheck" type="button"
                                        class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i></button>
                            </div>
                            {{--Code MatFinder/FasCreate--}}
                        </div>
                    </div>
                </div>
            </div>
            {{--Preview mat End--}}


            <div class="col-md-5 ">
                {{--<form>--}}

                <label for="select_Background">Background</label>
                <select id="select_Background" class="custom-select d-block w-100" onchange="sl_OnChange(this)"
                        name="selectBackground">
                    <?php
                    foreach ($matComponents->where('type', 'B') as $Component) {
                        echo '<option id=' . $Component->code . ' value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->description)) . '</option>';
                    }
                    ?>
                </select>
                <br>

                <label for="select_Frame">Frame</label>
                <select id="select_Frame" class="custom-select d-block w-100" onchange="sl_OnChange(this)"
                        name="selectFrame">
                    <?php
                    foreach ($matComponents->where('type', 'F') as $Component) {
                        echo '<option id=' . $Component->code . ' value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->description)) . '</option>';
                    }
                    ?>
                    <option id='SM' value="SM">SM</option>
                </select>
                <br>

                <label for="select_Logo">Logo</label>
                <select id="select_Logo" class="custom-select d-block w-100" onchange="sl_OnChange(this)"
                        name="selectLogo">
                    <?php
                    foreach ($matComponents->where('type', 'L') as $Component) {
                        echo '<option id=' . $Component->code . ' value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->description)) . '</option>';
                    }
                    ?>
                    <option id='SC' value="SC">SC</option>
                </select>

                <div class="d-block my-3">
                    <label for="matText">Mat Custom Text</label>
                    <input id="matText" onkeyup="customTextLabel(this)" type="text" class="form-control" placeholder=""
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

                {{--</form>--}}
            </div>
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

                        <span id="span_itemsCarChopCount" class="badge badge-primary badge-pill">0</span>

                    </h4>

                    <ul class="list-group mb-3" id="ul_shoppingCar">

                        <li class="list-group-item lh-condensed"></li>

                        {{-- Standar li 4 Total un USD --}}
                        <li id="div_TotalCar" class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong id="strong_totalPriceCar">$ 0</strong>
                        </li>
                        {{-- Standar li 4 Total un USD End--}}

                    </ul>





                        {{--Gif Box Colapse--}}
                    <ul class="list-group mb-3" id="ul_shoppingCar">

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

                        {{--Gif Box Colapse END--}}


                    {{--Promo Code Input--}}
                    <ul class="list-group mb-3" id="ul_shoppingCar">
                        {{--Promo Code Input--}}
                        <div>
                            <div class="card p-2">
                                <div class="input-group">
                                    <input id="in_promoCode" type="text" class="form-control" placeholder="Promo code"
                                           value="PROMOVALIDA2">

                                    <div class="input-group-append">
                                        <button onclick="addPromoCode()" type="submit" class="btn btn-secondary">Redeem
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                    {{--Promo Code Input END--}}



                </div>

                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Shipping address</h4>
                    {{--<form class="needs-validation" novalidate>--}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="Gessy"
                                   required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="A. Quezada"
                                   required>
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
                                       value="gessyavila91@SomeMail.com">
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your username is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone <span class="text-muted">(Optional)</span></label>
                            <input type="tel" class="form-control" id="phone" placeholder="+10-10-1000-1000"
                                   value="+10-10-1000-1000">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                               value="1234 Main St">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>


                    {{-- TODO crea auto Metohd 4 fill it --}}
                    <div class="row">
                        <div class="col-md-3 mb-6">
                            <label for="country">Country</label>
                            <input id="country" type="text" class="form-control" placeholder="" value="Mexico">
                            <div class="invalid-feedback">
                                Please provide a valid country.
                            </div>
                        </div>
                        <div class="col-md-3 mb-6">
                            <label for="state">State</label>
                            <input id="state" type="text" class="form-control" placeholder="" value="Jalisco">
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-6">
                            <label for="city">City</label>
                            <input id="city" type="text" class="form-control" placeholder="" value="Guadalajara">
                            <div class="invalid-feedback">
                                City required.
                            </div>
                        </div>

                        <div class="col-md-3 mb-6">
                            <label for="zipCode">ZipCode</label>
                            <input id="zipCode" type="text" class="form-control" placeholder="" value="44290">
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
                    <button onclick="checkout()" class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                        checkout
                    </button>

                    <!-- Checkout Options -->
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-7">
                            <!-- Container for PayPal Shortcut Checkout -->
                            <div id="paypalCheckoutContainer"></div>

                            <!-- Container for PayPal Mark Redirect -->
                            {{--<div id="paypalMarkRedirect">
                                <h4 class="text-center">OR</h4>
                                <a class="btn btn-success btn-block" href="<?= $rootPath ?>pages/shipping.php" role="button">
                                    <h4>Proceed to Checkout</h4>
                                </a>
                            </div>--}}
                        </div>
                    </div>

                    {{--</form>--}}
                </div>

            </div>

            <hr class="featurette-divider">

        </div>

        <!-- Modal Share -->
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

                            <input class="form-control" type="text"
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
        <!-- END Modal Share -->

        <!-- Modal Preview -->
        <div class="modal fade" id="ModalPreview" tabindex="-1" aria-labelledby="ModalPreviewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalPreview">Preview</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="containerIMGPreview">
                                <block style="text-align: center;">
                                    <img class="background" id="img_Background_preview"
                                         src="{{asset('assets/img/customMat/fondo1.png')}}"
                                         alt=""/>
                                    <img class="playmatPreview" id="img_Frame_preview"
                                         src="{{asset('assets/img/customMat/marco1.png')}}"
                                         alt=""/>
                                    <img class="playmatPreview" id="img_Logo_preview"
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
                                        <a id="code_preview">M-CXXX-FXXX-LXXX</a>
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

        <!-- Modal MODIFY -->
        <div class="modal fade" id="ModalModify" data-backdrop="static" data-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modify</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row featurette">
                            {{--Preview Mat --}}
                            <div class="col-md-7">
                                <div class="col">
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-header d-flex justify-content-between">
                                            <h4 class="my-0 fw-normal">Preview</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="containerIMGPreview">
                                                <block style="text-align: center;">
                                                    <img id="img_Edit_Background" class="fondo"
                                                         src="{{asset('assets/img/customMat/fondo1.png')}}" alt=""/>
                                                    <img id="img_Edit_Frame" class="playmatPreview"
                                                         src="{{asset('assets/img/customMat/marco1.png')}}" alt=""/>
                                                    <img id="img_Edit_Logo" class="playmatPreview"
                                                         src="{{asset('assets/img/customMat/centro1.png')}}" alt=""/>

                                                    {{--Custom Text Edit--}}
                                                    <div id="divText_Edit_top-left" class="top-left epFont"
                                                         style="display: none"></div>
                                                    <div id="divText_Edit_top-right" class="top-right epFont"
                                                         style="display: none"></div>
                                                    <div id="divText_Edit_bottom-left" class="bottom-left epFont"
                                                         style="display: none"></div>
                                                    <div id="divText_Edit_bottom-right" class="bottom-right epFont"
                                                         style="display: none"></div>
                                                    <div id="divText_Edit_centered" class="centered epFont"
                                                         style="display: none"></div>
                                                    {{--Custom Text Edit End--}}
                                                </block>
                                            </div>
                                            <div class="input-group">
                                                {{--Code MatFinder/FasCreate--}}
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Code</span>
                                                </div>
                                                <input id="in_Edit_matCode" class="form-control" type="text"
                                                       placeholder="M-CXXX-FXXX-LXXX">
                                                <div class="input-group-append">
                                                    {{-- TODO agregar funcion de Fetch Solo para Editar --}}
                                                    <button onclick="matCodeFetch()" id="btn_Edit_matCodeCheck"
                                                            type="button"
                                                            class="btn btn-outline-primary">
                                                        <i class="fas fa-search"></i></button>
                                                </div>
                                                <div id="productIDEdit" style="display: none;"></div>
                                                {{--Code MatFinder/FasCreate--}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Preview Mat End--}}

                            <div class="col-md-5 ">

                                {{--EditSelectore End--}}
                                <label for="select_Edit_Background">Fondo</label>
                                <select id="select_Edit_Background" class="custom-select d-block w-100"
                                        onchange="sl_OnChangeEdit(this)"
                                        name="selectFondo">
                                    <?php
                                    foreach ($matComponents->where('type', 'B') as $Component) {
                                        echo '<option id=' . $Component->code . ' value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->description)) . '</option>';
                                    }
                                    ?>
                                </select>
                                <br>

                                <label for="select_Edit_Frame">Marco</label>
                                <select id="select_Edit_Frame" class="custom-select d-block w-100"
                                        onchange="sl_OnChangeEdit(this)"
                                        name="selectMarco">
                                    <?php
                                    foreach ($matComponents->where('type', 'F') as $Component) {
                                        echo '<option id=' . $Component->code . ' value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->description)) . '</option>';
                                    }
                                    ?>
                                    <option value="SM">SM</option>
                                </select>
                                <br>

                                <label for="select_Edit_Logo">Centro</label>
                                <select id="select_Edit_Logo" class="custom-select d-block w-100"
                                        onchange="sl_OnChangeEdit(this)"
                                        name="selectCentro">
                                    <?php
                                    foreach ($matComponents->where('type', 'L') as $Component) {
                                        echo '<option id=' . $Component->code . ' value=' . $Component->fileName . '>' . str_replace(' ', '', ($Component->description)) . '</option>';
                                    }
                                    ?>
                                    <option value="SC">SC</option>
                                </select>

                                <div class="d-block my-3">
                                    <label for="matEditText">Mat Custom Text</label>
                                    <input id="matEditText" onkeyup="customTextLabel(this)" type="text"
                                           class="form-control"
                                           placeholder=""
                                           maxlength="25">
                                </div>

                                <div id="CustomTextRadioButtonsEdit"
                                     style="display: none">
                                    <div class="d-block my-3">

                                        <div class="form-check">
                                            <input id="rb_Edit_top-left"
                                                   onchange="rbCustomTextPosition_Onchange(this)"
                                                   class="form-check-input" type="radio" name="textPositionEdit"
                                                   checked>
                                            <label class="form-check-label" for="rb_Edit_top-left">TopLeft</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="rb_Edit_top-right"
                                                   onchange="rbCustomTextPosition_Onchange(this)"
                                                   class="form-check-input" type="radio" name="textPositionEdit">
                                            <label class="form-check-label" for="rb_Edit_top-right">TopRight</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="rb_Edit_bottom-left"
                                                   onchange="rbCustomTextPosition_Onchange(this)"
                                                   class="form-check-input" type="radio" name="textPositionEdit">
                                            <label class="form-check-label" for="rb_Edit_bottom-left">BottomLeft</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="rb_Edit_bottom-right"
                                                   onchange="rbCustomTextPosition_Onchange(this)"
                                                   class="form-check-input" type="radio" name="textPositionEdit">
                                            <label class="form-check-label"
                                                   for="rb_Edit_bottom-right">BottomRight</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="rb_Edit_centered"
                                                   onchange="rbCustomTextPosition_Onchange(this)"
                                                   class="form-check-input" type="radio" name="textPositionEdit">
                                            <label class="form-check-label" for="rb_Edit_centered">Center</label>
                                        </div>

                                    </div>
                                </div>
                                {{--EditSelectore End--}}

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" onclick="sendEdit()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Modal MODIFY-->


        </body>

        </html>
        <script>

            function init() {

                let select_Background = document.getElementById('select_Background');
                let select_Frame = document.getElementById('select_Frame');
                let select_Logo = document.getElementById('select_Logo');

                document.getElementById('in_matCode').value =
                    'M-B' + select_Background[select_Background.selectedIndex].id +
                    '-F' + select_Frame[select_Frame.selectedIndex].id +
                    '-L' + select_Logo[select_Logo.selectedIndex].id;

                document.getElementById('in_matCode').value = 'M-BBRW-FCLT-LCHDRG-TL-This is a Message 4 you';

                InitShoppingCar();
            }

            init();

            function InitShoppingCar() {
                fetch('http://127.0.0.1:8000/api/product/initShoppingCar', {
                    method: 'GET',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    }
                }).then(function (response) {
                    return response.text();
                }).then(function (payload) {
                    var obj = JSON.parse(payload);

                    if (obj['result']) {
                        modShoppingCar(obj);
                    }
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Whoops!!',
                        text: err,
                        icon: 'error'
                    })
                });

                return true;
            }

            function matCodeFetch() {

                let product = {
                    matCode: document.getElementById('in_matCode').value
                };

                fetch('http://127.0.0.1:8000/api/product/fetch', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(product)
                }).then(function (response) {
                    return response.text();
                }).then(function (payload) {

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
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Whoops!!',
                        text: err,
                        icon: 'error'
                    })
                });
            }

            function bt_ILikeIt_action() {

                addProduct2Car();
                LikeItscroll();

            }

            function addProduct2Car() {

                let product = {
                    matCode: document.getElementById('in_matCode').value,
                    quantity: 1
                };

                fetch('http://127.0.0.1:8000/api/product/addProduct', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(product)
                }).then(function (response) {
                    return response.text();
                }).then(function (payload) {

                    var obj = JSON.parse(payload);

                    if (obj['result']) {
                        modShoppingCar(obj);
                    }
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Whoops!!',
                        text: err,
                        icon: 'error'
                    })
                });
                return true;
            }

            function modShoppingCar(obj) {
                $('#ul_shoppingCar').empty();
                if ('shoppingCar' in obj['data']) {
                    setShoppingCarItems(obj['data']['shoppingCar']);
                }
                if ('promoCode' in obj['data']) {
                    setPromoCode(obj['data']['promoCode']);
                }
                if ('shoppingCarTotalPrice' in obj['data']) {
                    setShoppingCarTotal(obj['data']['shoppingCarTotalPrice']);
                }
                if ('shoppingCarCountItems' in obj['data']) {
                    document.getElementById('span_itemsCarChopCount').textContent = obj['data']['shoppingCarCountItems'];
                }
            }

            function shoppingCarDelete(button) {

                let product = {
                    id: button.id.replace('btn_product_Delete', '')
                };

                fetch('http://127.0.0.1:8000/api/product/removeProduct', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(product)
                }).then(function (response) {
                    return response.text();
                }).then(function (payload) {

                    var obj = JSON.parse(payload);

                    if (obj['result']) {
                        modShoppingCar(obj);
                    }
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Whoops!!',
                        text: err,
                        icon: 'error'
                    })
                });
                return true;
            }

            function addPromoCode() {
                var retCallBack = false;

                let promoCode = {
                    promoCode: document.getElementById('in_promoCode').value,
                };
                fetch('http://127.0.0.1:8000/api/product/addPromoCode', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(promoCode)
                }).then(function (response) {
                    return response.text();
                }).then(function (payload) {

                    var obj = JSON.parse(payload);

                    if (obj['result']) {
                        modShoppingCar(obj);
                    }
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Whoops!!',
                        text: err,
                        icon: 'error'
                    })
                });
                return true;
            }

            function getCustomEditText() {

                if (document.getElementById("matEditText").value.length > 0 && document.getElementById("matEditText").value.length <= 25) {

                    let matText = document.getElementById("matEditText").value;

                    if (document.getElementById('rb_Edit_top-left').checked) {
                        return 'TL-' + matText;
                    }
                    if (document.getElementById('rb_Edit_top-right').checked) {
                        return 'TR-' + matText;
                    }
                    if (document.getElementById('rb_Edit_bottom-left').checked) {
                        return 'BL-' + matText;
                    }
                    if (document.getElementById('rb_Edit_bottom-right').checked) {
                        return 'BR-' + matText;
                    }
                    if (document.getElementById('rb_Edit_centered').checked) {
                        return 'C-' + matText;
                    }
                    return '';
                }

                return null;
            }

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
                    return '';
                }

                return null;
            }

            function customEditTextLabel() {

                if (document.getElementById("matEditText").value.length > 0) {

                    document.getElementById("CustomTextRadioButtonsEdit").style.display = "block";

                    document.getElementById("divText_Edit_top-left").innerHTML = document.getElementById("matEditText").value;
                    document.getElementById("divText_Edit_top-right").innerHTML = document.getElementById("matEditText").value;
                    document.getElementById("divText_Edit_bottom-left").innerHTML = document.getElementById("matEditText").value;
                    document.getElementById("divText_Edit_bottom-right").innerHTML = document.getElementById("matEditText").value;
                    document.getElementById("divText_Edit_centered").innerHTML = document.getElementById("matEditText").value;

                } else {
                    document.getElementById("CustomTextRadioButtonsEdit").style.display = "none";

                    document.getElementById("divText_Edit_top-left").innerHTML = '';
                    document.getElementById("divText_Edit_top-right").innerHTML = '';
                    document.getElementById("divText_Edit_bottom-left").innerHTML = '';
                    document.getElementById("divText_Edit_bottom-right").innerHTML = '';
                    document.getElementById("divText_Edit_centered").innerHTML = '';
                }

                codeEditModify();
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

            function sl_OnChangeEdit(slComponent) {
                if (slComponent.value === 'SC' || slComponent.value === 'SM') {
                    document.getElementById(slComponent.id.replace('select_', 'img_')).src = '';
                } else {
                    document.getElementById(slComponent.id.replace('select_', 'img_')).src = slComponent.value;
                }
                codeEditModify();
            }

            function codeEditModify() {
                let select_Background = document.getElementById('select_Edit_Background');
                let select_Frame = document.getElementById('select_Edit_Frame');
                let select_Logo = document.getElementById('select_Edit_Logo');

                if (document.getElementById('matEditText').value.length > 0) {
                    document.getElementById('in_Edit_matCode').value = 'M-B' +
                        select_Background[select_Background.selectedIndex].id +
                        '-F' + select_Frame[select_Frame.selectedIndex].id +
                        '-L' + select_Logo[select_Logo.selectedIndex].id +
                        '-' + getCustomEditText();
                } else {
                    document.getElementById('in_Edit_matCode').value = 'M-B' +
                        select_Background[select_Background.selectedIndex].id +
                        '-F' + select_Frame[select_Frame.selectedIndex].id +
                        '-L' + select_Logo[select_Logo.selectedIndex].id;
                }
            }

            function codeModify() {
                let select_Background = document.getElementById('select_Background');
                let select_Frame = document.getElementById('select_Frame');
                let select_Logo = document.getElementById('select_Logo');

                if (document.getElementById('matText').value.length > 0) {
                    document.getElementById('in_matCode').value = 'M-B' +
                        select_Background[select_Background.selectedIndex].id +
                        '-F' + select_Frame[select_Frame.selectedIndex].id +
                        '-L' + select_Logo[select_Logo.selectedIndex].id +
                        '-' + getCustomText();
                } else {
                    document.getElementById('in_matCode').value = 'M-B' +
                        select_Background[select_Background.selectedIndex].id +
                        '-F' + select_Frame[select_Frame.selectedIndex].id +
                        '-L' + select_Logo[select_Logo.selectedIndex].id;
                }
            }

            function setSelectsByMatCode(obj) {

                $('#select_Background').val(obj['data']['matComponnentBackground']['fileName']);
                $('#select_Frame').val(obj['data']['matComponnentFrame']['fileName']);
                $('#select_Logo').val(obj['data']['matComponnentLogo']['fileName']);

                sl_OnChange(document.getElementById('select_Background'));
                sl_OnChange(document.getElementById('select_Frame'));
                sl_OnChange(document.getElementById('select_Logo'));

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

            function rbCustomEditTextPosition_Onchange(rbCustomText) {

                document.getElementById("divText_Edit_top-left").style.display = "none";
                document.getElementById("divText_Edit_top-right").style.display = "none";
                document.getElementById("divText_Edit_bottom-left").style.display = "none";
                document.getElementById("divText_Edit_bottom-right").style.display = "none";
                document.getElementById("divText_Edit_centered").style.display = "none";

                document.getElementById("divText_Edit_" + rbCustomText.id.replace('rb_Edit_', '')).style.display = "block";
                codeEditModify();

            }

            function setPromoCode(PromoCode) {

                $('#li_promoCode').remove();
                $('#ul_shoppingCar').append(
                    '<li id="li_promoCode" class="list-group-item d-flex justify-content-between bg-light">' +
                    '<div class="text-success">' +
                    '<h6 class="my-0">Promo code</h6>' +
                    '<small>' + PromoCode['code'] + '</small>' +
                    '</div>' +
                    '<span class="text-success">-' + PromoCode['type'] + PromoCode['value'] + '</span>' +
                    '</li>'
                );
            }

            function setShoppingCarItems(ShopigCar) {

                if (ShopigCar.length > 0) {
                    ShopigCar.forEach(product => (
                        $('#ul_shoppingCar').append(
                            '<li id="li_shoppingCar_' + product['id'] + '" class="list-group-item lh-condensed">' +
                            '<div class="row">' +
                            '<div class="col-8">' +
                            '<h6 class="my-0">Custom Mat</h6>' +
                            '<small class="">Code:</small> <small class="text-muted">' + product['matCode'] + '</small><br>' +
                            '<small class="">Custom Text:</small> <small class="text-muted">' + product['customMessage'] + '</small><br> ' +
                            '<button id="btn_product_View' + product['id'] + '" onclick="shoppingCarView(this)" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ModalPreview"><i class="fas fa-eye"></i></button>' +
                            /*TODO modificar para mandar solo el ID a las funciones*/
                            /*'<button id="btn_product_View' + product['id'] + '" onclick="shoppingCarView(product['id'])" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ModalPreview"><i class="fas fa-eye"></i></button>' +*/
                            '<button id="btn_product_Edit' + product['id'] + '" onclick="shoppingCarEdit(this)" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalModify"><i class="fas fa-pencil-alt"></i></button>' +
                            '<button id="btn_product_Delete' + product['id'] + '" onclick="shoppingCarDelete(this)" type="button" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>' +
                            '</div>' +
                            '<div class="col-4">' +
                            '<span class="text-muted d-flex justify-content-end">$' + product['price'] + '</span>' +
                            '</div>' +
                            '</div>' +
                            '</li>'
                        ))
                    );
                }

            }

            function setShoppingCarTotal(amount) {

                $('#ul_shoppingCar').append(
                    '<li id="div_TotalCar" class="list-group-item d-flex justify-content-between">' +
                    '<span>Total (USD)</span>' +
                    '<strong id="strong_totalPriceCar">$' + amount + '</strong>' +
                    '</li>'
                )
            }

            function shoppingCarView(button) {
                let product = {
                    id: button.id.replace('btn_product_View', '')
                };

                fetch('http://127.0.0.1:8000/api/product/preview', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(product)
                }).then(function (response) {
                    return response.text();
                }).then(function (payload) {

                    var obj = JSON.parse(payload);

                    if (obj.result) {

                        setPreview(obj);

                    } else {
                        Swal.fire({
                            title: 'Whoops!!',
                            text: 'Codigo de Producto no Valido: ' + obj.msg,
                            icon: 'error',
                            confirmButtonText: 'oh no'
                        })
                    }
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Whoops!!',
                        text: err,
                        icon: 'error'
                    })
                });

            }

            function setPreview(obj) {
                document.getElementById('img_Background_preview').src = obj['data']['matComponnentBackground']['fileName'];
                document.getElementById('img_Frame_preview').src = obj['data']['matComponnentFrame']['fileName'];
                document.getElementById('img_Logo_preview').src = obj['data']['matComponnentLogo']['fileName'];
                //code_preview
                document.getElementById('code_preview').innerText = obj['data']['matCode'];

            }

            function setPreview2Edit(obj) {

                document.getElementById('img_Edit_Background').src = obj['data']['matComponnentBackground']['fileName'];
                document.getElementById('img_Edit_Frame').src = obj['data']['matComponnentFrame']['fileName'];
                document.getElementById('img_Edit_Logo').src = obj['data']['matComponnentLogo']['fileName'];
                //code_preview
                document.getElementById('in_Edit_matCode').innerText = obj['data']['matCode'];

                $('#select_Edit_Background').val(obj['data']['matComponnentBackground']['fileName']);
                $('#select_Edit_Frame').val(obj['data']['matComponnentFrame']['fileName']);
                $('#select_Edit_Logo').val(obj['data']['matComponnentLogo']['fileName']);

                sl_OnChangeEdit(document.getElementById('select_Edit_Background'));
                sl_OnChangeEdit(document.getElementById('select_Edit_Frame'));
                sl_OnChangeEdit(document.getElementById('select_Edit_Logo'));

                document.getElementById("in_Edit_matCode").value = obj['data']['matCode'];
                //$data['matMsgPosition'] = $separeCode[4];
                document.getElementById("matEditText").value = '';
                document.getElementById("CustomTextRadioButtonsEdit").style.display = "none";
                document.getElementById("productIDEdit").innerText = obj['data']['id'];


                if (obj['data']['CustomMsg'] != null) {
                    document.getElementById("matEditText").value = obj['data']['CustomMsg'];
                    document.getElementById("CustomTextRadioButtonsEdit").style.display = "block";

                    switch (obj['data']['matMsgPosition']) {
                        case 'TL':
                            document.getElementById("rb_Edit_top-left").checked = true;
                            rbCustomEditTextPosition_Onchange(document.getElementById("rb_Edit_top-left"));
                            break;
                        case 'TR':
                            document.getElementById("rb_Edit_top-right").checked = true;
                            rbCustomEditTextPosition_Onchange(document.getElementById("rb_Edit_top-right"));
                            break;
                        case 'BL':
                            document.getElementById("rb_Edit_bottom-left").checked = true;
                            rbCustomEditTextPosition_Onchange(document.getElementById("rb_Edit_bottom-left"));
                            break;
                        case 'BR':
                            document.getElementById("rb_Edit_bottom-right").checked = true;
                            rbCustomEditTextPosition_Onchange(document.getElementById("rb_Edit_bottom-right"));
                            break;
                        case 'C':
                            document.getElementById("rb_Edit_centered").checked = true;
                            rbCustomEditTextPosition_Onchange(document.getElementById("rb_Edit_centered"));
                            break;
                    }
                }
                customEditTextLabel();


            }

            function shoppingCarEdit(button) {

                let product = {
                    id: button.id.replace('btn_product_Edit', '')
                };

                fetch('http://127.0.0.1:8000/api/product/preview', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(product)
                }).then(function (response) {
                    return response.text();
                }).then(function (payload) {

                    var obj = JSON.parse(payload);

                    if (obj.result) {

                        setPreview2Edit(obj);

                    } else {
                        Swal.fire({
                            title: 'Whoops!!',
                            text: 'Codigo de Producto no Valido: ' + obj.msg,
                            icon: 'error',
                            confirmButtonText: 'oh no'
                        })
                    }
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Whoops!!',
                        text: err,
                        icon: 'error'
                    })
                });
            }

            function LikeItscroll() {
                document.getElementById("checkout").scrollIntoView({
                    behavior: 'smooth'
                });
            }

            function sendEdit() {

                fetch('http://127.0.0.1:8000/api/product/editProduct', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                    body: JSON.stringify(product)
                }).then(function (response) {
                    return response.text();
                }).then(function (payload) {

                    var obj = JSON.parse(payload);

                    if (obj['result']) {
                        modShoppingCar(obj);
                    }
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Whoops!!',
                        text: err,
                        icon: 'error'
                    })
                });
                return true;

            }

            function checkout() {

                let userData = {
                    firsName: document.getElementById('firstName').value,
                    lastName: document.getElementById('lastName').value,
                    email: document.getElementById('email').value,
                    phone: document.getElementById('phone').value,
                    addres: document.getElementById('address').value,
                    country: document.getElementById('country').value,
                    state: document.getElementById('state').value,
                    city: document.getElementById('city').value,
                    zipCode: document.getElementById('zipCode').value,
                    shippingMethod: document.getElementById('firstName').value,
                    paymentMethod: document.getElementById('firstName').value,
                };

                console.log(userData);

                fetch('/api/product/checkout', {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        credentials: 'include'
                    },
                }).then(function (response) {
                    return response.text();
                }).then(function (payload) {
                    var obj = JSON.parse(payload);

                    if (obj['result']) {
                        window.location.href = "success";
                    }
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Whoops!!',
                        text: err,
                        icon: 'error'
                    })
                });
                return true;
            }


            function formatPhoneNumber(phoneNumberString) {
                var cleaned = ('' + phoneNumberString).replace(/\D/g, '');
                var match = cleaned.match(/^(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3,4})([-\s\.]?[0-9]{3,4})$/);
                if (match) {
                    return '(' + match[1] + ') ' + match[2] + '-' + match[3];
                }
                return null;
            }



            /////////////////////////////////////////////////////////////////
            paypal.Buttons({

                // Set your environment
                env: 'sandbox',

                // Set style of buttons
                style: {
                    layout: 'vertical',   // horizontal | vertical
                    size:   'responsive',   // medium | large | responsive
                    shape:  'pill',         // pill | rect
                    color:  'gold',         // gold | blue | silver | black,
                    fundingicons: false,    // true | false,
                    tagline: false          // true | false,
                },

                // Wait for the PayPal button to be clicked
                createOrder: function() {
                    let formData = new FormData();
                    formData.append('item_amt', document.getElementById("camera_amount").value);
                    formData.append('tax_amt', document.getElementById("tax_amt").value);
                    formData.append('handling_fee', document.getElementById("handling_fee").value);
                    formData.append('insurance_fee', document.getElementById("insurance_fee").value);
                    formData.append('shipping_amt', document.getElementById("shipping_amt").value);
                    formData.append('shipping_discount', document.getElementById("shipping_discount").value);
                    formData.append('total_amt', document.getElementById("total_amt").value);
                    formData.append('currency', document.getElementById("currency_Code").value);
                    formData.append('return_url',  '<?= $baseUrl.URL["redirectUrls"]["returnUrl"]?>' + '?commit=true');
                    formData.append('cancel_url', '<?= $baseUrl.URL["redirectUrls"]["cancelUrl"]?>');

                    return fetch(
                        '<?= $rootPath.URL['services']['orderCreate']?>',
                        {
                            method: 'POST',
                            body: formData
                        }
                    ).then(function(response) {
                        return response.json();
                    }).then(function(resJson) {
                        console.log('Order ID: '+ resJson.data.id);
                        return resJson.data.id;
                    });
                },

                // Wait for the payment to be authorized by the customer
                onApprove: function(data, actions) {
                    return fetch(
                        '<?= $rootPath.URL['services']['orderGet'] ?>',
                        {
                            method: 'GET'
                        }
                    ).then(function(res) {
                        return res.json();
                    }).then(function(res) {
                        window.location.href = 'pages/success.php';
                    });
                }

            }).render('#paypalCheckoutContainer');







        </script>
    @endsection
</x-app-layout>
