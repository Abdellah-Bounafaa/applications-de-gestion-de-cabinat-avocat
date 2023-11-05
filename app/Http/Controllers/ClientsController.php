<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\TypeTiere;
use App\Models\Ville;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class ClientsController extends Controller
{

    public function index()
    {

        $ville = Ville::all();
        $region = Ville::all();
        $type   = TypeTiere::all();
        $client = DB::table('clients')
            ->join('ville', 'clients.ID_VILLE', '=', 'ville.ID_VILLE')
            ->join('type_tiere', 'clients.ID_TYPET', '=', 'type_tiere.ID_TYPET')
            ->get();


        return view('client.client', compact('ville', 'client', 'region', 'type'));
    }


    public function nouveau(Request $request)
    {
        $c   = Clients::orderBy('ID_CLIENT', 'desc')->first();
        if (empty($c)) {
            $numero = 1;
        } else {
            $numero   = $c->ID_CLIENT + 1;
        }

        $nom_client                  = $request->nom_client;
        if ($request->type_client == 1 || $request->type_client == 2) {
            $prenom_client               = null;
        } else
            $prenom_client               = $request->prenom_client;
        $identifiant_client          = $request->identifiant_client;
        $adresse_client              = $request->adresse_client;
        $ville_client                = $request->ville_client;
        $tel_client                  = $request->tel_client;
        $tel2_client                 = $request->tel2_client;
        $fax_client                  = $request->fax_client;
        $email_client                = $request->email_client;
        $capital_client              = $request->capital_client;
        $type_client                 = $request->type_client;
        $nom_inter                   = $request->nom_inter;
        $email_inter                 = $request->email_inter;
        $tel_inter                   = $request->tel_inter;

        $moroccoTimezone = new DateTimeZone('Africa/Casablanca'); // Set the time zone to Morocco
        $moroccoTime = new DateTime('now', $moroccoTimezone); // Get the current time in Morocco
        $time = $moroccoTime->format('Y-m-d H:i:s');

        $clients = new Clients();
        $clients->ID_CLIENT   = $numero;
        $clients->IDENTIFIANT = $identifiant_client;
        $clients->ID_VILLE    = $ville_client;
        $clients->ID_TYPET    = $type_client;
        $clients->DATE_CLT    = $time;
        $clients->NOM         = $nom_client;
        if ($clients->ID_TYPET    == 2)
            $clients->PRENOM      = null;
        else
            $clients->PRENOM      = $prenom_client;
        $clients->ADRESSE     = $adresse_client;
        $clients->TEL         = $tel_client;
        $clients->TEL2        = $tel2_client;
        $clients->Fax         = $fax_client;
        $clients->EMAIL       = $email_client;
        $clients->INTERLOCUTEUR = $nom_inter;
        $clients->CAPITALE    = $capital_client;
        $clients->MOBILE_IN  = $tel_inter;
        $clients->EMAIL_IN = $email_inter;
        if ($clients->save()) {

            return back()->with(Session::flash('message'));
        }
    }





    public function modifier(Request $request)
    {
        $tableau  = $request->fruits;
        $clients = Clients::where('ID_CLIENT', $tableau[8])->first();
        $clients->ID_VILLE    = $tableau[5];
        if ($tableau[7] == 2) {
            $clients->PRENOM    = null;
        } else
            $clients->PRENOM      = $tableau[2];
        $clients->IDENTIFIANT         = $tableau[0];
        $clients->NOM         = $tableau[1];
        $clients->ADRESSE     = $tableau[4];
        $clients->ID_TYPET    = $tableau[7];
        $clients->TEL         = $tableau[3];
        $clients->EMAIL         = $tableau[9];
        $clients->TEL2         = $tableau[10];
        $clients->Fax         = $tableau[11];
        $clients->INTERLOCUTEUR = $tableau[12];
        $clients->EMAIL_IN         = $tableau[13];
        $clients->MOBILE_IN    = $tableau[14];
        $clients->save();
    }
}