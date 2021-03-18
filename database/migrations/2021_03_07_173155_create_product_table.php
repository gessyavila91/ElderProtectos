<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration {

    public function up () {

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 80)->unique();
            $table->string('code', 35)->unique();
            $table->boolean('active')->default(1);
            $table->decimal('price', 10, 4)->default(50.01);
            $table->timestamps();

        });
    }

    public function down () {
        Schema::dropIfExists('product');
    }
}
