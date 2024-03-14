<div>
    <h1 class="text-4xl font-semibold">Artikelen die hierop lijken</h1>
    <p class="text-4xl text-gray-400 font-light">Wat vind je hiervan?</p>
    <div class="mt-8 grid grid-cols-4 gap-4">
        @foreach($related as $item)
            @include('store.includes.product-small', ['product' => $item])
        @endforeach
    </div>
</div>
