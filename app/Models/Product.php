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
        'age_category_id',
        'sales_category_id',
        'image',
        'discount',
    ];

    public function age_category(){
        return $this->belongsTo(AgeCategories::class, 'age_category_id');
    }

    public function sales_category(){
        return $this->belongsTo(SalesCategory::class, 'sales_category_id');
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function order_details(){
        return $this->hasMany(OrderDetails::class);
    }
}
