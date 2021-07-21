<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller {

    private $response = [
        'data' => null,
        'result' => false,
        'msg' => 'Error',
    ];

    /*API Method's*/
    public function InitShoppingCar (Request $request) {

        if (isset($_COOKIE['shoppingCar'])) {
            $data['shoppingCar'] = (array)json_decode($_COOKIE['shoppingCar']);
            $data['shoppingCarCountItems'] = count($data['shoppingCar']);

            $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice($data['shoppingCar']);
        }

        if (isset($_COOKIE['promoCode'])) {
            /*CalculatePromoCode*/
            $data['promoCode'] = (array)json_decode($_COOKIE['promoCode']);

            if (isset($data['shoppingCarTotalPrice'])) {

                $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice($data['shoppingCar'], $data['promoCode']);

            }
        }

        if (isset($data)) {
            $this->response['data'] = $data;
            $this->response['msg'] = 'Mat Code Find';
            $this->response['result'] = true;
        }
        $this->response['msg'] = 'Nothing Found';

        return response()->json($this->response);
    }

    public function fetchProduct (Request $request) {

        if ($this->ValidCode($request->matCode)) {
            $separeCode = explode("-", $request->matCode);

            $data['matCode'] = $request->matCode;

            $data['matComponnentBackground'] = $this->getComponentData($data['matCode'], 'B');
            $data['matComponnentFrame'] = $this->getComponentData($data['matCode'], 'F');
            $data['matComponnentLogo'] = $this->getComponentData($data['matCode'], 'L');

            if (isset($separeCode[4])) {
                $data['matComponnentMsg'] = $this->getCustomMessageFromRequest($data['matCode']);
                $data['matMsgPosition'] = $separeCode[4];
            } else {
                $data['matComponnentMsg'] = null;
            }

            $this->response['data'] = $data;
            $this->response['msg'] = 'Mat Code Fetched';
            $this->response['result'] = true;

        } else {
            $this->response['msg'] = 'No Fetch this Product';
        }

        return response()->json($this->response);

    }

    public function addProduct (Request $request) {

        if ($this->ValidCode($request->matCode)) {

            if (isset($_COOKIE['shoppingCar'])) {
                $cookie = $this->OvenCooke('shoppingCar', $request, $_COOKIE['shoppingCar']);
                $data['shoppingCar'] = $this->shoppingCarGet($request->matCode, $_COOKIE['shoppingCar']);
            } else {
                $cookie = $this->OvenCooke('shoppingCar', $request);
                $data['shoppingCar'] = $this->shoppingCarGet($request->matCode);
            }
            $data['shoppingCarCountItems'] = count($data['shoppingCar']);
            $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice((array)$data['shoppingCar']);
            if (isset($_COOKIE['promoCode'])) {
                $data['promoCode'] = (array)json_decode($_COOKIE['promoCode']);
                $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice((array)$data['shoppingCar'], $data['promoCode']);
            }

            $this->response['data'] = $data;
            $this->response['msg'] = 'Mat Code Fine';
            $this->response['result'] = true;

        } else {
            $this->response['msg'] = 'invalid Code';
        }

        if (isset($cookie)) {
            return response()->json($this->response)->cookie($cookie);
        } else {
            return response()->json($this->response);
        }
    }

    public function addPromoCode (Request $request) {

        $promoCodeC = new PromoCodeController();

        if ($promoCodeC->validPromoCode($request->promoCode)) {

            $data['promoCode'] = $promoCodeC->information($request->promoCode);

            $cookiePromoCode = $this->OvenCooke('promoCode', $request);

            if (isset($_COOKIE['shoppingCar'])) {
                $data['shoppingCar'] = (array)json_decode($_COOKIE['shoppingCar']);
                $data['shoppingCarCountItems'] = count($data['shoppingCar']);

                $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice((array)$data['shoppingCar']);

                if (isset($data['shoppingCarTotalPrice'])) {

                    $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice((array)$data['shoppingCar'], $data['promoCode']);
                }
            }

            $this->response['data'] = $data;
            $this->response['msg'] = 'Promo Code Valid';
            $this->response['result'] = true;
        }

        if (isset($cookiePromoCode)) {
            return response()->json($this->response)->cookie($cookiePromoCode);
        } else {
            return response()->json($this->response);
        }
    }

    public function removeProductFromShoppingCar (Request $request) {

        if (isset($_COOKIE['shoppingCar'])) {

            $shoppingCar = json_decode($_COOKIE['shoppingCar'], true);
            foreach ($shoppingCar as $k => $Product) {
                if ($Product['id'] === $request->id) {
                    unset($shoppingCar[$k]);
                    $shoppingCar = array_values($shoppingCar);
                }
            }
            $data['shoppingCar'] = $shoppingCar;
            $data['idToRemove'] = $request->id;

            $data['shoppingCarCountItems'] = count($data['shoppingCar']);
            $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice($shoppingCar);

            if (isset($_COOKIE['promoCode'])) {
                $data['promoCode'] = (array)json_decode($_COOKIE['promoCode']);

                if (isset($data['shoppingCarTotalPrice'])) {
                    $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice($shoppingCar, $data['promoCode']);
                }
            }

            $this->response['data'] = $data;
            $this->response['msg'] = 'Product Removed';
            $this->response['result'] = true;

            $cookie = $this->OvenCooke('shoppingCar', null, $data['shoppingCar']);
            return response()->json($this->response)->cookie($cookie);

        } else {
            return response()->json($this->response);
        }
    }

    public function editProductFromShoppingCar (Request $request) {

        if (isset($_COOKIE['shoppingCar'])) {

            $shoppingCar = json_decode($_COOKIE['shoppingCar'], true);
            foreach ($shoppingCar as $k => $Product) {
                if ($Product['id'] === $request->id) {
                    $shoppingCar[$k]['matCode'] = $request->code;
                }
            }
            $data['shoppingCar'] = $shoppingCar;
            $data['idToEdit'] = $request->id;

            $data['shoppingCarCountItems'] = count($data['shoppingCar']);
            $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice($shoppingCar);

            if (isset($_COOKIE['promoCode'])) {
                $data['promoCode'] = (array)json_decode($_COOKIE['promoCode']);

                if (isset($data['shoppingCarTotalPrice'])) {
                    $data['shoppingCarTotalPrice'] = $this->calcCarTotalPrice($shoppingCar, $data['promoCode']);
                }
            }

            $this->response['data'] = $data;
            $this->response['msg'] = 'Product Edited';
            $this->response['result'] = true;

            $cookie = $this->OvenCooke('shoppingCar', null, $data['shoppingCar']);
            return response()->json($this->response)->cookie($cookie);

        } else {
            return response()->json($this->response);
        }
    }

    public function preview (Request $request) {

        if (isset($_COOKIE['shoppingCar']) && isset($request->id)) {
            $shoppingCar = json_decode($_COOKIE['shoppingCar'], true);

            foreach ($shoppingCar as $Product) {
                if ($Product['id'] === $request->id) {
                    $data['matCode'] = $Product['matCode'];

                    $data['matComponnentBackground'] = $this->getComponentData($Product['matCode'], 'B');
                    $data['matComponnentFrame'] = $this->getComponentData($Product['matCode'], 'F');
                    $data['matComponnentLogo'] = $this->getComponentData($Product['matCode'], 'L');

                    $separeCode = explode("-", $Product['matCode']);
                    if (isset($separeCode[4])) {
                        $data['CustomMsg'] = $this->getCustomMessageFromRequest($Product['matCode']);
                        $data['matMsgPosition'] = $separeCode[4];
                    }
                    $data['id'] = $Product['id'];

                }
            }

            $this->response['data'] = $data;
            $this->response['msg'] = 'Mat Code Fetched';
            $this->response['result'] = true;

            return response()->json($this->response);
        }
        $this->response['msg'] = 'No Fetch this Product';

        return response()->json($this->response);
    }

    /*Intern Method's*/
    public function ValidCode ($code): bool {
        if ($this->ValidCodePatter($code)) {
            $separeCode = explode("-", $code);
            if (!$this->ExistComponent(substr($separeCode[1], 1, strlen($separeCode[1]) - 1), 'B')) {
                return false;
            }
            if (!$this->ExistComponent(substr($separeCode[2], 1, strlen($separeCode[2]) - 1), 'F')) {
                return false;
            }
            if (!$this->ExistComponent(substr($separeCode[3], 1, strlen($separeCode[3]) - 1), 'L')) {
                return false;
            }
        } else {
            return false;
        }
        return true;
    }

    public function ValidCodePatter ($Code): bool {
        if (preg_match('/(M-B[A-Z]{3,10}-F([A-Z]{3,10}|SM)-L([A-Z]{3,10}|SL))((TL|TR|BL|BR|C)-[\w\s\d]{1,25}){0,1}/', $Code)) {
            return true;
        }
        return false;
    }

    public function ExistComponent ($Code, $Type) {
        $macComponent = DB::table('mat_components')
            ->where('code', $Code)
            ->Where('type', $Type)
            ->Where('enable', '1')
            ->first();

        if (isset($macComponent)) {
            return (array)$macComponent;
        }
        return false;
    }

    public function calcCarTotalPrice ($shoppingCar, $promoCode = null) {
        $carPrice = 0;
        foreach ($shoppingCar as $ProductObj) {
            $products = (array)$ProductObj;
            $carPrice = $carPrice + $products['price'];
        }
        if (isset($promoCode)) {
            switch ($promoCode['type']) {
                case '$':
                    $carPrice = $carPrice - $promoCode['value'];
                    break;
                case  '%':
                    $carPrice = $carPrice - ($promoCode['value'] * 0.01) * $carPrice;
                    break;
            }
        }
        return $carPrice;
    }

    public function getComponentData ($MatCode, $Type) {

        $detachCode = explode("-", $MatCode);

        switch ($Type) {
            case 'B':
                return $this->ExistComponent(substr($detachCode[1], 1, strlen($detachCode[1]) - 1), $Type);
            case 'F':
                return $this->ExistComponent(substr($detachCode[2], 1, strlen($detachCode[2]) - 1), $Type);
            case 'L':
                return $this->ExistComponent(substr($detachCode[3], 1, strlen($detachCode[3]) - 1), $Type);
            default:
                return null;
        }

    }

    public function getCustomMessageFromRequest($MatCode) {
        $code = explode("-", $MatCode);
        $message = '';

        if(count($code) > 4) {
            $matCodeLen =
                strlen($code[0]) +
                strlen($code[1]) +
                strlen($code[2]) +
                strlen($code[3]) + 4;

            $message = substr($MatCode, $matCodeLen + strlen($code[4]) + 1, strlen($MatCode));
        }
        return $message;
    }

    public function shoppingCarGet ($MatCode, $oldCookie = null) {

        $produc = [
            'id' => uniqid(),
            'matCode' => $MatCode,
            'quantity' => 1,
            'price' => 70.00,
            'customMessage' => $this->getCustomMessageFromRequest($MatCode)
        ];
        $carCookie = array();

        if (!isset($oldCookie)) {
            array_push($carCookie, $produc);
        } else {
            $carCookie = ((array)json_decode($oldCookie));
            array_push($carCookie, $produc);
        }

        return $carCookie;
    }

    public function OvenCooke ($type, Request $request = null, $oldCookie = null) {

        switch ($type) {
            case 'shoppingCar':
                if (isset($request)) {
                    $produc = [
                        'id' => uniqid(),
                        'matCode' => $request->matCode,
                        'quantity' => 1,
                        'price' => 70.00,
                        'customMessage' => $this->getCustomMessageFromRequest($request->matCode)
                    ];
                    $carCookie = array();

                    if (!isset($oldCookie)) {
                        array_push($carCookie, $produc);
                    } else {
                        $carCookie = ((array)json_decode($oldCookie));
                        array_push($carCookie, $produc);
                    }
                    return cookie('shoppingCar', json_encode($carCookie, JSON_FORCE_OBJECT));
                }
            case 'promoCode':
                $promoCodeC = new PromoCodeController();
                $promo = $promoCodeC->information($request->promoCode);

                return cookie('promoCode', json_encode($promo, JSON_FORCE_OBJECT));

        }
    }

    public function checkout (Request $request = null): array {

        if (isset($_COOKIE['shoppingCar'])) {


            $response["intent"]     = "CAPTURE";

            $response["return_url"] = "/checkout";
            $response["cancel_url"] = "/cancel";

            $response["reference_id"]  = "CSEP";
            $response["currency_code"] = "USD";

            $randNo = (string)rand(10000, 20000);
            $response["invoice_id"] = "IEP-".$randNo;
            $response["custom_id"] = "EP-".$randNo;

            $data['shoppingCar'] = (array)json_decode($_COOKIE['shoppingCar']);

            $response["shipping_value"]          = "0";
            $response["tax_total_value"]         = "0";
            $response["handling_value"]          = "0";
            $response["shipping_discount_value"] = "0";
            $response["insurance_value"]         = "0";
            if (isset($_COOKIE['promoCode'])){
                $response["discount_value"]      = $this->getDiscountAmount();
            }
            $response["item"] = $this->shoppingCarItem();
            if (isset($request->shipping_country_code)){

                $response['address_line_1'] = $request->shipping_line1;
                $response['address_line_2'] = $request->shipping_line2;
                $response['admin_area_2']   = $request->shipping_city;
                $response['admin_area_1']   = $request->shipping_state;
                $response['postal_code']    = $request->shipping_postal_code;
                $response['country_code']   = $request->shipping_country_code;
            }

        }

        return $response;
    }

    public function getDiscountAmount(){
        $data['promoCode'] = (array)json_decode($_COOKIE['promoCode']);
        $data['shoppingCar'] = (array)json_decode($_COOKIE['shoppingCar']);

        $discount_value = 0;
        $carPrice =0;
        foreach ($data['shoppingCar'] as $ProductObj) {
            $products = (array)$ProductObj;
            $carPrice = $carPrice + ($products['price']*$products['quantity']);
        }

        if ($data['promoCode']) {
            //var_dump($data['promoCode']);
            switch ($data['promoCode']['type']) {
                case '$':
                    $discount_value = $data['promoCode']['value'];
                    break;
                case  '%':
                    $discount_value = ($data['promoCode']['value'] * 0.01) * $carPrice;
                    break;
            }
        }
        return $discount_value;
    }


    public function shoppingCarItem(): array {
        $array = [];

        if (isset($_COOKIE['shoppingCar'])) {
            $shoppingCar = json_decode($_COOKIE['shoppingCar'], true);

            foreach ($shoppingCar as $item) {

                array_push($array,
                    [
                        "name"              => "Custom Playmat ".$item['matCode'],
                        "description"       => "Custom Playmat ".$item['matCode'],
                        "sku"               => $item['matCode'],
                        "unit_amount_value" => $item["price"],
                        "items_category"    => "PHYSICAL_GOODS",
                        "items_quantity"    => $item["quantity"]
                    ]
                );
            }
        }
        return $array;
    }




    public function getShoppingCarFromCookie ($_CookieShoppingCar) {
        /*para remplazar codigo duplicado*/
        if (isset($_CookieShoppingCar)) {
            $data['shoppingCar'] = $_CookieShoppingCar;
            $data['shoppingCarCountItems'] = count($data['shoppingCar']);
            $data['shoppingCarTotalPrice'] = 0;
            foreach ($data['shoppingCar'] as $ProductObj) {
                $products = (array)$ProductObj;
                $data['shoppingCarTotalPrice'] = $data['shoppingCarTotalPrice'] + $products['price'];
            }
        }
    }

}
