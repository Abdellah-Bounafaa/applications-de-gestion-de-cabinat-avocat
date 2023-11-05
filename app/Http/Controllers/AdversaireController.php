<?php

namespace App\Http\Controllers;

use App\Models\Adversaire;
use App\Models\Cautionnaire;
use App\Models\TypeTiere;
use App\Models\Ville;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdversaireController extends Controller
{

    public function index()
    {
        $ville = Ville::all();
        $region = Ville::all();
        $type   = TypeTiere::all();
        $adversaire = DB::table('adversaires')
            ->join('ville', 'adversaires.ID_VILLE', '=', 'ville.ID_VILLE')
            ->join('type_tiere', 'adversaires.ID_TYPET', '=', 'type_tiere.ID_TYPET')
            ->latest('DATE_CLT')
            ->get();
        return view('adversaire.adversaire', compact('ville', 'adversaire', 'type', 'region'));
    }


    public function nouveau(Request $request)
    {
        $c   = Adversaire::orderBy('ID_ADVERSAIRE', 'desc')->first();
        $moroccoTimezone = new DateTimeZone('Africa/Casablanca'); // Set the time zone to Morocco
        $moroccoTime = new DateTime('now', $moroccoTimezone); // Get the current time in Morocco
        $time = $moroccoTime->format('Y-m-d H:i:s');
        if (empty($c)) {
            $numero = 1;
        } else {
            $numero   = $c->ID_ADVERSAIRE + 1;
        }
        $clients = new Adversaire();
        $clients->ID_ADVERSAIRE   = $numero;
        $clients->IDENTIFIANT =  $request->identifiant_adversaire;
        $clients->ID_VILLE    = $request->ville_adversaire;
        $clients->ID_TYPET    = $request->type_adversaire;

        $clients->DATE_CLT    = $time;
        $clients->NOM = $request->nom_adversaire;
        if ($clients->ID_TYPET == 2)
            $clients->PRENOM      = null;
        else
            $clients->PRENOM      = $request->prenom_adversaire;
        $clients->ADRESSE     = $request->adresse_adversaire;
        $clients->ADRESSE1    = $request->adresse1_adversaire;
        $clients->ADRESSE2    = $request->adresse2_adversaire;
        $clients->ADRESSE3    = $request->adresse3_adversaire;
        $clients->TEL         = $request->tel_adversaire;
        $clients->TEL2 = $request->tel2_adversaire;
        $clients->EMAIL       = $request->email_adversaire;
        $clients->CAUTION    = $request->caution_adversaire;

        if ($clients->save()) {
            if ($request->nom_cautionnaire) {
                $a   = Cautionnaire::orderBy('ID_CAUTIONNAIRE', 'desc')->first();
                if (empty($a)) {
                    $id = 1;
                } else {
                    $id  = $a->ID_CAUTIONNAIRE + 1;
                }

                $caution                  = new Cautionnaire();
                $caution->ID_CAUTIONNAIRE   = $id;
                $caution->ID_ADVERSAIRE   = $numero;
                $caution->ID_TYPET
                    = $request->type_cautionnaire;
                $caution->NOM             =
                    $request->nom_cautionnaire;
                $caution->PRENOM          =
                    $request->prenom_cautionnaire;
                $caution->ADRESSE         =
                    $request->adresse_cautionnaire;
                $caution->TEL
                    = $request->tel_cautionnaire;
                $caution->TEL2            =
                    $request->tel2_cautionnaire;
                $caution->EMAIL_CAUTIONNAIRE
                    = $request->email_cautionnaire;
                $caution->MOBILE          =
                    $request->mobile_cautionnaire;
                $caution->IDENTIFIANT     =
                    $request->identifiant_cautionnaire;
                $caution->save();
            }

            return back()->with(Session::flash('message'));
        }
    }



    public function modifier(Request $request)
    {
        $tableau  = $request->fruits;
        $clients = Adversaire::where('ID_ADVERSAIRE', $tableau[8])->first();
        $clients->IDENTIFIANT    = $tableau[0];
        $clients->ID_VILLE    = $tableau[5];
        $clients->ID_TYPET    = $tableau[7];
        $clients->NOM         = $tableau[1];
        if ($tableau[7] == 2)
            $clients->PRENOM      = null;
        else
            $clients->PRENOM      = $tableau[2];
        $clients->ADRESSE     = $tableau[4];
        $clients->TEL         = $tableau[3];
        $clients->CAUTION     = $tableau[6];
        $clients->ADRESSE1     = $tableau[9];
        $clients->ADRESSE2     = $tableau[10];
        $clients->ADRESSE3    = $tableau[11];
        $clients->TEl2    = $tableau[12];
        $clients->EMAIL    = $tableau[13];
        $clients->save();
        if ($tableau[6] == 1) {
            $caution = Cautionnaire::where('ID_ADVERSAIRE', $tableau[8])->first();
            $caution->NOM         = $tableau[14];
            if ($tableau[16] == 2)
                $caution->PRENOM      = null;
            else
                $caution->PRENOM      = $tableau[15];
            $caution->IDENTIFIANT = $tableau[16];
            $caution->TEL         = $tableau[17];
            $caution->ID_TYPET    = $tableau[18];
            $caution->ADRESSE     = $tableau[19];
            $caution->EMAIL_CAUTIONNAIRE    = $tableau[20];
            $caution->TEL2    = $tableau[21];
            $caution->save();
        }
    }



    public function caution(Request $request)
    {
        $id = $request->id;
        $caution      = Cautionnaire::where('ID_ADVERSAIRE', $id)->first();
        echo json_encode($caution);
    }
}
