<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function checkout() {
        return view('orders.checkout');
    }

    public function store(Request $request) {
        // Valideer het formulier zodat alle velden verplicht zijn.
        // Vul het formulier terug in, en toon de foutmeldingen.

        // Maak een nieuw "order" met de gegevens uit het formulier in de databank
        // Zorg ervoor dat hett order gekoppeld is aan de ingelogde gebruiker.

        // Zoek alle producten op die gekoppeld zijn aan de ingelogde gebruiker (shopping cart)
        // Overloop alle gekoppelde producten van een user (shopping cart)
            // Attach het product, met bijhorende quantity en size, aan het order
            // https://laravel.com/docs/9.x/eloquent-relationships#retrieving-intermediate-table-columns
            // Detach tegelijk het product van de ingelogde gebruiker zodat de shopping cart terug leeg wordt

        // BONUS: Als er een discount code in de sessie zit koppel je deze aan het discount_code_id in het order model
        // Verwijder nadien ook de discount code uit de sessie


        // BONUS: Stuur een e-mail naar de gebruiker met de melding dat zijn bestelling gelukt is,
        // samen met een knop of link naar de show pagina van het order


        // Redirect naar de show pagina van het order en pas de functie daar aan
        return redirect()->route('orders.show', 1);
    }

    public function index() {
        // Zoek alle orders van de ingelogde gebruiker op. Vervang de "range" hieronder met de juiste code
        $orders = range(0,1);

        // Pas de views aan zodat de juiste info van een order getoond word in de "order" include file
        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    public function show() { // Order $order
        // Beveilig het order met een GATE zodat je enkel jouw eigen orders kunt bekijken.

        // In de URL wordt het id van een order verstuurd. Zoek het order uit de url op.
        // Zoek de bijbehorende producten van het order hieronder op.
        $products = Product::take(4)->get();

        // Geef de juiste data door aan de view
        // Pas de "order-item" include file aan zodat de gegevens van het order juist getoond worden in de website
        return view('orders.show', [
            // 'order' => $order,
            'products' => $products
        ]);
    }
}
