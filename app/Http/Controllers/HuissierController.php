<?php

namespace App\Http\Controllers;

use App\Models\Huissier;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;






class HuissierController extends Controller
{
    public function index()
    {
        $villes = Ville::all();
        $huissier = Huissier::orderBy('ID_HUISSIER', 'ASC')->get();
        return view('huissier.huissier', compact('huissier', 'villes'));
    }


    public function modifier(Request $request)
    {
        $tableau  = $request->fruits;
        $huissier = Huissier::where('ID_HUISSIER', $tableau[0])->first();
        $huissier->NOM      = $tableau[1];
        $huissier->PRENOM            = $tableau[2];
        $huissier->ADRESS         = $tableau[3];
        $huissier->TELEPHONE          = $tableau[4];
        $huissier->EMAIL        = $tableau[5];
        $huissier->ID_VILLE        = $tableau[6];
        $huissier->save();
    }






    public function nouveau(Request $request)
    {
        $huissier = new Huissier();
        $huissier->ID_HUISSIER      = $request->ID_HUISSIER;
        $huissier->NOM            = $request->NOM;
        $huissier->PRENOM         = $request->PRENOM;
        $huissier->ADRESS          = $request->ADRESS;
        $huissier->TELEPHONE        = $request->TELEPHONE;
        $huissier->EMAIL            = $request->EMAIL;
        $huissier->ID_VILLE            = $request->ID_VILLE;
        if ($huissier->save()) {
            return back()->with(Session::flash('nouveau'));
        }
    }
}
