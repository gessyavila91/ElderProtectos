<?php

use App\Models\matComponent;
use App\Models\Config;
use Illuminate\Support\Facades\Session;

session_start();

$rootPath = "";

?>

<x-app-layout>

    @section('content')
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <title>{{ config('app.name') }} - Checkout</title>

            <script src="https://www.paypal.com/sdk/js?client-id=sb&intent=capture&vault=false&commit=true<?php echo isset($_GET['buyer-country']) ? "&buyer-country=".$_GET['buyer-country'] : "" ?>"></script>
            <!-- paypal -->
            <script src="{{asset('js/config.js')}}"></script>
            <meta name="csrf-token" content="{{ csrf_token() }}">
        </head>

        <style>
            .intro {
                width: 100%;
                color: #ffffff;
                text-align: center;
            }

            .spinner {
                -webkit-animation: rotator 1.4s linear infinite;
                animation: rotator 1.4s linear infinite;
            }

            @-webkit-keyframes rotator {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(270deg);
                }
            }

            @keyframes rotator {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(270deg);
                }
            }

            .path {
                stroke-dasharray: 187;
                stroke-dashoffset: 0;
                transform-origin: center;
                -webkit-animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
                animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
            }

            @-webkit-keyframes colors {
                0% {
                    stroke: #4285F4;
                }
                25% {
                    stroke: #4fd7de;
                }
                50% {
                    stroke: #a687ff;
                }
                75% {
                    stroke: #6a3a9a;
                }
                100% {
                    stroke: #4285F4;
                }
            }

            @keyframes colors {
                0% {
                    stroke: #4285F4;
                }
                25% {
                    stroke: #4fd7de;
                }
                50% {
                    stroke: #a687ff;
                }
                75% {
                    stroke: #6a3a9a;
                }
                100% {
                    stroke: #4285F4;
                }
            }

            @-webkit-keyframes dash {
                0% {
                    stroke-dashoffset: 187;
                }
                50% {
                    stroke-dashoffset: 46.75;
                    transform: rotate(135deg);
                }
                100% {
                    stroke-dashoffset: 187;
                    transform: rotate(450deg);
                }
            }

            @keyframes dash {
                0% {
                    stroke-dashoffset: 187;
                }
                50% {
                    stroke-dashoffset: 46.75;
                    transform: rotate(135deg);
                }
                100% {
                    stroke-dashoffset: 187;
                    transform: rotate(450deg);
                }
            }
        </style>


        <body>

        <div class="container">

            <div
                    class="intro"
                    style="top: 40%; "
                    id="loadingAlert">

                <svg class="spinner" width="30px" height="30px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle class="path" fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33"
                            r="30"></circle>
                </svg>
                <br><br>
                <svg viewbox="0 0 100 20" class="animated fadeIn slower" style="width: 250px;">
                    <defs>
                        <linearGradient id="gradient" x1="0" x2="0" y1="0" y2="1">
                            <stop offset="5%" stop-color="#326384"/>
                            <stop offset="95%" stop-color="#51FFCF"/>
                        </linearGradient>
                        <pattern id="wave" x="0" y="0" width="120" height="20" patternUnits="userSpaceOnUse">
                            <path id="wavePath"
                                  d="M-40 9 Q-30 7 -20 9 T0 9 T20 9 T40 9 T60 9 T80 9 T100 9 T120 9 V20 H-40z"
                                  mask="url(#mask)" fill="url(#gradient)">
                                <animateTransform
                                        attributeName="transform"
                                        begin="0s"
                                        dur="5.5s"
                                        type="translate"
                                        from="0,0"
                                        to="40,0"
                                        repeatCount="indefinite">
                            </path>
                        </pattern>
                    </defs>
                    <text text-anchor="middle" x="50" y="15" font-size="17" fill="url(#wave)" fill-opacity="0.6">
                        LOADING
                    </text>
                    <text text-anchor="middle" x="50" y="15" font-size="17" fill="url(#gradient)" fill-opacity="0.1">
                        LOADING
                    </text>
                </svg>
            </div>


            <form id="orderConfirm"
                  class="form-horizontal"
                  style="display: none;">

                <div class="row gutters-sm px-3 py-3 pb-md-4 ">
                    <div class="col-md-4 mb-3">

                        <div class="card">
                            <div class="card-header">Preview</div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="assets/img/customMat/fondo1.png" width="200rem" alt="Preview">

                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">Shipping Info</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fas fa-signature"></i>
                                    </div>
                                    <div id="confirmRecipient" class="col-sm-9 text-secondary">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div id="confirm_email_address" class="col-sm-9 text-secondary">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        (239) 816-9029
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p id="confirmAddressLine1"></p>
                                        <p id="confirmAddressLine2"></p>
                                        <p>
                                            <span id="confirmCity"></span>,
                                            <span id="confirmState"></span> - <span id="confirmZip"></span>
                                        </p>
                                        <p id="confirmCountry"></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-header">Purchase</div>
                            <div class="card-body">
                                <table class="table table-hover text-sm text-muted">
                                    <thead>
                                    <tr>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col" class="text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody_table">


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td></td>
                                        <th scope="row"></th>
                                        <td class="text-right text-sm ">Total Amount:</td>
                                        <td id="total-amount" class="text-right font-weight-bold "></td>
                                    </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>


                        <div class="row gutters-sm">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header bg-white">

                                        <div class="tab-content">

                                            <div class="form-group">
                                                <label for="shippingMethod" class="control-label">Shipping
                                                    Type</label>

                                                <select class="form-control" name="shippingMethod"
                                                        id="shippingMethod">
                                                    <optgroup label="United Parcel Service"
                                                              style="font-style:normal;">
                                                        <option value="50.00">
                                                            Estados Unidos - $50.00
                                                        </option>
                                                        <option value="12.00">
                                                            Mexico - $12.00
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="Flat Rate" style="font-style:normal;">
                                                        <option value="0.00" selected>
                                                            Free - $0.00
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>

                                            <hr>

                                            <label class="btn btn-primary btn-lg" id="confirmButton">Complete
                                                Payment</label>
                                            <!-- End -->
                                        </div>
                                        <br>
                                        <p class="text-muted">Note: After clicking on the button, you will be directed
                                            to a secure gateway for payment. After completing the payment process, you
                                            will be redirected back to the website to view details of your order. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
            <div id="orderView"
                 class="form-horizontal"
                 style="display: none;">

                <div class="jumbotron alert-success mt-5">
                    <h1 class="display-4">Success, purchase has be made!</h1>
                    <p class="lead">Your purchase has been successfully made, you can verify the status of your order
                        from your account, or looking for the purchase number in our search engine.</p>
                    <hr class="my-4">
                    <p>Your purchase number is:<span class="badge badge-pill badge-success"><a
                                    id="viewTransactionID"></a></span></p>
                    <p>We mail all information, but you can always check your account.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">My account</a> <a
                            class="btn btn-secondary btn-lg" href="#" role="button">Search</a>
                </div>

            </div>

        </div>
        </body>
        <!-- PayPal In-Context Checkout script -->
        <script type="text/javascript">
            showDom('loadingAlert');

            document.onreadystatechange = function () {

                if (document.readyState === 'complete') {
                    $.ajax({
                        type: 'POST',
                        url: 'api/payment/paypal/getOrderDetails',
                        success: function (response) {
                            let obj = JSON.parse(response);
                            //console.log(obj.ack);
                            hideDom('loadingAlert');
                            if (obj.ack) {
                                //console.log(obj);
                                console.log(getUrlParams('commit'));

                                //showPaymentExecute(obj.data);
                                showPaymentGet(obj.data);

                                /*if(getUrlParams('commit') === 'true') {
                                    showPaymentExecute(response.data);
                                } else {
                                    console.log(response);
                                    showPaymentGet(response.data);
                                }*/
                            } else {
                                alert('Something went wrong');
                            }
                        }
                    });
                }
            }

            function showPaymentGet(res) {
                console.log(res);
                let shipping = res.purchase_units[0].shipping;
                let item = res.purchase_units[0].items;
                setItems(item);

                let amount = res.purchase_units[0].amount;
                let discount = res.purchase_units[0].amount.breakdown;
                setDiscounts(discount)

                let shipping_address = shipping.address;
                let confirm_email_address = res.payer.email_address;
                console.log('Get Order result' + JSON.stringify(res));
                console.log('shipping add' + JSON.stringify(shipping));
                document.getElementById('confirmRecipient').innerText = shipping.name.full_name;
                document.getElementById('confirmAddressLine1').innerText = shipping_address.address_line_1;

                document.getElementById('total-amount').innerText = "$" + amount.value;

                document.getElementById('confirm_email_address').innerText = confirm_email_address;
                if (shipping_address.address_line_2)
                    document.getElementById('confirmAddressLine2').innerText = shipping_address.address_line_2;
                else
                    document.getElementById('confirmAddressLine2').innerText = "";
                document.getElementById('confirmCity').innerText = shipping_address.admin_area_2;
                document.getElementById('confirmState').innerText = shipping_address.admin_area_1;
                document.getElementById('confirmZip').innerText = shipping_address.postal_code;
                document.getElementById('confirmCountry').innerText = shipping_address.country_code;

                showDom('orderConfirm');

                // Listen for click on confirm button
                document.querySelector('#confirmButton').addEventListener('click', function () {
                    let shippingMethodSelect = document.getElementById("shippingMethod"),
                        updatedShipping = shippingMethodSelect.options[shippingMethodSelect.selectedIndex].value,
                        currentShipping = res.purchase_units[0].amount.breakdown.shipping.value;

                    let postPatchOrderData = {
                        "order_id": res.id,
                        "item_amt": res.purchase_units[0].amount.breakdown.item_total.value,
                        "tax_amt": res.purchase_units[0].amount.breakdown.tax_total.value,
                        "handling_fee": res.purchase_units[0].amount.breakdown.handling.value,
                        "insurance_fee": res.purchase_units[0].amount.breakdown.insurance.value,
                        "shipping_discount": res.purchase_units[0].amount.breakdown.shipping_discount.value,
                        "total_amt": res.purchase_units[0].amount.value,
                        "currency": res.purchase_units[0].amount.currency_code,
                        "updated_shipping": updatedShipping,
                        "current_shipping": currentShipping
                    };

                    hideDom('confirmButton');
                    showDom('loadingAlert');

                    if (currentShipping == updatedShipping) {
                        return callPaymentCapture();
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: 'api/payment/paypal/patchOrder',
                            data: postPatchOrderData,
                            success: function (response) {
                                let obj = JSON.parse(response);
                                console.log('Patch Order Response : ' + JSON.stringify(obj));
                                //TODO save this obj
                                //console.log(obj.ack);
                                if (obj.ack)
                                    return callPaymentCapture();
                                else
                                    alert("Something went wrong");
                            }
                        });
                    }
                });
            }

            function setItems(items) {

                if (items.length > 0) {
                    items.forEach(product => (
                        $('#tbody_table').append(
                            ' <tr > ' +
                            '     <td> ' +
                            '         <button class="btn btn-outline-primary" type="button" ><i ' +
                            '             class="far fa-eye"></i></button> ' +
                            '     </td> ' +
                            '     <th scope="row">' + product["name"] + '</th> ' +
                            '     <td>' + product["quantity"] + '</td> ' +
                            '     <td class="text-right">' + product["unit_amount"]["value"] + '</td> ' +
                            ' </tr> '
                        ))
                    );
                }
            }

            function setDiscounts(discount) {

                if (discount["discount"]["value"] > 0) {
                    $('#tbody_table').append(
                        ' <tr > ' +
                        '     <td></td> ' +
                        '     <th class="text-right"scope="row">Discount</th> ' +
                        '     <td></td> ' +
                        '     <td class="text-right table-success">$-' + discount["discount"]["value"] + '</td> ' +
                        ' </tr> '
                    )
                }

            }

            function callPaymentCapture() {
                $.ajax({
                    type: 'POST',
                    url: 'api/payment/paypal/captureOrder',
                    success: function (response) {
                        let obj = JSON.parse(response);
                        hideDom('orderConfirm');
                        hideDom('loadingAlert');
                        console.log('Capture Response : ' + JSON.stringify(obj));
                        //TODO save this obj
                        if (obj.ack)
                            showPaymentExecute(obj.data);
                        else
                            alert("Something went wrong");
                    }
                });
            }

            function showPaymentExecute(result) {

                document.getElementById('viewTransactionID').textContent = result.id;

                hideDom('orderConfirm');
                hideDom('loadingAlert');
                showDom('orderView');
            }

        </script>

    @endsection
</x-app-layout>