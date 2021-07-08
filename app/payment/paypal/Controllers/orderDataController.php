<?php


namespace App\payment\paypal\Controllers;


class orderDataController {

    public function initializeOrderData($data): array {

        $randNo = (string)rand(10000, 20000);

        $orderData_Original = [

            "intent" => $data["intent"], // CAPTURE * | AUTHORIZE
            "application_context" => [
                "return_url" => "",
                "cancel_url" => ""
            ],
            "purchase_units" => array([
                "reference_id" => $data["reference_id"],
                "description" => "Elder Protectors - Custom Shop",//env app name
                "invoice_id" => "INV-Elder Protectors",
                "custom_id" => "CUST-Elder Protectors",
                "amount" => [
                    "currency_code" => $data["currency_code"],
                    "value" => $this->getPurchasedUnitAmount($data),
                    "breakdown" => $this->getBreakdown($data)
                ],
                "items" => array([
                    "name" => $data["name"],
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

        /*var_dump($orderData_Original);
        echo "\n";*/
        return $orderData_Original;
    }


    public function getPurchasedUnitAmount($data){

        $PurchasedUnitAmount = 0.00;

        if (isset($data["unit_amount_value"])){
            $PurchasedUnitAmount += ($data["unit_amount_value"] * $data["items_quantity"]);
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
        if (isset($data["shipping_discount_value"])){
            $PurchasedUnitAmount -= $data["shipping_discount_value"];
        }
        if (isset($data["insurance_value"])){
            $PurchasedUnitAmount += $data["insurance_value"];
        }

        return strval($PurchasedUnitAmount);

    }

    public function getBreakdown($data): array {

        $breakdown = [];

        if (isset($data["unit_amount_value"])){
            $breakdown["item_total"] = [
                "currency_code" => $data["currency_code"],
                "value" => strval(($data["unit_amount_value"] * $data["items_quantity"]))
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

        return $breakdown;
    }

    public function getItems($data){

    }

}
