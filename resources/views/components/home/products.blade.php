<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-12">
    @foreach ($products as $product)
        @php
            $img = $product['image'];
            $img_path = asset("storage/$img");
        @endphp
        <div class="flex flex-col h-auto gap-6 max-w-[350px] overflow-hidden">
            <div style="background-image:url('{{$img_path}}')" class="transition-all duration-500 ease-in-out product_container bg-no-repeat bg-center bg-cover relative min-w-[100px] w-full h-[300px] overflow-hidden">
                <form action="{{route('cart.add')}}" method="POST" class="w-full absolute left-0 bottom-0 backdrop-blur-[25px] text-white flex items-center justify-between px-4 py-2 productForm">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id}}">
                    <input type="number" name="quantity" value="1" min="1" class="w-[60px] text-primary px-2 py-1 rounded-sm h-[35px] outline-none">
                    <x-button 
                        class="btn-secondarybtn border-none bg-success-bg min-w-fit min-h-fit h-[25px] w-[60px] rounded-sm"
                        text="ADD"
                        type="submit"
                    />
                </form>
            </div>
            <div class="flex flex-col items-center justify-between gap-2">
                <h2 class="text-lg font-semibold">{{ $product['name'] }}</h2>
                <p class="line-clamp-2">{{ $product['description'] }}</p>
                <div class="w-full flex items-center justify-between">
                    <p class="text-lg font-semibold">$<span>{{ $product['price'] }}</span></p>
                    <p class="text-slate-400">$<span>{{ $product['discount'] }}</span></p>
                </div>
                <p class="w-full text-base font-thin">Available Stock: <span class="font-medium">{{$product['stock']}}</span></p>
            </div>
        </div>
    @endforeach
</div>