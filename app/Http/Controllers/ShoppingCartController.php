<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Pas de "cart-item" include file aan zodat de "$product->pivot->quantity" in de formuliervalue ingevuld wordt
        // en de size ook met "$product->pivot->size" afgedrukt wordt.
        $cartItems = $user->cart()->withPivot('quantity', 'size')->get();
        // Zorg ervoor dat je de juiste velden bij de relatie in het User model meegeeft (zie documentatie)
        // https://laravel.com/docs/9.x/eloquent-relationships#retrieving-intermediate-table-columns
        // Zorg ook dat de prijs berekening in het "cart-item" klopt.

        $subtotal = 0;
        foreach ($cartItems as $cartItem) {
            $subtotal += $cartItem->price * $cartItem->pivot->quantity;
        }
        // Zoek de producten van de ingelogde gebruiker op.
        $products = $user->cart()->get();

        $shipping = 3.9;
        // DOE DE BEREKENING ALS LAATSTE STAP
        // Gebruik de "products" relatie op het user model (en gegevens de pivot table) om de producten te overlopen
        // en de volledige prijs van de winkelkar te berekenen.

        // Bereken de verzendkosten van 3.9eur bij het totaal
        $total = $subtotal + $shipping;

        // BONUS: Als de kortingscode bestaat in de sessie, zoek deze op in de databank en pas de korting toe op de berekening.
        // De kortingscode kan je dan ook naar de view hieronder doorsturen.
        // In de index view hieronder kan je dan ook het stukje in commentaar code tonen met de juiste gegegevens.
        // Indien er al een code ingevuld is zet je de input in de discount-code view file op "disabled"
        $discountAmount = 0;
        $discountCode = false;

        return view('cart.index', [
            'products' => $products,
            'shipping' => $shipping,
            'subtotal' => $subtotal,
            'total' => $total,

            'discountCode' => $discountCode,
            'discountAmount' => $discountAmount
        ]);
    }


    public function add(Request $request, Product $product)
    {
        // Haal de ingelogde gebruiker op
        $user = Auth::user();

        // Zoek het item in de winkelwagen van de gebruiker
        $existingCartItem = $user->cart()->where('product_id', $product->id)->where('size', $request->input('size'))->first();

        // Als het item al in de winkelwagen zit, verhoog de hoeveelheid
        if ($existingCartItem) {
            $existingCartItem->pivot->quantity += $request->input('quantity', 1);
            $existingCartItem->pivot->save();
        } else {
            // Voeg het product toe aan de winkelwagen van de gebruiker
            $user->cart()->attach($product, [
                'quantity' => $request->input('quantity', 1), // standaard 1 als hoeveelheid niet opgegeven is
                'size' => $request->input('size', 'Medium'), // standaard 'Medium' als maat niet opgegeven is
            ]);
        }

        return redirect()->route('cart');
    }


    public function delete(Product $product)
    {
        $user = Auth::user();
        // Verwijder het product uit de winkelwagen van de gebruiker
        $user->cart()->detach($product);

        return redirect()->route('cart');
    }

    public function update(Request $request, Product $product)
    {
        $user = Auth::user();

        // Update de gegevens van het product in de winkelwagen van de gebruiker
        $user->cart()->updateExistingPivot($product->id, [
            'quantity' => $request->input('quantity', old('quantity')),
        ]);

        return redirect()->route('cart');
    }


    /**
     * BONUS: DISCOUNTS
     */

    public function setDiscountCode(Request $request)
    {
        // Valideer het formulier (veld is verplicht) en vul het terug in bij foutmeldingen

        // BONUS
        // Zoek de discount code in de databank op die het CODE veld uit de request
        // Als de discount code gevonden werd:
        // Save de discount code naar de sessie zodat je deze later kan gebruiken bij checkout
        // https://laravel.com/docs/9.x/session#storing-data
        return redirect()->route('cart');

        // Als de discount code niet gevonden werd: ga terug met een foutmelding dat de code niet gevonden kon worden

    }

    public function removeDiscountCode()
    {
        // Verwijder de discount code uit de sessie

        return back();
    }
}
