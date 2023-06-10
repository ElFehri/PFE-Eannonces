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
    //nouveaux annonces
    public function newAnnonces()
    {
        $newPubs = Publication::where('Validated', 0)
            ->with('annonce')
            ->orderBy('created_at', 'desc')
            ->get();
        $newAnnonces = [];

        foreach ($newPubs as $publication) {
            if ($publication->annonce) {
                $newAnnonces[] = $publication->annonce;
            }
        }
        return view('responsable.newAnnonces', compact('newAnnonces'));
    }

    //nouveaux informations
    public function newInformations(){
        $newPubs = Publication::where('Validated', 0)
            ->with('information')
            ->orderBy('created_at', 'desc')
            ->get();
        $newInformations = [];

        foreach ($newPubs as $publication) {
           if ($publication->information) {
                $newInformations[] = $publication->information;
            }
        }
        return view('responsable.newInformations', compact('newInformations'));    
    }

    //nouveaux utilisateurs
    public function newUsers(){
        $newUsers = User::where('authorized', false)
            ->where('created_at', '>=', Carbon::now()->subDays(3))
            ->get();
        return view('responsable.newUsers', compact('newUsers'));    
    }

    //accepter inscription d'utilisateur
    public function validateUser(User $user)
    {
        try {
            $user->authorized = true;
            $user->save();

            return redirect()->back()->with('message', 'Le compte utilisateur a été validé avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    //refuser inscription d'utilisateur
    public function rejectUser(User $user)
    {
        try {
            $user->delete();

            return redirect()->back()->with('message', 'Le compte utilisateur a été rejeté et supprimé avec succès.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    //change user role
    public function changeUserRole(Request $request, $id){
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();
        return redirect()->back()->with('message', 'Role chnged succesfully');
    }
}
