<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Support\Facades\DB;

class PromoCodeController extends Controller {

    public function validPromoCode ($Code) {
        $promoCode = PromoCode::where('code', $Code)->where('enable', 1)
            ->get();

        if (count($promoCode) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function information ($Code) {
        $promoCode = DB::table('promo_codes')
            ->where('code', $Code)
            ->Where('enable', '1')
            ->first();

        if (isset($promoCode)) {
            return (array)$promoCode;
        }
        return false;
    }


}
