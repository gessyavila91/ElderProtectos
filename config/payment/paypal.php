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
            "client_id" => env('CLIENT_ID_SANDBOX','AdCqqqwhuaYRXlrqYMvzRdioSytnUjpHQL8EyjRMcFCGdVm1Vt9tZjqttHaNdYzJmlZr9WEMSfMvNa6Q'),
            "client_secret" => env('CLIENT_SECRET_SANDBOX','ENkA9oML9LtsqroGe8tfARGrXIMahN2ya06BJ0P7_m4u5bQd1-svEVZv_F_8zGCj8SyQa-B0ZxkE7CeM')
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