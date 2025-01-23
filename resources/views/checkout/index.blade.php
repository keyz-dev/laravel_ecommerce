@extends('layout')

@section('content')

<div class="container min-h-[60.1vh] flex flex-col gap-8">
    <h1 class="text-2xl font-semibold text-center">Checkout Page</h1>

    @php
        $user = Auth::user();
        $totalPrice = session('total_price') ?? 0;
        $shippingPrice = 0;
        $taxPrice = 0
    @endphp

    <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-10 lg:grid-cols-3  w-full h-full">
        <div class="flex flex-col gap-6">
            <div>
                <h2 class="text-lg font-semibold mb-6">Billing Information</h2>
                <div class="flex flex-col gap-4 items-center">
                    <x-input type="text" name="name" label="Name" disabled="true" value="{{$user->name}}"/>
                    <x-input type="email" name="email" label="Email" disabled="true" value="{{$user->email}}"/>
                    <x-input type="text" name="address" label="Address" disabled="true" value="{{$user->address}}"/>
                    <x-input type="text" name="phone" label="Phone Number" disabled="true" value="{{$user->phone}}"/>
                    <x-input type="date" name="date" label="Date" disabled="true" value="{{date('Y-m-d')}}"/>
                    
                    <x-button 
                        text="Edit"
                        type="submit"
                        class="btn-secondarybtn py-1 px-2 sm:py-4 text-sm xl:text-base bg-pending-bg text-primary font-semibold w-1/2 mt-2"
                    />
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-6">
            <h2 class="text-lg font-semibold mb-6">Payment Options</h2>

            <form class="flex flex-col gap-4">
                <p class="text-sm text-secondary">
                    Select a payment option below
                </p>
                <div class="flex w-full gap-6 items-center">
                    <div class="flex gap-4" >
                        <input type="radio" name="pay_option" id="mtn" value="mtn">
                        <label for="mtn">
                            <img src="{{ $momo }}" alt="MTN" class="max-w-20 mr-2"/>
                        </label>
                    </div>
                    <div class="flex gap-4">
                        <input type="radio" name="pay_option" value="orange" id="orange">
                        <label for="orange">
                            <img src="{{ $orange }}" alt="ORANGE" class="max-w-16"/>
                        </label>
                    </div>
                </div>
                <x-input type="number" name="tel" label="Payment Number" disabled="false" value="{{$user->phone}}"/>
            </form>
        </div>

        <div class="flex flex-col w-full h-full bg-seconday-bg border-none md:border-l-2 md:border-l-border_clr items-center md:px-4 gap-6">
            <h2 class="text-lg font-semibold">Payment Summary</h2>
            <hr class="border-none w-full h-[1px] bg-line_clr">

            <div class="w-full flex items-center justify-between">
                <p>Shipping</p>
                <p>{{$shippingPrice == 0 ? 'Free': '$'.$shippingPrice}}</p>
            </div>
            <div class="w-full flex items-center justify-between">
                <p>Tax</p>
                <p>${{$taxPrice}}</p>
            </div>
            <div class="w-full flex items-center justify-between">
                <p>Subtotal</p>
                <p>${{$totalPrice}}</p>
            </div>

            <hr class="border-none w-full h-[2px] bg-line_clr">

            <div class="w-full flex items-center justify-between">
                <p>TOTAL PRICE</p>
                
                <p>${{$totalPrice + $taxPrice + $shippingPrice}}</p>
            </div>

            <div class="flex gap-10 w-full text-sm">
                <a href="{{route('checkout.pay', ['operation' => 'cancelled'])}}" class="w-full mt-4">
                    <x-button 
                        text="Cancel"
                        class="btn-secondarybtn w-full py-1 px-2 sm:py-4 text-sm xl:text-base bg-gray-200 text-primary"
                    />
                </a>
                <a href="{{route('checkout.pay', ['operation' => 'accepted'])}}" class="w-full mt-4">
                    <x-button 
                        text="MAKE PAYMENT"
                        class="btn-secondarybtn w-full py-1 px-2 sm:py-4 text-sm xl:text-base"
                    />
                </a>
            </div>

            <a id="anchor" href="{{route('cart.index')}}#products" class="text-sm opacity-80 group">    
                <i class="fas fa-arrow-left transition-all duration-300 transform group-hover:-translate-x-2"></i>
                <span class="ml-[6px]"> Back to Cart </span>
            </a>
        </div>  
    </div>
@endsection