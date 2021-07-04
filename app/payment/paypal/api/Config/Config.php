<?php

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