<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    // responsible notifications part

    public function newAnnonces()
    {
        $newPubs = Publication::where('Validated', 0)
            ->with('annonce')
            ->get();
        $newAnnonces = [];

        foreach ($newPubs as $publication) {
            if ($publication->annonce) {
                $newAnnonces[] = $publication->annonce;
            }
        }
        return view('responsable.newAnnonces', compact('newAnnonces'));
    }
    public function newInformations(){
        $newPubs = Publication::where('Validated', 0)
            ->with('information')
            ->get();
        $newInformations = [];

        foreach ($newPubs as $publication) {
           if ($publication->information) {
                $newInformations[] = $publication->information;
            }
        }
        return view('responsable.newInformations', compact('newInformations'));    
    }
    public function newUsers(){
        // Get users registered in the last 3 days and not yet authorized
        $newUsers = User::where('authorized', false)
            ->where('created_at', '>=', Carbon::now()->subDays(3))
            ->get();
        return view('responsable.newUsers', compact('newUsers'));    
    }
    public function validateUser(User $user)
    {
        try {
            $user->authorized = true;
            $user->save();

            return redirect()->back()->with('message', 'Le compte utilisateur a été validé avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('Exception', $e->getMessage());
        }
    }

    public function rejectUser(User $user)
    {
        try {
            $user->delete();

            return redirect()->back()->with('Exception', 'Le compte utilisateur a été rejeté et supprimé avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('Exception', $e->getMessage());
        }
    }
}
