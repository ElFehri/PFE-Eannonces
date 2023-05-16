<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Publication;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    
    
    
    public function index()
    {
       // Récupérer l'utilisateur authentifié
            $user = Auth::user();

            // Récupérer toutes les publications avec les annonces et les informations associées à l'utilisateur authentifié
            $publications = $user->publications()->with('annonce', 'information')->get();

            // Tableaux pour stocker les annonces et les informations
            $annonces = [];
            $informations = [];

            // Parcourir les publications et stocker les annonces et les informations dans les tableaux respectifs
            foreach ($publications as $publication) {
                if ($publication->annonce) {
                    $annonces[] = $publication->annonce;
                }

                if ($publication->information) {
                    $informations[] = $publication->information;
                }
            }

            // Passer les tableaux d'annonces et d'informations à la vue
            return view('home', compact('annonces', 'informations'));
    }

}