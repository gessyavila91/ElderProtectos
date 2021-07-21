<?php

namespace Tests\Unit;

use App\payment\paypal\Controllers\orderDataController;
use PHPUnit\Framework\TestCase;



class OrderDataTest extends TestCase {

    public function testCreateObjectOrderData() {
        $orderData = new orderDataController();

        $data["intent"]     = "CAPTURE";

        $data["return_url"] = "/checkout";
        $data["cancel_url"] = "/cancel";

        $data["reference_id"]  = "EPU1";
        $data["currency_code"] = "USD";



        $data["invoice_id"] = "INV-Elder Protectors".rand(10000, 20000);

        $data["items_quantity"] = "1";
        $data["items_category"] = "PHYSICAL_GOODS";

        $data["shipping_value"]          = "1";
        $data["tax_total_value"]         = "5";
        $data["handling_value"]          = "5";
        $data["shipping_discount_value"] = "5";
        $data["insurance_value"]         = "20";

        $data["item"] = [
            [
                "name"              => "Custom Playmat 1",
                "description"       => "Custom Playmat - Description 1",
                "sku"               => "sku-1",
                "unit_amount_value" => "70",
                "items_category"    => "PHYSICAL_GOODS",
                "items_quantity"    => "1"
            ],
            [
                "name"              => "Custom Playmat 2",
                "description"       => "Custom Playmat - Description 2",
                "sku"               => "sku-2",
                "unit_amount_value" => "70",
                "items_category"    => "PHYSICAL_GOODS",
                "items_quantity"    => "1"
            ]
        ];

        $orderData_assertion = [
            "intent" => $data["intent"],//"CAPTURE", // CAPTURE * | AUTHORIZE
            "application_context" => [
                "return_url" => "",
                "cancel_url" => ""
            ],
            "purchase_units" => array([
                "reference_id" => $data["reference_id"],
                "description" => "Elder Protectors - Custom Shop",//env app name
                "invoice_id"  => $data["invoice_id"],
                "custom_id"   => "CUST-Elder Protectors",
                "amount" => [
                    "currency_code" => $data["currency_code"],
                    "value" => $orderData->getPurchasedUnitAmount($data),
                    "breakdown" => $orderData->getBreakdown($data)
                ],
                "items" => $orderData->getItems($data)
            ])
        ];

        $this->assertSame($orderData_assertion, $orderData->initializeOrderData($data));
    }

    public function testbreakdownTest() {
        $orderData = new orderDataController();

        $data["currency_code"] = "USD";

        $data["item_total_value"] = "0";
        $data["shipping_value"] = "0";
        $data["tax_total_value"] = "0";
        $data["handling_value"] = "0";
        $data["shipping_discount_value"] = "0";
        $data["insurance_value"] = "0";
        $data["unit_amount_value"] = "0";
        $data["items_quantity"] = "0";
        $data["discount_value"] = "0";
        $data["item"] = [
            [
                "name"              => "Custom Playmat 1",
                "description"       => "Custom Playmat - Description 1",
                "sku"               => "sku-1",
                "unit_amount_value" => "70",
                "items_category"    => "PHYSICAL_GOODS",
                "items_quantity"    => "1"
            ],
            [
                "name"              => "Custom Playmat 2",
                "description"       => "Custom Playmat - Description 2",
                "sku"               => "sku-2",
                "unit_amount_value" => "70",
                "items_category"    => "PHYSICAL_GOODS",
                "items_quantity"    => "1"
            ]
        ];

        $breakdownAssert = [
            "item_total" => [
                "currency_code" => "USD",
                "value" => "140"
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
            ],
            "discount" => [
                "currency_code" => "USD",
                "value" => "0"
            ]

        ];

        $this->assertSame($breakdownAssert, $orderData->getBreakdown($data));
    }
}