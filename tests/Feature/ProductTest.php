<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use Database\Seeders\MatComponentSeeder;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

use Illuminate\Cookie\CookieJar;
use Mockery as m;
use ReflectionObject;
use Symfony\Component\HttpFoundation\Cookie;

class ProductTest extends TestCase {

    public function test_initShoppingCar () {
        $cookie = '{"0":{"id":"6059500c7e0bc","matCode":"M-BBRW-FELD-LCHDRG-TL-This is a -message 4 you","quantity":1,"price":70,"customMessage":"This is a -message 4 you"},"1":{"id":"60595281d0fbd","matCode":"M-BBRW-FELD-LCHDRG-TL-This is a -message 4 you","quantity":1,"price":70,"customMessage":"This is a -message 4 you"}}';

        $response = $this
            ->withCookie('color', 'blue')
            ->get('/api/product/initShoppingCar');

        $response->assertStatus(200);
        /*$response->dumpHeaders();
        $response->dumpSession();
        $response->dump();*/

    }

    public function test_shoppingCartApiFetchProduct () {

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

    public function test_shoppingApiAddProductToCar () {

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

    public function test_shoppingApiAddProductToCar2 () {

        $producArray = [
            'matCode' => 'M-BBRW-FCLT-LCHDRG',
            'quantity' => 1,
        ];

        $response = $this->postJson('/api/product/addProduct', $producArray);

        $response->assertStatus(200)->assertJson([
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

        $response->assertCookie('shoppingCar');
        $response->assertCookieNotExpired('shoppingCar');
        $response->dump();
    }

    public function test_shoppingApiAddPromoCode () {

        $producArray = [
            'promoCode' => 'PROMOVALIDA2',
        ];
        /*Setear Cookie de Carrito y de promoCode*/
        $response = $this->postJson('/api/product/addPromoCode', $producArray);
        $response->assertStatus(200);
        $response->dump();
    }

    public function test_shoppingRemoveItem () {

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

        //100% Real No Fake True Code
        $this->assertTrue($ProductController->ValidCode($stdCodeGreen));
        //Impostor Code Funar
        $this->assertFalse($ProductController->ValidCode('M-BRW-FCLT-CHDRG'));
        $this->assertFalse($ProductController->ValidCode(null));//

        $this->assertSame($matComponent, $ProductController->ExistComponent($stdComponenCode, 'B'));

        $this->assertTrue($ProductController->ValidCodePatter($stdCodeGreen));
        $this->assertTrue($ProductController->ValidCodePatter($stdCodeCustomTextGreen));
        $this->assertTrue($ProductController->ValidCodePatter($stdCodeNoComponentGreen));

        $this->assertSame('This is a -message 4 you', $ProductController->getCustomMessageFromRequest('M-BBRW-FCLT-LCHDRG-TL-This is a -message 4 you'));
        /* fixme somthing Wrong */
        //$this->assertSame('a"!@#$%^&*()_+|/\+',$ProductController->getCustomMessageFromRequest('M-BBRW-FCLT-LCHDRG-TREa"!@#$%^&*()_+|/\+'));

        /*moreTest*/

    }

}


