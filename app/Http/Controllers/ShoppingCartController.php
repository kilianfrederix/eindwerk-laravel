<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    // Methode om de winkelwagen te tonen
    public function index()
    {
        $user = Auth::user();

        // Producten in de winkelwagen van de gebruiker ophalen met de hoeveelheid en maat
        $cartItems = $user->cart()->withPivot('quantity', 'size')->get();
        $subtotal = 0;

        // Bereken de subtotaalprijs van de producten in de winkelwagen
        foreach ($cartItems as $cartItem) {
            $subtotal += $cartItem->price * $cartItem->pivot->quantity;
        }

        // Verzendkosten instellen
        $shipping = 3.9;

        // Totaalprijs berekenen inclusief verzendkosten
        $total = $subtotal + $shipping;

        // Kortingscode en korting initialiseren
        $discountCode = Session::get('discount_code');
        $discountAmount = 0;

        return view('cart.index', [
            'products' => $cartItems,
            'shipping' => $shipping,
            'subtotal' => $subtotal,
            'total' => $total,
            'discountCode' => $discountCode,
            'discountAmount' => $discountAmount
        ]);
    }

    // Methode om een product aan de winkelwagen toe te voegen
    public function add(Request $request, Product $product)
    {
        $user = Auth::user();

        // Zoek of het product al in de winkelwagen van de gebruiker zit
        $existingCartItem = $user->cart()->where('product_id', $product->id)->where('size', $request->input('size'))->first();

        // Als het product al in de winkelwagen zit, verhoog de hoeveelheid
        if ($existingCartItem) {
            $existingCartItem->pivot->quantity += $request->input('quantity', 1);
            $existingCartItem->pivot->save();
        } else {
            // Voeg het product toe aan de winkelwagen van de gebruiker
            $user->cart()->attach($product, [
                'quantity' => $request->input('quantity', 1),
                'size' => $request->input('size', 'Medium')
            ]);
        }

        return redirect()->route('cart');
    }

    // Methode om een product uit de winkelwagen te verwijderen
    public function delete(Product $product)
    {
        $user = Auth::user();
        // Verwijder het product uit de winkelwagen van de gebruiker
        $user->cart()->detach($product);

        return redirect()->route('cart');
    }

    // Methode om de hoeveelheid van een product in de winkelwagen bij te werken
    public function update(Request $request, Product $product)
    {
        $user = Auth::user();

        // Update de hoeveelheid van het product in de winkelwagen van de gebruiker
        $user->cart()->updateExistingPivot($product->id, [
            'quantity' => $request->input('quantity', 1)
        ]);

        return redirect()->route('cart');
    }

    // Methode om een kortingscode toe te passen
    public function setDiscountCode(Request $request)
    {
        // Valideer het formulier
        $request->validate([
            'discount_code' => 'required|string|max:255',
        ]);

        // Zoek de kortingscode in de database
        $discountCode = DiscountCode::where('code', $request->discount_code)->first();

        if ($discountCode) {
            // Kortingscode gevonden, sla op in de sessie
            Session::put('discount_code', $discountCode->code);
        } else {
            // Kortingscode niet gevonden, toon een foutmelding
            return back()->with('error', 'Kortingscode niet geldig.');
        }

        return redirect()->route('cart');
    }

    // Methode om een kortingscode te verwijderen
    public function removeDiscountCode()
    {
        // Verwijder de kortingscode uit de sessie
        Session::forget('discount_code');

        return back();
    }
}
