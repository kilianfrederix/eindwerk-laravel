<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function favorites() {
        // Zoek enkel de favoriete producten van de ingelogde gebruiker op
        $favorites = Product::take(2)->get();
        return view('profile.favorites', ['products' => $favorites]);
    }

    public function toggleFavorite(Product $product) {
        // Toggle het product id op de "favorites" relatie van de ingelogde user.
        // https://laravel.com/docs/9.x/eloquent-relationships#toggling-associations

        return back();
    }
}
