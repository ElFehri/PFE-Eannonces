<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnnonceController extends Controller
{
   
    public function create(){
        return view('annonces.create');
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            if ($start_date >= $end_date) {
                return redirect()->back()->with(['Exception' => 'La date de début doit être inférieure à la date de fin!']);
            }

            $publication = new Publication;
            $publication->user_id = $user->id;
            $publication->start_date = $start_date;
            $publication->end_date = $end_date;
            if ($user->role === "Responsable") {
                $publication->Masked = false;
                $publication->Validated = 1;
            } else {
                $publication->Masked = true;
                $publication->Validated = 0;
            }
            
            $publication->save();

            $data = $request->validate([
                'title' => 'required',
                'content' => 'nullable',
                'image' => 'nullable|image', // Validate image file (optional)
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/annoncesImages', $imageName);
                $data['image'] = $imageName;
            }
            

            $annonce = new Annonce;
            $annonce->fill($data);
            $annonce->pub_id = $publication->id;
            $annonce->save();

            return redirect()->back()->with(['message' => 'Annonce créée avec succès.']);
        } catch (Exception $e) {
            return redirect()->back()->with(['Exception' => $e->getMessage()]);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'nullable',
            'image' => 'nullable|image', // Validate image file (optional)
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $publication = Publication::find($annonce->pub_id);
            $publication->start_date = $request->input('start_date');
            $publication->end_date = $request->input('end_date');
            $publication->save();

            $annonce->content = $request->input('content');
            $annonce->title = $request->input('title');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/annoncesImages', $imageName);
                
                // Remove the oldest image if it exists
                if ($annonce->image) {
                    Storage::delete('public/annoncesImages/' . $annonce->image);
                }
                
                $annonce->image = $imageName;
            }

            $annonce->save();

            return redirect()->route('home')->with('message', 'Annonce modifiée avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('exception', $e->getMessage());
        }
    }



    public function destroy($id)
    {
        try {
            $annonce = Annonce::with('publication')->findOrFail($id)->deleteOrFail();
            return redirect()->route('home')->with(['message'=>"L'annonce a été supprimée avec succès."]); 
    
        } catch (Exception $e) {
            return redirect()->route('home')->with(['Exception'=>$e->getMessage()]);
        }
    }
}
