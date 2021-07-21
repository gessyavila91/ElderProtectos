<?php


namespace App\payment\paypal\Controllers;


class orderDataController {

    public function initializeOrderData($data): array {

        $array = [
            "intent" => $data["intent"], // CAPTURE * | AUTHORIZE
            "application_context" => [
                "return_url" => "",
                "cancel_url" => "",
                "shipping_preference"=>"SET_PROVIDED_ADDRESS",
                "user_action"=>"PAY_NOW"
            ],
            "purchase_units" => array([
                "reference_id" => $data["reference_id"],
                "description" => "Elder Protectors - Custom Shop",//env app name
                "invoice_id" => $data["invoice_id"],
                "custom_id" => $data["custom_id"],
                "amount" => [
                    "currency_code" => $data["currency_code"],
                    "value" => $this->getPurchasedUnitAmount($data),
                    "breakdown" => $this->getBreakdown($data)
                ],
                "items" => $this->getItems($data),
                "shipping" => $this->getShipping($data)
            ])
        ];

        var_dump($array);

        return $array;
    }

    public function getPurchasedUnitAmount($data){

        $PurchasedUnitAmount = 0.00;

        if (isset($data["item"])){
            $PurchasedUnitAmount += $this->getUnit_amount_value($data);
        }
        if (isset($data["shipping_value"])){
            $PurchasedUnitAmount += $data["shipping_value"];
        }
        if (isset($data["tax_total_value"])){
            $PurchasedUnitAmount += $data["tax_total_value"];
        }
        if (isset($data["handling_value"])){
            $PurchasedUnitAmount += $data["handling_value"];
        }
        if (isset($data["insurance_value"])){
            $PurchasedUnitAmount += $data["insurance_value"];
        }
        if (isset($data["shipping_discount_value"])){
            $PurchasedUnitAmount -= $data["shipping_discount_value"];
        }
        if (isset($data["discount_value"])){
            $PurchasedUnitAmount -= $data["discount_value"];
        }

        return strval($PurchasedUnitAmount);
    }

    public function getUnit_amount_value($data) : float {
        $amount_value = 0;
        foreach($data["item"] as $item) {
            $amount_value += $item["items_quantity"] * $item["unit_amount_value"];
        }
        return $amount_value;
    }


    public function getBreakdown($data): array {

        $breakdown = [];

        if (isset($data["item"])){
            $breakdown["item_total"] = [
                "currency_code" => $data["currency_code"],
                "value" => strval($this->getUnit_amount_value($data))
            ];
        }
        if (isset($data["shipping_value"])){
            $breakdown["shipping"] = [
                "currency_code" => $data["currency_code"],
                "value" => $data["shipping_value"]
            ];
        }
        if (isset($data["tax_total_value"])){
            $breakdown["tax_total"] = [
                "currency_code" => $data["currency_code"],
                "value" => $data["tax_total_value"]
            ];
        }
        if (isset($data["handling_value"])){
            $breakdown["handling"] = [
                "currency_code" => $data["currency_code"],
                "value" => $data["handling_value"]
            ];
        }
        if (isset($data["shipping_discount_value"])){
            $breakdown["shipping_discount"] = [
                "currency_code" => $data["currency_code"],
                "value" => $data["shipping_discount_value"]
            ];
        }
        if (isset($data["insurance_value"])){
            $breakdown["insurance"] = [
                "currency_code" => $data["currency_code"],
                "value" => $data["insurance_value"]
            ];
        }
        if (isset($data["discount_value"])){
            $breakdown["discount"] = [
                "currency_code" => $data["currency_code"],
                "value" => $data["discount_value"]
            ];
        }

        return $breakdown;
    }

    public function getItems($data): array {

        $array = [];

        foreach($data["item"] as $item) {
            array_push($array,
                [
                    "name" => $item["name"],
                    "description" => $item["description"],
                    "sku" => $item["sku"],
                    "unit_amount" => [ //Required
                        "currency_code" => $data["currency_code"],
                        "value" => strval($item["unit_amount_value"])
                    ],
                    "quantity" => strval($item["items_quantity"]),
                    "category" => $item["items_category"]
                ]

            );
        }
        return $array;
    }

    public function getShipping($data): array {

        $array = ["address" => [
            "address_line_1" => $data['address_line_1'],
            "address_line_2" => $data['address_line_2'],
            "admin_area_1"   => $data['admin_area_1'],
            "admin_area_2"   => $data['admin_area_2'],
            "postal_code"    => $data['postal_code'],
            "country_code"   => strtoupper($data['country_code'])

        ]];

        return $array;
    }

}
