<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use Database\Seeders\MatComponentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductTest extends TestCase {

    public function test_productApivalidProduct () {

        $producArray1 = [
            'matCode' => 'M-CBRW-FCLT-LCHDRG',
            'quantity' => 1,
            'customMsg' => 'Top Left: This is a Messaje 4 you'
        ];
        $producArray2 = [
            'matCode' => 'M-CBRW-FCLT-LCHDRG',
            'quantity' => 1,
            'customMsg' => null
        ];

        $response = $this->postJson('/api/product/valid', $producArray1);
        $response->assertStatus(200);

        $response = $this->postJson('/api/product/valid', $producArray2);
        $response->assertStatus(200);
        //TODO add assertCookie
        //$response->assertCookie();

    }

    public function test_ProductControllerValidCode () {

        DB::table('mat_components')->truncate();
        $this->seed(MatComponentSeeder::class);

        $stdCodeGreen    = 'M-CBRW-FCLT-LCHDRG';
        $stdCodeGreenNull = null;
        $stdComponenCode = 'BRW';

        $ProductController = new ProductController();

        $array = [
            'id' => 1,
            'code' => 'BRW',
            'enable' => 1,
            'fileName' => 'assets/img/customMat/fondo1.png',
            'description' => 'Standar Brown',
            'type' => 'C',
            'created_at' => '2021-03-12 13:33:59',
            'updated_at' => '2021-03-14 20:09:33'
        ];

        //TODO Crear Codigos con seeders o random o algo despues eliminar los mismos
        $this->assertSame($array,$ProductController->ExistComponent($stdComponenCode,'C'));
        $this->assertTrue($ProductController->ValidCodePatter($stdCodeGreen));

        //100% Real No Fake True Code
        $this->assertTrue($ProductController->ValidCode($stdCodeGreen));
        //Impostor Code Funar
        $this->assertFalse($ProductController->ValidCode('M-BRW-FCLT-CHDRG'));

        $this->assertFalse($ProductController->ValidCode($stdCodeGreenNull));


    }

}
