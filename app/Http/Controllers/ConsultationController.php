<?php

namespace App\Http\Controllers;

use App\Models\Adversaire;
use App\Models\Audiance;
use App\Models\Clients;
use App\Models\Cna;
use App\Models\Currateur;
use App\Models\Dossier;
use App\Models\Execution;
use App\Models\Huissier;
use App\Models\Jugement;
use App\Models\Notification;
use App\Models\Plainte;
use App\Models\Procedure;
use App\Models\Requete;
use App\Models\Tribunal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class ConsultationController extends Controller
{

    public function index()
    {
        $dossier = Dossier::count();
        $clients = Clients::count();
        $adversaire  = Adversaire::count();
        $procedure = Procedure::orderBy('procedures.ID_PROCEDURE', 'ASC')->get();
        $tribunal = Tribunal::orderBy('ID_TRIBUNAL', 'ASC')->get();
        $tribunal1 = Tribunal::orderBy('ID_TRIBUNAL', 'ASC')->get();
        $tribunal2 = Tribunal::orderBy('ID_TRIBUNAL', 'ASC')->get();
        $tribunal3 = Tribunal::orderBy('ID_TRIBUNAL', 'ASC')->get();
        $tribunal4 = Tribunal::orderBy('ID_TRIBUNAL', 'ASC')->get();
        $huissier = Huissier::orderBy('ID_HUISSIER', 'ASC')->get();
        $huissier1 = Huissier::orderBy('ID_HUISSIER', 'ASC')->get();
        return view('consultation', compact('dossier', 'clients', 'adversaire', 'procedure', 'tribunal', 'tribunal1', 'tribunal2', 'huissier', 'tribunal3', 'tribunal4', 'huissier1'));
    }





    public function etapes(Request $request)
    {
        $etape = $request->id_etape;
        $procedure = $request->procedure;
        if ($etape == 1) {
            $requete = Requete::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'requete.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'requete.ID_DOSSIER')
                ->where('requete.ID_PROCEDURE', $procedure)
                ->where('requete.CIN', auth()->user()->CIN)
                ->get();
            echo json_encode($requete);
        }
        if ($etape == 2) {
            $requete = Audiance::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'audiance.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'audiance.ID_DOSSIER')
                ->where('audiance.ID_PROCEDURE', $procedure)
                ->where('audiance.CIN', auth()->user()->CIN)
                ->get();
            echo json_encode($requete);
        }
        if ($etape == 3) {
            $requete = Jugement::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'jugement.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'jugement.ID_DOSSIER')
                ->where('jugement.ID_PROCEDURE', $procedure)
                ->where('jugement.CIN', auth()->user()->CIN)
                ->get();
            echo json_encode($requete);
        }
        if ($etape == 4) {
            $requete = Notification::join('huissier', 'huissier.ID_HUISSIER', '=', 'notification.ID_HUISSIER')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'notification.ID_DOSSIER')
                ->where('notification.ID_PROCEDURE', $procedure)
                ->where('notification.CIN', auth()->user()->CIN)
                ->get();
            echo json_encode($requete);
        }
        if ($etape == 11) {
            $requete = Plainte::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'plainte.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'plainte.ID_DOSSIER')
                ->where('plainte.ID_PROCEDURE', $procedure)
                ->where('plainte.CIN', auth()->user()->CIN)
                ->get();
            echo json_encode($requete);
        }
        if ($etape == 5) {
            $requete = Cna::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'cna.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'cna.ID_DOSSIER')
                ->where('cna.ID_PROCEDURE', $procedure)
                ->where('cna.CIN', auth()->user()->CIN)
                ->get();
            echo json_encode($requete);
        }
        if ($etape == 7) {
            $requete = Execution::join('huissier', 'huissier.ID_HUISSIER', '=', 'execution.ID_HUISSIER')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'execution.ID_DOSSIER')
                ->where('execution.ID_PROCEDURE', $procedure)
                ->where('execution.CIN', auth()->user()->CIN)
                ->get();
            echo json_encode($requete);
        }
        if ($etape == 6) {
            $requete = Currateur::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'currateur.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'currateur.ID_DOSSIER')
                ->where('currateur.ID_PROCEDURE', $procedure)
                ->where('currateur.CIN', auth()->user()->CIN)
                ->get();
            echo json_encode($requete);
        }
    }


    public function update(Request $request)
    {
        if ($request->id_etape == 1) {
            $tableau = array();
            $url = $request->file('fichier_requete');
            $requetes = Requete::where('ID_REQUETE', $request->id_requete)
                ->where('CIN', auth()->user()->CIN)
                ->first();
            $requetes->ID_TRIBUNAL        = $request->id_tribunal;
            $requetes->REFERANCE_TRIBUNALE = $request->reference_tribunal;
            $requetes->DATE_DEPOT         = $request->date_depot;
            $requetes->DATE_RETRAIT       = $request->date_retrait;
            $requetes->JUGE               = $request->juge;
            $requetes->DATE_JUGEMENT      = $request->date_jugement;
            $requetes->ETAT_REQUETE       = $request->etat_requete;
            if ($url) {
                $requetes->URL_SCAN           = $url->store('public/requete');
            }
            $requetes->save();
            $data[0]["id_etape"] = $request->id_etape;
            $data[0]["nom_etape"] = $request->nom_etape;
            $data[0]["id_procedure"] = $request->id_procedure;
            $data[0]["nom_procedure"] = $request->nom_procedure;
            array_push($tableau, $data);
            $requete = Requete::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'requete.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'requete.ID_DOSSIER')
                ->where('requete.ID_PROCEDURE', $requetes->ID_PROCEDURE)
                ->where('requete.CIN', auth()->user()->CIN)
                ->get();
            array_push($tableau, $requete);
            echo json_encode($tableau);
        } else if ($request->id_etape == 2) {
            $tableau = array();
            $url = $request->file('fichier_audiance');
            $requetes = Audiance::where('ID_AUDIANCE', $request->id_audiance)
                ->where('CIN', auth()->user()->CIN)
                ->first();
            $requetes->ID_TRIBUNAL        = $request->id_tribunal;
            $requetes->JUGE_AUD           = $request->juge_audiance;
            $requetes->DATE_CREATION      = $request->date_creation;
            $requetes->DATE_AUDIANCE      = $request->date_audiance;
            $requetes->SALLE              = $request->salle;
            $requetes->ETAT_AUD           = $request->etat_audiance;
            if ($url) {
                $requetes->URL_AUD          = $url->store('public/audiance');
            }
            $requetes->save();
            $data[0]["id_etape"] = $request->id_etape;
            $data[0]["nom_etape"] = $request->nom_etape;
            $data[0]["id_procedure"] = $request->id_procedure;
            $data[0]["nom_procedure"] = $request->nom_procedure;
            array_push($tableau, $data);
            $requete = Audiance::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'audiance.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'audiance.ID_DOSSIER')
                ->where('audiance.ID_PROCEDURE', $request->id_procedure)
                ->where('audiance.CIN', auth()->user()->CIN)
                ->get();
            array_push($tableau, $requete);
            echo json_encode($tableau);
        } else if ($request->id_etape == 3) {
            $tableau = array();
            $url = $request->file('fichier_jugement');
            $requetes = Jugement::where('ID_JUGEMENT', $request->id_jugement)
                ->where('CIN', auth()->user()->CIN)
                ->first();
            $requetes->ID_TRIBUNAL        = $request->id_tribunal;
            $requetes->JUGE               = $request->juge;
            $requetes->DATE_JUGEMENT      = $request->date_jugement;
            $requetes->REF_TRIBU          = $request->reference_tribunal;
            $requetes->SORT               = $request->sort_jugement;
            $requetes->ETAT_JUGEMENT      = $request->etat_jugement;
            if ($url) {
                $requetes->URL_JUGEMENT          = $url->store('public/jugement');
            }
            $requetes->save();
            $data[0]["id_etape"] = $request->id_etape;
            $data[0]["nom_etape"] = $request->nom_etape;
            $data[0]["id_procedure"] = $request->id_procedure;
            $data[0]["nom_procedure"] = $request->nom_procedure;
            array_push($tableau, $data);

            $requete = Jugement::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'jugement.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'jugement.ID_DOSSIER')
                ->where('jugement.ID_PROCEDURE', $request->id_procedure)
                ->where('jugement.CIN', auth()->user()->CIN)
                ->get();
            array_push($tableau, $requete);
            echo json_encode($tableau);
        } else if ($request->id_etape == 4) {
            $tableau = array();
            $url = $request->file('fichier_notification');
            $requetes = Notification::where('ID_NOTIFICATION', $request->id_notification)
                ->where('CIN', auth()->user()->CIN)
                ->first();
            $requetes->ID_HUISSIER       = $request->id_huissier;
            $requetes->NUM_NOTIFICATION  = $request->numero_notification;
            $requetes->DATE_ENVOI_NOT   = $request->date_envoie;
            $requetes->DATE_SORT         = $request->date_sort;
            $requetes->SORT               = $request->sort_notification;
            $requetes->ETAT_NOTIF      = $request->etat_notification;
            if ($url) {
                $requetes->PV_SORT          = $url->store('public/notification');
            }
            $requetes->save();
            $data[0]["id_etape"] = $request->id_etape;
            $data[0]["nom_etape"] = $request->nom_etape;
            $data[0]["id_procedure"] = $request->id_procedure;
            $data[0]["nom_procedure"] = $request->nom_procedure;
            array_push($tableau, $data);
            $requete = Notification::join('huissier', 'huissier.ID_HUISSIER', '=', 'notification.ID_HUISSIER')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'notification.ID_DOSSIER')
                ->where('notification.ID_PROCEDURE', $request->id_procedure)
                ->where('notification.CIN', auth()->user()->CIN)
                ->get();
            array_push($tableau, $requete);
            echo json_encode($tableau);
        } else if ($request->id_etape == 5) {
            $tableau = array();
            $url = $request->file('fichier_cna');
            $requetes = Cna::where('ID_CNA', $request->id_cna)
                ->where('CIN', auth()->user()->CIN)
                ->first();
            $requetes->ID_TRIBUNAL        = $request->id_tribunal;
            $requetes->DATE_DEM_CNA       = $request->date_demande;
            $requetes->DATE_RET_CNA       = $request->date_retrait;
            $requetes->N_NOTIFICATION     = $request->numero_notification;
            $requetes->REF_CNA            = $request->reference_cna;
            if ($url) {
                $requetes->URL_CNA          = $url->store('public/cna');
            }
            $requetes->save();
            $data[0]["id_etape"] = $request->id_etape;
            $data[0]["nom_etape"] = $request->nom_etape;
            $data[0]["id_procedure"] = $request->id_procedure;
            $data[0]["nom_procedure"] = $request->nom_procedure;
            array_push($tableau, $data);
            $requete = Cna::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'cna.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'cna.ID_DOSSIER')
                ->where('cna.ID_PROCEDURE', $request->id_procedure)
                ->where('cna.CIN', auth()->user()->CIN)
                ->get();
            array_push($tableau, $requete);
            echo json_encode($tableau);
        } else if ($request->id_etape == 7) {
            $tableau = array();
            $url = $request->file('fichier_execution');
            $requetes = Execution::where('ID_EXECUTION', $request->id_execution)
                ->where('CIN', auth()->user()->CIN)
                ->first();
            $requetes->ID_HUISSIER       = $request->id_huissier;
            $requetes->REF_EXECUTION     = $request->reference_execution;
            $requetes->DATE_ENVOI        = $request->date_envoie;
            $requetes->DATE_EXECUTION    = $request->date_execution;
            $requetes->SORT               = $request->sort_execution;
            $requetes->ETAT_EXEC          = $request->etat_execution;
            if ($url) {
                $requetes->PV          = $url->store('public/execution');
            }
            $requetes->save();
            $data[0]["id_etape"] = $request->id_etape;
            $data[0]["nom_etape"] = $request->nom_etape;
            $data[0]["id_procedure"] = $request->id_procedure;
            $data[0]["nom_procedure"] = $request->nom_procedure;
            array_push($tableau, $data);
            $requete = Execution::join('huissier', 'huissier.ID_HUISSIER', '=', 'execution.ID_HUISSIER')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'execution.ID_DOSSIER')
                ->where('execution.ID_PROCEDURE', $request->id_procedure)
                ->where('execution.CIN', auth()->user()->CIN)
                ->get();
            array_push($tableau, $requete);
            echo json_encode($tableau);
        } else if ($request->id_etape == 11) {
            $tableau = array();
            $url = $request->file('fichier_plainte');
            $requetes = Plainte::where('ID_PLAINTE', $request->id_plainte)
                ->where('CIN', auth()->user()->CIN)
                ->first();
            $requetes->ID_TRIBUNAL       = $request->id_tribunal;
            $requetes->PROCUREURE        = $request->procureure;
            $requetes->DATE_DEPOT        = $request->date_depot;
            $requetes->DATE_ENVOI_P      = $request->date_envoie;
            $requetes->ARRENDISSEMENT_POLICE      = $request->arrendissement_police;
            $requetes->SORT_PLAINTE      = $request->sort_plainte;
            $requetes->TYPE_PLAINTE       = $request->type_plainte;
            $requetes->ETAT_PLAINTE       = $request->etat_plainte;
            $requetes->REF_PLAINTE       = $request->reference_plainte;
            if ($url) {
                $requetes->URL_PLAINTE          = $url->store('public/plainte');
            }
            $requetes->save();
            $data[0]["id_etape"] = $request->id_etape;
            $data[0]["nom_etape"] = $request->nom_etape;
            $data[0]["id_procedure"] = $request->id_procedure;
            $data[0]["nom_procedure"] = $request->nom_procedure;
            array_push($tableau, $data);
            $requete = Plainte::join('tribunal', 'tribunal.ID_TRIBUNAL', '=', 'plainte.ID_TRIBUNAL')
                ->join('dossier', 'dossier.ID_DOSSIER', '=', 'plainte.ID_DOSSIER')
                ->where('plainte.ID_PROCEDURE', $request->id_procedure)
                ->where('plainte.CIN', auth()->user()->CIN)
                ->get();
            array_push($tableau, $requete);
            echo json_encode($tableau);
        }
    }
}
