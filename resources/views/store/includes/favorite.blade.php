@if(Auth::check())
    @php
        $isFavorite = Auth::user()->favorites()->where('product_id', $product->id)->exists();
    @endphp
<a href="{{ route('favorites.toggle', $product) }}" class="group text-2xl bg-white px-4 py-1">
    {{-- Als not favorite --}}
    @if($isFavorite)
    <i class="group-hover:hidden text-red-500 fa-solid fa-heart"></i>
    <i class="hidden group-hover:inline text-red-500 fa-regular fa-heart"></i>
    {{-- Als favorite --}}
    @else
    <i class="group-hover:hidden fa-regular fa-heart"></i>
    <i class="hidden group-hover:inline fa-solid fa-heart"></i>
    @endif
@else
    <i class="group-hover:hidden fa-regular fa-heart"></i>
    <i class="hidden group-hover:inline fa-solid fa-heart"></i>
@endif
</a>


