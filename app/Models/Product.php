<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'id_size');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_product', 'id');
    }
}
