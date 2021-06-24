<?php

if(isset($_SERVER['SERVER_NAME'])) {
    $url = @($_SERVER["HTTPS"] != 'on') ? 'http://' . $_SERVER["SERVER_NAME"] : 'https://' . $_SERVER["SERVER_NAME"];
    $url .= ($_SERVER["SERVER_PORT"] !== 80) ? ":" . $_SERVER["SERVER_PORT"] : "";
    $url .= $_SERVER["REQUEST_URI"];
}
else {
    $url = "localhost:8000";
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
            'orderCreate' =>  'api/createOrder.php',
            'orderGet' =>     'api/getOrderDetails.php',
            'orderPatch' =>   'api/patchOrder.php',
            'orderCapture' => 'api/captureOrder.php'
        ],
        'redirectUrls' =>[
            'returnUrl' => 'pages/success.php',
            'cancelUrl' => 'pages/cancel.php'
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
            "client_id" => env('CLIENT_ID_SANDBOX' ),
            "client_secret" => env('CLIENT_SECRET_SANDBOX')
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