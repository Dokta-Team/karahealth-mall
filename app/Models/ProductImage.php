<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id', 
        'image_path'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
