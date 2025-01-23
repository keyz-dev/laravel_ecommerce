<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <title>@yield('title', 'BraidSter')</title>
    <link rel="stylesheet" href="{{asset('font/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('font/recoleta/style.css')}}">

    @vite('resources/css/app.css')
    @vite('resources/css/navbar-styles.css')
    @stack('styles')
</head>

{{-- class="flex h-screen flex-col items-center" --}}

<body class="bg-white pt-28">   
    <x-navbar :logo="$logo"/>

    <main class="w-full h-auto flex flex-col items-center gap-20 p-2 pt-0 lg:p-0 mb-3">
        @yield('content')
    </main>
    
    @if(! Route::is('checkout.index'))
    <x-footer :logo="$logo"/>
    @endif
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    @stack('scripts')
</body>
</html>

