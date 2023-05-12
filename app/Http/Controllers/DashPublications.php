<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashPublications extends Controller
{
    public function allPublications()
    {
        $now = now();
        $annonces = DB::table('annonces')
            ->join('publications', 'annonces.pub_id', '=', 'publications.id')
            ->where('publications.type', '=', 'Annonce')
            ->where('publications.start_date', '<=', $now)
            ->where('publications.end_date', '>=', $now)
            ->get();
    
        $information = DB::table('information')
            ->join('publications', 'information.pub_id', '=', 'publications.id')
            ->where('publications.type', '=', 'Information')
            ->where('publications.start_date', '<=', $now)
            ->where('publications.end_date', '>=', $now)
            ->get();
        return view('test', compact('annonces','information'));
    }
    
    public function toDash()
{
    $now = now();
    $annonces = DB::table('annonces')
        ->join('publications', 'annonces.pub_id', '=', 'publications.id')
        ->join('users', 'publications.user_id', '=', 'users.id')
        ->select('annonces.*', 'users.name as user_name')
        ->where('publications.type', '=', 'Annonce')
        ->where('publications.start_date', '<=', $now)
        ->where('publications.end_date', '>=', $now)
        ->get();

    $information = DB::table('information')
        ->join('publications', 'information.pub_id', '=', 'publications.id')
        ->join('users', 'publications.user_id', '=', 'users.id')
        ->select('information.*', 'users.name as user_name')
        ->where('publications.type', '=', 'Information')
        ->where('publications.start_date', '<=', $now)
        ->where('publications.end_date', '>=', $now)
        ->get();

    return view('dashboard.index', compact('annonces','information'));
}

}
