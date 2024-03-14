<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function handleLogin() {
        // Valideer het formulier
        // Elk veld is verplicht

        // Schrijf de aanmeld logica om in te loggen.

        // Als je ingelogd bent stuur je de bezoeker door naar de intented "profile" route (zie hieronder)
        return redirect()->intended(route('profile'));

        // Als je gegevens fout zijn stuur je terug naar het formulier met
        // een melding voor het email veld dat de gegevens niet correct zijn.

    }

    public function register() {
        return view('auth.register');
    }

    public function handleRegister() {
        // Valideer het formulier.
        // Elk veld is verplicht / Wachtwoord en confirmatie moeten overeen komen / Email adres moet uniek zijn
        // Bewaar een nieuwe gebruiker in de databank met een beveiligd wachtwoord.

        // BONUS: Verstuur een email naar de gebruiker waarin staat dat er een nieuwe account geregistreerd is voor de gebruiker.

        return redirect()->route('login');
    }

    public function logout() {
        // Gebruiker moet uitloggen

        return back();
    }
}
