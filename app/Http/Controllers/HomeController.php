<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Information;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    
    
    
    public function index()
    {
        $user = Auth::user();
        $publications = $user->publications()
            ->whereDate('created_at', now()->toDateString())
            ->with('annonce', 'information')
            ->get();

        $annonces = [];
        $informations = [];

        foreach ($publications as $publication) {
            if ($publication->annonce) {
                $publication->annonce->Masked = $publication->Masked;
                $annonces[] = $publication->annonce;
            }
            if ($publication->information) {
                $publication->information->Masked = $publication->Masked;
                $informations[] = $publication->information;
            }
        }
        return view('home', compact('annonces', 'informations'));
    }

    public function allAnnonces()
    {
        $annonces = Annonce::with('publication.user')->get();

        return view('allAnnonces', compact('annonces'));
    }

    public function allInformations()
    {
        $informations = Information::with('publication.user')->get();

        return view('allInformations', compact('informations'));
    }


}