<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {

    public function index () {
        $products = Product::latest()->paginate(5);

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show (Product $product) {
        return view('product.show', compact('product'));
    }

    public function valid (Request $request) {
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

            $response['msg'] = 'Mat Code Fine';
            $response['data'] = $data;
            $response['result'] = true;

        } else {
            $response['msg'] = 'invalid Code';
        }

        return response()->json($response);

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
        if (preg_match('/M-C[A-Z]{3,10}-F[A-Z]{3,10}-L[A-Z]{3,10}/', $Code)) {
            return true;
        }
        return false;
    }

}
