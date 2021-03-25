<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoCodeSeeder extends Seeder {

    public function run () {
        DB::table('promo_codes')->insert([
            ['code' => 'PROMOVALIDA1', 'description' => 'Codigo Valido Numero 1', 'enable' => 1, 'type' => '%', 'value' => '10', 'endDate' => '2021-11-28', 'condition' => 'Ninguna', 'conditionValue' => null, 'created_at' => '2021-03-12 13:33:59', 'updated_at' => '2021-03-14 20:09:33'],
            ['code' => 'PROMOVALIDA2', 'description' => 'Codigo Valido Numero 2', 'enable' => 1, 'type' => '$', 'value' => '10', 'endDate' => '2021-11-28', 'condition' => 'CountUse <=', 'conditionValue' => '100', 'created_at' => '2021-03-12 13:33:59', 'updated_at' => '2021-03-14 20:09:33'],
            ['code' => 'PROMOVALIDA3', 'description' => 'Mas de 2 Productos', 'enable' => 1, 'type' => '%', 'value' => '10', 'endDate' => '2021-11-28', 'condition' => 'ProducCount >', 'conditionValue' => '2', 'created_at' => '2021-03-12 13:33:59', 'updated_at' => '2021-03-14 20:09:33'],
            ['code' => 'PROMOVALIDA4', 'description' => 'Mas de 100 Dolares', 'enable' => 1, 'type' => '$', 'value' => '10', 'endDate' => '2021-11-28', 'condition' => 'CarPriceTotal >', 'conditionValue' => '100', 'created_at' => '2021-03-12 13:33:59', 'updated_at' => '2021-03-14 20:09:33'],
            ['code' => 'PROMONOVALIDA1', 'description' => 'Codigo No Valido Numero 1', 'enable' => 0, 'type' => '%', 'value' => '10', 'endDate' => '2000-01-01', 'condition' => 'Ninguna', 'conditionValue' => null, 'created_at' => '2021-03-12 13:33:59', 'updated_at' => '2021-03-14 20:09:33'],
        ]);

    }
}
