<?php

namespace Tests\Feature;

use App\Http\Controllers\PromoCodeController;
use Database\Seeders\MatComponentSeeder;
use Database\Seeders\PromoCodeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PromoCodeTest extends TestCase {

    public function test_productApiValidPromoCode () {
        DB::table('promo_codes')->truncate();
        $this->seed(PromoCodeSeeder::class);

        $promoCodeGreen = 'PROMOVALIDA1';
        $promoCodeRed = 'LoQueSea';


        $PROMOVALIDA1 = [
            'id' => 1,
            'code' => 'PROMOVALIDA1',
            'description' => 'Codigo Valido Numero 1',
            'enable' => 1,
            'value' => '%10',
            'endDate' => '2021-11-28',
            'condition' => 'Ninguna',
            'conditionValue' => null,
            'countUses' => 0,
            'created_at' => '2021-03-12 13:33:59',
            'updated_at' => '2021-03-14 20:09:33'
        ];

        $promoCode = new PromoCodeController();

        $promoCode->validPromoCode($promoCodeGreen);

        $this->assertTrue($promoCode->validPromoCode($promoCodeGreen));
        $this->assertfalse($promoCode->validPromoCode($promoCodeRed));

        $this->assertSame($PROMOVALIDA1, $promoCode->information($promoCodeGreen));

    }

    public function test_addPromoCode2Car () {
        DB::table('promo_codes')->truncate();
        $this->seed(PromoCodeSeeder::class);

        $promoCodeGreen = 'PROMOVALIDA1';
        $promoCodeRed = 'LoQueSea';


        $PROMOVALIDA1 = [
            'id' => 1,
            'code' => 'PROMOVALIDA1',
            'description' => 'Codigo Valido Numero 1',
            'enable' => 1,
            'value' => '%10',
            'endDate' => '2021-11-28',
            'condition' => 'Ninguna',
            'conditionValue' => null,
            'countUses' => 0,
            'created_at' => '2021-03-12 13:33:59',
            'updated_at' => '2021-03-14 20:09:33'
        ];

        $promoCode = new PromoCodeController();

        $promoCode->validPromoCode($promoCodeGreen);

        $this->assertTrue($promoCode->validPromoCode($promoCodeGreen));
        $this->assertfalse($promoCode->validPromoCode($promoCodeRed));

        $this->assertSame($PROMOVALIDA1, $promoCode->information($promoCodeGreen));

    }
}
