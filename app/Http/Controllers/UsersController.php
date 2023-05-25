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

    
    
        public function userProfile($id){
            $user = User::findOrFail($id);
            return view('users.userProfile', compact('user'));
        }
    
        public function deleteUser($id){
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('usersList')->with('success', 'User deleted successfully');
        }
    
        public function profile(){
            $user = Auth::user();
            return view('users.profile', compact('user'));
        }
    
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
    
    public function addUser(){
        return view('users.addUser');
    }
    public function storeUser(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'CIN' => 'required|string|unique:users,CIN',
            'role' => 'required|string|in:Responsable,Admin,Member',
        ], [
            'email.unique' => 'The email address is already registered.',
            'CIN.unique' => 'The CIN is already registered.',
        ]);
    
        // Create a new user instance
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->CIN = $validatedData['CIN'];
        $user->role = $validatedData['role'];
        $user->password = Hash::make($validatedData['CIN']);
        $user->authorized = true;
    
        // Save the user to the database
        $user->save();
        return redirect()->route('addUser')->with(['message' => 'User created successfully']);
    }
    
    public function mesAnnonces()
    {
        $user = Auth::user();

        $publications = $user->publications()->with('annonce')->get();

        $annonces = [];
        foreach ($publications as $publication) {
            if ($publication->annonce) {
                $annonces[] = $publication->annonce;
            }
        }

        return view('users.mesAnnonces', compact('annonces'));
    }

    public function mesInformations(){
        $user = Auth::user();

        $publications = $user->publications()->with('information')->get();
        $informations = [];
        foreach ($publications as $publication) {
            if ($publication->information) {
                $informations[] = $publication->information;    
            }
            
        }

        // Passer les tableaux d'annonces et d'informations à la vue
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
                ->get(['annonces.id','pub_id', 'title', 'content', 'Validated', 'Masked']);
            

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
