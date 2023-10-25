<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExpertController extends Controller
{
    public function index()
    {
        $villes = Ville::all();
        $experts = Expert::all();
        return view('expert.expert')
            ->with(["experts" => $experts, "villes" => $villes]);
    }
    public function nouveau(Request $request)
    {
        $expert = new Expert();
        $expert->ID_EXPERT = $request->ID_EXPERT;
        $expert->NOM = $request->NOM;
        $expert->ID_VILLE = $request->ID_VILLE;
        if ($expert->save()) {
            return back()->with(Session::flash('nouveau'));
        }
    }
    public function modifier(Request $request)
    {
        $tableau = $request->donnees;
        $expert = Expert::find($tableau[0]);
        $expert->NOM = $tableau[1];
        $expert->ID_VILLE = $tableau[2];
        $expert->save();
    }
}