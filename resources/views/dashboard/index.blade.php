@extends('dashboard_layout')

@push('scripts')
    <script type="text/javascript" src="{{asset('js/product.js')}}" defer></script>
@endpush

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session()->has('status'))
                console.log("{{ session('status') }}");
                showNotification('{{ session('message') }}', '{{session('status')}}');
                {{ session()->forget('status') }}
                {{ session()->forget('message') }}
            @endif
        });
    </script>

<div id="notification-container" class="relative w-full">
    <!-- Notifications will appear here -->
</div>
        
<div class="w-full flex justify-between items-center sm:items-start">
    <h2 class="text-2xl font-semibold text-primary">
        All Products
    </h2>
    <a href="{{route('product.create')}}" class="" >
        <x-button 
        class="btn-primarybtn bg-success-bg px-3 py-2 text-white" 
        text="Add Product" 
        icon="<i class='fas fa-plus'></i>"
        type="button"
        />
    </a>
</div>

<div class="w-full bg-white p-4 max-h-[75vh] overflow-x-auto">
    <table class="min-w-full">
        <thead class="text-left text-lg font-medium border-b border-border_clr  ">
        <tr>
            <th class="text-secondary text-[16px] min-w-[150px]">Product Image</th>
            <th class="text-secondary text-[16px] min-w-[150px]">Name</th>
            <th class="text-secondary text-[16px] min-w-[150px]">Prod ID</th>
            <th class="text-secondary text-[16px] min-w-[150px]">Description</th>
            <th class="text-secondary text-[16px] min-w-[150px]">Price</th>
            <th class="text-secondary text-[16px] min-w-[150px]">Stock</th>
            <th class="text-secondary text-[16px] min-w-[150px]">Discount</th>
            <th class="text-secondary text-[16px] min-w-[150px]">Type</th>
            <th class="text-secondary text-[16px] min-w-[150px]">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                @php
                    $img = $product['image'];
                    $img_path = asset("images/$img");
                @endphp
                <tr class="border-b-2 border-b-border_clr">
                    <td class="py-2">
                        <img src="{{asset('storage/'.$product->image)}}" alt="img" class="h-[70px] w-[70px] object-cover object-center">
                    </td>
                    <td>
                        <h2 class="font-semibold">{{$product->name}}</h2>
                    </td>
                    <td class="">
                        <span>{{$product->id}}</span>
                    </td>
                    <td class="">
                        <p class="text-sm text-secondary truncate max-w-[200px]">{{$product->description}}</p>
                    </td>
                    <td class="">
                        <p>$<span>{{$product->price}}</span></p>
                    </td>
                    <td class="">
                        <p>{{$product->stock}}</p>
                    </td>
                    <td class="">
                        <p><span>{{$product->discount}}</span>%</p>
                    </td>
                    <td class="">
                        <p>{{$product->sales_category_id}}</p>
                    </td>
                    <td class="text-xl text-secondary">
                        <div class="relative action_parent group">
                            <i class="fas fa-ellipsis-h"></i>
                            <div class="absolute transition-all duration 200 transform scale-0 group-hover:scale-100 left-[40%] -top-4 text-sm flex flex-col gap-1 bg-gray-200">
                                <a href="{{route('product.edit', $product->id)}}" class="w-full hover:bg-gray-100 px-2 py-1">Edit</a>
                                <a href="{{route('product.delete', $product->id)}}" class="w-full hover:bg-gray-100 px-2 py-1">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
