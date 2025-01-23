@push('scripts')
    <script type="text/javascript" src="{{asset('js/navbar.js')}}" defer></script>
@endpush

<header class="w-full flex flex-col fixed left-0 top-0 z-20" >
    <nav class="container flex items-center justify-between py-5 px-3 lg:px-0 relative z-10 bg-white">
        <x-button 
            type="button"
            id="toggleNavBarBtn"
            icon="<i class='fas fa-bars'></i>"
            class="text-xl md:hidden z-10 min-w-fit min-h-fit" 
        />
        <a href="{{route("home.index")}}" class="z-10 text-xl font-bold ">
            <x-logo :logo="$logo" />
        </a>

        <div id="navbar" class="absolute left-[-250%] top-[100%] transition-all duration-500 ease-in-out bg-accent-light flex flex-col justify-center min-w-[300px] min-h-[60vh] md:min-h-fit md:bg-transparent md:static md:left-auto md:flex-row md:flex-end items-start md:w-auto md:items-center md:justify-between z-1">
            <ul class="flex flex-col md:flex-row justify-between gap-6 sm:gap-2 sm:mr-0 md:items-center h-full space-x-5 mb-4 md:mb-0 lg:mr-36">
                <li class="list-item"><a id="{{Route::is('home.index') ? 'active-link': ''}}" href="{{route('home.index')}}">Home</a></li>
                <li class="list-item"><a href="{{route('home.index')}}#categories">Categories</a></li>
                <li class="list-item"><a href="{{route('home.index')}}#products">Products</a></li>
                <li class="list-item"><a href="{{route('home.index')}}#guarantee">Guarantee</a></li>
                <li class="list-item">
                    <a href="{{route('order.index')}}" id="{{Route::is('order.index') ? 'active-link': ''}}" class="relative">
                        <span>Orders</span>
                    </a>
                </li>
                <li class="list-item hidden md:block">
                    <a href="{{route('cart.index')}}" class="relative">
                        <x-button
                            type="button"
                            title='cart'    
                            class="bg-transparent text-black min-w-[20px] min-h-[20px] w-[40px] h-[40px] hover:bg-accent-light rounded-full"
                            icon="<i class='fas fa-shopping-cart'></i>"
                        />
                        <span class="absolute size-5 flex items-center justify-center p-[2px] rounded-full bg-black text-white text-xs font-light -right-1 -top-1" id="cart_indicator">
                            {{ session('cart') ? count(session('cart')) : 0 }}
                        </span>
                    </a>
                </li>
            </ul>
            <div class="flex flex-col ml-1 md:flex-row md:gap-[2px] items-center">
                @if(Auth::check())
                    <x-profile_info />
                @else
                    <a href="{{route('user.login')}}">
                        <x-button
                            type="button"
                            text="Login"
                            class="bg-transparent text-black min-w-fit hover:bg-accent-light w-[90px]"
                        />
                    </a>
                    <hr class="w-0 md:w-[1px] md:h-8 border-none bg-slate-200">
                    <a href="{{route('user.register')}}">
                        <x-button
                            type="button"
                            text="Join Us"
                            class="bg-transparent text-black min-w-fit hover:bg-accent-light w-[90px]"
                        />
                    </a>
                @endif
            </div>
        </div>

        <a class="relative md:hidden" href="{{route('cart.index')}}" class="relative">
            <x-button
                type="button"
                title='cart'
                class="bg-transparent text-black min-w-[20px] min-h-[20px] w-[40px] h-[40px] hover:bg-accent-light rounded-full"
                icon="<i class='fas fa-shopping-cart'></i>"
            />
            <span class="absolute h-5 w-5 flex items-center justify-center p-[2px] rounded-full bg-black text-white text-xs font-light -right-1 -top-1">
                {{ session('cart') ? count(session('cart')) : 0 }}
            </span>
        </a>
    </nav>  
    
    <x-message_toast />
</header>