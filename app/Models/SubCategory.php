<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function professions()
    {
        return $this->hasMany(Profession::class, 'sub_category_id');
    }
}
