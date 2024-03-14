@extends('layouts.default')

@section('title', 'My favorites')

@section('content')
    <div class="grid grid-cols-6 gap-24">
        <div class="col-span-2">
            <h1 class="text-4xl font-semibold mb-4">Mijn profiel</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum corporis perferendis reprehenderit alias eligendi laudantium quisquam magnam, totam vel nobis maxime nemo aliquid impedit ipsam repellendus autem eos doloribus iste.</p>
        </div>
        <div class="col-span-4 grid gap-4">
            <div class="p-4 bg-gray-100 flex items-center justify-between relative">
                <div>
                    <h1 class="text-4xl font-semibold mb-2">Wijzig mijn profiel</h1>
                    <p class="text-gray-500">Wijzig je e-mailadres en wachtwoord.</p>
                </div>
                <div class="text-4xl">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <a class="absolute inset-0" href="{{ route('profile.edit') }}">
                    <span class="hidden">Wijzig profiel</span>
                </a>
            </div>
            <div class="p-4 bg-gray-100 flex items-center justify-between relative">
                <div>
                    <h1 class="text-4xl font-semibold mb-2">Favorieten</h1>
                    <p class="text-gray-500">5 producten</p>
                </div>
                <div class="text-4xl">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <a class="absolute inset-0" href="{{ route('favorites') }}">
                    <span class="hidden">Toon favorieten</span>
                </a>
            </div>
            <div class="p-4 bg-gray-100 flex items-center justify-between relative">
                <div>
                    <h1 class="text-4xl font-semibold mb-2">Mijn bestellingen</h1>
                    <p class="text-gray-500">5 bestellingen</p>
                </div>
                <div class="text-4xl">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <a class="absolute inset-0" href="{{ route('orders.index') }}">
                    <span class="hidden">Toon bestellingen</span>
                </a>
            </div>
        </div>
    </div>
@endsection
