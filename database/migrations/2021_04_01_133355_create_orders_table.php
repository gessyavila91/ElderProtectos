<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->integer('user');//Usuario que creo la venta

            $table->string('email');// Correo ingresado
            $table->string('address'); //Direccion de envio
            $table->string('country'); // pais de envio
            $table->string('state');// estado del envio
            $table->string('city'); // ciudad del envio
            $table->string('zipCode'); // codigo postal del envio

            $table->string('shippingMethod'); // Metod de envio
            $table->string('trackNumber'); // numero de reastreo

            $table->string('paymentMethod'); //metodo de pago
            $table->boolean('paymentConfirmation'); // confirmacion dedl pago
            $table->string('paymentData'); // informaicion del pago
            $table->dateTime('paymentConfirmDate'); //fecha de confirmacion del pago

            $table->string('promoCode'); // codigo promo

            $table->boolean('isGift');  //si es un regalo
            $table->string('giftMessage')->nullable(); // mensaje del regalo

            $table->string('indications')->nullable(); // indicacion especiales del productop

            $table->string('products'); // lista de productos

            $table->double('total',10,4); // total delpedido

            $table->string('status');// estatus del pedido
            /* Status
             * pagado
             * Crafteando
             * In Transit
             * Delivered
             *
             * Perdido
             * Daniado
             * retornado Regresado a remitente
             * Cancelado
             */







            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('orders');
    }
}
