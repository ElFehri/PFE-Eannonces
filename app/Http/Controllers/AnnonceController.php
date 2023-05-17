<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Error;

class AnnonceController extends Controller
{
   
    public function create(){
        return view('annonces.create');
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $publication = new Publication;
            $publication->user_id = $user->id;
            $publication->start_date = $request->input('start_date');
            $publication->end_date = $request->input('end_date');
            $publication->save();

            $annonce = new Annonce;
            $annonce->title = $request->input('title');
            $annonce->content = $request->input('content');
            $annonce->pub_id = $publication->id;
            $annonce->save();

            return redirect()->back()->with(['message' => 'Annonce créée avec succès.']);
        } catch (Error $e) {
            return redirect()->back()->with(['error' => $e ]);
        }
    }


    public function show($id)
    {
        $annonce = Annonce::with('publication')->find($id);

        if (!$annonce) {
            abort(404); 
        }

        return view('annonces.show', compact('annonce'));
    }


    public function edit($id)
    {
        $annonce = Annonce::with('publication')->findOrFail($id);
        $publication = $annonce->publication;
        return view('annonces.edit', compact('annonce', 'publication'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        try{
            $publication = Publication::find($annonce->pub_id);
            $publication->start_date = $request->input('start_date');
            $publication->end_date = $request->input('end_date');
            $publication->save();

            $annonce->content = $request->input('content');
            $annonce->title = $request->input('title');
            $annonce->save();

            return redirect()->route('home')->with(['message' => 'Annonce modifiée avec succès.']);
        } catch (Error $e) {
            return redirect()->back()->with(['error' => $e]);
        }
    }

    public function destroy($id)
    {
        try {
            $annonce = Annonce::with('publication')->findOrFail($id)->deleteOrFail();
            return redirect()->route('home')->with(['message'=>"L'annonce a été supprimée avec succès."]); 
    
        } catch (Error $e) {
            return redirect()->route('home')->with(['error'=>$e]);
        }
    }
}
