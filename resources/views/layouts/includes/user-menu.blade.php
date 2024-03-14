<div class="bg-gray-100 py-2 px-4">
    <div class="container mx-autp px-4 flex justify-center gap-8">
        <a href="{{ route('profile.edit') }}" class="hover:underline">
            <i class="fa-solid fa-user-pen"></i>
            Wijzig profiel
        </a>
        <a href="{{ route('favorites') }}" class="hover:underline">
            <i class="fa-solid fa-heart"></i>
            Favorieten
        </a>
        <a href="{{ route('orders.index') }}" class="hover:underline">
            <i class="fa-solid fa-bag-shopping"></i>
            Mijn bestellingen
        </a>
        <a href="{{ route('logout') }}" class="hover:underline">
            <i class="fa-solid fa-right-from-bracket"></i>
            Afmelden
        </a>
    </div>
</div>
