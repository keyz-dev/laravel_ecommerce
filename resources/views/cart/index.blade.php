@extends('layout')

@section('content')

<div class="container min-h-[60.1vh] flex flex-col gap-8">
    <h1 class="text-2xl font-semibold text-center">Your Cart</h1>

    <div class="flex flex-col flex-grow justify-center w-full h-full">
        @if(count($cart) > 0)
        @php
            $items = count($cart);
            $totalPrice = 0;
            $shippingPrice = 0;
            $taxPrice = 0
        @endphp
        <div class="w-full h-full grid grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="col-span-2 w-full max-h-[50vh] overflow-auto overflow-x-auto">
                <table class="w-full min-w-[800px]">
                    <thead class="text-left text-lg font-medium border-b border-border_clr  ">
                      <tr>
                        <th class="">Product</th>
                        <th class="">Quantity</th>
                        <th class="">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $product)
                            @php
                                $image = asset('storage/'.$product['image']);
                                $name = $product['name'];
                                $price = number_format($product['price']);
                                $quantity = number_format($product['quantity']);
                                $description = $product['description'];
                                $subTotal = $price * $quantity;
                                $totalPrice += $subTotal;    
                                $cart_id = $product['cart_id'] ?? '';
                            @endphp
                        <tr>
                            <td class="py-1">
                                <div class="flex items-center gap-8 max-w-[300]">
                                    <img src="{{$image}}" alt="img" class="size-[100px] object-cover">
                                    <div>
                                        <h2 class="font-semibold ">{{$name}}</h2>
                                        <p>$<span>{{$price}}</span></p>
                                        <p class="text-sm text-secondary text-clamp-2 truncate max-w-[250px]">{{$description}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-center gap-5 px-1">
                                    <form action="{{route('cart.edit')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{$product['cart_id'] ?? ''}}">
                                        <input type="hidden" name="operation" value="minus">
                                        <input type="hidden" name="product_id" value="{{$id}}">
                                        <button type="submit" class="px-2 py-1 border border-border_clr hover:opacity-80">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </form>
                                    <span>{{$quantity}}</span>
                                    <form action="{{route('cart.edit')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="operation" value="add">
                                        <input type="hidden" name="product_id" value="{{$id}}">
                                        <button type="submit" class="px-2 py-1 border border-border_clr hover:opacity-80">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="">
                               ${{$subTotal}}
                            </td>
                            <td class="text-lg text-secondary">
                                <form action="{{route('cart.remove')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$id}}">
                                    <input type="hidden" name="cart_id" value="{{$cart_id}}">
                                    <button type="submit" class="px-2 py-1 text-sm hover:opacity-80 hover:text-error transition duration-300">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                <div class="flex flex-col w-full h-full lg:border-l-2 lg:border-l-border_clr items-center justify-center lg:px-4 gap-5">
                    <h2 class="text-2xl font-semibold">Cart Summary ({{$items}}) Item{{$items > 1 ? 's' : ''}}</h2>
                    
                    <hr class="border-none w-full h-[2px] bg-line_clr">

                    <div class="w-full flex items-center justify-between">
                        <p>TOTAL PRICE</p>

                        <p>${{$totalPrice}}</p>
                        @php
                            session(['total_price' => $totalPrice])
                        @endphp
                    </div>

                    <a href="{{route('order.create')}}" class="w-full mt-4">
                        <x-button 
                            text="PROCEED TO CHECKOUT"
                            class="btn-secondarybtn w-full py-4"
                        />
                    </a>
                    <a id="anchor" href="{{route('home.index')}}#products" class="text-sm opacity-80 group">    
                        <i class="fas fa-arrow-left transition-all duration-300 transform group-hover:-translate-x-2"></i>
                        <span class="ml-[6px]"> Add Products </span>
                    </a>
                </div>  
            </div>
        @else
        <div class="w-full p-10 text-center bg-accent-light text-secondary text-lg transition-all duration-400">
            <p class="pb-5">Your Cart is Empty.</p>
            <a id="anchor" href="{{route('home.index')}}#products" class="text-sm opacity-80 group">    
                <i class="fas fa-arrow-left transition-all duration-300 transform group-hover:-translate-x-2"></i>
                <span class="ml-[6px]"> Add Products </span>
            </a>
        </div>
        @endif
    </div>
</div>
@endsection