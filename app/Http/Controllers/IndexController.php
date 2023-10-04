<?php

namespace App\Http\Controllers;


use App\Models\Adversaire;
use App\Models\Clients;
use App\Models\Dossier;


class IndexController extends Controller
{
    public function index()
    {
        $dossier = Dossier::count();
        $clients = Clients::count();
        $adversaire  = Adversaire::count();
        $maj = Dossier::whereNotNull('MODIFICATION')
            ->count();
        return view('acceuil', compact('dossier', 'clients', 'adversaire', 'maj'));
    }
}
