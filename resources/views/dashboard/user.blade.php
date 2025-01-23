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
        Users
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
            <th class="text-secondary text-[16px]">U ID</th>
            <th class="text-secondary text-[16px]">Name</th>
            <th class="text-secondary text-[16px]">Email</th>
            <th class="text-secondary text-[16px]">Address</th>
            <th class="text-secondary text-[16px]">Role</th>
            <th class="text-secondary text-[16px]">Phone</th>
            <th class="text-secondary text-[16px]">Gender</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-b-2 border-b-border_clr">
                    <td>
                        <span>{{$user->id}}</span>
                    </td>
                    <td class="py-2">
                        <div class="flex items-center gap-4">
                            <img src="{{asset('storage/'.$user->profile_image)}}" alt="User Image" class="size-[45px] rounded-full object-cover">
                            <span>{{$user->name}}</span>
                        </div>
                    </td>
                    <td class="">           
                        <span>{{$user->email}}</span>
                    </td>
                    <td class="">
                        <div>
                            <span>{{$user->address}}</span>
                        </div>
                    </td>
                    <td class="">
                        <span>{{$user->role->name}}</span>
                    </td>
                    <td class="">
                        <span>{{$user->phone}}</span>
                    </td>
                    <td class="">
                        <span>{{$user->gender}}</span>
                    </td>
                    <td>
                        <i class="fas fa-ellipsis-h"></i>   
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
