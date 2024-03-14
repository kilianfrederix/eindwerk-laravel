<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {

        // Pas de views aan zodat je de juiste item counts kunt tonen in de knoppen op de profiel pagina.
        $user = Auth::user();
        return view('profile.index', [
            'user' => $user
        ]);
    }

    public function edit()
    {
        // Vul het email adres van de ingelogde gebruiker in het formulier in
        $user = Auth::user();
        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function updateEmail(Request $request)
    {

        $user = $request->user();
        // Valideer het formulier, zorg dat het terug ingevuld wordt, en toon de foutmeldingen
        // Emailadres is verplicht en moet uniek zijn (behalve voor het huidge id van de gebruiker).
        $request->validate([
            'email' => [
                'required',
                // https://laravel.com/docs/9.x/validation#rule-unique -> Forcing A Unique Rule To Ignore A Given ID
                Rule::unique('users')->ignore($user->id),
            ]
        ]);
        // Update de gegevens van de ingelogde gebruiker
        $user->email = $request->email;
        $user->save();
        // BONUS: Stuur een e-mail naar de gebruiker met de melding dat zijn e-mailadres gewijzigd is.

        return redirect()->route('profile.edit');
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();
        // Valideer het formulier, zorg dat het terug ingevuld wordt, en toon de foutmeldingen
        // Wachtwoord is verplicht en moet confirmed zijn.
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        // Update de gegevens van de ingelogde gebruiker met het nieuwe "hashed" password
        $user->password = Hash::make($request->password);
        $user->save();

        // BONUS: Stuur een e-mail naar de gebruiker met de melding dat zijn wachtwoord gewijzigd is.

        return redirect()->route('profile.edit', $user);
    }
}
