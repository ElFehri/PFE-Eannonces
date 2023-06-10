<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //la liste des utilisateurs
    public function usersList()
    {
        $users = User::orderBy('name', 'asc')
            ->get(['id', 'name', 'email', 'CIN', 'role', 'authorized']);

        $admins = [];
        $responsables = [];
        $membres = [];

        foreach ($users as $user) {
            if ($user->role === "Admin") {
                $admins[] = $user;
            } elseif ($user->role === "Responsable") {
                $responsables[] = $user;
            } else{
                $membres[] = $user;
            }
        }

        return view('users.userList', compact('admins', 'responsables', 'membres'));
    }

    
    
    //profil d'un utilisateur
        public function userProfile($id){
            $user = User::findOrFail($id);
            $publications = Publication::with(['annonce', 'information'])
                            ->where('user_id', $user->id)
                            ->orderBy('created_at','desc')
                            ->get();

            $informations = [];
            $annonces = [];
            foreach ($publications as $publication) {
                if ($publication->annonce) {
                    $annonces[] = $publication->annonce;
                }
                if ($publication->information) {
                    $informations[] = $publication->information;
                }
            }
            return view('users.userProfile', compact('user','annonces', 'informations'));
        }

        //gestion d'authorization
        public function userAuthorization($id){
            $user = User::findOrFail($id);
            if ($user->authorized) {
                $user->authorized = false;
                $user->save();
                return redirect()->back()->with('error', 'Permissions bien supprimee');
            } else {
                $user->authorized = true;
                $user->save();
                return redirect()->back()->with('message', 'Permissions bien reinitialiser');
            }
        }
    
        //Mon profil
        public function profile()
        {
            $user = Auth::user();
            $publications = Publication::with(['annonce', 'information'])
                ->where('user_id', $user->id)
                ->get();
        
            $annonces = [];
            $Informations = [];
        
            foreach ($publications as $publication) {
                if ($publication->annonce) {
                    $annonces[] = $publication->annonce;
                }
                if ($publication->information) {
                    $Informations[] = $publication->information;
                }
            }
        
            $tA = count($annonces);
            $tI = count($Informations);
        
            return view('users.profile', compact('user', 'tA', 'tI'));
        }
        
    //editer mon profil
    public function editProfile(Request $request){
       
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->CIN = $request->input('CIN');
        $user->password = Hash::make($request->input('password'));
        
        $request->validate([
            'CIN' => 'required',
            'password' => 'required|confirmed',
        ]);
        
        $user->save();
        return redirect()->route('profile')->with('message', 'Profile updated successfully');
    }
    
    //ajouter nouveau utilisateur
    public function addUser(){
        return view('users.addUser');
    }
    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'CIN' => 'required|string|unique:users,CIN',
            'role' => 'required|string|in:Responsable,Admin,Member',
        ], [
            'email.unique' => 'The email address is already registered.',
            'CIN.unique' => 'The CIN is already registered.',
        ]);
    
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->CIN = $validatedData['CIN'];
        $user->role = $validatedData['role'];
        $user->password = Hash::make($validatedData['CIN']);
        $user->authorized = true;
    
        $user->save();
        return redirect()->route('addUser')->with(['message' => 'User created successfully']);
    }
    
    //les annonces de l'utilisateur qui connecter
    public function mesAnnonces()
    {
        $user = Auth::user();
        $publications = Publication::with('annonce')
                        ->where('user_id', $user->id)
                        ->orderBy('created_at','desc')
                        ->get();

        $annonces = [];
        foreach ($publications as $publication) {
            if ($publication->annonce) {
                $publication->annonce->Masked = $publication->Masked;
                $annonces[] = $publication->annonce;
            }
        }
        return view('users.mesAnnonces', compact('annonces'));
    }

    //les infos de l'utilisateur qui connecter
    public function mesInformations(){
        $user = Auth::user();

        $publications = Publication::with('information')
                        ->where('user_id', $user->id)
                        ->orderBy('created_at','desc')
                        ->get();
        $informations = [];
        foreach ($publications as $publication) {
            if ($publication->information) {
                $publication->information->Masked = $publication->Masked;
                $informations[] = $publication->information;
            }    
        }
        return view('users.mesInformations', compact('informations'));
    }

    //user notifications
    public function announcesStatus()
    {
        $user = Auth::user();
        $announcements = DB::table('annonces')
                ->join('publications', 'annonces.pub_id', '=', 'publications.id')
                ->where('publications.created_at', '>=', now()->subDays(3))
                ->where('publications.user_id', '=', $user->id)
                ->get(['annonces.id','pub_id', 'title', 'content', 'Validated', 'Masked', 'image']);
            
        $validated = []; $rejected = []; $inReview = [];
        foreach ($announcements as $announce) {
            if ($announce->Validated === 1) {
                $validated[] = $announce;
            }elseif ($announce->Validated === -1) {
                $rejected[] = $announce;
            }else{
                $inReview[] = $announce;
            }
        }
        return view('users.announcesStatus', compact('validated','rejected', 'inReview'));
    }
    public function informationStatus()
    {
        $user = Auth::user();

        $information = DB::table('information')
                ->join('publications', 'information.pub_id', '=', 'publications.id')
                ->where('publications.created_at', '>=', now()->subDays(3))
                ->where('publications.user_id', '=', $user->id)
                ->get(['information.id','pub_id','content', 'Validated', 'Masked']);
        $validated = []; $rejected = []; $inReview = [];

        foreach ($information as $info) {
            if ($info->Validated === 1) {
                $validated[] = $info;
            }
            if ($info->Validated === -1) {
                $rejected[] = $info;
            }
            if ($info->Validated === 0) {
                $inReview[] = $info;
            }
        }    
        
        return view('users.informationStatus', compact('validated','rejected', 'inReview'));
    }

}
