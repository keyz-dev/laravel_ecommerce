<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index(Request $request){
        $momo = asset('icons/momo.webp');
        $orange = asset('icons/orange.png');
        return view('checkout.index', compact('momo', 'orange'));
    }

    public function store(Request $request){
        // Handle the payment logic
        $operation = $request->operation;
        $order_id = session('order_id');
        $total_price = session('total_price');
        $order = Order::findOrFail($order_id);
        if($operation === 'accepted'){
            $order->update(['total_price' => $total_price, 'status'=>'accepted']);
            $message ='Your shipping is on the way';
        }
        else{
            $order->update(['total_price' => $total_price, 'status'=>'cancelled']);
            $message ='Your Order was successfully canceled';
        }
        
        

        session()->forget('cart');
        session([
            'status' => 'success',
            'message'=> $message,
            'orders' => $order_id
        ]);
        return redirect()->route('home.index');
    }
}
