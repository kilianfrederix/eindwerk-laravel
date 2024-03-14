<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        // Valideer het formulier
        // Elk veld is verplicht
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Schrijf de aanmeld logica om in te loggen.
        // Als je ingelogd bent stuur je de bezoeker door naar de intented "profile" route (zie hieronder)
        if (Auth::attempt($validated)) {
            return redirect()->intended(route('profile'));
        }

        // Als je gegevens fout zijn stuur je terug naar het formulier met
        // een melding voor het email veld dat de gegevens niet correct zijn.
        return back()->withErrors([
            'email' => "De ingevoerde gegevens komen niet overeen met onze database. Controleer alstublieft uw invoer en probeer het opnieuw"
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function handleRegister(Request $request)
    {
        // Valideer het formulier.
        // Elk veld is verplicht / Wachtwoord en confirmatie moeten overeen komen / Email adres moet uniek zijn
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'

        ]);
        // Bewaar een nieuwe gebruiker in de databank met een beveiligd wachtwoord.
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // BONUS: Verstuur een email naar de gebruiker waarin staat dat er een nieuwe account geregistreerd is voor de gebruiker.
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
