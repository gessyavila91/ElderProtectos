<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatComponentsTable extends Migration {

    public function up () {

        Schema::create('mat_components', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->boolean('enable')->default(1);
            $table->string('fileName')->unique();
            $table->string('description');
            $table->string('type');
            $table->timestamps();
        });
    }

    public function down () {
        Schema::dropIfExists('mat_components');
    }
}
