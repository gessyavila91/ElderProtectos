<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use Database\Seeders\MatComponentSeeder;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductTest extends TestCase {

    public function test_InitShoppingCar () {
        $cookie = '{"0":{"id":"6059500c7e0bc","matCode":"M-BBRW-FELD-LCHDRG-TL-This is a -message 4 you","quantity":1,"price":70,"customMessage":"This is a -message 4 you"},"1":{"id":"60595281d0fbd","matCode":"M-BBRW-FELD-LCHDRG-TL-This is a -message 4 you","quantity":1,"price":70,"customMessage":"This is a -message 4 you"}}';

        $response = $this->get('/api/product/initShoppingCar');

        $response->withCookie('shoppingCar', '{"0":{"id":"6059500c7e0bc","matCode":"M-BBRW-FELD-LCHDRG-TL-This is a -message 4 you","quantity":1,"price":70,"customMessage":"This is a -message 4 you"},"1":{"id":"60595281d0fbd","matCode":"M-BBRW-FELD-LCHDRG-TL-This is a -message 4 you","quantity":1,"price":70,"customMessage":"This is a -message 4 you"}}');

        $response->assertStatus(200);
        $response->dump();

    }

    public function test_fetchProduct () {

        $producArray1 = [
            'matCode' => 'M-BBRW-FCLT-LCHDRG-TL-This is a Message 4 you',
            'quantity' => 1,
        ];

        $response = $this->postJson('/api/product/fetch', $producArray1);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                "matCode" => "M-BBRW-FCLT-LCHDRG-TL-This is a Message 4 you",
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
                ],
                "matComponnentMsg" => "This is a Message 4 you",
                "matMsgPosition" => "TL"
            ],
            'result' => true,
            'msg' => 'Mat Code Fetched'
        ]);

        $response->dump();
    }

    public function test_addProduct () {

        $producArray = [
            'matCode' => 'M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+',
            'quantity' => 1,
        ];

        $response = $this->postJson('/api/product/addProduct', $producArray);

        $response->assertStatus(200)->assertJson([
            'data' => [
                'shoppingCar' => [[
                    'id' => true,
                    'matCode' => 'M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+',
                    'quantity' => 1,
                    'price' => 70.00,
                    'customMessage' => null
                ]],
                'shoppingCarCountItems' => 1,
                'shoppingCarTotalPrice' => true
            ],
            'result' => true,
            'msg' => 'Mat Code Fine'
        ]);

        $response->assertCookie('shoppingCar');
        $response->assertCookieNotExpired('shoppingCar');
        $response->dump();
    }

    public function test_addProduct2 () {

        $producArray = [
            'matCode' => 'M-BBRW-FCLT-LCHDRG',
            'quantity' => 1,
        ];

        $response = $this->postJson('/api/product/addProduct', $producArray);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'shoppingCar' => [[
                    'id' => true,
                    'matCode' => 'M-BBRW-FCLT-LCHDRG',
                    'quantity' => 1,
                    'price' => 70.00,
                    'customMessage' => null
                ]],
                'shoppingCarCountItems' => 1,
                'shoppingCarTotalPrice' => true
            ],
            'result' => true,
            'msg' => 'Mat Code Fine'
        ]);

        /*$response->assertCookie('shoppingCar');
        $response->assertCookieNotExpired('shoppingCar');*/
        $response->dump();
    }

    public function test_addPromoCode () {

        $producArray = [
            'promoCode' => 'PROMOVALIDA2',
        ];
        /*Setear Cookie de Carrito y de promoCode*/
        $response = $this->postJson('/api/product/addPromoCode', $producArray);
        $response->assertStatus(200);
        $response->dump();
    }

    public function test_removeProductFromshoppingCar () {

        $cookie = '{"0":{"id":"6059500c7e0bc","matCode":"M-BBRW-FELD-LCHDRG-TL-This is a -message 4 you","quantity":1,"price":70,"customMessage":"This is a -message 4 you"},"1":{"id":"60595281d0fbd","matCode":"M-BBRW-FELD-LCHDRG-TL-This is a -message 4 you","quantity":1,"price":70,"customMessage":"This is a -message 4 you"}}';

        $response = $this
            ->withCookie('color', 'blue')
            ->disableCookieEncryption()
            ->post('/api/product/removeProduct');
        $response->assertStatus(200);
        /*$response->dumpHeaders();
        $response->dumpSession();
        $response->dump();*/
    }

    public function test_ProductControllerMethods () {

        DB::table('mat_components')->truncate();
        $this->seed(MatComponentSeeder::class);

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

        //100% Real No Fake True Code
        $this->assertTrue($ProductController->ValidCode('M-BBRW-FCLT-LCHDRG'));
        //Impostor Code Funar
        $this->assertFalse($ProductController->ValidCode('M-BRW-FCLT-CHDRG'));
        $this->assertFalse($ProductController->ValidCode(''));
        $this->assertFalse($ProductController->ValidCode(null));//

        $this->assertTrue($ProductController->ValidCodePatter('M-BBRW-FCLT-LCHDRG'));
        $this->assertTrue($ProductController->ValidCodePatter('M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+'));
        $this->assertTrue($ProductController->ValidCodePatter('M-BBRW-FSM-LSL'));

        $this->assertSame($matComponent, $ProductController->ExistComponent('BRW', 'B'));
        $this->assertFalse($ProductController->ExistComponent('BRW', 'L'));


        $this->assertSame('This is a -message 4 you', $ProductController->getCustomMessageFromRequest('M-BBRW-FCLT-LCHDRG-TL-This is a -message 4 you'));


        /*moreTest*/

    }

}


