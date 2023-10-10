<?php

use App\Http\Controllers\AdversaireController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\CurrateurController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\HuissierController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MajdossierController;
use App\Http\Controllers\TribunalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/connexion', [LoginController::class, 'connexion']);
Route::get('/logout',   [LogoutController::class, "index"]);


Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard')->middleware("auth");
Route::get('/', [IndexController::class, 'index'])->name('home')->middleware("auth");

//Users


Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::post('/users/modifier', [UserController::class, 'modifier']);
Route::post('/users/nouveau', [UserController::class, 'nouveau']);



//Huissier


Route::get('/huissier', [HuissierController::class, 'index']);
Route::post('/huissier/modifier', [HuissierController::class, 'modifier']);
Route::post('/huissier/nouveau', [HuissierController::class, 'nouveau']);

//Consultations

Route::get('/consultations', [ConsultationController::class, 'index']);
Route::post('/consultations/etapes', [ConsultationController::class, 'etapes']);
Route::post('/consultations/update', [ConsultationController::class, 'update']);





//Dossier/ajouter

Route::get('/dossier/ajouter', [DossierController::class, 'index'])->middleware('auth');
Route::post(
    '/dossier/ajouter/nouveau',
    [DossierController::class, 'nouveau']
)->middleware('auth');


//Dossier/maj

Route::get('/dossier/search', [MajdossierController::class, 'index'])->middleware('auth');
Route::post('/dossier/search/rechercher', [MajdossierController::class, 'rechercher']);
Route::post('/dossier/search/modifier', [MajdossierController::class, 'modifier']);
Route::post('/dossier/search/enregistrer', [MajdossierController::class, 'enregistrer']);
Route::match(["GET", "POST", "HEAD"], '/dossier/search/procedure', [MajdossierController::class, 'procedure']);
Route::post('/dossier/search/procedures', [MajdossierController::class, 'procedures']);
Route::post('/dossier/search/dossierprocedure', [MajdossierController::class, 'dossierprocedure']);
//filter by date
Route::post('/dossier/search/date', [MajdossierController::class, "date_filter"]);


Route::post('/dossier/search/requete', [MajdossierController::class, 'requete']);
Route::post('/dossier/search/audiance', [MajdossierController::class, "audiance"]);
Route::post('/dossier/search/jugement', [MajdossierController::class, 'jugement']);
Route::post('/dossier/search/notification', [MajdossierController::class, 'notification']);
Route::post('/dossier/search/cna', [MajdossierController::class, 'cna']);
Route::post('/dossier/search/execution', [MajdossierController::class, 'execution']);
Route::post('/dossier/search/plainte', [MajdossierController::class, 'plainte']);
Route::post('/dossier/search/curateur', [MajdossierController::class, 'curateur']);

Route::post('/dossier/search/procedureRequete', [MajdossierController::class, 'procedureRequete']);
Route::post('/dossier/search/procedureAudiance', [MajdossierController::class, 'procedureAudiance']);
Route::post('/dossier/search/procedureJugement', [MajdossierController::class, 'procedureJugement']);
Route::post('/dossier/search/procedureNotification', [MajdossierController::class, 'procedureNotification']);
Route::post('/dossier/search/procedureCNA', [MajdossierController::class, 'procedureCNA']);
Route::post('/dossier/search/procedureExecution', [MajdossierController::class, 'procedureExecution']);
Route::post('/dossier/search/procedurePlainte', [MajdossierController::class, 'procedurePlainte']);
Route::post('/dossier/search/procedureCurateur', [MajdossierController::class, 'procedureCurateur']);






//Clients/ajouter

Route::get('/client', [ClientsController::class, "index"]);
Route::post('/client/nouveau', [ClientsController::class, "nouveau"]);
Route::post('/client/modifier', [ClientsController::class, "modifier"]);


//Adersaire/ajouter

Route::get('/adversaire', [AdversaireController::class, 'index']);
Route::post('/adversaire/nouveau', [AdversaireController::class, 'nouveau']);
Route::post('/adversaire/modifier', [AdversaireController::class, 'modifier']);
Route::post('/adversaire/caution', [AdversaireController::class, 'caution']);


//Tribunal
Route::get('/tribunal', [TribunalController::class, "index"])->name('tribunal');
Route::post('/tribunal/nouveau', [TribunalController::class, "nouveau"]);
Route::post('/tribunal/modifier', [TribunalController::class, "modifier"]);


//Expert
Route::get('/expert', [ExpertController::class, 'index'])->name('expert');
Route::post('/expert/nouveau', [ExpertController::class, "nouveau"]);
Route::post('/expert/modifier', [ExpertController::class, "modifier"]);


//currateur
Route::get('/currateur',[CurrateurController::class, 'index'])->name('currateur');
Route::post('/currateur/nouveau', [CurrateurController::class, "nouveau"]);
Route::post('/currateur/modifier', [CurrateurController::class, "modifier"]);