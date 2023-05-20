<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function mask($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->Masked = true;
        $publication->save();

        return view('users.notifications');
    }

    public function unmask($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->Masked = false;
        $publication->save();

        return view('users.notifications');
    }

    public function validatePublication($id)
    {
        try {
            $publication = Publication::findOrFail($id);
            $publication->Validated = 1;
            $publication->Masked = false;
            $publication->save();
    
            return redirect()->back()->with('message','La publication a été validé avec succès.');
        } catch (Error $e) {
            return redirect()->back()->with('error', $e);
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




}
