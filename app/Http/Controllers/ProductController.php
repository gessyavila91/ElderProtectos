<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PromoCodeController;
use App\Models\Product;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;
use function PHPUnit\Framework\returnArgument;

class ProductController extends Controller {

    private $response = [
        'data' => null,
        'result' => false,
        'msg' => 'Error',
    ];

    /*API Method's*/
    public function InitShoppingCar (Request $request) {
        $promoCodeC = new PromoCodeController();

        if (isset($_COOKIE['shoppingCar'])) {
            $data['shoppingCar'] = (array)json_decode($_COOKIE['shoppingCar']);
            $data['shoppingCarCountItems'] = count($data['shoppingCar']);
            $data['shoppingCarTotalPrice'] = 0;
            foreach ($data['shoppingCar'] as $ProductObj) {
                $products = (array)$ProductObj;
                $data['shoppingCarTotalPrice'] = $data['shoppingCarTotalPrice'] + $products['price'];
            }
        }

        if (isset($_COOKIE['promoCode'])) {
            $data['promoCode'] = (array)json_decode($_COOKIE['promoCode']);
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

            $data['matComponnentBackground'] = $this->ExistComponent(substr($separeCode[1], 1, strlen($separeCode[1]) - 1), 'B');
            $data['matComponnentFrame'] = $this->ExistComponent(substr($separeCode[2], 1, strlen($separeCode[2]) - 1), 'F');
            $data['matComponnentLogo'] = $this->ExistComponent(substr($separeCode[3], 1, strlen($separeCode[3]) - 1), 'L');
            $data['matComponnentMsg'] = null;
            if (isset($separeCode[4])) {
                $data['matComponnentMsg'] = $this->getCustomMessageFromRequest($data['matCode']);
                $data['matMsgPosition'] = $separeCode[4];
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
        $promoCodeC = new PromoCodeController();

        if ($this->ValidCode($request->matCode)) {

            /*descomentar*/
            if (isset($_COOKIE['shoppingCar'])) {
                $cookie = $this->OvenCookeShoppingCar($request, $_COOKIE['shoppingCar']);
                $data['shoppingCar'] = $this->shoppingCarGet($request, $_COOKIE['shoppingCar']);
            } else {
                $cookie = $this->OvenCookeShoppingCar($request);
                $data['shoppingCar'] = $this->shoppingCarGet($request);
            }

            $data['shoppingCarCountItems'] = count($data['shoppingCar']);
            $data['shoppingCarTotalPrice'] = 0;

            foreach ($data['shoppingCar'] as $ProductObj) {
                $products = (array)$ProductObj;
                $data['shoppingCarTotalPrice'] = $data['shoppingCarTotalPrice'] + $products['price'];
            }

            if (isset($_COOKIE['promoCode'])) {
                $data['promoCode'] = (array)json_decode($_COOKIE['promoCode']);
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

            $cookiePromoCode = $this->OvenCookePromoCode($request);

            /*TODO Validar Condicion del CodigoPromo*/
            /*TODO validar que si tengas carrito*/
            if (isset($data['promoCode']['condition'])) {

            }
            /*TODO Mismo Codigo 1 Usar getShoppingCarFromCookie()*/
            if (isset($_COOKIE['shoppingCar'])) {
                $data['shoppingCar'] = (array)json_decode($_COOKIE['shoppingCar']);
                $data['shoppingCarCountItems'] = count($data['shoppingCar']);
                $data['shoppingCarTotalPrice'] = 0;

                foreach ($data['shoppingCar'] as $ProductObj) {
                    $products = (array)$ProductObj;
                    $data['shoppingCarTotalPrice'] = $data['shoppingCarTotalPrice'] + $products['price'];
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

    public function removeProductFromshoppingCar (Request $request) {

        $promoCodeC = new PromoCodeController();

        if (isset($_COOKIE['shoppingCar'])) {

            var_dump($_COOKIE['shoppingCar']);

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
            $data['shoppingCarTotalPrice'] = 0;
            foreach ($data['shoppingCar'] as $ProductObj) {
                $products = (array)$ProductObj;
                $data['shoppingCarTotalPrice'] = $data['shoppingCarTotalPrice'] + $products['price'];
            }

            $cookie = $this->OvenCookeShoppingCar(null, $data['shoppingCar']);

            if (isset($_COOKIE['promoCode'])) {
                $data['promoCode'] = json_decode($_COOKIE['promoCode'], true);
            }

            $this->response['data'] = $data;
            $this->response['msg'] = 'Something Wrong';
            $this->response['result'] = true;

            return response()->json($this->response)->cookie($cookie);

        } else {
            return response()->json($this->response);
        }


    }

    /*Intern Method's*/
    public function ValidCode ($code) {
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

    public function ValidCodePatter ($Code): bool {
        if (preg_match('/(M-B[A-Z]{3,10}-F([A-Z]{3,10}|SM)-L([A-Z]{3,10}|SL))((TL|TR|BL|BR|C)-[\w\s\d]{1,25}){0,1}/', $Code)) {
            return true;
        }
        return false;
    }

    public function getCustomMessageFromRequest ($matCode) {
        $separeCode = explode("-", $matCode);

        $matCodeLen =
            strlen($separeCode[0]) +
            strlen($separeCode[1]) +
            strlen($separeCode[2]) +
            strlen($separeCode[3]) + 4;

        return substr($matCode, $matCodeLen + strlen($separeCode[4]) + 1, strlen($matCode));
    }

    public function shoppingCarGet (Request $request, $oldCookie = null) {

        $produc = [
            'id' => uniqid(),
            'matCode' => $request->matCode,
            'quantity' => 1, /*$request->quantity*/
            'price' => 70.00, /*TODO create a config 4 standar Price*/
            'customMessage' => $this->getCustomMessageFromRequest($request->matCode) /*$request->quantity*/
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

    public function OvenCookeShoppingCar (Request $request = null, $oldCookie = null) {

        if (isset($request)) {
            $produc = [
                'id' => uniqid(),
                'matCode' => $request->matCode,
                'quantity' => $request->quantity,
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

        return cookie('shoppingCar', json_encode($oldCookie, JSON_FORCE_OBJECT));


    }

    public function OvenCookePromoCode (Request $request) {

        $promoCodeC = new PromoCodeController();

        $promo = $promoCodeC->information($request->promoCode);

        return cookie('promoCode', json_encode($promo, JSON_FORCE_OBJECT));

    }

    /*NewMethods*/
    public function getShoppingCarFromCookie ($_CookieShoppingCar) {
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
