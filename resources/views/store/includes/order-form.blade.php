<form class="my-8" action="{{ route('cart.add', $product) }}" method="post">
    @csrf
    <div class="flex gap-4">
        <div class="relative flex-1">
            <select class="rounded-none w-full block py-2 px-4 bg-white appearance-none border border-gray-500" name="size" id="">
                @foreach($product->available_sizes as $size)
                    <option value="{{ $size }}">{{ $size }}</option>
                @endforeach
            </select>
            <div class="absolute right-4 inset-y-0 flex items-center">
                <i class="fa-regular fa-arrows-up-down"></i>
            </div>
        </div>
        <div class="">
            <input placeholder="Aantal" value="1" class="py-2 px-4 bg-white appearance-none border border-gray-500" type="number" name="quantity">
        </div>
    </div>
    <div class="my-4 flex gap-4">
        <button class="block hover:bg-gray-800 bg-black text-white px-4 py-2 w-full" type="submit">
            Bestel nu!
        </button>
        @include('store.includes.favorite')
    </div>
</form>
