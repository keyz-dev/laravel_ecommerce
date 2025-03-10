<section class="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 place-items-center justify-center lg:flex lg:items-center lg:justify-center">
    @foreach ($categories as $category)
        <div class="flex flex-col gap-4 justify-center items-center">
            <div class="size-[140px] sm:size-[200px] p-2 border-4 border-accent">
                <div class="h-full w-full border-4 border-accent grid place-items-center">
                    <img src="{{asset('images/'.$category['image'])}}" alt="" class="size-20 sm:size-36 object-contain">
                </div>
            </div>
            <p class="text-base font-semibold">
                {{ucfirst($category['name'])}}
            </p>
        </div>
    @endforeach
</section>
