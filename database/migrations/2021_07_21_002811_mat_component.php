<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MatComponent extends Migration {

    public function up() {
        Schema::table('mat_components', function(Blueprint $table) {
            $table->integer('stock')->default(0)->nullable();
            $table->boolean('stockEable')->default(0);
            $table->string('exampleFileName')->nullable();
        });
    }

}
