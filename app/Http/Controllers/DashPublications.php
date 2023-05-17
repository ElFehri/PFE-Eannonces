<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashPublications extends Controller
{
    public function screen()
    {
        $annonces = DB::table('annonces')
            ->join('publications', 'annonces.pub_id', '=', 'publications.id')
            ->where('publications.start_date', '<=', now())
            ->where('publications.end_date', '>=', now())
            ->get();
    
        $information = DB::table('information')
            ->join('publications', 'information.pub_id', '=', 'publications.id')
            ->where('publications.start_date', '<=', now())
            ->where('publications.end_date', '>=', now())
            ->get();
       
        return view('screen', compact('annonces','information'));
    }
    


}
