<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matComponent extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mat_components';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';

}
