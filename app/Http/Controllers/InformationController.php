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
        
        return response()->json(['information'=> $information]);
    }

    public function index_livewire()
    {
        $information = DB::table('information')
            ->join('publications', 'information.pub_id', '=', 'publications.id')
            ->where('publications.type', '=', 'Information')
            ->get();
        
        return view('livewire.information-component', [
            'information' => $information
        ]);
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

            return response()->json(['message'=> 'Information created successfuly']);

        } catch (Error $e) {
            return response()->json(['error'=> $e]);
        }
    }

    public function show($pub_id)
    {
        $information = Information::where('information.pub_id', $pub_id)->first();
        $publication = Publication::where('publications.id', $pub_id)->first();
    
        return response()->json(['information'=>$information, 'publication'=>$publication]);
    }

    /* public function edit($pub_id)
    {
        $information = Information::where('information.pub_id', $pub_id)->first();
        $publication = Publication::where('publications.id', $pub_id)->first();
        return view('information.edit', compact('information', 'publication'));
    } */

    public function update(Request $request, Information $information)
    {
        try{
            $publication = Publication::find($information->pub_id);
            $publication->start_date = $request->input('start_date');
            $publication->end_date = $request->input('end_date');
            $publication->save();

            $information->content = $request->input('content');
            $information->save();

            return response()->json(['message'=> 'Information updated successfuly']);

        } catch (Error $e) {
            return response()->json(['error'=> $e]);
        }
    }

    public function destroy($pub_id)
    {
        /* $information = Information::where('information.pub_id', $pub_id)->first();
        $publication = Publication::where('publications.id', $pub_id)->first();
        $publication->delete();
        $information->delete();

        return redirect()->route('information.index'); */
    }
}
