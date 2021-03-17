<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mat_components', function (Blueprint $table) {
            $table->id();
            /*TODO Estableser numero minimo de caracteres*/
            $table->string('code',10)->unique();
            /*Poner Default a el Enable*/
            $table->boolean('enable');
            $table->string('fileName')->unique();
            $table->string('description');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mat_components');
    }
}
