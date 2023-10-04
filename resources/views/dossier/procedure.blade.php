 <div class="modal fade" id="Requete" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    
                    <form id="requete_form" method="post" action="#" enctype="multipart/form-data">
                        @csrf
                                    <div class="modal-header">
                                        
                                        <h4 class="text-left">Créance  : <strong id="prix_Requete"></strong> DH</h4>
                                        <h6 class="close" disabled>Dossier N °_<string id="number_dossierRequete"></string></h6>
                                        
                                        
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" id="Requete_dossier"></div>
                                        
                                        <div class="row"><input type="hidden" class="form-control" name="id_dossierRequete"><input type="hidden" class="form-control" name="id_procedureRequete"><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire : </label><select class="form-control" name="gestionRequete">@foreach ($userr as $use)<option value="{{$use->CIN}}">{{$use->PRENOM}} {{$use->NOM}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Reference_Tribunal : </label><input type="text" class="form-control" name="referenceRequete"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal : </label><select class="form-control" name="tribunalRequete">@foreach($tribunal as $nom)<option value="{{$nom->ID_TRIBUNAL}}">{{$nom->NOM_TRIBUNAL}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Dépôt : </label><input type="date" class="form-control" name="depotRequete"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Juge : </label><input type="text" class="form-control" id="jugeRequete"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Retrait : </label><input type="date" class="form-control" name="retraitRequete"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">URL_Scan : </label><input type="file" class="form-control form-control-primary" name="urlRequete"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Jugement : </label><input type="date" class="form-control" name="jugementRequete"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Etat_Requete : </label><select class="form-control form-control-success" name="etatRequete"><option selected disabled>Choisir..</option><option value="0">En cours</option><option value="1">Fermé</option></select></div></div>
                                            <div class="col-lg-12">
										<div class="form-group">
											<label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
											<textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationRequete"></textarea>
										</div>
									</div>
                                        
                                        
                                        
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>










<div class="modal fade" id="Audiance" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                 <form id="audiance_form" method="post" action="#" enctype="multipart/form-data">
                        @csrf
                                    <div class="modal-header">
                                        
                                        <h4 class="text-left">Créance  : <strong id="prix_Audiance"></strong> DH</h4>
                                        <h6 class="close" disabled>Dossier N °_<string id="number_dossierAudiance"></string></h6>
                                        
                                        
                                    </div>
                                    <div class="modal-body">
                                         <div class="row" id="Audiance_dossier"></div>
                                        
                                        <div class="row"><input type="hidden" class="form-control" name="id_dossierAudiance"><input type="hidden" class="form-control" name="id_procedureAudiance"><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire : </label><select class="form-control" name="gestionAudiance">@foreach ($userr as $usee)<option value="{{$usee->CIN}}">{{$usee->PRENOM}} {{$usee->NOM}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Juge_Audiance : </label><input type="text" class="form-control" name="jugeAudiance"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal : </label><select class="form-control" name="tribunalAudiance">@foreach($tribunal as $nomm)<option value="{{$nomm->ID_TRIBUNAL}}">{{$nomm->NOM_TRIBUNAL}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Audience : </label><input type="date" class="form-control" name="dateAudiance"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Salle : </label><input type="text" placeholder="numero salle" class="form-control" name="salleAudiance"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Création : </label><input type="date" class="form-control" name="creationAudiance"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">URL_Scan : </label><input type="file" class="form-control form-control-primary" name="urlAudiance"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">Etat_Adiance : </label><select class="form-control form-control-success" name="etatAudiance"><option selected disabled>Choisir..</option><option value="0">En cours</option><option value="1">Fermé</option></select></div></div>
                                            <div class="col-lg-12">
										<div class="form-group">
											<label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
											<textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationAudiance"></textarea>
										</div>
									</div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>




<div class="modal fade" id="Jugement" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                 <form id="jugement_form" method="post" action="#" enctype="multipart/form-data">
                        @csrf
                                    <div class="modal-header">
                                        
                                       <h4 class="text-left">Créance  : <strong id="prix_Jugement"></strong> DH</h4>
                                        <h6 class="close" disabled>Dossier N °_<string id="number_dossierJugement"></string></h6>
                                        
                                        
                                    </div>
                                    <div class="modal-body">
                                         <div class="row" id="Jugement_dossier"></div>
                                        
                                        <div class="row"><input type="hidden" class="form-control" name="id_dossierJugement"><input type="hidden" class="form-control" name="id_procedureJugement"><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire : </label><select class="form-control" name="gestionJugement">@foreach ($userr as $useee)<option value="{{$useee->CIN}}">{{$useee->PRENOM}} {{$useee->NOM}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Réference_Tribunal : </label><input type="text" class="form-control" name="referenceJugement"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal : </label><select class="form-control" name="tribunalJugement">@foreach($tribunal as $nomm)<option value="{{$nomm->ID_TRIBUNAL}}">{{$nomm->NOM_TRIBUNAL}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Sort : </label><input type="text" class="form-control" name="sortJugement"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Juge : </label><input type="text"  class="form-control" name="jugeJugement"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Jugement : </label><input type="date" class="form-control" name="dateJugement"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">URL_Scan : </label><input type="file" class="form-control form-control-primary" name="urlJugement"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">Etat_Jugement : </label><select class="form-control form-control-success" name="etatJugement"><option selected disabled>Choisir..</option><option value="0">En cours</option><option value="1">Fermé</option></select></div></div>
                                            <div class="col-lg-12">
										<div class="form-group">
											<label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
											<textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationJugement"></textarea>
										</div>
									</div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                                    <div class="modal-header">
                                        
                                       <h4 class="text-left">Créance  : <strong id="prix_Notification"></strong> DH</h4>
                                        <h6 class="close" disabled>Dossier N °_<string id="number_dossierNotification"></string></h6>
                                        
                                        
                                    </div>
                                    <div class="modal-body">
                                         <div class="row" id="Notification_dossier"></div>
                                        
                                        <div class="row"><input type="hidden" class="form-control" name="id_dossierNotification"><input type="hidden" class="form-control" name="id_procedureNotification"><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire : </label><select class="form-control" name="gestionNotification">@foreach ($userr as $use_not)<option value="{{$use_not->CIN}}">{{$use_not->PRENOM}} {{$use_not->NOM}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Numéro_Notification : </label><input type="text" class="form-control" name="numeroNotification"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">HUISSIER : </label><select class="chosen-select" name="huissierNotification" required><option selected disabled>choisir..</option>@foreach($huissier as $hu)<option value="{{$hu->ID_HUISSIER}}">{{$hu->PRENOM}} {{$hu->NOM}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Sort : </label><input type="text" class="form-control" name="sortNotification"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Envoi: </label><input type="date"  class="form-control" name="envoieNotification"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Sort : </label><input type="date" class="form-control" name="dateNotification"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">PV_Sort : </label><input type="file" class="form-control form-control-primary" name="urlNotification"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">Etat_Notification : </label><select class="form-control form-control-success" name="etatNotification"><option selected disabled>Choisir..</option><option value="0">En cours</option><option value="1">Fermé</option></select></div></div>
                                            <div class="col-lg-12">
										<div class="form-group">
											<label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
											<textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationNotification"></textarea>
										</div>
									</div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                                    <div class="modal-header">
                                        
                                       <h4 class="text-left">Créance  : <strong id="prix_CNA"></strong> DH</h4>
                                        <h6 class="close" disabled>Dossier N °_<string id="number_dossierCNA"></string></h6>
                                        
                                        
                                    </div>
                                    <div class="modal-body">
                                         <div class="row" id="CNA_dossier"></div>
                                        
                                        <div class="row"><input type="hidden" class="form-control" name="id_dossierCNA"><input type="hidden" class="form-control" name="id_procedureCNA"><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire : </label><select class="form-control" name="gestionCNA">@foreach ($userr as $use_cna)<option value="{{$use_cna->CIN}}">{{$use_cna->PRENOM}} {{$use_cna->NOM}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Réference : </label><input type="text" class="form-control" name="referenceCNA"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal : </label><select class="chosen-select" name="tribunalCNA"><option selected disabled>choisir..</option>@foreach($tribunal as $tr)<option value="{{$tr->ID_TRIBUNAL}}">{{$tr->NOM_TRIBUNAL}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Numero_Notification : </label><select class="chosen-select" name="numeroCNA" required><option selected disabled>choisir..</option>@foreach($notification as $not)<option value="{{$not->NUM_NOTIFICATION}}">{{$not->NUM_NOTIFICATION}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Demande: </label><input type="date"  class="form-control" name="demandeCNA"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Retrait : </label><input type="date" class="form-control" name="retraitCNA"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">Fichier: </label><input type="file" class="form-control form-control-primary" name="urlCNA"/></div></div>
                                            <div class="col-lg-6">
										<div class="form-group">
											<label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
											<textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationCNA"></textarea>
										</div>
									</div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                                    <div class="modal-header">
                                        
                                       <h4 class="text-left">Créance  : <strong id="prix_Execution"></strong> DH</h4>
                                        <h6 class="close" disabled>Dossier N °_<string id="number_dossierExecution"></string></h6>
                                        
                                        
                                    </div>
                                    <div class="modal-body">
                                         <div class="row" id="Execution_dossier"></div>
                                        
                                        <div class="row"><input type="hidden" class="form-control" name="id_dossierExecution"><input type="hidden" class="form-control" name="id_procedureExecution"><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire : </label><select class="form-control" name="gestionExecution">@foreach ($userr as $use_exec)<option value="{{$use_exec->CIN}}">{{$use_exec->PRENOM}} {{$use_exec->NOM}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Réference : </label><input type="text" class="form-control" name="referenceExecution"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">HUISSIER : </label><select class="chosen-select" name="huissierExecution" required><option selected disabled>choisir..</option>@foreach($huissier as $hu)<option value="{{$hu->ID_HUISSIER}}">{{$hu->PRENOM}} {{$hu->NOM}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Sort : </label><input type="text" class="form-control" name="sortExecution"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Envoi: </label><input type="date"  class="form-control" name="envoieExecution"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Execution : </label><input type="date" class="form-control" name="dateExecution"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">PV_Sort : </label><input type="file" class="form-control form-control-primary" name="urlExecution"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">Etat_Execution : </label><select class="form-control form-control-success" name="etatExecution"><option selected disabled>Choisir..</option><option value="0">En cours</option><option value="1">Fermé</option></select></div></div>
                                            <div class="col-lg-12">
										<div class="form-group">
											<label class="col-form-label col-form-label-sm" for="observ">Observation : </label>
											<textarea class="form-control form-control-sm" rows="2" placeholder="Observation" name="observationExecution"></textarea>
										</div>
									</div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                                    <div class="modal-header">
                                        
                                       <h4 class="text-left">Créance  : <strong id="prix_PLAINTE"></strong> DH</h4>
                                        <h6 class="close" disabled>Dossier N °_<string id="number_dossierPLAINTE"></string></h6>
                                        
                                        
                                    </div>
                                    <div class="modal-body">
                                         <div class="row" id="PLAINTE_dossier"></div>
                                        
                                        <div class="row"><input type="hidden" class="form-control" name="id_dossierPLAINTE"><input type="hidden" class="form-control" name="id_procedurePLAINTE"><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Gestionnaire : </label><select class="form-control" name="gestionPLAINTE">@foreach ($userr as $use_plainte)<option value="{{$use_plainte->CIN}}">{{$use_plainte->PRENOM}} {{$use_plainte->NOM}}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm"> Réference : </label><input type="text" class="form-control" name="referencePLAINTE"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Dépot: </label><input type="date"  class="form-control" name="depotPLAINTE"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Procureure : </label><input type="text" class="form-control" name="procureurePLAINTE"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Sort_Plainte : </label><input type="text" class="form-control" name="sortPLAINTE"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Type_Plainte : </label><input type="text" class="form-control" name="typePLAINTE"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Date_Envoi: </label><input type="date"  class="form-control" name="envoiePLAINTE"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Arrandissement_police : </label><input type="date" class="form-control" name="arrPLAINTE"/></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Tribunal : </label><select class="chosen-select" name="tribunalPLAINTE"><option selected disabled>choisir..</option>@foreach($tribunal as $tr)<option value="{{$tr->ID_TRIBUNAL}}">{{$tr->NOM_TRIBUNAL}}</option>@endforeach</select></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">Fichier : </label><input type="file" class="form-control form-control-primary" name="urlPLAINTE"/></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm">Etat_Plainte : </label><select class="form-control form-control-success" name="etatPLAINTE"><option selected disabled>Choisir..</option><option value="0">En cours</option><option value="1">Fermé</option></select></div></div>
                                            
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>