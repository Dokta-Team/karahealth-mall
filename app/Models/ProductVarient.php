<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVarient extends Model
{
    protected $fillable = [
        'name', 
        'price',
        'product_id',
    ];
}
