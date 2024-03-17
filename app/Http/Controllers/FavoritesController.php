<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function favorites(Request $request)
    {
        // Zoek enkel de favoriete producten van de ingelogde gebruiker op
        $user = $request->user();
        $favorites = $user->favorites()->get();

        return view('profile.favorites', ['products' => $favorites]);
    }




    public function toggleFavorite(Request $request, $productId)
    {
        $user = $request->user(); // Haal de ingelogde gebruiker op

        $product = Product::findOrFail($productId);

        // Toggle het product op de favorieten van de gebruiker
        if ($user->favorites()->where('product_id', $productId)->exists()) {
            // Verwijder het product uit de favorieten als het al een favoriet is
            $user->favorites()->detach($productId);
        } else {
            // Voeg het product toe aan de favorieten als het nog geen favoriet is
            $user->favorites()->attach($productId);
        }

        return back();
    }
}
