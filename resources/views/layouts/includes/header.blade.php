<header class="py-4 border-b border-gray-300 mb-8">
    <div class="container px-8 mx-auto flex justify-between items-center">
        <div class="text-xl flex gap-4 items-center">
            <a class="hover:text-orange-500" href="{{ route('products.index') }}">producten</a>
            {{-- <a class="hover:text-orange-500" href="#">brands</a> --}}
        </div>
        <div>
            <h1 class="text-2xl">
                <a href="{{ route('products.index') }}">
                    <span class="text-orange-500"><i class="fa-solid fa-shoe-prints"></i></span>
                    <span class="text-orange-500">Awesome</span> Shoestore
                </a>
            </h1>
        </div>
        <div class="flex gap-4 text-xl items-center">
            <a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i></a>
            <a href="{{ route('favorites') }}"><i class="fa-solid fa-heart"></i></a>
            <a href="{{ route('cart') }}" class="bg-gray-200 px-4 py-1 rounded-full">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>3 items</span>
            </a>
        </div>
    </div>
</header>
