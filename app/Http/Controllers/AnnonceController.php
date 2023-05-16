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
            $publication->type = "Annonce";
            $publication->user_id = $user->id;
            $publication->start_date = $request->input('start_date');
            $publication->end_date = $request->input('end_date');
            $publication->save();

            $annonce = new Annonce;
            $annonce->title = $request->input('title');
            $annonce->content = $request->input('content');
            $annonce->pub_id = $publication->id;
            $annonce->save();

            return redirect()->back()->with(['message' => 'Annonce bien cree']);
        } catch (Error $e) {
            return redirect()->back()->with(['error' => $e ]);
        }
    }


    public function show($pub_id)
    {
        $annonce = Annonce::where('annonces.pub_id', $pub_id)->first();
        $publication = Publication::where('publications.id', $pub_id)->first();

        return view('annonces.show', ['annonce'=>$annonce, 'publication'=>$publication]);
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

            return redirect()->route('home')->with(['message' => 'Annonce bien modifie']);
        } catch (Error $e) {
            return redirect()->back()->with(['error' => "Annonce n'est pas modifie"]);
        }
    }

    public function destroy($id)
    {
        $annonce = Annonce::with('publication')->findOrFail($id)->deleteOrFail();
        
        return redirect()->route('annonces.index'); 
    }
}
