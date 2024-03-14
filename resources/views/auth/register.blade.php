@extends('layouts.default')

@section('title', 'My favorites')

@section('content')
    <div class="grid grid-cols-6 gap-24">
        <div class="col-span-2">
            <h1 class="text-4xl font-semibold mb-4">Registreren</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum corporis perferendis reprehenderit alias eligendi laudantium quisquam magnam, totam vel nobis maxime nemo aliquid impedit ipsam repellendus autem eos doloribus iste.</p>
        </div>
        <div class="col-span-4">
            <form action="{{ route('register.post') }}" method="post" novalidate class="flex flex-col gap-4">
                @csrf

                <div class="flex flex-col">
                    <label class="text-gray-500" for="voornaam">Naam: *</label>
                    <input name="name" value="{{old('name')}}" type="text" class="bg-white border border-gray-500 px-4 py-2">
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="text-gray-500" for="voornaam">E-mailadres: *</label>
                    <input name="email" value="{{old('email')}}" type="email" class="bg-white border border-gray-500 px-4 py-2">
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="text-gray-500" for="voornaam">Wachtwoord: *</label>
                    <input name="password" type="password" class="bg-white border border-gray-500 px-4 py-2">
                    @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="text-gray-500" for="voornaam">Confirmeer wachtwoord: *</label>
                    <input name="password_confirmation" type="password" class="bg-white border border-gray-500 px-4 py-2">
                    @error('password_confirmation')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="mt-4 block hover:bg-orange-600 bg-orange-500 uppercase text-center font-semibold text-lg cursor-pointer text-white px-4 py-2 w-full">
                        Registereren
                    </button>
                    <p class="text-center mt-4">of <a class="hover:underline text-orange-500" href="{{ route('login') }}">meld je aan met jouw bestaande account</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
