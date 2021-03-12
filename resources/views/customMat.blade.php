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
        </head>

        <style>
            .container1 {
                position: relative;
            }

            .playmatPreview {
                position: absolute;
                top: 0px;
            }
            /*Small*/
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
            /*Medium*/
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
            /*Large 990*/
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
                        <div class="card-body ">
                            <div class="container1">
                                <block style="text-align: center;">
                                    <img class="fondo" id="fondo"
                                         src="{{asset('assets/img/customMat/AppImg/fondo1.png')}}"
                                         alt=""/>
                                    <img class="playmatPreview" id="marco"
                                         src="{{asset('assets/img/customMat/AppImg/marco1.png')}}"
                                         alt=""/>
                                    <img class="playmatPreview" id="centro"
                                         src="{{asset('assets/img/customMat/AppImg/centro1.png')}}"
                                         alt=""/>
                                    <div class="top-left">TL12345678901234567890123</div>
                                    <div class="bottom-left">BL12345678901234567890123</div>
                                    <div class="top-right">TR12345678901234567890123</div>
                                    <div class="bottom-right">BR12345678901234567890123</div>
                                    <div class="centered">C12345678901234567890123</div>

                                </block>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-5 ">
                <form>
                    <select id="selectFondo" class="custom-select d-block w-100"
                            onchange="document.getElementById('fondo').src = this.value"
                            name="selectFondo">
                        <option value="{{asset('assets/img/customMat/AppImg/fondo1.png')}}">fondo1</option>
                        <option value="{{asset('assets/img/customMat/AppImg/fondo2.png')}}">fondo2</option>
                    </select>
                    </br>
                    <select id="selecMarco" class="custom-select d-block w-100"
                            onchange="document.getElementById('marco').src = this.value"
                            name="selectMarco">

                        <option value="{{asset('assets/img/customMat/AppImg/marco1.png')}}">marco1</option>
                        <option value="{{asset('assets/img/customMat/AppImg/marco2.png')}}">marco2</option>
                        <option value="SM">SM</option>

                    </select>
                    </br>
                    <select id="selecCentro" class="custom-select d-block w-100"
                            onchange="document.getElementById('centro').src = this.value"
                            name="selectCentro">

                        <option value="{{asset('assets/img/customMat/AppImg/centro1.png')}}">centro1</option>
                        <option value="{{asset('assets/img/customMat/AppImg/centro2.png')}}">centro2</option>
                        <option value="SC" selected>SC</option>

                    </select>



                    <div class="d-block my-3">
                        <div class="form-check">
                            <input id="flexRadioDefault0" class="form-check-input" type="radio" name="textPosition">
                            <label class="form-check-label" for="textPosition1">
                                SinTexto
                            </label>
                        </div>
                        <div class="form-check">
                            <input id="flexRadioDefault1" class="form-check-input" type="radio" name="textPosition">
                            <label class="form-check-label" for="textPosition1">
                                TopLeft
                            </label>
                        </div>
                        <div class="form-check">
                            <input id="flexRadioDefault2" class="form-check-input" type="radio" name="textPosition">
                            <label class="form-check-label" for="textPosition2">
                                TopRight
                            </label>
                        </div>
                        <div class="form-check">
                            <input id="flexRadioDefault3" class="form-check-input" type="radio" name="textPosition">
                            <label class="form-check-label" for="textPosition3">
                                BottomLeft
                            </label>
                        </div>
                        <div class="form-check">
                            <input id="flexRadioDefault4" class="form-check-input" type="radio" name="textPosition">
                            <label class="form-check-label" for="textPosition4">
                                BottomRight
                            </label>
                        </div>
                    </div>
                    <div class="d-block my-3">
                        <label for="matText">Mat Text</label>
                        <input id="matText" type="text" class="form-control" placeholder="">
                    </div>

                    </br></br>
                    <button onclick="scrollcheckout()" type="button" class="w-100 btn btn-lg btn-outline-primary">
                        i like it!
                    </button>
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
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Custom Mat de Ruben</h6>
                                <small class="text-muted">Code: asdasdagvsesdfdasc</small>
                            </div>
                            <span class="text-muted">$70</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Second product</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Second product</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Second product</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Second product</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Third item</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">-$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
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
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my
                                billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next
                                time</label>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"
                                       checked required>
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                       required>
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                       required>
                                <label class="custom-control-label" for="paypal">PayPal</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-cvv">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Security code required
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
            function scrollcheckout() {
                var elmnt = document.getElementById("checkout");
                elmnt.scrollIntoView({
                    behavior: 'smooth'
                });

            }
        </script>
    @endsection
</x-app-layout>
