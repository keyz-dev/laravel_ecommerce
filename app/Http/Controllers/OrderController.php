<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = [];
        if (Auth::check()){
            $user = User::find(Auth::id());
            $orders = $user->orders;
        }
        return view("order.index", compact("orders"));
    }


    public function store()
    {
        // Check if the user is logged in
        if(!Auth::check()){
            session([
                'status' => 'warning',
                "message"=>"You should login to continue",
                'checkout' => 'user trying to checkout'
            ]);
            return redirect()->route('user.login');
        }
        // Get the cart information from the session
        $cart = Session::get('cart', []);
        $user_id = Auth::user()->id;
        // create an order
        $order = Order::create([
            'user_id'=> (int)$user_id,
            'status' => 'pending',
            'num_products' => count($cart)
        ]);
        $order_id = $order->id;
        // create an order detail
        if(count($cart) > 0){
            foreach($cart as $id => $item){
                OrderDetailsController::store($order_id, $id, $item['quantity']);

                // remove the item from the cart db table if exists
                if(isset($item['cart_id'])){
                    Cart::destroy($item['cart_id']);
                }
            }
        }
        // redirect to the checkout page
        session([
            'order_id' => $order_id,
            'status'=> 'success',
            'message'=> 'Your Order has been saved',
        ]);

        return redirect()->route('checkout.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
