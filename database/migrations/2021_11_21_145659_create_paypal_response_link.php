<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalResponseLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypalResponseLink', function (Blueprint $table) {
            //PaypalResponse Link
            $table->string('idPaypalResponseLink',20);
            $table->foreign('idPaypalResponseLink')->references('idPaypalResponse')->on('paypalresponse');

            $table->string('href',100);
            $table->string('rel',10);
            $table->string('method',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paypalResponseLink');
    }
}
