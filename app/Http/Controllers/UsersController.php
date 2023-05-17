<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    

    public function mesAnnonces()
    {
        $user = Auth::user();

        $publications = $user->publications()->with('annonce')->get();

        $annonces = [];
        foreach ($publications as $publication) {
            if ($publication->annonce) {
                $annonces[] = $publication->annonce;
            }
        }

        return view('users.mesAnnonces', compact('annonces'));
    }

    public function mesInformations(){
        $user = Auth::user();

        $publications = $user->publications()->with('information')->get();
        $informations = [];
        foreach ($publications as $publication) {
            if ($publication->information) {
                $informations[] = $publication->information;    
            }
            
        }

        // Passer les tableaux d'annonces et d'informations à la vue
        return view('users.mesInformations', compact('informations'));
    }
}
