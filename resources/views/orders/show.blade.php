@extends('layouts.default')

@section('title', 'Mijn bestellingen')

@section('content')
    <div>
        <a href="{{ route('orders.index') }}" class="bg-black rounded-full px-4 py-2 text-white inline-block mb-8">
            <i class="fa-solid fa-hand-point-left"></i>
            <span class="ml-2">Mijn bestellingen</span>
        </a>
    </div>

    <div class="">
        <h1 class="text-2xl font-semibold mb-4">Bestelling van {{ $order->created_at->format('d F Y') }}</h1>
        @if ($products->count() === 1)
            <p class="text-gray-500 text-lg">{{ $products->count() }} product</p>
        @else
            <p class="text-gray-500 text-lg">{{ $products->count() }} producten</p>
        @endif
        {{-- Indien kortingscode gekoppeld aan het order --}}
        {{-- <p class="my-8">
            <span class="font-semibold">Kortingscode:</span>
            <span class="inline-block ml-2 bg-green-500 text-green-100 rounded-full px-3 py-2 font-semibold">
                DISCOUNT20 (-20%)
            </span>
        </p> --}}

        <div class="grid grid-cols-2 gap-4 mt-4">
            @foreach($products as $product)
                @include('orders.includes.order-item', ['product' => $product])
            @endforeach
        </div>
    </div>
@endsection
