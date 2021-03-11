<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {

        DB::table('product')->insert([
            'sku' => 'M-' . Str::random(10),
            'code' => 'M-' . Str::random(2) . '-M' . Str::random(2) . '-C' . Str::random(2),
            'active' => true,
            'price' => '150.00',
        ]);
    }

}