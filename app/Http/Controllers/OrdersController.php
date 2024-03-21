<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function checkout()
    {
        return view('orders.checkout');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            // Voeg hier de validatie regels toe voor de verzendinformatie
            'voornaam' => 'required',
            'achtername' => 'required',
            'straat' => 'required',
            'huisnummer' => 'required',
            'postcode' => 'required',
            'woonplaats' => 'required',
        ]);

        // Maak een nieuw order aan
        $order = new Order();
        // Koppel de bestelling aan de ingelogde gebruiker
        $order->user_id = Auth::id();
        // Voeg andere order informatie toe indien nodig
        $order->voornaam = $request->voornaam;
        $order->achtername = $request->achtername;
        $order->straat = $request->straat;
        $order->huisnummer = $request->huisnummer;
        $order->postcode = $request->postcode;
        $order->woonplaats = $request->woonplaats;
        $order->save();


        // Zoek alle producten op die gekoppeld zijn aan de ingelogde gebruiker (shopping cart)
        $userProducts = Auth::user()->cart()->withPivot('quantity', 'size')->get();

        // Loop door alle producten in de winkelwagen van de gebruiker
        foreach ($userProducts as $product) {
            // Voeg het product toe aan het order met de bijbehorende quantity en size
            $order->products()->attach($product->id, [
                'quantity' => $product->pivot->quantity,
                'size' => $product->pivot->size
            ]);
            // Verwijder het product uit de winkelwagen van de gebruiker
            Auth::user()->cart()->detach($product->id);
        }

        // Redirect naar de show pagina van het order
        return redirect()->route('orders.show', $order->id);
    }
    public function index()
    {
        // Zoek alle orders van de ingelogde gebruiker op
        $orders = Auth::user()->orders;

        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    public function show(Order $order)
    {
        // Beveilig het order met een GATE zodat je enkel jouw eigen orders kunt bekijken

        // Zoek de bijbehorende producten van het order
        $products = $order->products()->withPivot('size')->get();


        return view('orders.show', [
            'order' => $order,
            'products' => $products
        ]);
    }
}
