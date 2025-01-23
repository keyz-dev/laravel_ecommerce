<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public static function store($order_id, $product_id, $quantity)
    {
        return OrderDetails::create(compact("order_id", "product_id","quantity"));

    }

}
