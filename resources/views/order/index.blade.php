@extends('layout')

@section('content')

<div class="container min-h-[60.1vh] flex flex-col gap-8">
    <h1 class="text-2xl font-semibold text-center">Your Orders</h1>

    <div class="flex flex-col flex-grow justify-center w-full h-full">
        @if (! Auth::check())
            <div class="w-full p-10 text-center bg-accent-light text-secondary text-lg transition-all duration-400">
                <p class="pb-5">Please <a href="{{route('user.login')}}" class="hover:underline font-semibold">Login</a> to View Your Orders</p>
            </div>
        @else
            @if($orders)
            @php
                $items = count($orders);
                $totalPrice = 0;
                $shippingPrice = 0;
                $taxPrice = 0
            @endphp
            <div class="w-full h-full gap-10">
                <div class="w-full bg-white p-4 max-h-[75vh] overflow-auto">
                    <table class="w-full table-auto">
                        <thead class="text-left text-lg font-medium border-b border-border_clr  ">
                        <tr>
                            <th class="text-secondary text-[16px]">O ID</th>
                            <th class="text-secondary text-[16px]">Customer</th>
                            <th class="text-secondary text-[16px]">status</th>
                            <th class="text-secondary text-[16px]">Date</th>
                            <th class="text-secondary text-[16px]">Products</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="border-b-2 border-b-border_clr">
                                    <td>
                                        <span>{{$order->id}}</span>
                                    </td>
                                    <td class="py-2">
                                        <div class="flex items-center gap-4">
                                            <img src="{{asset('storage/'.$order->user->profile_image)}}" alt="User Image" class="size-[45px] rounded-full object-cover">
                                            <span>{{$order->user->name}}</span>
                                        </div>
                                    </td>
                                    <td class="">
                                        @php
                                            $background = ($order->status == 'pending') ? 'pending-bg': (($order->status == 'cancelled') ? 'error-bg': 'success');
                                            $text_color = ($order->status == 'pending') ? 'pending': (($order->status == 'cancelled') ? 'error': 'success-bg');
                                        @endphp
                                        <span class="px-3 py-[2px] rounded-full border flex items-center w-fit justify-center bg-{{$background}} text-{{$text_color}} text-[11px]">{{$order->status}}</span>
                                    </td>
                                    <td class="">
                                        <div>
                                            <span>{{$order->created_at}}</span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <span>{{$order->num_products}}</span>
                                    </td>
                                    <td>
                                        <a href="" data-orderId="{{$order->id}}" class="flex size-[25px] rounded-full bg-gray-200 text-sm items-center justify-center text-secondary" title="product information">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>        
            </div>
            @else
            <div class="w-full p-10 text-center bg-accent-light text-secondary text-lg transition-all duration-400">
                <p class="pb-5">You Have No Orders yet</p>
                <a id="anchor" href="{{route('home.index')}}#products" class="text-sm opacity-80 group">    
                    <i class="fas fa-arrow-left transition-all duration-300 transform group-hover:-translate-x-2"></i>
                    <span class="ml-[6px]"> Continue Shopping</span>
                </a>
            </div>
        @endif
    @endif
    </div>
</div>
@endsection