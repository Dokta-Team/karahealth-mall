<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
       
        'name',
        'price',
        'before_discount_price',
        'quantity',
        'sku',
        'category_id',
        'brand_id',
        'highlights',
        'detail',
        'delivery_available',
        'thumbnail',
        'user_id'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function varients(): HasMany
    {
        return $this->hasMany(ProductVarient::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
