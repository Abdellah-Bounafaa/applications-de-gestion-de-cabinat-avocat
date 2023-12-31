<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    function index()
    {
        $user = User::join('niveau', 'niveau.ID_NIVEAU', '=', 'utilisateurs.ID_NIVEAU')
            ->get();
        $niveau = Niveau::all();
        return view('user.user', compact('user', 'niveau'));
    }


    public function modifier(Request $request)
    {
        $tableau  = $request->fruits;
        $user = User::where('CIN', $tableau[0])->first();
        $user->ID_NIVEAU = $tableau[1];
        $user->NOM = $tableau[2];
        $user->PRENOM = $tableau[3];
        $user->EMAIL = $tableau[4];
        $user->ADRESSE = $tableau[5];
        $user->TEL = $tableau[6];
        if (Session::get('cin') == $tableau[0]) {
            $user->LOGIN = $tableau[7];
            $user->MDP = Hash::make($tableau[8]);
        }
        $user->POSTE = $tableau[9];
        $user->save();
    }






    public function nouveau(Request $request)
    {
        $moroccoTimezone = new DateTimeZone('Africa/Casablanca'); // Set the time zone to Morocco
        $moroccoTime = new DateTime('now', $moroccoTimezone); // Get the current time in Morocco
        $time = $moroccoTime->format('Y-m-d H:i:s');
        $user = new User();
        $user->ID_NIVEAU = $request->niveau_user;
        $user->NOM = $request->nom_user;
        $user->PRENOM = $request->prenom_user;
        $user->EMAIL = $request->email_user;
        $user->ADRESSE = $request->adresse_user;
        $user->TEL   = $request->tel_user;
        $user->CIN = $request->cin_user;
        $user->LOGIN = $request->login_user;
        $user->MDP = Hash::make($request->mdp_user);
        $user->POSTE =  $request->poste_user;
        $user->CREATED =  $time;

        $user->save();
        return back();
    }
}
