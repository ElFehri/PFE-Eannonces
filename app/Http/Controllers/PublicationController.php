<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Information;
use App\Models\Publication;
use Carbon\Carbon;
use Error;
use Exception;
use Illuminate\Support\Facades\Cache;
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

            Cache::forget('screen.blade.php');
            
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

    public function screen()
    {
        $currentDateTime = DB::selectOne('SELECT NOW()')->{'NOW()'}; // Retrieve the system date
    
        $annonces = Annonce::whereHas('publication', function ($query) use ($currentDateTime) {
            $query->where('start_date', '<=', $currentDateTime)
                ->where('end_date', '>=', $currentDateTime)
                ->where('validated', 1)
                ->where('masked', 0);
        })->get(['title', 'content', 'image']);
    
        $information = Information::whereHas('publication', function ($query) use ($currentDateTime) {
            $query->where('start_date', '<=', $currentDateTime)
                ->where('end_date', '>=', $currentDateTime)
                ->where('validated', 1)
                ->where('masked', 0);
        })->get(['content']);
    
        return view('screen', compact('annonces', 'information'));
    }
    


}
