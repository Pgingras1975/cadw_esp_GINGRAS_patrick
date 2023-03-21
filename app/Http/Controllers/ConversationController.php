<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ConversationController extends Controller
{
    /**
     * Affiche la page des conversations de l'usager connecté
     */
    public function index() {
        return view('conversation', [
             "conversations" => Conversation::where('user_id' , '=', auth()->user()->id )->orderByDesc('created_at')->get()
        ]);
    }

    /**
     * Traite les données d'ajout de la conversation.
     *
     * @param Request $request Données de la conversation
     */
    function converser(Request $request) {


        /**
         * Lectue du fichier json et décodage
         */

        $phrases = json_decode(Storage::get('public/phrases.json'), true);

        $reponse = null;

        foreach ($phrases as $keyword => $phrase) {
            if (stripos($request->texte, $keyword) !== false) {
                $reponse = $phrase;
                break;
            }
        }

        if ($reponse === null) {
            $google_search = str_replace(" ", "+", $request->texte);

            $reponse = '<a href="https://www.google.com/search?q=' . $google_search .
                        '" target="_blank">Je ne sais pas quoi répondre...</a>';
        }

        /**
         * Remplacement des informations entre [crochet] dans $reponse, s'il y a lieu
         */

        if (stripos($reponse, "[nom]") !== false) {
            $reponse = str_replace("[nom]", auth()->user()->nom_complet, $reponse);
        }

        if (stripos($reponse, "[heure]") !== false) {
            $reponse = str_replace("[heure]", substr(Carbon::now(),11, -3), $reponse);
        }


        /**
         * Enregistrement de $request et  $reponse dans la BDD
         */

        $request->validate([
            "texte" => 'required|max:255'
        ],[
            'texte.required' => 'Vous devez écrire une question',
            'texte.max' => 'La question doit avoir 255 caractères ou moins'
        ]);

        $conversation = new conversation();
        $conversation->questions = $request->texte;
        $conversation->reponses = $reponse;
        $conversation->user_id = auth()->user()->id;

        $conversation->save();

        /**
         * Redirection vers la page d'accueil
         */

        return redirect()->route('accueil');
    }
}
