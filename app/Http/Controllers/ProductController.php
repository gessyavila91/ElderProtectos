<?php

namespace App\Http\Controllers;

use App\Models\Product;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

class ProductController extends Controller {

    public function fetchProduct (Request $request) {
        $response = [
            'data' => null,
            'result' => false,
            'msg' => 'Error',
        ];

        if ($this->ValidCode($request->matCode)) {
            $separeCode = explode("-", $request->matCode);

            $data['matCode'] = $request->matCode;

            $data['matComponnentColor'] = $this->ExistComponent(substr($separeCode[1], 1, strlen($separeCode[1]) - 1), 'C');
            $data['matComponnentFrame'] = $this->ExistComponent(substr($separeCode[2], 1, strlen($separeCode[2]) - 1), 'F');
            $data['matComponnentLogo'] = $this->ExistComponent(substr($separeCode[3], 1, strlen($separeCode[3]) - 1), 'L');
            $data['matComponnentMsg'] = null;
            if (isset($separeCode[4])) {
                /*TODO validar la longitud completa del Mensaje se puede cortar si entra con -*/
                $data['matComponnentMsg'] = $separeCode[5];
                $data['matMsgPosition'] = $separeCode[4];
            }


            $response['data'] = $data;
            $response['msg'] = 'Mat Code Find';
            $response['result'] = true;

        } else {
            $response['msg'] = 'No Fetch this Product';
        }

        if (isset($cookie)) {
            return response()->json($response)->cookie($cookie);
        } else {
            return response()->json($response);
        }

    }

    public function validProduct (Request $request) {
        $response = [
            'data' => null,
            'result' => false,
            'msg' => 'Error',
        ];

        if ($this->ValidCode($request->matCode)) {

            if (isset($_COOKIE['shopingCar'])) {
                $cookie = $this->OvenCooke($request, $_COOKIE['shopingCar']);
                $data['shopingCar'] = $this->shopingCarGet($request, $_COOKIE['shopingCar']);
            } else {
                $cookie = $this->OvenCooke($request);
                $data['shopingCar'] = $this->shopingCarGet($request);
            }

            $response['data'] = $data;
            $response['msg'] = 'Mat Code Fine';
            $response['result'] = true;

        } else {
            $response['msg'] = 'invalid Code';
        }

        if (isset($cookie)) {
            return response()->json($response)->cookie($cookie);
        } else {
            return response()->json($response);
        }

    }


    public function shopingCarGet (Request $request, $oldCookie = null) {

        $produc = [
            'id' => uniqid(),
            'matCode' => $request->matCode,
            'quantity' => 1 /*$request->quantity*/
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

    public function OvenCooke (Request $request, $oldCookie = null) {

        $produc = [
            'id' => uniqid(),
            'matCode' => $request->matCode,
            'quantity' => $request->quantity,
        ];
        $carCookie = array();

        if (!isset($oldCookie)) {
            array_push($carCookie, $produc);
        } else {
            $carCookie = ((array)json_decode($oldCookie));
            array_push($carCookie, $produc);
        }
        return cookie('shopingCar', json_encode($carCookie, JSON_FORCE_OBJECT), 0, null, null, null, false);

    }

    public function ValidCode ($code) {
        if ($this->ValidCodePatter($code)) {
            $separeCode = explode("-", $code);
            if (!$this->ExistComponent(substr($separeCode[1], 1, strlen($separeCode[1]) - 1), 'C')) {
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

    public function ValidCodePatter ($Code) {
        if (preg_match('/(M-C[A-Z]{3,10}-F[A-Z]{3,10}-L[A-Z]{3,10})((TL|TL|BL|BR|C)-[\w\s\d]{1,25}){0,1}/', $Code)) {
            return true;
        }
        return false;
    }

}
