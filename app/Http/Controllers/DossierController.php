<?php

namespace App\Http\Controllers;

use App\Models\Adversaire;
use App\Models\Clients;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Nature;
use App\Models\TypeDossier;
use App\Models\TypeTiere;
use App\Models\User;
use App\Models\Ville;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;





class DossierController extends Controller
{

    public function index()
    {
        $ville = Ville::all();
        $region = Ville::all();
        $type   = TypeTiere::all();
        $nature = Nature::all();
        $clients = Clients::all();
        $adversaire = Adversaire::all();
        $type_dossier = TypeDossier::all();
        $user    = User::all();
        return view('dossier.dossier_ajouter', compact('ville', 'region', 'type', 'clients', 'adversaire', 'nature', 'type_dossier', 'user'));
    }


    public function nouveau(Request $request)
    {


        $client                = $request->client;
        $adversaire            = $request->adversaire;
        $radical_client        = $request->radical_client;
        $creance               = $request->creance;
        $agence                = $request->agence;
        $direction             = $request->direction;
        $nature                = $request->nature;
        $type_dossier          = $request->type_dossier;
        $numero_dossier        = $request->numero;
        $radical_cabinet       = $request->radical_cabinet;
        $date                  = $request->date;
        $user                  = $request->user;

        $moroccoTimezone = new DateTimeZone('Africa/Casablanca'); // Set the time zone to Morocco
        $moroccoTime = new DateTime('now', $moroccoTimezone); // Get the current time in Morocco
        $time = $moroccoTime->format('Y-m-d H:i:s');
        $test   = Dossier::orderBy('ID_DOSSIER', 'desc')->first();

        if (empty($test)) {

            $id = 1;
        } else {
            $id = $test->ID_DOSSIER + 1;
        }


        $dossier                         = new Dossier();

        $dossier->ID_DOSSIER             = $id;

        $dossier->NUM_DOSSIER            = $numero_dossier;

        $dossier->R_CABINET              = $radical_cabinet;

        $dossier->R_CLIENT               = $radical_client;

        $dossier->DATE_OUVERTURE         = $time;

        $dossier->MNT_CREANCE            = $creance;

        $dossier->DIRECTION              = $direction;

        $dossier->ID_NATURE              = $nature;

        $dossier->ID_TYPEDOSSIER         = $type_dossier;

        $dossier->ID_ADVERSAIRE          = $adversaire;

        $dossier->ID_CLIENT              = $client;

        $dossier->CIN                    = $user;

        $dossier->AGENCE                 = $agence;


        if ($dossier->save()) {



            foreach ($request->file('fichier') as $row) {


                $teste   = Document::orderBy('ID_DOCUMENT', 'desc')->first();

                if (empty($teste)) {


                    $ids  = 1;
                } else {


                    $ids  =  $teste->ID_DOCUMENT + 1;
                }

                $file = $row->store('public/documents');


                $document   = new Document();

                $document->ID_DOCUMENT     = $ids;

                $document->ID_DOSSIER      = $id;

                $document->DATE_DOC        = $time;

                $document->NOM_DOCUMENT    = $row->getClientOriginalName();

                $document->CHEMINE         = $file;


                $document->save();
            }


            return back()->with(Session::flash('message'));
        }
    }
}
