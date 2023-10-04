<?php

namespace App\Http\Controllers;

use App\Models\Adversaire;
use App\Models\Audiance;
use App\Models\Clients;
use App\Models\Cna;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Etape;
use App\Models\Execution;
use App\Models\Huissier;
use App\Models\Jugement;
use App\Models\Nature;
use App\Models\Notification;
use App\Models\Plainte;
use App\Models\Procedure;
use App\Models\Requete;
use App\Models\Suivi;
use App\Models\Traitement;
use App\Models\Tribunal;
use App\Models\TypeDossier;
use App\Models\TypeTribunal;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class MajdossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients       = Clients::all();
        $adversaire    = Adversaire::all();
        $nature        = Nature::all();
        $natur         = Nature::all();
        $type          = TypeDossier::all();
        $typ           = TypeDossier::all();
        $user          = User::orderBy('CIN', 'asc')->get();
        $userr          = User::orderBy('CIN', 'asc')->get();
        $users         = User::all();
        $ville         = Ville::orderBy('ID_VILLE', 'asc')->get();
        $procedure     = Procedure::orderBy('ID_PROCEDURE', 'asc')->get();
        $type_tribunal     = TypeTribunal::orderBy('ID_TRIBUNAL', 'asc')->get();
        $tribunal          = Tribunal::orderBy('ID_TRIBUNAL', 'asc')->get();
        $huissier          = Huissier::orderBy('ID_HUISSIER', 'asc')->get();
        $notification      = Notification::orderBy('ID_NOTIFICATION', 'asc')->get();

        return view('majdossier', compact('clients', 'adversaire', 'nature', 'type', 'user', 'typ', 'natur', 'users', 'procedure', 'ville', 'type_tribunal', 'tribunal', 'huissier', 'notification', 'userr'));
    }



    public function rechercher(Request $request)
    {
        $donnees                      = $request->donnees;
        $numero_dossier               = $donnees[0];
        $radical_cabinet              = $donnees[1];
        $reference_client             = $donnees[2];
        $radical_client               = $donnees[3];
        $client                       = $donnees[4];
        $adverisare                   = $donnees[5];
        $nature                       = $donnees[6];
        $type                         = $donnees[7];
        $gestionnaire                 = $donnees[8];
        if (
            empty($numero_dossier)
            && empty($radical_cabinet)
            && empty($reference_client)
            && empty($radical_cabinet)
            && empty($client)
            && empty($adverisare)
            && empty($nature)
            && empty($type)
            && empty($gestionnaire)
        ) {
            $dossier = DB::table('dossier')
                ->join('clients', 'clients.ID_CLIENT', '=', 'dossier.ID_CLIENT')
                ->join('utilisateurs', 'utilisateurs.CIN', '=', 'dossier.CIN')
                ->join('adversaires', 'adversaires.ID_ADVERSAIRE', '=', 'dossier.ID_ADVERSAIRE')
                ->join('nature', 'nature.ID_NATURE', '=', 'dossier.ID_NATURE')
                ->join('type_dossier', 'type_dossier.ID_TYPEDOSSIER', '=', 'dossier.ID_TYPEDOSSIER')
                ->select('clients.NOM as nom_client', 'clients.PRENOM as prenom_client', 'adversaires.NOM as nom_adversaire', 'adversaires.PRENOM as prenom_adversaire', 'R_CABINET', 'R_CLIENT', 'DIRECTION', 'dossier.ID_DOSSIER', 'nature.NOM as nature', 'type_dossier.NOM as type', 'LOGIN', 'DATE_OUVERTURE', 'MNT_CREANCE', 'NUM_DOSSIER')
                ->latest('DATE_OUVERTURE')
                ->get();
            echo json_encode($dossier);
        }
    }




    public function modifier(Request $request)
    {

        $id          = $request->id;




        $dossier = DB::table('dossier')
            ->join('clients', 'clients.ID_CLIENT', '=', 'dossier.ID_CLIENT')
            ->join('utilisateurs', 'utilisateurs.CIN', '=', 'dossier.CIN')
            ->join('adversaires', 'adversaires.ID_ADVERSAIRE', '=', 'dossier.ID_ADVERSAIRE')
            ->join('nature', 'nature.ID_NATURE', '=', 'dossier.ID_NATURE')
            ->join('document', 'document.ID_DOSSIER', '=', 'dossier.ID_DOSSIER')
            ->join('type_dossier', 'type_dossier.ID_TYPEDOSSIER', '=', 'dossier.ID_TYPEDOSSIER')
            ->select('clients.NOM as nom_client', 'clients.PRENOM as prenom_client', 'adversaires.NOM as nom_adversaire', 'adversaires.PRENOM as prenom_adversaire', 'R_CABINET', 'R_CLIENT', 'DIRECTION', 'dossier.ID_DOSSIER', 'nature.ID_NATURE as nature', 'type_dossier.ID_TYPEDOSSIER as type', 'LOGIN', 'DATE_OUVERTURE', 'MNT_CREANCE', 'dossier.NUM_DOSSIER as numero', 'AGENCE', 'document.NOM_DOCUMENT', 'document.DATE_DOC as date_doc', 'document.CHEMINE as chemin', 'dossier.CIN as cin', 'NUM_ARCHIVAGE', 'dossier.OBSERVATION as observation', 'SUSPENTION', 'MANQUE_PIECE', 'SUSPENTION_ARRANGEMENT')
            ->where('dossier.ID_DOSSIER', $id)
            ->get();


        echo json_encode($dossier);
    }


    public function dossierprocedure(Request $request)
    {

        $id          = $request->id;


        $dossier = DB::table('traitement')
            ->join('procedures', 'procedures.ID_PROCEDURE', '=', 'traitement.ID_PROCEDURE')
            ->where('traitement.ID_DOSSIER', $id)
            ->get();


        echo json_encode($dossier);
    }



    public function enregistrer(Request $request)
    {
        $nature          = $request->nom_nature;
        $type            = $request->type_dossier;
        $creance         = $request->montant;
        $gestionnaire    = $request->gestion;
        $archivage       = $request->numero_archivage;
        $observation     = $request->observation;
        $id              = $request->id_dossier;
        if ($request->suspention) {
            $suspention = 1;
        } else {
            $suspention = null;
        }

        if ($request->arrangement) {
            $arr = 1;
        } else {
            $arr = null;
        }

        if ($request->manque) {
            $manque = 1;
        } else {
            $manque = null;
        }

        $dossier = Dossier::where('ID_DOSSIER', $id)->first();
        $dossier->ID_TYPEDOSSIER     = $type;
        $dossier->MNT_CREANCE        = $creance;
        $dossier->CIN                = $gestionnaire;
        $dossier->OBSERVATION        = $observation;
        $dossier->ID_NATURE          = $nature;

        if (isset($archivage)) {
            $dossier->NUM_ARCHIVAGE      = $archivage;
            $dossier->DATE_ARCHIVAGE     = date('Y-m-d');
        } else {
            $dossier->NUM_ARCHIVAGE  = null;
            $dossier->DATE_ARCHIVAGE     = null;
        }

        $dossier->MODIFICATION       = date('Y-m-d H:i:s');
        $dossier->SUSPENTION         = $suspention;
        $dossier->SUSPENTION_ARRANGEMENT = $arr;
        $dossier->MANQUE_PIECE       = $manque;

        if ($dossier->save()) {

            if ($request->file('fichier')) {


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

                    $document->DATE_DOC        = date('Y-m-d H:i:s');

                    $document->NOM_DOCUMENT    = $row->getClientOriginalName();

                    $document->CHEMINE         = $file;


                    $document->save();
                }
            }




            return back()->with(Session::flash('message'));
        }
    }






    public function procedure(Request $request)
    {

        $id = $request->id_procedure;






        $procedure   = Suivi::where('ID_PROCEDURE', $id)->get();


        $i = 0;
        foreach ($procedure as $row) {


            $etape = Etape::where('ID_ETAPE', $row->ID_ETAPE)
                ->orderby('ID_ETAPE', 'asc')
                ->get();

            $data[$i]["id_etape"] = $etape[0]->ID_ETAPE;
            $data[$i]["etape"] = $etape[0]->NOM_ETAPE;




            $i++;
        }


        echo json_encode($data);
    }



    public function procedures(Request $request)
    {

        $id = $request->id_procedure;
        $id_dossier = $request->id_dossier;








        $traitement               = new Traitement();
        $traitement->ID_DOSSIER   = $id_dossier;
        $traitement->ID_PROCEDURE = $id;
        $traitement->DATE_MISE    = date('Y-m-d');
        $traitement->save();






        $procedure   = Suivi::where('ID_PROCEDURE', $id)->get();


        $i = 0;
        foreach ($procedure as $row) {


            $etape = Etape::where('ID_ETAPE', $row->ID_ETAPE)
                ->orderby('ID_ETAPE', 'asc')
                ->get();


            $data[$i]["etape"] = $etape[0]->NOM_ETAPE;




            $i++;
        }


        echo json_encode($data);
    }



    public function requete(Request $request)
    {



        $gestion    = $request->gestionRequete;
        $reference  = $request->referenceRequete;
        $tribunal   = $request->tribunalRequete;
        $depot      = $request->depotRequete;
        $juge       = $request->jugeRequete;
        $retrait    = $request->retraitRequete;
        $url        = $request->file('urlRequete');
        $jugement   = $request->jugementRequete;
        $observation = $request->observationRequete;
        $id_procedure = $request->id_procedureRequete;
        $id_dossier = $request->id_dossierRequete;
        $etat       = $request->etatRequete;







        $id    = Requete::orderBy('ID_REQUETE', 'desc')->first();
        if ($id == null) {
            $ids  = 1;
        } else {
            $ids    = $id->ID_REQUETE + 1;
        }




        $requete                    = new Requete();
        $requete->ID_REQUETE        = $ids;
        $requete->ID_PROCEDURE      = $id_procedure;
        $requete->ID_DOSSIER        = $id_dossier;
        $requete->CIN               = $gestion;
        $requete->ID_TRIBUNAL       = $tribunal;
        $requete->REFERANCE_TRIBUNALE = $reference;
        $requete->OBSERVATION       = $observation;
        $requete->DATE_DEPOT        = $depot;
        $requete->DATE_RETRAIT      = $retrait;
        $requete->JUGE              = $juge;
        if ($url) {
            $requete->URL_SCAN          = $url->store('public/requete');
        }

        $requete->DATE_JUGEMENT     = $jugement;
        $requete->ETAT_REQUETE     = $etat;

        $requete->save();
    }




    public function procedureRequete(Request $request)
    {

        $id_dossier = $request->id_dossier;
        $id_procedure = $request->id_procedure;



        $requete   = Requete::where('ID_DOSSIER', $id_dossier)
            ->where('ID_PROCEDURE', $id_procedure)
            ->get();


        echo json_encode($requete);
    }



    public function audiance(Request $request)
    {



        $gestion    = $request->gestionAudiance;
        $tribunal   = $request->tribunalAudiance;
        $etat       = $request->etatAudiance;
        $juge       = $request->jugeAudiance;
        $creation   = $request->creationAudiance;
        $date_audiance = $request->dateAudiance;
        $url        = $request->file('urlAudiance');
        $salle      = $request->salleAudiance;
        $observation = $request->observationAudiance;
        $id_procedure = $request->id_procedureAudiance;
        $id_dossier = $request->id_dossierAudiance;








        $id    = Audiance::orderBy('ID_AUDIANCE', 'desc')->first();
        if ($id == null) {
            $ids  = 1;
        } else {
            $ids    = $id->ID_AUDIANCE + 1;
        }




        $requete                    = new Audiance();
        $requete->ID_Audiance       = $ids;
        $requete->ID_PROCEDURE      = $id_procedure;
        $requete->ID_DOSSIER        = $id_dossier;
        $requete->CIN               = $gestion;
        $requete->ID_TRIBUNAL       = $tribunal;
        $requete->OBSERVATION_AUD   = $observation;
        $requete->DATE_CREATION     = $creation;
        $requete->DATE_AUDIANCE     = $date_audiance;
        $requete->SALLE             = $salle;
        if ($url) {
            $requete->URL_AUD           = $url->store('public/audiance');
        }

        $requete->JUGE_AUD          = $juge;
        $requete->ETAT_AUD          = $etat;

        $requete->save();
    }




    public function procedureAudiance(Request $request)
    {

        $id_dossier = $request->id_dossier;
        $id_procedure = $request->id_procedure;



        $audiance   = Audiance::where('ID_DOSSIER', $id_dossier)
            ->where('ID_PROCEDURE', $id_procedure)
            ->get();


        echo json_encode($audiance);
    }





    public function jugement(Request $request)
    {



        $gestion    = $request->gestionJugement;
        $tribunal   = $request->tribunalJugement;
        $etat       = $request->etatJugement;
        $juge       = $request->jugeJugement;
        $sort       = $request->sortJugement;
        $date_jugement = $request->dateJugement;
        $url        = $request->file('urlJugement');
        $reference  = $request->referenceJugement;
        $observation = $request->observationJugement;
        $id_procedure = $request->id_procedureJugement;
        $id_dossier = $request->id_dossierJugement;








        $id    = Jugement::orderBy('ID_JUGEMENT', 'desc')->first();
        if ($id == null) {
            $ids  = 1;
        } else {
            $ids    = $id->ID_JUGEMENT + 1;
        }




        $requete                    = new Jugement();
        $requete->ID_JUGEMENT       = $ids;
        $requete->ID_PROCEDURE      = $id_procedure;
        $requete->ID_DOSSIER        = $id_dossier;
        $requete->CIN               = $gestion;
        $requete->ID_TRIBUNAL       = $tribunal;
        $requete->OBSERVATION       = $observation;
        $requete->DATE_JUGEMENT     = $date_jugement;
        $requete->SORT              = $sort;
        $requete->REF_TRIBU         = $reference;
        if ($url) {
            $requete->URL_JUGEMENT      = $url->store('public/jugement');
        }

        $requete->JUGE              = $juge;
        $requete->ETAT_JUGEMENT     = $etat;

        $requete->save();
    }




    public function procedureJugement(Request $request)
    {

        $id_dossier = $request->id_dossier;
        $id_procedure = $request->id_procedure;



        $jugement   = Jugement::where('ID_DOSSIER', $id_dossier)
            ->where('ID_PROCEDURE', $id_procedure)
            ->get();


        echo json_encode($jugement);
    }








    public function notification(Request $request)
    {



        $gestion    = $request->gestionNotification;
        $huissier   = $request->huissierNotification;
        $etat       = $request->etatNotification;
        $numero       = $request->numeroNotification;
        $sort       = $request->sortNotification;
        $date_sort  = $request->dateNotification;
        $url        = $request->file('urlNotification');
        $envoie     = $request->envoieNotification;
        $observation = $request->observationNotification;
        $id_procedure = $request->id_procedureNotification;
        $id_dossier = $request->id_dossierNotification;








        $id    = Notification::orderBy('ID_NOTIFICATION', 'desc')->first();
        if ($id == null) {
            $ids  = 1;
        } else {
            $ids    = $id->ID_NOTIFICATION + 1;
        }




        $requete                    = new Notification();
        $requete->ID_NOTIFICATION   = $ids;
        $requete->ID_PROCEDURE      = $id_procedure;
        $requete->ID_DOSSIER        = $id_dossier;
        $requete->CIN               = $gestion;
        $requete->ID_HUISSIER       = $huissier;
        $requete->OBSERVATION       = $observation;
        $requete->DATE_SORT         = $date_sort;
        $requete->SORT              = $sort;
        $requete->NUM_NOTIFICATION  = $numero;
        if ($url) {
            $requete->PV_SORT           = $url->store('public/notification');
        }

        $requete->DATE_ENVOI_NOT    = $envoie;
        $requete->ETAT_NOTIF        = $etat;

        $requete->save();
    }




    public function procedureNotification(Request $request)
    {

        $id_dossier = $request->id_dossier;
        $id_procedure = $request->id_procedure;



        $notification   = Notification::where('ID_DOSSIER', $id_dossier)
            ->where('ID_PROCEDURE', $id_procedure)
            ->get();


        echo json_encode($notification);
    }






    public function cna(Request $request)
    {



        $gestion    = $request->gestionCNA;
        $reference  = $request->referenceCNA;
        $numero     = $request->numeroCNA;
        $tribunal   = $request->tribunalCNA;
        $demande    = $request->demandeCNA;
        $url        = $request->file('urlCNA');
        $retrait     = $request->retraitCNA;
        $observation = $request->observationCNA;
        $id_procedure = $request->id_procedureCNA;
        $id_dossier = $request->id_dossierCNA;








        $id    = Cna::orderBy('ID_CNA', 'desc')->first();
        if ($id == null) {
            $ids  = 1;
        } else {
            $ids    = $id->ID_CNA + 1;
        }




        $requete                    = new Cna();
        $requete->ID_CNA            = $ids;
        $requete->ID_PROCEDURE      = $id_procedure;
        $requete->ID_DOSSIER        = $id_dossier;
        $requete->CIN               = $gestion;
        $requete->ID_TRIBUNAL       = $tribunal;
        $requete->OBS_CNA           = $observation;
        $requete->DATE_DEM_CNA      = $demande;
        $requete->DATE_DEM_CNA      = $retrait;
        $requete->N_NOTIFICATION    = $numero;

        if ($url) {
            $requete->URL_CNA           = $url->store('public/cna');
        }

        $requete->REF_CNA           = $reference;

        $requete->save();
    }




    public function procedureCNA(Request $request)
    {

        $id_dossier = $request->id_dossier;
        $id_procedure = $request->id_procedure;



        $cna   = Cna::where('ID_DOSSIER', $id_dossier)
            ->where('ID_PROCEDURE', $id_procedure)
            ->get();


        echo json_encode($cna);
    }







    public function execution(Request $request)
    {



        $gestion    = $request->gestionExecution;
        $huissier   = $request->huissierExecution;
        $etat       = $request->etatExecution;
        $reference  = $request->referenceExecution;
        $sort       = $request->sortExecution;
        $date       = $request->dateExecution;
        $url        = $request->file('urlExecution');
        $envoie     = $request->envoieExecution;
        $observation = $request->observationExecution;
        $id_procedure = $request->id_procedureExecution;
        $id_dossier = $request->id_dossierExecution;








        $id    = Execution::orderBy('ID_EXECUTION', 'desc')->first();
        if ($id == null) {
            $ids  = 1;
        } else {
            $ids    = $id->ID_EXECUTION + 1;
        }




        $requete                    = new Execution();
        $requete->ID_EXECUTION      = $ids;
        $requete->ID_PROCEDURE      = $id_procedure;
        $requete->ID_DOSSIER        = $id_dossier;
        $requete->CIN               = $gestion;
        $requete->ID_HUISSIER       = $huissier;
        $requete->OBSERVATION       = $observation;
        $requete->DATE_EXECUTION    = $date;
        $requete->SORT              = $sort;
        $requete->REF_EXECUTION     = $reference;

        if ($url) {
            $requete->PV                = $url->store('public/execution');
        }

        $requete->DATE_ENVOI        = $envoie;
        $requete->ETAT_EXEC         = $etat;

        $requete->save();
    }



    public function procedureExecution(Request $request)
    {

        $id_dossier = $request->id_dossier;
        $id_procedure = $request->id_procedure;



        $execution   = Execution::where('ID_DOSSIER', $id_dossier)
            ->where('ID_PROCEDURE', $id_procedure)
            ->get();


        echo json_encode($execution);
    }



    public function plainte(Request $request)
    {



        $gestion    = $request->gestionPLAINTE;
        $tribunal   = $request->tribunalPLAINTE;
        $etat       = $request->etatPLAINTE;
        $reference  = $request->referencePLAINTE;
        $sort       = $request->sortPLAINTE;
        $type       = $request->typePLAINTE;
        $procureure = $request->procureurePLAINTE;
        $arr_date       = $request->arrPLAINTE;
        $url        = $request->file('urlPLAINTE');
        $envoie     = $request->envoiePLAINTE;
        $depot      = $request->depotPLAINTE;
        $id_procedure = $request->id_procedurePLAINTE;
        $id_dossier = $request->id_dossierPLAINTE;








        $id    = Plainte::orderBy('ID_PLAINTE', 'desc')->first();
        if ($id == null) {
            $ids  = 1;
        } else {
            $ids    = $id->ID_PLAINTE + 1;
        }




        $requete                    = new Plainte();
        $requete->ID_PLAINTE        = $ids;
        $requete->ID_PROCEDURE      = $id_procedure;
        $requete->ID_DOSSIER        = $id_dossier;
        $requete->CIN               = $gestion;
        $requete->ID_TRIBUNAL       = $tribunal;
        $requete->PROCUREURE        = $procureure;
        $requete->DATE_DEPOT        = $depot;
        $requete->DATE_ENVOI_P      = $envoie;
        $requete->ARRENDISSEMENT_POLICE      = $arr_date;
        $requete->SORT_PLAINTE      = $sort;
        $requete->TYPE_PLAINTE       = $type;
        $requete->REF_PLAINTE       = $reference;

        if ($url) {
            $requete->URL_PLAINT        = $url->store('public/plainte');
        }

        $requete->ETAT_PLAINTE      = $etat;

        $requete->save();
    }





    public function procedurePLAINTE(Request $request)
    {

        $id_dossier = $request->id_dossier;
        $id_procedure = $request->id_procedure;



        $plainte   = Plainte::where('ID_DOSSIER', $id_dossier)
            ->where('ID_PROCEDURE', $id_procedure)
            ->get();


        echo json_encode($plainte);
    }
}
