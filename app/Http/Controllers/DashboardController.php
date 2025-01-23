<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    return view("dashboard.index");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function users()
    {
        $users = User::all();
        return view("dashboard.user", compact("users"));
    }
    public function orders()
    {
        $orders = Order::all();
        return view("dashboard.order", compact('orders'));
    }
    public function categories()
    {
        return view("dashboard.categories");
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
