<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     */
    public function connexion() {
        return view('auth.connexion');
    }

    /**
     * Traite la connexion de l'utilisateur
     *
     * @param Request $request Contient les données de connexion
     */
    public function authentifier(Request $request) {
        $infos_valides = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => "Le courriel est requis",
            'email.email' => "Le courriel doit être valide",
            'password.required' => "Toutes les informations sont requises"
        ]);

        if(auth()->attempt($infos_valides)) {
            return redirect()->route('accueil')->with('success-connexion', 'Connexion réussie!');
        }

        return back()->with('echec-connexion', 'Les informations soumises n\'ont pu être vérifiées');

    }

    /**
     * Déconnecte l'utilisateur (supprime la session)
     */
    public function deconnecter() {
        auth()->logout();

        return redirect()->route('login')->with('success-deconnexion', 'Vous êtes déconnecté');
    }
}
