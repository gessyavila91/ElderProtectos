<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use Database\Seeders\MatComponentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductTest extends TestCase {

    public function test_productApiValidProduct () {

        $producArray = [
            'matCode' => 'M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+',
            'quantity' => 1,
        ];

        $response = $this->postJson('/api/product/valid', $producArray);

        $response->assertStatus(200)->assertJson([
            'data' => [
                'shopingCar' => [[
                    'id' => true,
                    'matCode' => 'M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+',
                    'quantity' => 1,
                    'price' => 70.00,
                    'customMessage' => null
                ]],
                'shopingCarCountItems' => 1,
                'shopingCarTotalPrice' => true
            ],
            'result' => true,
            'msg' => 'Mat Code Fine'
        ]);

        $response->assertCookie('shopingCar');
        $response->assertCookieNotExpired('shopingCar');
        $response->dump();
    }

    public function test_productApiAddPromoCode () {

        $producArray = [
            'promoCode' => 'PROMOVALIDA2',
        ];
        /*Setear Cookie de Carrito y de promoCode*/
        $response = $this->postJson('/api/product/addPromoCode', $producArray);
        $response->assertStatus(200);
        $response->dump();
    }

    public function test_productApiFetchProduct () {

        $producArray1 = [
            'matCode' => 'M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+ ',
            'quantity' => 1,
        ];

        $response = $this->postJson('/api/product/fetch', $producArray1);
        $response->assertStatus(200);
        $response->assertStatus(200)->assertJson([
            'data' => [
                "matCode" => 'M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+',
                "matComponnentBackground" => [
                    "id" => 1,
                    "code" => "BRW",
                    "enable" => 1,
                    "fileName" => "assets/img/customMat/fondo1.png",
                    "description" => "Standar Brown",
                    "type" => "B",
                    "created_at" => "2021-03-12 13:33:59",
                    "updated_at" => "2021-03-14 20:09:33"
                ],
                "matComponnentFrame" => [
                    "id" => 3,
                    "code" => "CLT",
                    "enable" => 1,
                    "fileName" => "assets/img/customMat/marco1.png",
                    "description" => "Celtic",
                    "type" => "F",
                    "created_at" => "2021-03-12 13:33:59",
                    "updated_at" => "2021-03-14 20:09:33",
                ],
                "matComponnentLogo" => [
                    "id" => 5,
                    "code" => "CHDRG",
                    "enable" => 1,
                    "fileName" => "assets/img/customMat/centro1.png",
                    "description" => "Chinese Dragon",
                    "type" => "L",
                    "created_at" => "2021-03-12 13:33:59",
                    "updated_at" => "2021-03-14 20:09:33",
                ]
            ],
            'result' => true,
            'msg' => 'Mat Code Find'
        ]);


    }

    public function test_ProductControllerValid () {

        DB::table('mat_components')->truncate();
        $this->seed(MatComponentSeeder::class);

        $stdCodeGreen = 'M-BBRW-FCLT-LCHDRG';
        $stdCodeNoComponentGreen = 'M-BBRW-FSM-LSL';
        $stdCodeCustomTextGreen = 'M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+';

        $stdComponenCode = 'BRW';

        $ProductController = new ProductController();

        $matComponent = [
            'id' => 1,
            'code' => 'BRW',
            'enable' => 1,
            'fileName' => 'assets/img/customMat/fondo1.png',
            'description' => 'Standar Brown',
            'type' => 'B',
            'created_at' => '2021-03-12 13:33:59',
            'updated_at' => '2021-03-14 20:09:33'
        ];

        //TODO Crear Codigos con seeders o random o algo despues eliminar los mismos
        $this->assertSame($matComponent, $ProductController->ExistComponent($stdComponenCode, 'B'));

        $this->assertTrue($ProductController->ValidCodePatter($stdCodeGreen));
        $this->assertTrue($ProductController->ValidCodePatter($stdCodeCustomTextGreen));
        $this->assertTrue($ProductController->ValidCodePatter($stdCodeNoComponentGreen));

        //100% Real No Fake True Code
        $this->assertTrue($ProductController->ValidCode($stdCodeGreen));
        //Impostor Code Funar
        $this->assertFalse($ProductController->ValidCode('M-BRW-FCLT-CHDRG'));
        $this->assertFalse($ProductController->ValidCode(null));//
        $this->assertSame('This is a -message 4 you', $ProductController->getCustomMessageFromRequest('M-BBRW-FCLT-LCHDRG-TL-This is a -message 4 you'));
        /* fixme somthing Wrong */
        //$this->assertSame('a"!@#$%^&*()_+|/\+',$ProductController->getCustomMessageFromRequest('M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+'));

    }

}


//'{{"id"         => "6058d508e4677","matCode"      => "M-BBRW-FCLT-LCHDRG-TL-This is a -message 4 you","quantity"     => 1,"price"        => 70,"customMessage"=> "This is a -message 4 you"},{"id"           => "6058d521238a4","matCode"      => "M-BBRW-FCLT-LCHDRG-TL-This is a -message 4 you","quantity"     => 1,"price"        => 70,"customMessage"=> "This is a -message 4 you"}}'