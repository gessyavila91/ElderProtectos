<?php


namespace App\payment\paypal\Controllers;

use App\Http\Controllers\Controller;

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

    public function getOrderDetails(Request $request){
        $paypalHelper = new PayPalHelper;

        header('Content-Type: application/json');
        return json_encode($paypalHelper->orderGet());
    }

    public function createOrder(Request $request) {
        $paypalHelper = new PaypalHelper();

        $randNo = (string)rand(10000, 20000);

        /*$orderData = [
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => "",
                "cancel_url" => ""
            ],
            "purchase_units" => [
                "reference_id" => "PU1",
                "description" => "Camera Shop",
                "invoice_id" => "INV-CameraShop-".$randNo ,
                "custom_id" => "CUST-CameraShop",
                "amount" => [
                    "currency_code" => $request->currency,
                    "value" => $request->total_amt,
                    "breakdown" => [
                        "item_total" => [
                            "currency_code" => "USD",
                            "value" => $request->item_amt
                        ],
                        "shipping" => [
                            "currency_code" => $request->currency,
                            "value" => $request->shipping_amt
                        ],
                        "tax_total" => [
                            "currency_code" => $request->currency,
                            "value" => "'.$request->tax_amt.'"
                        ],
                        "handling" => [
                            "currency_code" => $request->currency ,
                            "value" => $request->handling_fee
                        ],
                        "shipping_discount" => [
                            "currency_code" => $request->currency,
                            "value" => $request->shipping_discount
                        ],
                        "insurance" => [
                            "currency_code" => $request->currency,
                            "value" => $request->insurance_fee
                        ]
                    ]
                ],
            ],
            "items" => [
                "name" => "DSLR Camera",
                "description" => $request->description,
                "sku" => $request->code,
                "unit_amount" => [
                    "currency_code" => $request->currency,
                    "value" => $request->item_amt
                ],
                "quantity" => "1",
                "category" => "PHYSICAL_GOODS"
            ]
        ];*/


        /*TODO Crear clase para manekar estos valores
         | ITEMS que es un array
         |
        */

        $orderData = '{
            "intent" : "CAPTURE",
            "application_context" : {
                "return_url" : "",
                "cancel_url" : ""
            },
            "purchase_units" : [ 
                {
                    "reference_id" : "PU1",
                    "description" : "Camera Shop",
                    "invoice_id" : "INV-CameraShop-'.$randNo.'",
                    "custom_id" : "CUST-CameraShop",
                    "amount" : {
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
                                "value" : "20"
                            }
                        }
                    },
                    "items" : [{
                        "name" : "DSLR Camera",
                        "description" : "Black Camera - Digital SLR",
                        "sku" : "sku01",
                        "unit_amount" : {
                            "currency_code" : "USD",
                            "value" : "300"
                        },
                        "quantity" : "1",
                        "category" : "PHYSICAL_GOODS"
                    }]
                }
            ]
        }';

        //var_dump($orderData);

        if(array_key_exists('shipping_country_code', $_POST)) {

            $orderDataArr = json_decode($orderData, true);
            $orderDataArr['application_context']['shipping_preference'] = "SET_PROVIDED_ADDRESS";
            $orderDataArr['application_context']['user_action'] = "PAY_NOW";

            $orderDataArr['purchase_units'][0]['shipping']['address']['address_line_1'] = "55 East 52nd Street";//$request->shipping_line1;
            $orderDataArr['purchase_units'][0]['shipping']['address']['address_line_2'] = "21st Floor";//$request->shipping_line2;
            $orderDataArr['purchase_units'][0]['shipping']['address']['admin_area_2']   = "New York";//$request->shipping_city;
            $orderDataArr['purchase_units'][0]['shipping']['address']['admin_area_1']   = "NY";//$request->shipping_state;
            $orderDataArr['purchase_units'][0]['shipping']['address']['postal_code']    = "10022";//$request->shipping_postal_code;
            $orderDataArr['purchase_units'][0]['shipping']['address']['country_code']   = "US";//$request->shipping_country_code;

            $orderData = json_encode($orderDataArr);
        }

        header('Content-Type: application/json');
        return json_encode($paypalHelper->orderCreate($orderData));
    }


}