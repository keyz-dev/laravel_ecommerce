@extends('dashboard_layout')
@section('title', 'Create Product')

<script type="text/javascript" src="{{ asset('js/register.js') }}" defer></script>

@section('content')
    <form action="{{route("product.store")}}" method="post" class="mx-auto w-full md:min-w-[50%] md:max-w-[90%] lg:max-w-[90%] flex flex-col-reverse md:flex-row items-center md:items-start  justify-center h-auto gap-4 p-2 md:py-4 border" enctype="multipart/form-data">
        <x-form  title="Create Product"/>
    </form>
@endsection