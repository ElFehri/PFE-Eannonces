<?php

namespace App\Http\Controllers;

use App\Events\MaskPublication;
use App\Models\Publication;
use Error;
use Exception;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{

    public function mask($id)
    {
        try {
            $publication = Publication::findOrFail($id);
            $publication->Masked = true;
            $publication->save();


            return redirect()->back()->with('message', 'La publication a été masquée avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function unmask($id)
    {
        try {
            $publication = Publication::findOrFail($id);
            $publication->Masked = false;
            $publication->save();


            return redirect()->back()->with('message', 'La publication a été démasquée avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function validatePublication($id)
    {
        try {
            $publication = Publication::findOrFail($id);
            $publication->Validated = 1;
            $publication->Masked = false;
            $publication->save();

            
            
            return redirect()->back()->with('message', 'La publication a été validée avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function rejectPublication($id)
    {
        try{
            $publication = Publication::findOrFail($id);
            $publication->Validated = -1;
            $publication->Masked = true;
            $publication->save();
            return redirect()->back()->with('error','La publication a été rejeté avec succès.');
        } catch (Error $e) {
            return redirect()->back()->with('error', $e);
        }
    }


    //la sortie de a l'ecran
    public function screen()
    {
        $annonces = DB::table('annonces')
            ->join('publications', 'annonces.pub_id', '=', 'publications.id')
            ->where('publications.start_date', '<=', now())
            ->where('publications.end_date', '>=', now())
            ->where('Validated', '=', 1)
            ->where('Masked', '=', false)
            ->select(['title', 'content','image'])
            ->get();
    
        $information = DB::table('information')
            ->join('publications', 'information.pub_id', '=', 'publications.id')
            ->where('publications.start_date', '<=', now())
            ->where('publications.end_date', '>=', now())
            ->where('Validated', '=', 1)
            ->where('Masked', '=', false)
            ->get(['content']);
       
        return view('screen', compact('annonces','information'));
    }


}
