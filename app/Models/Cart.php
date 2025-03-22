<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'product_variant_id', 'count', 'status', 'purchased_date','address_id',
    'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVarient::class, 'product_variant_id');
    }

    
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
