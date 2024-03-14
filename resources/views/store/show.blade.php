@extends('layouts.default')

@section('title', $product->name . ' - ' . $product->description)

@section('content')
    <div class="grid grid-cols-2 gap-x-24">
        <div>
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div>
            <p>
                <a class="hover:underline text-2xl" href="{{ route('brands.show', $product->brand) }}">{{ $product->brand->name }}</a>
            </p>
            <h1 class="font-semibold text-4xl">
                {{ $product->name }}
            </h1>
            <p class="text-gray-500">{{ $product->description }}</p>
            <p class="text-3xl mt-2">
                &euro;{{ $product->price }}
            </p>

            <div class="mt-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt voluptatibus at consequatur dicta laborum, quasi voluptatum iste voluptate fuga commodi debitis voluptates, magnam non tenetur mollitia eaque ex ullam est?</p>
            </div>

            @include('store.includes.order-form')
            @include('store.includes.shipping-info')
        </div>
    </div>
    <div class="mt-24">
        @include('store.includes.related')
    </div>
@endsection
