<?php

namespace App\Http\Controllers;


use App\Models\Information;
use App\Models\Publication;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function create()
    {        
        return view('information.create');
    }
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            if ($start_date >= $end_date) {
                return redirect()->back()->with(['error' => 'La date de debut doit etre inferieur a la date de fin!']);
            }
            $publication = new Publication;
            $publication->user_id = $user->id;
            $publication->start_date = $request->input('start_date');
            $publication->end_date = $request->input('end_date');
            if ($user->role === "Responsable") {
                $publication->Masked = false;
                $publication->Validated = 1;
            } else {
                $publication->Masked = true;
                $publication->Validated = 0;
            }
            $publication->save();

            $information = new Information;
            $information->content = $request->input('content');
            $information->pub_id = $publication->id;
            $information->save();

            return redirect()->back()->with(['message' => 'Information créée avec succès.']);
        } catch (Error $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $information = Information::with('publication')->find($id);
        if (!$information) {
            abort(404); 
        }

        return view('information.show', compact('information'));
    }

    public function edit($id)
    {
        $information = Information::with('publication')->findOrFail($id);
        $publication = $information->publication;
        return view('information.edit', compact('information', 'publication'));
    } 

    public function update(Request $request, Information $information)
    {
        try {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            if ($start_date >= $end_date) {
                return redirect()->back()->with(['error' => 'La date de début doit être inférieure à la date de fin!']);
            }
            
            $publication = Publication::find($information->pub_id);
            $publication->start_date = $start_date;
            $publication->end_date = $end_date;
            $publication->Masked = true;
            $publication->Validated = 0;
            $publication->save();

            $information->content = $request->input('content');
            $information->save();

            
            return redirect()->route('home')->with(['message' => 'Information modifiée avec succès.']);
        } catch (Error $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $information = Information::with('publication')->findOrFail($id)->deleteOrFail();        
            return redirect()->route('home')->with(['message'=>"L'information a été supprimée avec succès."]);
        } catch (Error $e) {
            return redirect()->route('home')->with(['error'=>$e->getMessage()]);
        } 
    }
}
