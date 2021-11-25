<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalResponse extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('paypalResponse', function(Blueprint $table) {

            $table->string('idPaypalResponse',20)->primary();

            $table->string('description', 30);
            $table->string('customId', 10);
            $table->string('invoiceId', 10);

            $table->datetime('createTime');
            $table->string('intent',20);
            $table->string('status',20);

            $table->string('referenceId', 10);
            //PRIMARY KEY
            $table->string('amountCurrencyCode', 3);
            $table->double('amountValue', 12, 4);
            //breakdown
            $table->string('breakdownItemTotalCurrencyCode', 4);
            $table->double('breakdownItemTotalValue', 12, 4);

            $table->string('breakdownShippingCurrencyCode', 4);
            $table->double('breakdownShippingValue', 12, 4);

            $table->string('breakdownHandlingCurrencyCode', 4);
            $table->double('breakdownHandlingValue', 12, 4);

            $table->string('breakdownTaxTotalCurrencyCode', 4);
            $table->double('breakdownTaxTotalValue', 12, 4);

            $table->string('breakdownInsuranceCurrencyCode', 4);
            $table->double('breakdownInsuranceValue', 12, 4);

            $table->string('breakdownShippingDiscountCurrencyCode', 4);
            $table->double('breakdownShippingDiscountValue', 12, 4);

            $table->string('breakdownDiscountCurrencyCode', 4);
            $table->double('breakdownDiscountValue,', 12, 4);

            $table->string('payeeEmailAddress', 100);
            $table->string('payeeMerchantId', 20);


            $table->string('nameGivenName',100);
            $table->string('nameSurname',100);
            $table->string('emailAddress',100);
            $table->string('payerId',100);
            $table->string('addressCountryCode',10);

            $table->string('shippingNameFullName', 100);
            $table->datetime('shippingAddressAddressLine1');
            $table->string('shippingAddressAddressLine2', 100);
            $table->string('shippingAddressAdminArea2', 100);
            $table->string('shippingAddressAdminArea1',100);
            $table->integer('shippingAddressPostalCode');
            $table->string('shippingAddressCountryCode', 100);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('paypalResponse');
    }
}
