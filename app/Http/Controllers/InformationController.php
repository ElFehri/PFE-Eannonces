<?php

namespace App\Http\Controllers;


use App\Models\Information;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Error;
use PhpParser\Node\Stmt\If_;

class InformationController extends Controller
{
    public function index()
    {
        $information = DB::table('information')
            ->join('publications', 'information.pub_id', '=', 'publications.id')
            ->where('publications.type', '=', 'Information')
            ->get();
        
        return view('information.index',['information'=> $information]);
    }

    public function create()
    {        
        return view('information.create');
    }
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $publication = new Publication;
            $publication->type = "Information";
            $publication->user_id = $user->id;
            $publication->start_date = $request->input('start_date');
            $publication->end_date = $request->input('end_date');
            $publication->save();

            $information = new Information;
            $information->content = $request->input('content');
            $information->pub_id = $publication->id;
            $information->save();

            return redirect()->back()->with(['message' => 'Information bien cree']);
        } catch (Error $e) {
            return redirect()->back()->with(['error' => $e]);
        }
    }

    public function show($pub_id)
    {
        $information = Information::where('information.pub_id', $pub_id)->first();
        $publication = Publication::where('publications.id', $pub_id)->first();
    
        return view('information.show',['information'=>$information, 'publication'=>$publication]);
    }

    public function edit($id)
    {
        $information = Information::with('publication')->findOrFail($id);
        $publication = $information->publication;
        return view('information.edit', compact('information', 'publication'));
    } 

    public function update(Request $request, Information $information)
    {
        try{
            $publication = Publication::find($information->pub_id);
            $publication->start_date = $request->input('start_date');
            $publication->end_date = $request->input('end_date');
            $publication->save();

            $information->content = $request->input('content');
            $information->save();

            return redirect()->route('home')->with(['message' => 'Information bien modifie']);
        } catch (Error $e) {
            return redirect()->back()->with(['error' => $e]);
        }
    }

    public function destroy($id)
    {
        $information = Information::with('publication')->findOrFail($id)->deleteOrFail();        
        return redirect()->route('home'); 
    }
}
