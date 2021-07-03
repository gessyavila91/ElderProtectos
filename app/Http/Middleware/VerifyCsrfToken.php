<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        "api/payment/paypal/createOrder",
        "api/payment/paypal/getOrderDetails",
        "api/payment/paypal/patchOrder",
        "api/payment/paypal/captureOrder"

    ];
}
