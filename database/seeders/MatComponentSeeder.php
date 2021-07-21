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
                'exampleFilename' => 'assets/img/matExample/no_image-available.jpg',
                'stockEable' => 1,
                'stock' => '100',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'

            ],[   'code' => 'YLW',
                'fileName' => 'assets/img/customMat/fondo2.png',
                'description' => 'Yellow',
                'type' => 'B',
                'exampleFilename' => 'assets/img/matExample/no_image-available.jpg',
                'stockEable' => 1,
                'stock' => '100',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'CLT',
                'fileName' => 'assets/img/customMat/marco1.png',
                'description' => 'Celtic',
                'type' => 'F',
                'exampleFilename' => null,
                'stockEable' => 0,
                'stock' => null,
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'ELD',
                'fileName' => 'assets/img/customMat/marco2.png',
                'description' => 'Eldrain Ivy',
                'type' => 'F',
                'exampleFilename' => null,
                'stockEable' => 0,
                'stock' => null,
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'CHDRG',
                'fileName' => 'assets/img/customMat/centro1.png',
                'description' => 'Chinese Dragon',
                'type' => 'L',
                'exampleFilename' => null,
                'stockEable' => 0,
                'stock' => null,
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'PWELD',
                'fileName' => 'assets/img/customMat/centro2.png',
                'description' => 'Planeswalker Eldrain',
                'type' => 'L',
                'exampleFilename' => null,
                'stockEable' => 0,
                'stock' => null,
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'BLU',
                'fileName' => 'assets/img/customMat/blue.png',
                'description' => 'Blue',
                'type' => 'B',
                'exampleFilename' => 'assets/img/matExample/blueExample.png',
                'stockEable' => 1,
                'stock' => '100',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'DRKBR',
                'fileName' => 'assets/img/customMat/dark-brick.png',
                'description' => 'Dark Brick',
                'type' => 'B',
                'exampleFilename' => 'assets/img/matExample/dark-brickExample.png',
                'stockEable' => 1,
                'stock' => '100',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'MSTRD',
                'fileName' => 'assets/img/customMat/mustard.png',
                'description' => 'Mustard',
                'type' => 'B',
                'exampleFilename' => 'assets/img/matExample/mustardExample.png',
                'stockEable' => 1,
                'stock' => '100',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'TAN',
                'fileName' => 'assets/img/customMat/tan.png',
                'description' => 'Tan',
                'type' => 'B',
                'exampleFilename' => 'assets/img/matExample/tanExample.png',
                'stockEable' => 1,
                'stock' => '100',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ],[
                'code' => 'TBCCO',
                'fileName' => 'assets/img/customMat/tobacco.png',
                'description' => 'Tobacco',
                'type' => 'B',
                'exampleFilename' => 'assets/img/matExample/tobaccoExample.png',
                'stockEable' => 1,
                'stock' => '100',
                'created_at' => '2021-03-12 13:33:59',
                'updated_at' => '2021-03-14 20:09:33'
            ]
        ]);
    }
}
