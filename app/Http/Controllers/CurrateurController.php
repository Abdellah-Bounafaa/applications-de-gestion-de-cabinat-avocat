<?php

namespace App\Http\Controllers;

use App\Models\Currateur;
use App\Models\Dossier;
use App\Models\Procedure;
use App\Models\Traitement;
use App\Models\Tribunal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CurrateurController extends Controller
{
    public function index()
    {
        $currateurs = Currateur::all();

        $tribunaux = Tribunal::all();
        $traitement = Traitement::all();
        $utilisateurs = User::all();
        return view('currateur.currateur')
            ->with([
                "currateurs" => $currateurs,
                "traitement" => $traitement,
                "tribunaux" => $tribunaux,
                "utilisateurs" => $utilisateurs,
            ]);
    }
    public function nouveau(Request $request)
    {
        // dd($request->all());
        $currateur = new Currateur();
        $currateur->ID_CURRATEUR = $request->ID_CURRATEUR;
        $currateur->ID_TRIBUNAL = $request->ID_TRIBUNAL;
        $currateur->CIN = $request->CIN;
        $currateur->ID_DOSSIER = $request->ID_DOSSIER;
        $currateur->ID_PROCEDURE = $request->ID_PROCEDURE;
        $currateur->REF_TRIBUNALE = $request->REF_TRIBUNALE;
        $currateur->DATE_ORDONANCE = $request->DATE_ORDONANCE;
        $currateur->DATE_DEM_NOTIFICATION = $request->DATE_DEM_NOTIFICATION;
        $currateur->NOM_CURRATEUR = $request->NOM_CURRATEUR;
        $currateur->DATE_NOT_CURRATEUR = $request->DATE_NOT_CURRATEUR;
        $currateur->DATE_INSERTION_JOURNALE = $request->DATE_INSERTION_JOURNALE;
        $currateur->NOM_JOURNALE = $request->NOM_JOURNALE;
        $currateur->DATE_RETOUR = $request->DATE_RETOUR;
        $currateur->OBS_CUR = $request->OBS_CUR;
        $currateur->ETAT_CURATEUR = $request->ETAT_CURATEUR;

        $path = "/currateurs";
        $fileName = $request->file('URL_CURRATEUR')->getClientOriginalName();
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true);
        }
        $request->file('URL_CURRATEUR')->move(public_path($path), $fileName);
        $currateur->URL_CURRATEUR = $fileName;
        if ($currateur->save()) {
            return back()->with(Session::flash('nouveau'));
        }
    }
}
