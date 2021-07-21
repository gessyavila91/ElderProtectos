<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatComponentSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('mat_components')->truncate();
        DB::table('mat_components')->insert([
            [
                'code' => 'BRW',
                'fileName' => 'assets/img/customMat/fondo1.png',
                'description' => 'Standar Brown',
                'type' => 'B',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[   'code' => 'YLW',
                'fileName' => 'assets/img/customMat/fondo2.png',
                'description' => 'Yellow',
                'type' => 'B',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'CLT',
                'fileName' => 'assets/img/customMat/marco1.png',
                'description' => 'Celtic',
                'type' => 'F',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'ELD',
                'fileName' => 'assets/img/customMat/marco2.png',
                'description' => 'Eldrain Ivy',
                'type' => 'F',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'CHDRG',
                'fileName' => 'assets/img/customMat/centro1.png',
                'description' => 'Chinese Dragon',
                'type' => 'L',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'PWELD',
                'fileName' => 'assets/img/customMat/centro2.png',
                'description' => 'Planeswalker Eldrain',
                'type' => 'L',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],['code' => 'BLU',
                'fileName' => 'assets/img/customMat/blue.png',
                'description' => 'Blue',
                'type' => 'B',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'DRKBR',
                'fileName' => 'assets/img/customMat/dark-brick.png',
                'description' => 'Dark Brick',
                'type' => 'B',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'MSTRD',
                'fileName' => 'assets/img/customMat/mustard.png',
                'description' => 'Mustard',
                'type' => 'B',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'TAN',
                'fileName' => 'assets/img/customMat/tan.png',
                'description' => 'Tan',
                'type' => 'B',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'TBCCO',
                'fileName' => 'assets/img/customMat/tobacco.png',
                'description' => 'Tobacco',
                'type' => 'B',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ]
        ]);
    }
}
