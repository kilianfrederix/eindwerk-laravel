<div class="relative">
    <div class="relative">
        <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
        <div class="absolute z-10 top-4 right-0">
            @include('store.includes.favorite')
        </div>
        <a class="absolute inset-0" href="{{ route('products.show', $product) }}">
            <span class="hidden">Toon product</span>
        </a>
    </div>
    <a href="{{ route('brands.show', $product->brand) }}" class="hover:underline text-gray-500">{{ $product->brand->name }}</a>
    <h1 class="text-lg">
        <a class="hover:underline" href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
    </h1>
    <p class="text-sm text-gray-800">
        {{ $product->description }}
    </p>
    <p class="text-lg">&euro;{{ $product->price }}</p>

</div>
