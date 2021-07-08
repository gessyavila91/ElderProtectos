<?php

if(isset($_SERVER['SERVER_NAME'])) {
    $url = @($_SERVER["HTTPS"] != 'on') ? 'http://' . $_SERVER["SERVER_NAME"] : 'https://' . $_SERVER["SERVER_NAME"];
    $url .= ($_SERVER["SERVER_PORT"] !== 80) ? ":" . $_SERVER["SERVER_PORT"] : "";
    //$url .= $_SERVER["REQUEST_URI"];
}
else {
    $url = "";
}

return[

    /*
    |--------------------------------------------------------------------------
    | URL
    |--------------------------------------------------------------------------
    |
    |
    */
    //TODO esto se agrega mejor a las vistas, revisar el mejor uso posible?
    'URL' => [
        "current" => $url,

        'services' => [
            'orderCreate' =>  'api/payment/paypal/createOrder',
            'orderGet' =>     'api/payment/paypal/getOrderDetails',
            'orderPatch' =>   'api/payment/paypal/patchOrder',
            'orderCapture' => 'api/payment/paypal/captureOrder'
        ],
        'redirectUrls' =>[
            'returnUrl' => '/checkout',
            'cancelUrl' => '/cancel'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | PAYPAL_ENVIRONMENT
    |--------------------------------------------------------------------------
    | PayPal Environment
    |
    */
    'PAYPAL_ENVIRONMENT' => env('PAYPAL_ENVIRONMENT', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | PAYPAL_ENDPOINTS
    |--------------------------------------------------------------------------
    | PayPal REST API endpoints
    |
    */
    'PAYPAL_ENDPOINTS' => [
        'sandbox' => 'https://api.sandbox.paypal.com',
        'production' =>  'https://api.paypal.com',
    ],

    /*
    |--------------------------------------------------------------------------
    | PAYPAL_CREDENTIALS
    |--------------------------------------------------------------------------
    | PayPal REST App credentials
    |
    */
    'PAYPAL_CREDENTIALS' =>[
        "sandbox" => [
            "client_id" => env('CLIENT_ID_SANDBOX','AaWBJr8sPzgl9v7FPLJHb79O0MyT2KTCCkbrGNy-oe0cMYcY8CQgEmwkZ1QQaE_GWwdVVHxvl9tuWRm0'),
            "client_secret" => env('CLIENT_SECRET_SANDBOX','EHHqnWH0r7xfwa8s6WSv7CyEXftl4oDqdeon-w97ksHuuWhEpeKITE3ZfEzkwZJiVgZDxUUf3EwD7ipd')
        ],
        "production" => [
            "client_id" => env('CLIENT_ID_PRODUCTION'),
            "client_secret" => env('CLIENT_SECRET_PRODUCTION')
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | PAYPAL_REST_VERSION
    |--------------------------------------------------------------------------
    | PayPal REST API version
    |
    */
    'PAYPAL_REST_VERSION' => 'v2',

    /*
    |--------------------------------------------------------------------------
    | SBN_CODE
    |--------------------------------------------------------------------------
    | ButtonSource Tracker Code
    |
    */
    'SBN_CODE' => 'PP-DemoPortal-EC-Psdk-ORDv2-php',

];