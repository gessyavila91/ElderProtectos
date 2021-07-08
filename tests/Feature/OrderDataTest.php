<?php

namespace Tests\Unit;

use App\payment\paypal\Controllers\orderDataController;
use PHPUnit\Framework\TestCase;



class OrderDataTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest() {
        $orderData = new orderDataController();

        $data["intent"]     = "CAPTURE";

        $data["return_url"] = "/checkout";
        $data["cancel_url"] = "/cancel";

        $data["reference_id"]  = "EPU1";
        $data["currency_code"] = "USD";

        $data["name"]        = "Custom Playmat";
        $data["description"] = "Custom Playmat - Description";
        $data["sku"]         = "Custom Playmat sku";

        $data["unit_amount_value"] = "70";

        $data["items_quantity"] = "1";
        $data["items_category"] = "PHYSICAL_GOODS";

        $data["shipping_value"]          = "1";
        $data["tax_total_value"]         = "5";
        $data["handling_value"]          = "5";
        $data["shipping_discount_value"] = "5";
        $data["insurance_value"]         = "20";

        $orderData_assertion = [
            "intent" => $data["intent"],//"CAPTURE", // CAPTURE * | AUTHORIZE
            "application_context" => [
                "return_url" => "",
                "cancel_url" => ""
            ],
            "purchase_units" => array([
                "reference_id" => $data["reference_id"],
                "description" => "Elder Protectors - Custom Shop",//env app name
                "invoice_id"  => "INV-Elder Protectors",
                "custom_id"   => "CUST-Elder Protectors",
                "amount" => [
                    "currency_code" => $data["currency_code"],
                    "value" => $orderData->getPurchasedUnitAmount($data),
                    "breakdown" => $orderData->getBreakdown($data)
                ],
                "items" => array([
                "name" => $data["name"] ,
                "description" => $data["description"],
                "sku" => $data["sku"],
                    "unit_amount" => [ //Required
                        "currency_code" => $data["currency_code"],
                    "value" => $data["unit_amount_value"]
                ],
                "quantity" => $data["items_quantity"],
                    "category" => $data["items_category"]  //DIGITAL_GOODS | PHYSICAL_GOODS
                ])
            ])
        ];

        $this->assertSame($orderData_assertion, $orderData->initializeOrderData($data));
        $this->assert();
    }
    //"breakdown" => $this->getBreakdown($data)

    public function testbreakdownTest() {
        $orderData = new orderDataController();

        $data["currency_code"] = "USD";

        $data["item_total_value"] = "0";
        $data["shipping_value"] = "0";
        $data["tax_total_value"] = "0";
        $data["handling_value"] = "0";
        $data["shipping_discount_value"] = "0";
        $data["insurance_value"] = "0";

        $breakdownAssert = [
            "item_total" => [
                "currency_code" => "USD",
                "value" => "0"
            ],
            "shipping" => [
                "currency_code" => "USD",
                "value" => "0"
            ],
            "tax_total" => [
                "currency_code" => "USD",
                "value" => "0"
            ],
            "handling" => [
                "currency_code" => "USD",
                "value" => "0"
            ],
            "shipping_discount" => [
                "currency_code" => "USD",
                "value" => "0"
            ],
            "insurance" => [
                "currency_code" => "USD",
                "value" => "0"
            ]
        ];

        $this->assertSame($breakdownAssert, $orderData->getBreakdown($data));
    }
}
