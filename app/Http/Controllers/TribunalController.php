<?php

namespace App\Http\Controllers;

use App\Models\Tribunal;
use App\Models\TypeTribunal;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TribunalController extends Controller
{
    public function index()
    {
        $Tribunaux = Tribunal::all();
        $villes = Ville::all();
        $type_tribunal = TypeTribunal::all();
        return view('tribunal.tribunal')->with(
            [
                'Tribunaux' => $Tribunaux,
                'villes' => $villes,
                'type_tribunal' => $type_tribunal
            ]
        );
    }
    public function nouveau(Request $request)
    {
        $tribunal = new Tribunal();
        $tribunal->ID_TRIBUNAL = $request->ID_TRIBUNAL;
        $tribunal->ID_VILLE = $request->ID_VILLE;
        $tribunal->NOM_TRIBUNAL = $request->NOM_TRIBUNAL;
        $tribunal->ID_TTRIBUNAL = $request->ID_TTRIBUNAL;
        $tribunal->NOM_TRIBUNAL = $request->NOM_TRIBUNAL;
        $tribunal->LIBELLE = $request->LIBELLE;
        $tribunal->NUM_TRIBUNAL = $request->NUM_TRIBUNAL;
        if ($tribunal->save()) {
            return back()->with(Session::flash('nouveau'));
        }
    }
    public function modifier(Request $request)
    {
        $tableau  = $request->donnees;
        $tribunal = Tribunal::where('ID_TRIBUNAL', $tableau[0])->first();
        $tribunal->ID_VILLE      = $tableau[1];
        $tribunal->ID_TTRIBUNAL            = $tableau[2];
        $tribunal->NOM_TRIBUNAL         = $tableau[3];
        $tribunal->LIBELLE          = $tableau[4];
        $tribunal->NUM_TRIBUNAL        = $tableau[5];
        $tribunal->save();
    }
}
