<?php

namespace App\payment\paypal\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paypalResponseItem extends Model
{
    use HasFactory;

    protected $table = 'paypalresponseitem';
}
