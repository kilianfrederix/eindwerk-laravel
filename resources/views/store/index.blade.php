@extends('layouts.default')

@section('title', 'Our products')

@section('content')
    <div class="grid grid-cols-6 gap-24">
        <div class="col-span-2">
            <h1 class="text-4xl font-semibold mb-4">Schoenen</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum corporis perferendis reprehenderit alias eligendi laudantium quisquam magnam, totam vel nobis maxime nemo aliquid impedit ipsam repellendus autem eos doloribus iste.</p>
        </div>
        <div class="col-span-4">
            <p class="text-gray-400 mb-4">{{ $products->count() }} producten</p>
            <div class="grid grid-cols-3 gap-x-4 gap-y-12">
                @foreach ($products as $product)
                    @include('store.includes.product-small', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
@endsection
