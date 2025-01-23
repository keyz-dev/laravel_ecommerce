<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{ 
    protected $fillable = [
    'user_id',
    'status',
    'num_products',
    'total_price'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order_details(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }

}
