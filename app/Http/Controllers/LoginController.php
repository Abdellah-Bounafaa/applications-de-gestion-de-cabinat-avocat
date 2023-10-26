<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }


    public function connexion(Request $request)
    {
        $user = User::where("LOGIN", $request->login)->first();
        if (!$user || !Hash::check($request->password, $user->MDP)) {
            return back()->withErrors(['error' => "Les informations d'identification fournies ne sont pas correctes."]);
        }
        Auth::login($user);
        return redirect('dashboard');
    }
}
