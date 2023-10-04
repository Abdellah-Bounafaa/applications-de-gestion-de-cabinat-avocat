<?php

use App\Http\Controllers\AdversaireController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\HuissierController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MajdossierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/connexion', [LoginController::class, 'connexion']);
Route::get('/logout',   [LogoutController::class, "index"]);


Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard')->middleware("auth");

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
Route::post('/dossier/search/procedure', [MajdossierController::class, 'procedure']);
Route::post('/dossier/search/procedures', [MajdossierController::class, 'procedures']);
Route::post('/dossier/search/dossierprocedure', [MajdossierController::class, 'dossierprocedure']);



Route::post('/dossier/search/requete', [MajdossierController::class, 'requete']);
Route::post('/dossier/search/audiance', [MajdossierController::class, "audiance"]);
Route::post('/dossier/search/jugement', [MajAdversaireController::class, 'jugement']);
Route::post('/dossier/search/notification', [MajdossierController::class, 'notification']);
Route::post('/dossier/search/cna', [MaAdversaireController::class, 'cna']);
Route::post('/dossier/search/execution', [MaAdversaireController::class, 'execution']);
Route::post('/dossier/search/plainte', [MajdossierController::class, 'plainte']);
Route::post('/dossier/search/curateur', [MajAdversaireController::class, 'curateur']);

Route::post('/dossier/search/procedureRequete', [MajdossierController::class, 'procedureRequete']);
Route::post('/dossier/search/procedureAudiance', [MaAdversaireController::class, 'procedureAudiance']);
Route::post('/dossier/search/procedureJugement', [MajAdversaireController::class, 'procedureJugement']);
Route::post('/dossier/search/procedureNotification', [MaAdversaireController::class, 'procedureNotification']);
Route::post('/dossier/search/procedureCNA', [MajdossierController::class, 'procedureCNA']);
Route::post('/dossier/search/procedureExecution', [MajdossierController::class, 'procedureExecution']);
Route::post('/dossier/search/procedurePlainte', [MajAdversaireController::class, 'procedurePlainte']);
Route::post('/dossier/search/procedureCurateur', [MajdossierController::class, 'procedureCurateur']);






//Clients/ajouter

Route::get('/client', [ClientsController::class, "index"]);
Route::post('/client/nouveau', [ClientController::class, "nouveau"]);
Route::post('/client/modifier', [ClientsController::class, "modifier"]);


//Adersaire/ajouter

Route::get('/adversaire', [AdversaireController::class, 'index']);
Route::post('/adversaire/nouveau', [AdversaireController::class, 'nouveau']);
Route::post('/adversaire/modifier', [AdversaireController::class, 'modifier']);
Route::post('/adversaire/caution', [AdversaireController::class, 'caution']);
