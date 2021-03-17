<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'id_size');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_stock', 'id');
    }
}
