<?php


namespace App\payment\paypal\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\payment\paypal\Helpers\PaypalHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class PaypalController extends Controller {

    public function captureOrder(request $request) {
        $paypalHelper = new PayPalHelper;

        header('Content-Type: application/json');
        return json_encode($paypalHelper->orderCapture());
    }


    public function patchOrder(request $request) {

        $paypalHelper = new PaypalHelper();

        $orderData = array();

        if(array_key_exists('updated_shipping', $_POST)) {
            $finalTotal = floatval($_POST['total_amt']) + (floatval($_POST['updated_shipping']) - floatval($_POST['current_shipping']));

            $orderData = '[ {
              "op" : "replace",
              "path" : "/purchase_units/@reference_id==\'PU1\'/amount",
              "value" : {
                "currency_code" : "USD",
                "value" : "320",
                "breakdown" : {
                  "item_total" : {
                    "currency_code" : "USD",
                    "value" : "300"
                  },
                  "shipping" : {
                    "currency_code" : "USD",
                    "value" : "0"
                  },
                  "tax_total" : {
                    "currency_code" : "USD",
                    "value" : "0"
                  },
                  "shipping_discount" : {
                    "currency_code" : "USD",
                    "value" : "0"
                  },
                  "handling" : {
                    "currency_code" : "USD",
                    "value" : "0"
                  },
                  "insurance" : {
                    "currency_code" : "USD",
                    "value" : "20"
                  }
                }
              }       
            }]';
        }

        header('Content-Type: application/json');
        echo json_encode($paypalHelper->orderPatch($orderData));

    }

    public function getOrderDetails(Request $request) {
        $paypalHelper = new PayPalHelper;

        header('Content-Type: application/json');
        return json_encode($paypalHelper->orderGet());
    }

    public function createOrder(Request $request) {

        $paypalHelper = new PaypalHelper();

        $randNo = (string)rand(10000, 20000);

        $orderData = '{
            "intent" : "CAPTURE",
            "application_context" : {
                "return_url" : "",
                "cancel_url" : "",
                "shipping_preference":"SET_PROVIDED_ADDRESS",
                "user_action":"PAY_NOW"
            },
            "purchase_units" : [ 
                {
                    "reference_id" : "CSEP",
                    "description" : "Elder Protectors - Custom Shop",
                    "invoice_id" : "IEP-'.$randNo.'",
                    "custom_id" : "EP-'.$randNo.'",
                    "amount" : {
                        "currency_code" : "USD",
                        "value":"200",
                        "breakdown" : {
                            "item_total" : {
                                "currency_code" : "USD",
                                "value" : "210"
                            },
                            "shipping" : {
                                "currency_code" : "USD",
                                "value" : "0"
                            },
                            "tax_total" : {
                                "currency_code" : "USD",
                                "value" : "0"
                            },
                            "handling" : {
                                "currency_code" : "USD",
                                "value" : "0"
                            },
                            "shipping_discount" : {
                                "currency_code" : "USD",
                                "value" : "0"
                            },
                            "insurance" : {
                                "currency_code" : "USD",
                                "value" : "0"
                            },
                            "discount" : {
                                "currency_code" : "USD",
                                "value" : "10"
                            }
                        }
                    },
                    "items" : [
                        {
                            "name":"Custom Playmat",
                            "description":"M-BBRW-FELD-LCHDRG Custom Text TL-This is a Message 4 you",
                            "sku":"M-BBRW-FELD-LCHDRG",
                            "unit_amount":{
                               "currency_code":"USD",
                               "value":"70"
                            },
                            "quantity":"1",
                            "category":"PHYSICAL_GOODS"
                        },
                        {
                            "name":"Custom Playmat",
                            "description":"Custom Playmat M-BBRW-FELD-LPWELD",
                            "sku":"M-BBRW-FELD-LPWELD",
                            "unit_amount" : {
                                "currency_code" : "USD",
                                "value":"70"
                            },
                            "quantity" : "1",
                            "category" : "PHYSICAL_GOODS"
                        },
                        {
                            "name":"Custom Playmat",
                            "description":"Custom Playmat M-BBRW-FELD-LCHDRG",
                            "sku":"M-BBRW-FELD-LCHDRG",
                            "unit_amount" : {
                                "currency_code" : "USD",
                                "value":"70"
                            },
                            "quantity" : "1",
                            "category" : "PHYSICAL_GOODS"
                        },
                        {
                            "name":"Its a Gif",
                            "description":"With love to: Gessy",
                            "sku":"GIFT-NOTE",
                            "unit_amount" : {
                                "currency_code" : "USD",
                                "value":"0"
                            },
                            "quantity" : "1",
                            "category" : "PHYSICAL_GOODS"
                        }
                    ],
                    "shipping" : {
                        "address" : {
                            "address_line_1":"Revolucion 1500",
                            "address_line_2":"Boulevar 400",
                            "admin_area_1":"Jalisco",
                            "admin_area_2":"Guadalajara",
                            "postal_code":"44290",
                            "country_code":"MX",
                            "email_address" : "gessyavila91@gmail.com"
                        }
                    },
                    "payer" : {
                        "email_address" : "gessyavila91@gmail.com"
                    }
                }
            ]
        }';

        $PC = new ProductController();
        $response = $PC->checkout($request);
        $OC = new orderDataController();
        $orderData = json_encode($OC->initializeOrderData($response));
        $orderData = json_decode(json_encode($orderData));

        header('Content-Type: application/json');
        return json_encode($paypalHelper->orderCreate($orderData));
    }


}

