@extends('layout')
@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="{{asset('font/sofia-pro-webfont/style.css')}}">
@endpush

@section('content')
    {{-- Hero --}}
    <x-home.hero :bg="$hero_bg"/>    

    {{-- Categories section --}}
    <x-home.categories :categories="$categories"/>

    {{-- Collections section --}}

    <section id="categories" class="container h-[40vh] grid grid-cols-1 sm:grid-cols-2 gap-10">
        <div class="bg-no-repeat bg-cover text-white" style="background-image: url('{{$col_bg_1}}')">
            <div class="w-full h-full flex flex-col items-end justify-center gap-2 p-5">
                <p class="text-border_clr text-xs">Post-Christmas Delivery</p>
                <h2 class="text-3xl md:text-4xl font-normal mb-2 text-right">New <br/>Collection</h2>
                <a href="">
                    <x-button
                        text="SHOP NOW"
                        class="btn btn-secondarybtn text-xs border-none min-w-fit min-h-fit px-2 py-1"
                    />
                </a>
            </div>
        </div>
        <div class="bg-no-repeat bg-cover" style="background-image: url('{{$col_bg_2}}')">
            <div class="w-full h-full flex flex-col items-start justify-center gap-2 p-5">
                <p class="text-border_clr text-xs">Dispatched within a week</p>
                <h2 class="text-3xl md:text-4xl w-1/2 font-normal mb-2">
                    <span>Elegant</span>
                    <span>Hygience Kit</span>
                </h2>
                <a href="">
                    <x-button
                        text="SEE MORE"
                        class="btn btn-secondarybtn text-xs border-none min-w-fit min-h-fit px-2 py-1"
                    />
                </a>
            </div>
        </div>
    </section>

    {{-- Our Products section --}}
    
    <section id="products" class="container flex flex-col gap-3">
        <section class="h-[40px] w-full"></section>
        <h1 class="w-full text-center text-3xl text-primary font-custom font-bold">Our Products</h1>
        <p class="text-center text-secondary text-sm">Get the Hair and Wig of Your Latest Dreams</p>

        <div class="flex w-full items-center justify-between">
            <h2 class="text-primary text-2xl font-custom ">Featured</h2>
            <a href="" class="font-bold text-sm">SEE ALL</a>
        </div>
        
        <x-home.products :products="$products" />
    </section>

    {{-- Guarantee --}}

    <section class="h-[40px] w-full"></section>
    <x-home.guarantee />
@endsection
