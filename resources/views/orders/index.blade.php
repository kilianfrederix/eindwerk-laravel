@extends('layouts.default')

@section('title', 'Checkout')

@section('content')

    <h1 class="text-4xl font-semibold mb-8">Mijn bestellingen</h1>

    <div class="grid grid-cols-2 gap-4">
        @forelse($orders as $order)
            @include('orders.includes.order', ['order' => $order])
        @empty
            <p>Je hebt nog geen bestellingen...</p>
        @endforelse
    </div>
@endsection
