<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VilleController extends Controller
{
    public function index()
    {
        $villes = Ville::all();
        return view('ville.ville')
            ->with('villes', $villes);
    }
    public function nouveau(Request $request)
    {
        $length = Ville::orderBy('ID_VILLE', 'desc')->first();
        if (empty($length))
            $id = 1;
        else
            $id = $length->ID_VILLE + 1;
        $ville = new Ville();

        $ville->ID_VILLE = $id;
        $ville->NOM_VILLE = $request->NOM_VILLE;
        $ville->save();
        return back()->with(Session::flash('message'));
    }
    public function modifier(Request $request)
    {
        $data = $request->donnees;
        $ville = Ville::find($data[0]);
        $ville->NOM_VILLE = $data[1];
        $ville->save();
    }
}
