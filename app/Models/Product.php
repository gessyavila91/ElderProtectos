<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Attributes

    //Model OverWited Atributes

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sku','code','active','price'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    //Product Getters Setters

    /**
     * @return string
     */
    public function getSku (): string {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku (string $sku): void {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getCode (): string {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode (string $code): void {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getActive (): int {
        return $this->active;
    }

    /**
     * @param int $active
     */
    public function setActive (int $active): void {
        $this->active = $active;
    }

    /**
     * @return float
     */
    public function getPrice (): float {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice (float $price): void {
        $this->price = $price;
    }

}
