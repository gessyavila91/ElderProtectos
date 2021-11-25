<?php

namespace App\payment\paypal\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paypalResponseLink extends Model
{
    use HasFactory;

    protected $table = 'paypalresponselink';
    protected $primaryKey = 'idPaypalResponse';
}
