 <div class="modal fade" id="Requete" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content p-2">

             <form id="requete_form" method="post" action="#" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-header d-flex justify-content-between">
                     <div>
                         <h4>Dossier N° <strong id="number_dossierRequete"></strong>
                         </h4>
                         <h6 class="text-left">Créance : <strong id="prix_Requete"></strong> DH</h6>
                     </div>

                     <button type="button" data-dismiss="modal" class="btn btn-secondary">X</button>
                 </div>
                 <div class="modal-body">

                     <div class="row">
                         <input type="hidden" class="form-control" id="id_Requete" name="id_Requete">
                         <input type="hidden" class="form-control" id="id_procedureRequete" name="id_procedureRequete">
                         <input type="hidden" class="form-control" id="id_dossierRequete" name="id_dossierRequete">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="col-form-label col-form-label-sm"> Gestionnaire : </label>
                                 <select class="form-control" name="gestionRequete" id="gestionRequete">
                                     @foreach ($userr as $use)
                                         <option value="{{ $use->CIN }}">{{ $use->PRENOM }} {{ $use->NOM }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">

                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Référence De
                                     Tribunal
                                     : </label><input type="text" class="form-control"
                                     placeholder=" Référence De Tribunal" name="referenceRequete"
                                     id="referenceRequete" />
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal :
                                 </label><select class="form-control" name="tribunalRequete" id="tribunalRequete">
                                     @foreach ($tribunal as $nom)
                                         <option value="{{ $nom->ID_TRIBUNAL }}">{{ $nom->NOM_TRIBUNAL }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Dépôt :
                                 </label><input type="date" class="form-control" name="depotRequete"
                                     id="depotRequete" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Juge :
                                 </label><input type="text" placeholder="Juge" class="form-control" id="jugeRequete"
                                     name="jugeRequete" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Salle :
                                 </label><input type="text" class="form-control" name="salle"
                                     placeholder="Salle D'audiance" id="salle" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Retrait :
                                 </label><input type="date" class="form-control" name="retraitRequete"
                                     id="retraitRequete" /></div>
                         </div>
                         <div class="col-md-4" id="showSortRequete">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Sort :
                                 </label>
                                 <select name="sortRequete" class="form-control" id="">
                                     <option value="" selected> Choisir...</option>
                                     <option value="1"> Oui</option>
                                     <option value="2"> Non</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Fichier :
                                 </label><input type="file" class="form-control form-control-primary"
                                     name="urlRequete" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date D'audiance :
                                 </label><input type="date" class="form-control" name="date_audiance" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Heure D'audiance
                                     :
                                 </label><input type="time" class="form-control" name="heure_audiance" /></div>
                         </div>
                         <div class="col-md-4" id="showDateJugement">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Jugement
                                     :
                                 </label><input type="date" class="form-control" name="jugementRequete" /></div>
                         </div>
                         <div class="col-md-4" id="showEtatRequete">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Etat De Requete :
                                 </label><select class="form-control form-control-success" name="etatRequete"
                                     id="etatRequete">
                                     <option selected disabled>Choisir..</option>
                                     <option value="0">En cours</option>
                                     <option value="1">Fermé</option>
                                 </select></div>
                         </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
                                 <textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationRequete"
                                     id="observationRequete"></textarea>
                             </div>
                         </div>
                     </div>
                     <div class="d-flex justify-content-center align-items-center p-2 mb-4">
                         <button type="submit" class="btn btn-primary mr-2">Save changes</button>
                         <a class="btn btn-secondary text-white"
                             onclick="toggleHistorique('Requete_dossier')">Afficher
                             L'historique</a>
                     </div>
                     <div class="row" style="display: none" id="Requete_dossier"></div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>

             </form>
         </div>
     </div>
 </div>










 <div class="modal fade" id="Audiance" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">

             <div class="modal-header d-flex justify-content-between">
                 <div>
                     <h4>Dossier N°<strong id="number_dossierAudiance"></strong>
                     </h4>
                     <h6>Créance : <strong id="prix_Audiance"></strong> DH</h6>
                 </div>
                 <button type="button" data-dismiss="modal" class="btn btn-secondary">X</button>
             </div>
             <div class="modal-body">
                 {{-- <div class="row"> --}}
                 <form id="audiance_form" method="post" action="#" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                         <input type="hidden" class="form-control" id="id_audiance" name="id_audiance">
                         <input type="hidden" class="form-control" id="id_dossierAudiance"
                             name="id_dossierAudiance">
                         <input type="hidden" class="form-control" id="id_procedureAudiance"
                             name="id_procedureAudiance">
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire
                                     :
                                 </label><select class="form-control" id="gestionAudiance" name="gestionAudiance">
                                     @foreach ($userr as $usee)
                                         <option value="{{ $usee->CIN }}">{{ $usee->PRENOM }}
                                             {{ $usee->NOM }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Juge
                                     D'audiance
                                     :
                                 </label><input type="text" class="form-control" id="juge_audiance"
                                     name="jugeAudiance" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Ref Tribunal
                                     :
                                 </label>
                                 <input type="text" name="ref_tribunal" id="ref_tribunal_aud"
                                     class="form-control" id="">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal :
                                 </label><select class="form-control" id="tribunalAudiance" name="tribunalAudiance">
                                     @foreach ($tribunal as $nomm)
                                         <option value="{{ $nomm->ID_TRIBUNAL }}">{{ $nomm->NOM_TRIBUNAL }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date
                                     D'audience :
                                 </label><input type="date" class="form-control" id="dateAudiance"
                                     name="dateAudiance" /></div>
                         </div>
                         {{-- <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Création
                                     :
                                 </label><input type="date" class="form-control" name="creationAudiance" /></div>
                         </div> --}}
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De
                                     Retrait :
                                 </label><input type="date" class="form-control" id="audianceRetrait"
                                     name="audianceRetrait" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Salle :
                                 </label><input type="text" placeholder="numero salle" class="form-control"
                                     name="salleAudiance" id="salleAudiance" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Fichier :
                                 </label><input type="file" class="form-control form-control-primary"
                                     name="urlAudiance" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Etat
                                     D'audiance :
                                 </label><select class="form-control form-control-success"
                                     id="etatAudiance"name="etatAudiance" onchange="toggleNewAudiance()">
                                     <option selected disabled>Choisir..</option>
                                     <option value="0">Jugement</option>
                                     <option value="1">Audiance</option>
                                     <option value="2">En Cours</option>
                                     <option value="3">Délibiration</option>
                                 </select></div>
                         </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <label class="col-form-label col-form-label-sm" for="observ">Observation :
                                 </label>
                                 <textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationAudiance"
                                     id="OBSERVATION_AUD"></textarea>
                             </div>
                         </div>

                     </div>


                     <input type="submit" value="Valider" class="btn btn-success">
                 </form>
                 {{-- nouvelle audiance en cas de modification --}}
                 <div id="new_audiance" class="p-2" style="display:none">
                     <h6>Nouvelle Audiance</h6>
                     <form id="new_audiance_form" method="post" action="#" enctype="multipart/form-data">
                         @csrf
                         <div class="row p-1">
                             <input type="hidden" class="form-control" name="id_dossierAudiance"><input
                                 type="hidden" class="form-control" name="id_procedureAudiance">
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">
                                         Gestionnaire
                                         :
                                     </label><select class="form-control" name="gestionAudiance">
                                         @foreach ($userr as $usee)
                                             <option value="{{ $usee->CIN }}">{{ $usee->PRENOM }}
                                                 {{ $usee->NOM }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">
                                         Juge
                                         D'audiance
                                         :
                                     </label><input type="text" class="form-control" name="jugeAudiance" />
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Ref
                                         Tribunal
                                         :
                                     </label>
                                     <input type="text" name="ref_tribunal" class="form-control" id="">
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal
                                         :
                                     </label><select class="form-control" name="tribunalAudiance">
                                         @foreach ($tribunal as $nomm)
                                             <option value="{{ $nomm->ID_TRIBUNAL }}">{{ $nomm->NOM_TRIBUNAL }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Date
                                         D'audience :
                                     </label><input type="date" class="form-control" name="dateAudiance" />
                                 </div>
                             </div>
                             {{-- <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Création
                                     :
                                 </label><input type="date" class="form-control" name="creationAudiance" /></div>
                         </div> --}}
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Date De
                                         Retrait :
                                     </label><input type="date" class="form-control" name="audianceRetrait" />
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Salle :
                                     </label><input type="text" placeholder="Numéro de salle" class="form-control"
                                         name="salleAudiance" /></div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Fichier :
                                     </label><input type="file" class="form-control form-control-primary"
                                         name="urlAudiance" /></div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Etat
                                         D'audiance :
                                     </label><select class="form-control form-control-success" name="etatAudiance">
                                         <option selected disabled>Choisir..</option>
                                         <option value="0">Jugement</option>
                                         {{-- <option value="1">Audiance</option> --}}
                                         <option value="2">En Cours</option>
                                         <option value="3">Délibiration</option>
                                     </select></div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="form-group">
                                     <label class="col-form-label col-form-label-sm" for="observ">Observation :
                                     </label>
                                     <textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationAudiance"></textarea>
                                 </div>
                             </div>
                         </div>
                         <input type="submit" class="btn btn-success" value="Ajouter">
                     </form>
                 </div>

                 {{-- nouveau jugement en cas de modification --}}

                 <div id="nouveau_jugement" style="display:none" class="p-2">
                     <h6>Nouveau Jugement</h6>
                     <form id="nouveau_jugement_form" method="post" action="#" enctype="multipart/form-data">
                         @csrf
                         <div class="row p-1">
                             <input type="hidden" class="form-control" name="id_dossierAudiance">
                             <input type="hidden" class="form-control" name="id_procedureAudiance">

                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire
                                         :
                                     </label><select class="form-control" name="gestionJugement">
                                         @foreach ($userr as $useee)
                                             <option value="{{ $useee->CIN }}">{{ $useee->PRENOM }}
                                                 {{ $useee->NOM }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">
                                         Réference_Tribunal : </label><input type="text" class="form-control"
                                         name="referenceJugement" /></div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal :
                                     </label><select class="form-control" name="tribunalJugement">
                                         @foreach ($tribunal as $nomm)
                                             <option value="{{ $nomm->ID_TRIBUNAL }}">{{ $nomm->NOM_TRIBUNAL }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Sort :
                                     </label>
                                     <select name="sortJugement" class="form-control" id="">
                                         <option value="" selected> Choisir...</option>
                                         <option value="1"> Favorable</option>
                                         <option value="2"> Défavorable</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Juge :
                                     </label><input type="text" class="form-control" name="jugeJugement" /></div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Date De
                                         Jugement
                                         :
                                     </label><input type="date" class="form-control" name="dateJugement" /></div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group"><label class="col-form-label col-form-label-sm">Fichier :
                                     </label><input type="file" class="form-control form-control-primary"
                                         name="urlJugement" /></div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="form-group">
                                     <label class="col-form-label col-form-label-sm" for="observ">Observation :
                                     </label>
                                     <textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationJugement"></textarea>
                                 </div>
                             </div>
                             <input type="submit" class="btn btn-success" value="Ajouter">
                         </div>

                     </form>
                 </div>




                 <div class="d-flex justify-content-center align-items-center p-2 mb-4">
                     <button class="btn btn-secondary text-white"
                         onclick="toggleHistorique('Audiance_dossier')">Afficher
                         L'historique</button>
                 </div>
                 <div class="row" style="display: none" id="Audiance_dossier"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
             {{-- </form> --}}
         </div>
     </div>
 </div>




 <div class="modal fade" id="Jugement" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <form id="jugement_form" method="post" action="#" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-header d-flex justify-content-between">
                     <div>
                         <h4>Dossier N° <strong id="number_dossierJugement"></strong>
                         </h4>
                         <h6>Créance : <strong id="prix_Jugement"></strong> DH</h6>
                     </div>

                     <button type="button" data-dismiss="modal" class="btn btn-secondary">X</button>

                 </div>
                 <div class="modal-body">


                     <div class="row">
                         <input type="hidden" class="form-control" name="id_dossierJugement"><input type="hidden"
                             class="form-control" name="id_procedureJugement">
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire :
                                 </label><select class="form-control" name="gestionJugement">
                                     @foreach ($userr as $useee)
                                         <option value="{{ $useee->CIN }}">{{ $useee->PRENOM }}
                                             {{ $useee->NOM }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">
                                     Réference_Tribunal : </label><input type="text" class="form-control"
                                     name="referenceJugement" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal :
                                 </label><select class="form-control" name="tribunalJugement">
                                     @foreach ($tribunal as $nomm)
                                         <option value="{{ $nomm->ID_TRIBUNAL }}">{{ $nomm->NOM_TRIBUNAL }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Sort :
                                 </label>
                                 <select name="sortJugement" class="form-control" id="">
                                     <option value="" selected> Choisir...</option>
                                     <option value="1"> Favorable</option>
                                     <option value="2"> Défavorable</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Juge :
                                 </label><input type="text" class="form-control" name="jugeJugement" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Jugement
                                     :
                                 </label><input type="date" class="form-control" name="dateJugement" /></div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Fichier :
                                 </label><input type="file" class="form-control form-control-primary"
                                     name="urlJugement" /></div>
                         </div>
                         {{-- <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Etat De Jugement
                                     :
                                 </label><select class="form-control form-control-success" name="etatJugement">
                                     <option selected disabled>Choisir..</option>
                                     <option value="0">En cours</option>
                                     <option value="1">Fermé</option>
                                 </select></div>
                         </div> --}}
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
                                 <textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationJugement"></textarea>
                             </div>
                         </div>
                     </div>
                     <div class="d-flex justify-content-center align-items-center p-2 mb-4">
                         <button type="submit" class="btn btn-primary mr-2">Save changes</button>
                         <a class="btn btn-secondary text-white"
                             onclick="toggleHistorique('Jugement_dossier')">Afficher
                             L'historique</a>
                     </div>
                     <div class="row" style="display: none" id="Jugement_dossier"></div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>
             </form>
         </div>
     </div>
 </div>




 <div class="modal fade" id="Notification" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <form id="notification_form" method="post" action="#" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-header d-flex justify-content-between">
                     <div>
                         <h4>Dossier N °_<strong id="number_dossierNotification"></strong>
                         </h4>
                         <h6>Créance : <strong id="prix_Notification"></strong> DH</h6>
                     </div>

                     <button type="button" data-dismiss="modal" class="btn btn-secondary">X</button>

                 </div>
                 <div class="modal-body">


                     <div class="row">
                         <input type="hidden" class="form-control" name="id_dossierNotification"><input
                             type="hidden" class="form-control" name="id_procedureNotification">
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire :
                                 </label><select class="form-control" name="gestionNotification">
                                     @foreach ($userr as $use_not)
                                         <option value="{{ $use_not->CIN }}">{{ $use_not->PRENOM }}
                                             {{ $use_not->NOM }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">
                                     Numéro_Notification : </label><input type="text" class="form-control"
                                     name="numeroNotification" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">HUISSIER :
                                 </label><select class="chosen-select" name="huissierNotification" required>
                                     <option selected disabled>choisir..</option>
                                     @foreach ($huissier as $hu)
                                         <option value="{{ $hu->ID_HUISSIER }}">{{ $hu->PRENOM }}
                                             {{ $hu->NOM }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Sort :
                                 </label>
                                 <select name="sortNotification" class="form-control" id="">
                                     <option value="" selected> Choisir...</option>
                                     <option value="1"> Oui</option>
                                     <option value="2"> Non</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date D'envoi:
                                 </label><input type="date" class="form-control" name="envoieNotification" />
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Sort :
                                 </label><input type="date" class="form-control" name="dateNotification" /></div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">PV Sort :
                                 </label><input type="file" class="form-control form-control-primary"
                                     name="urlNotification" /></div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Etat De
                                     Notification
                                     : </label><select class="form-control form-control-success"
                                     name="etatNotification">
                                     <option selected disabled>Choisir..</option>
                                     <option value="0">Notifié</option>
                                     <option value="1">Pas Notifié</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Ville
                                     : </label>
                                 <input type="text" class="form-control" name="ville" id="ville"
                                     placeholder="">
                             </div>
                         </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
                                 <textarea class="form-control form-control-sm" rows="2" placeholder="Observation"
                                     name="observationNotification"></textarea>
                             </div>
                         </div>
                     </div>
                     <div class="d-flex justify-content-center align-items-center p-2 mb-4">
                         <button type="submit" class="btn btn-primary mr-2">Save changes</button>
                         <a class="btn btn-secondary text-white"
                             onclick="toggleHistorique('Notification_dossier')">Afficher
                             L'historique</a>
                     </div>
                     <div class="row" style="display: none" id="Notification_dossier"></div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>
             </form>
         </div>
     </div>
 </div>







 <div class="modal fade" id="CNA" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <form id="cna_form" method="post" action="#" enctype="multipart/form-data">
                 @csrf

                 <div class="modal-header d-flex justify-content-between">
                     <div>
                         <h4>Dossier N° <strong id="number_dossierCNA"></strong>
                         </h4>
                         <h6>Créance : <strong id="prix_CNA"></strong> DH</h6>
                     </div>

                     <button type="button" data-dismiss="modal" class="btn btn-secondary">X</button>

                 </div>
                 <div class="modal-body">

                     <div class="row">
                         <input type="hidden" class="form-control" name="id_dossierCNA"><input type="hidden"
                             class="form-control" name="id_procedureCNA">
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire :
                                 </label><select class="form-control" name="gestionCNA">
                                     @foreach ($userr as $use_cna)
                                         <option value="{{ $use_cna->CIN }}">{{ $use_cna->PRENOM }}
                                             {{ $use_cna->NOM }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Réference :
                                 </label><input type="text" class="form-control" name="referenceCNA" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal :
                                 </label><select class="chosen-select" name="tribunalCNA">
                                     <option selected disabled>choisir..</option>
                                     @foreach ($tribunal as $tr)
                                         <option value="{{ $tr->ID_TRIBUNAL }}">{{ $tr->NOM_TRIBUNAL }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label
                                     class="col-form-label col-form-label-sm">Numero_Notification : </label><select
                                     class="chosen-select" name="numeroCNA" required>
                                     <option selected disabled>choisir..</option>
                                     @foreach ($notification as $not)
                                         <option value="{{ $not->NUM_NOTIFICATION }}">{{ $not->NUM_NOTIFICATION }}
                                         </option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Demande:
                                 </label><input type="date" class="form-control" name="demandeCNA" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Retrait :
                                 </label><input type="date" class="form-control" name="retraitCNA" /></div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Fichier:
                                 </label><input type="file" class="form-control form-control-primary"
                                     name="urlCNA" /></div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">L'état :
                                 </label><select class="chosen-select" name="cna_etat" required>
                                     <option selected disabled>choisir..</option>
                                     <option value="0">Oui
                                     </option>
                                     <option value="1">Non
                                     </option>
                                 </select></div>
                         </div>
                         <div class="col-lg-6">
                             <div class="form-group">
                                 <label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
                                 <textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationCNA"></textarea>
                             </div>
                         </div>
                     </div>
                     <div class="d-flex justify-content-center align-items-center p-2 mb-4">
                         <button type="submit" class="btn btn-primary mr-2">Save changes</button>
                         <a class="btn btn-secondary text-white" onclick="toggleHistorique('CNA_dossier')">Afficher
                             L'historique</a>
                     </div>
                     <div class="row" style="display: none" id="CNA_dossier"></div>



                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>
             </form>
         </div>
     </div>
 </div>






 <div class="modal fade" id="Execution" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <form id="execution_form" method="post" action="#" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-header d-flex justify-content-between">
                     <div>
                         <h4>Dossier N° <strong id="number_dossierExecution"></strong>
                         </h4>
                         <h6>Créance : <strong id="prix_Execution"></strong> DH</h6>
                     </div>

                     <button type="button" data-dismiss="modal" class="btn btn-secondary">X</button>

                 </div>
                 <div class="modal-body">

                     <div class="row">
                         <input type="hidden" class="form-control" name="id_dossierExecution"><input type="hidden"
                             class="form-control" name="id_procedureExecution">
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire :
                                 </label><select class="form-control" name="gestionExecution">
                                     @foreach ($userr as $use_exec)
                                         <option value="{{ $use_exec->CIN }}">{{ $use_exec->PRENOM }}
                                             {{ $use_exec->NOM }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Réference :
                                 </label><input type="text" class="form-control" name="referenceExecution" />
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">HUISSIER :
                                 </label><select class="chosen-select" name="huissierExecution" required>
                                     <option selected disabled>choisir..</option>
                                     @foreach ($huissier as $hu)
                                         <option value="{{ $hu->ID_HUISSIER }}">{{ $hu->PRENOM }}
                                             {{ $hu->NOM }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Sort :
                                 </label>
                                 <select name="sortExecution" class="form-control" id="">
                                     <option value="" selected> Choisir...</option>
                                     <option value="1"> Oui</option>
                                     <option value="2"> Non</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date D'envoi:
                                 </label><input type="date" class="form-control" name="envoieExecution" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date D'éxecution
                                     :
                                 </label><input type="date" class="form-control" name="dateExecution" /></div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">PV Sort :
                                 </label><input type="file" class="form-control form-control-primary"
                                     name="urlExecution" /></div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Etat D'éxecution
                                     :
                                 </label><select class="form-control form-control-success" name="etatExecution">
                                     <option selected disabled>Choisir..</option>
                                     <option value="0">En cours</option>
                                     <option value="1">Fermé</option>
                                 </select></div>
                         </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
                                 <textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationExecution"></textarea>
                             </div>
                         </div>
                     </div>
                     <div class="d-flex justify-content-center align-items-center p-2 mb-4">
                         <button type="submit" class="btn btn-primary mr-2">Save changes</button>
                         <a class="btn btn-secondary text-white"
                             onclick="toggleHistorique('Execution_dossier')">Afficher
                             L'historique</a>
                     </div>
                     <div class="row" style="display: none" id="Execution_dossier"></div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>
             </form>
         </div>
     </div>
 </div>







 <div class="modal fade" id="PLAINTE" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <form id="plainte_form" method="post" action="#" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-header d-flex justify-content-between">
                     <div>
                         <h4>Dossier N° <strong id="number_dossierPLAINTE"></strong>
                         </h4>
                         <h6>Créance : <strong id="prix_PLAINTE"></strong> DH</h6>

                     </div>

                     <button type="button" data-dismiss="modal" class="btn btn-secondary">X</button>

                 </div>
                 <div class="modal-body">


                     <div class="row">
                         <input type="hidden" class="form-control" name="id_dossierPLAINTE"><input type="hidden"
                             class="form-control" name="id_procedurePLAINTE">
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire :
                                 </label><select class="form-control" name="gestionPLAINTE">
                                     @foreach ($userr as $use_plainte)
                                         <option value="{{ $use_plainte->CIN }}">{{ $use_plainte->PRENOM }}
                                             {{ $use_plainte->NOM }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Réference :
                                 </label><input type="text" class="form-control" name="referencePLAINTE" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date De Dépot:
                                 </label><input type="date" class="form-control" name="depotPLAINTE" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Procureure :
                                 </label><input type="text" class="form-control" name="procureurePLAINTE" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Sort Plainte :
                                 </label>
                                 <select name="sortPLAINTE" class="form-control" id="">
                                     <option value="" selected> Choisir...</option>
                                     <option value="1">Oui</option>
                                     <option value="2">Non</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Type Plainte :
                                 </label><input type="text" class="form-control" name="typePLAINTE" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date D'envoi:
                                 </label><input type="date" class="form-control" name="envoiePLAINTE" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Arrandissement De
                                     Police : </label><input type="date" class="form-control" name="arrPLAINTE" />
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal :
                                 </label><select class="chosen-select" name="tribunalPLAINTE">
                                     <option selected disabled>choisir..</option>
                                     @foreach ($tribunal as $tr)
                                         <option value="{{ $tr->ID_TRIBUNAL }}">{{ $tr->NOM_TRIBUNAL }}</option>
                                     @endforeach
                                 </select></div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Fichier :
                                 </label><input type="file" class="form-control form-control-primary"
                                     name="urlPLAINTE" /></div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Etat Plainte :
                                 </label><select class="form-control form-control-success" name="etatPLAINTE">
                                     <option selected disabled>Choisir..</option>
                                     <option value="0">En cours</option>
                                     <option value="1">Fermé</option>
                                 </select></div>
                         </div>

                     </div>
                     <div class="d-flex justify-content-center align-items-center p-2 mb-4">
                         <button type="submit" class="btn btn-primary mr-2">Save changes</button>
                         <a class="btn btn-secondary text-white"
                             onclick="toggleHistorique('PLAINTE_dossier')">Afficher
                             L'historique</a>
                     </div>
                     <div class="row" style="display: none" id="PLAINTE_dossier"></div>



                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>
             </form>
         </div>
     </div>
 </div>


 <div class="modal fade" id="Curateur" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <form id="curateur_form" method="post" action="#" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-header d-flex justify-content-between">
                     <div>
                         <h4 disabled>Dossier N° <strong id="number_dossierCurateur"></strong>
                         </h4>
                         <h6>Créance : <strong id="prix_Curateur"></strong> DH</h6>

                     </div>

                     <button type="button" data-dismiss="modal" class="btn btn-secondary">X</button>

                 </div>
                 <div class="modal-body">

                     <div class="row">
                         <input type="hidden" class="form-control" name="id_dossierCurateur"><input type="hidden"
                             class="form-control" name="id_procedureCurateur">
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire :
                                 </label><select class="form-control" name="CIN">
                                     @foreach ($userr as $use_currateur)
                                         <option value="{{ $use_currateur->CIN }}">{{ $use_currateur->PRENOM }}
                                             {{ $use_currateur->NOM }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm"> Tribunal :
                                 </label><select class="form-control" name="ID_TRIBUNAL">
                                     @foreach ($tribunal as $x)
                                         <option value="{{ $x->ID_TRIBUNAL }}">{{ $x->NOM_TRIBUNAL }}</option>
                                     @endforeach
                                 </select></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Ref Tribunal :
                                 </label><input type="text" class="form-control" name="REF_TRIBUNALE"
                                     placeholder="Ref Tribunal " /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Nom Currateur :
                                 </label><input type="text" class="form-control" name="NOM_CURRATEUR"
                                     placeholder="Nom Currateur " /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date Ordonnance :
                                 </label><input type="date" class="form-control" name="DATE_ORDONANCE" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Date Dem
                                     Notification :
                                 </label><input type="date" class="form-control" name="DATE_DEM_NOTIFICATION" />
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">DATE NOT
                                     CURRATEUR :
                                 </label><input type="date" class="form-control" name="DATE_NOT_CURRATEUR" />
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">DATE INSERTION
                                     JOURNALE :
                                 </label><input type="date" class="form-control" name="DATE_INSERTION_JOURNALE" />
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">NOM JOURNALE :
                                 </label><input type="text" class="form-control" name="NOM_JOURNALE"
                                     placeholder="NOM JOURNALE " /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">DATE RETOUR :
                                 </label><input type="date" class="form-control" name="DATE_RETOUR" /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">OBS CUR :
                                 </label><input type="text" class="form-control" name="OBS_CUR"
                                     placeholder="OBS CUR " /></div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">Fichier :
                                 </label><input type="file" class="form-control form-control-primary"
                                     name="URL_CURRATEUR" /></div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group"><label class="col-form-label col-form-label-sm">ETAT CURRATEUR
                                     :
                                 </label>
                                 <select name="ETAT_CURATEUR" class="form-control" id="">
                                     <option value="" selected> Choisir...</option>
                                     <option value="0">Non</option>
                                     <option value="1">Oui</option>
                                 </select>
                             </div>
                         </div>



                     </div>
                     <div class="d-flex justify-content-center align-items-center p-2 mb-4">
                         <button type="submit" class="btn btn-primary mr-2">Save changes</button>
                         <a class="btn btn-secondary text-white"
                             onclick="toggleHistorique('Curateur_dossier')">Afficher
                             L'historique</a>
                     </div>
                     <div class="row" style="display: none" id="Curateur_dossier"></div>



                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
