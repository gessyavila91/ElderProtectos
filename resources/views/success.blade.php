<?php

use App\Models\matComponent;
use App\Models\Config;
use Illuminate\Support\Facades\Session;

session_start();
/*
$matComponents = matComponent::where('enable', 1)->get();
$countryList = Config::where('ConfigName', 'countryList')->get();


$urlCurrent = config('payment.paypal.URL.current');

$baseUrl = config('payment.paypal.URL.current');*/
$rootPath = "";

/*$return_url = config('payment.paypal.URL.redirectUrls.returnUrl');
$cancel_url = config('payment.paypal.URL.redirectUrls.cancelUrl');

$orderCreate = config('payment.paypal.URL.services.orderCreate');
$orderGet = config('payment.paypal.URL.services.orderGet');*/
/*if (isset($_SESSION['order_id']) ){
    var_dump($_SESSION['order_id']);
}*/




?>

<x-app-layout>

    @section('content')
        <head>
            <title>{{ config('app.name') }} - Custom Mat Maker</title>

            <script src="https://www.paypal.com/sdk/js?client-id=sb&intent=capture&vault=false&commit=true<?php echo isset($_GET['buyer-country']) ? "&buyer-country=".$_GET['buyer-country'] : "" ?>"></script>
            <!-- paypal -->
            <script src="{{asset('js/config.js')}}"></script>
            <meta name="csrf-token" content="{{ csrf_token() }}">
        </head>



        <!-- HTML Content -->
            <div class="row-fluid">
                <!-- Middle Section -->
                <div class="col-sm-offset-3 col-md-4">
                    <div id="loadingAlert"
                         class="card"
                         style="display: none;">
                        <div class="card-body">
                            <div class="alert alert-info block"
                                 role="alert">
                                Loading....
                            </div>
                        </div>
                    </div>
                    <form id="orderConfirm"
                          class="form-horizontal"
                          style="display: none;">
                        <h3>Your payment is authorized.</h3>
                        <h4>Confirm the order to execute</h4>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Shipping Information</label>
                            <div class="col-sm-7">
                                <p id="confirmRecipient"></p>
                                <p id="confirmAddressLine1"></p>
                                <p id="confirmAddressLine2"></p>
                                <p>
                                    <span id="confirmCity"></span>,
                                    <span id="confirmState"></span> - <span id="confirmZip"></span>
                                </p>
                                <p id="confirmCountry"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="shippingMethod" class="col-sm-5 control-label">Shipping Type</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="shippingMethod" id="shippingMethod">
                                    <optgroup label="United Parcel Service" style="font-style:normal;">
                                        <option value="8.00">
                                            Worldwide Expedited - $8.00</option>
                                        <option value="4.00">
                                            Worldwide Express Saver - $4.00</option>
                                    </optgroup>
                                    <optgroup label="Flat Rate" style="font-style:normal;">
                                        <option value="2.00" selected>
                                            Fixed - $2.00</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-7">
                                <label class="btn btn-primary" id="confirmButton">Complete Payment</label>
                            </div>
                        </div>
                    </form>
                    <form id="orderView"
                          class="form-horizontal"
                          style="display: none;">
                        <h3>Your payment is complete</h3>
                        <h4>
                            <span id="viewFirstName"></span>
                            <span id="viewLastName"></span>,
                            Thank you for your Order
                        </h4>
                        <hr>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Shipping Details</label>
                                <div class="col-sm-7">
                                    <p id="viewRecipientName"></p>
                                    <p id="viewAddressLine1"></p>
                                    <p id="viewAddressLine2"></p>
                                    <p>
                                        <span id="viewCity"></span>,
                                        <span id="viewState"></span> - <span id="viewPostalCode"></span>
                                    </p>
                                    <p id="confirmCountry"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Transaction Details</label>
                                <div class="col-sm-7">
                                    <p>Transaction ID: <span id="viewTransactionID"></span></p>
                                    <p>Payment Total Amount: <span id="viewFinalAmount"></span> </p>
                                    <p>Currency Code: <span id="viewCurrency"></span></p>
                                    <p>Payment Status: <span id="viewPaymentState"></span></p>
                                    <p id="transactionType">Payment Type: <span id="viewTransactionType"></span> </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3> Click <a href='../index.php'>here </a> to return to Home Page</h3>
                    </form>
                </div>
            </div>

            <!-- PayPal In-Context Checkout script -->
            <script type="text/javascript">
                showDom('loadingAlert');

                document.onreadystatechange = function(){

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
                    //console.log(res);
                    let shipping = res.purchase_units[0].shipping;
                    let shipping_address = shipping.address;
                    //console.log('Get Order result' + JSON.stringify(res));
                    //console.log('shipping add' + JSON.stringify(shipping));
                    document.getElementById('confirmRecipient').innerText = shipping.name.full_name;
                    document.getElementById('confirmAddressLine1').innerText = shipping_address.address_line_1;
                    if(shipping_address.address_line_2)
                        document.getElementById('confirmAddressLine2').innerText = shipping_address.address_line_1;
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

                        //console.log('patch data: '+ JSON.stringify(postPatchOrderData));
                        // Execute the payment
                        hideDom('confirmButton');
                        showDom('loadingAlert');

                        //console.log('Current shipping '+ currentShipping + ' and updated shipping is '+ updatedShipping);

                        if(currentShipping == updatedShipping) {
                            return callPaymentCapture();
                        } else {
                            $.ajax({
                                type: 'POST',
                                url: 'api/payment/paypal/patchOrder',
                                data: postPatchOrderData,
                                success: function (response) {
                                    let obj = JSON.parse(response);
                                    console.log('Patch Order Response : '+ JSON.stringify( obj));
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

                function callPaymentCapture(){
                    $.ajax({
                        type: 'POST',
                        url: 'api/payment/paypal/captureOrder',
                        success: function (response) {
                            let obj = JSON.parse(response);
                            hideDom('orderConfirm');
                            hideDom('loadingAlert');
                            console.log('Capture Response : '+ JSON.stringify(obj));
                            if (obj.ack)
                                showPaymentExecute(obj.data);
                            else
                                alert("Something went wrong");
                        }
                    });
                }

                function showPaymentExecute(result) {

                    let payerInfo = result.payer,
                        shipping = result.purchase_units[0].shipping;

                    document.getElementById('viewFirstName').textContent = payerInfo.name.given_name;
                    document.getElementById('viewLastName').textContent = payerInfo.name.surname;
                    document.getElementById('viewRecipientName').textContent = shipping.name.full_name;
                    document.getElementById('viewAddressLine1').textContent = shipping.address.address_line_1;
                    if(shipping.address.address_line_2)
                        document.getElementById('viewAddressLine2').textContent = shipping.address.address_line_2;
                    else
                        document.getElementById('viewAddressLine2').textContent = "";
                    document.getElementById('viewCity').textContent = shipping.address.admin_area_2;
                    document.getElementById('viewState').textContent = shipping.address.admin_area_1;
                    document.getElementById('viewPostalCode').innerHTML = shipping.address.postal_code;
                    document.getElementById('viewTransactionID').textContent = result.id;
                    if(result.purchase_units[0].payments && result.purchase_units[0].payments.captures) {
                        document.getElementById('viewFinalAmount').textContent = result.purchase_units[0].payments.captures[0].amount.value;
                        document.getElementById('viewCurrency').textContent = result.purchase_units[0].payments.captures[0].amount.currency_code;
                    }else {
                        document.getElementById('viewFinalAmount').textContent = result.purchase_units[0].amount.value;
                        document.getElementById('viewCurrency').textContent = result.purchase_units[0].amount.currency_code;
                    }
                    document.getElementById('viewPaymentState').textContent = result.status;
                    if(result.intent) {
                        document.getElementById('viewTransactionType').textContent = result.intent;
                        document.getElementById('transactionType').style.display='block';
                    } else {
                        document.getElementById('transactionType').style.display='none';
                    }
                    hideDom('orderConfirm');
                    hideDom('loadingAlert');
                    showDom('orderView');
                }

            </script>

    @endsection
</x-app-layout>