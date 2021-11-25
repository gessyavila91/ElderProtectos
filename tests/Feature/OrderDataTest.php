<?php

namespace Tests\Unit;

use App\payment\paypal\Controllers\orderDataController;
use PHPUnit\Framework\TestCase;


class OrderDataTest extends TestCase {

    private $data;

    protected function setUp() : void{

        $this->data["intent"] = "CAPTURE";

        $this->data["return_url"] = "/checkout";
        $this->data["cancel_url"] = "/cancel";

        $this->data["reference_id"] = "EPU1";
        $this->data["currency_code"] = "USD";

        $this->data["shipping_value"] = "1";
        $this->data["handling_value"] = "5";
        $this->data["tax_total_value"] = "5";
        $this->data["insurance_value"] = "20";
        $this->data["shipping_discount_value"] = "5";
        $this->data["discount_value"] = "0";

        $this->data["invoice_id"] = "INV-Elder Protectors".rand(10000, 20000);
        $this->data["custom_id"] = "CUST-Elder Protectors";

        $this->data["full_name"] = "Gessy Avila";

        $this->data["address_line_1"] = 'Revolucion 1500';
        $this->data["address_line_2"] = 'Boulevar 400';
        $this->data["admin_area_1"] = 'Jalisco';
        $this->data["admin_area_2"] = 'Guadalajara';
        $this->data["postal_code"] = '44290';
        $this->data["country_code"] = 'MX';

        $this->data["item"] = [
            [
                "name" => "Custom Playmat",
                "description" => "M-BBRW-FELD-LCHDRG Custom Text TL-This is a Message 4 you",
                "sku" => "M-BBRW-FELD-LCHDRG",
                "unit_amount_value" => "70",
                "items_category" => "PHYSICAL_GOODS",
                "items_quantity" => "1"
            ],
            [
                "name" => "Custom Playmat",
                "description" => "Custom Playmat M-BBRW-FELD-LPWELD",
                "sku" => "M-BBRW-FELD-LPWELD",
                "unit_amount_value" => "70",
                "items_category" => "PHYSICAL_GOODS",
                "items_quantity" => "1"
            ],
            [
                "name" => "Custom Playmat",
                "description" => "Custom Playmat M-BBRW-FELD-LCHDRG",
                "sku" => "M-BBRW-FELD-LCHDRG",
                "unit_amount_value" => "70",
                "items_category" => "PHYSICAL_GOODS",
                "items_quantity" => "1"
            ],
            [
                "name" => "Its a Gif",
                "description" => "With love to: Gessy",
                "sku" => "GIFT-NOTE",
                "unit_amount_value" => "0",
                "items_category" => "PHYSICAL_GOODS",
                "items_quantity" => "1"
            ]
        ];
    }

    public function testCreateObjectOrderData() {
        $orderData = new orderDataController();

        $orderData_assertion = [
            "intent" => $this->data["intent"],//"CAPTURE", // CAPTURE * | AUTHORIZE
            "application_context" => [
                "return_url" => "",
                "cancel_url" => "",
                'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                'user_action' => 'PAY_NOW'
            ],
            "purchase_units" => array([
                "reference_id" => $this->data["reference_id"],
                "amount" => [
                    "currency_code" => $this->data["currency_code"],
                    "value" => $orderData->getPurchasedUnitAmount($this->data),
                    "breakdown" => $orderData->getBreakdown($this->data)
                ],
                "description" => "Elder Protectors - Custom Shop",//env app name
                "invoice_id" => $this->data["invoice_id"],
                "custom_id" => "CUST-Elder Protectors",

                "items" => $orderData->getItems($this->data),
                "shipping" => $orderData->getShipping($this->data),
            ])
        ];

        $this->assertSame($orderData_assertion, $orderData->initializeOrderData($this->data));
    }

    public function testBreakdownTest() {
        $orderData = new orderDataController();

        $breakdownAssert = [
            "item_total" => [
                "currency_code" => $this->data["currency_code"],
                "value" => strval($orderData->getUnit_amount_value($this->data))
            ],
            "shipping" => [
                "currency_code" => $this->data["currency_code"],
                "value" => $this->data["shipping_value"]
            ],
            "handling" => [
                "currency_code" => $this->data["currency_code"],
                "value" => $this->data["handling_value"]
            ],
            "tax_total" => [
                "currency_code" => $this->data["currency_code"],
                "value" => $this->data["tax_total_value"]
            ],
            "insurance" => [
                "currency_code" => $this->data["currency_code"],
                "value" => $this->data["insurance_value"]
            ],
            "shipping_discount" => [
                "currency_code" => $this->data["currency_code"],
                "value" => $this->data["shipping_discount_value"]
            ],
            "discount" => [
                "currency_code" => $this->data["currency_code"],
                "value" => $this->data["discount_value"]
            ]

        ];

        $this->assertSame($breakdownAssert, $orderData->getBreakdown($this->data));
    }

    public function testShipping() {
        $orderData = new orderDataController();

        $shippinAssert = [
            "name" => [
                "full_name" => $this->data["full_name"]
            ],
            "address" => [
                "address_line_1" => $this->data["address_line_1"],
                "address_line_2" => $this->data["address_line_2"],
                "admin_area_1" => $this->data["admin_area_1"],
                "admin_area_2" => $this->data["admin_area_2"],
                "postal_code" => $this->data["postal_code"],
                "country_code" => $this->data["country_code"]
            ]
        ];


        $this->assertSame($shippinAssert, $orderData->getShipping($this->data));


    }
}
