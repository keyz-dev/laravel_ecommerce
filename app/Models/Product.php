<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'image',
        'discount',
    ];

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function order_details(){
        return $this->hasMany(OrderDetails::class);
    }
}
