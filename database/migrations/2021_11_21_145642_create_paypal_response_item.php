<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalResponseItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypalResponseItem', function (Blueprint $table) {
            //PaypalResponse Item List
            $table->string('idPaypalResponseItem',20);
            $table->foreign('idPaypalResponseItem')->references('idPaypalResponse')->on('paypalresponse');

            $table->string('itemsReferenceId', 4);
            $table->string('name', 100);
            $table->string('unitAmountCurrencyCode', 3);
            $table->double('unitAmountValue', 12, 4);
            $table->integer('quantity');
            $table->string('description', 255);
            $table->string('sku', 100);
            $table->string('category', 20);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paypalResponseItem');
    }
}
