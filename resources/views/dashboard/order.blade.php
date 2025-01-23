@extends('dashboard_layout')

@push('scripts')
    <script type="text/javascript" src="{{asset('js/order.js')}}" defer></script>
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
        All Orders
    </h2>

    <x-input
        placeholder = "Search order"
        type="text"
        class=""
    >
</div>

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
@endsection
