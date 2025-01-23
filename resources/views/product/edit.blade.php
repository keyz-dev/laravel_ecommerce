@extends('dashboard_layout')
@section('title', 'Create Product')

<script type="text/javascript" src="{{ asset('js/register.js') }}" defer></script>

@section('content')
    <form action="{{route("product.update", $product)}}" method="post" class="mx-auto w-full md:min-w-[50%] md:max-w-[90%] lg:max-w-[90%] flex flex-col sm:flex-row items-start justify-center h-auto gap-4 p-2 md:py-4 border" enctype="multipart/form-data">
        @method('PATCH')
        <x-form title="Edit Product" :product="$product" />
    </form>
@endsection