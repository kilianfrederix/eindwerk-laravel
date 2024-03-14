<div class="flex gap-4 border border-gray-200 p-4">
    <div class="w-24">
        <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
    </div>

    <div class="flex-1">
        <a href="{{ route('brands.show', $product->brand) }}" class="hover:underline text-gray-500">{{ $product->brand->name }}</a>
        <h1 class="text-lg">
            <a class="hover:underline" href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
        </h1>
        <p class="text-sm text-gray-800">Maat: 38</p>
        <div class="mt-2">
            <form action="{{ route('cart.delete', 1) }}" method="post" class="hover:underline text-gray-400">
                @method('delete') @csrf
                <button class="appearance-none group">
                    <span class="group-hover:underline">
                        <i class="fa-solid fa-trash"></i> Verwijderen
                    </span>
                </button>
            </form>
        </div>
    </div>

    <div class="flex flex-col justify-between">

        <form action="{{ route('cart.update', $product) }}" method="post" class="">
            @method('put') @csrf
            <input value="2" placeholder="Aantal" class="py-2 px-4 bg-white appearance-none border border-gray-500" type="number" name="quantity">
            <button class="ml-2" type="submit">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </form>

        <div class="text-right border-t border-gray-500 pt-2 mt-4 flex justify-between">
            <span class="font-normal text-gray-500">2 &times &euro;{{ $product->price }}</span>
            <span class="font-semibold">&euro;{{ $product->price * 2 }}</span>
        </div>
    </div>
</div>
