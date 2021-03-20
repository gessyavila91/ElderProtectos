<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration {

    public function up () {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code', 25)->unique();
            $table->string('description', 255)->nullable();
            $table->boolean('enable')->default(1);
            $table->string('value', 100);
            $table->date('endDate')->nullable();
            $table->string('condition', 100)->nullable();
            $table->string('conditionValue', 100)->nullable();
            $table->integer('countUses')->default(0);

            $table->timestamps();
        });
    }

    public function down () {
        Schema::dropIfExists('promo_codes');
    }
}
