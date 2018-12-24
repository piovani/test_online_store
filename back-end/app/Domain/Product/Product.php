<?php

namespace App\Domain\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
