<div class="bg-white p-4 flex gap-8 items-center">
    <div class="text-4xl">
        <i class="fa-solid fa-truck"></i>
    </div>
    <div>
        <h1 class="text-2xl font-semibold">Verwachte levering</h1>
        <p class="text-lg text-gray-500">
            {{ now()->addDays(5)->formatLocalized('%a %d %b') }}
            -
            {{ now()->addDays(6)->formatLocalized('%a %d %b') }}
        </p>
    </div>
</div>
