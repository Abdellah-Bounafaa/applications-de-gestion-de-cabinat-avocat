<style>
    #tabled th {

        background-color: #ccd9ff;
        border-color: gray;

    }


    #tabled td {}
</style>
<div class="row" id="resultat_dossier" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel"
    aria-hidden="true" style="display:none">
    <form method="post" action="{{ url('dossier/search/enregistrer') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">Dossier N° : <string id="numero_dossier"></string> /
                    Radical_Client : <string id="radical_client"></string><input type="hidden" name="id_dossier"
                        id="id_dossier"> / ID_DOSSIER : <string id="dossier_id"></string>
                </h5>
                <button type="button" data-role="closer" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">


                <div class="card">
                    <div class="card-body">


                        <div class="row" id="affichage_procedure">




                        </div>


                        <div class="row">


                            <div class="col-lg-4">


                                <div class="row">

                                    <table id="tabled" class="table table-bordered">

                                        <tbody>

                                            <tr>
                                                <th>Client</th>
                                                <td>
                                                    <string id="prenom_client"></string>&nbsp;<string id="nom_client">
                                                    </string>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Adversaire</th>
                                                <td>
                                                    <string id="prenom_adversaire"></string>&nbsp;<string
                                                        id="nom_adversaire"></string>
                                                </td>
                                            </tr>



                                            <tr>
                                                <th>Radical_Cabinet </th>
                                                <td>
                                                    <string id="radical_cabinet"></string>
                                                </td>
                                            </tr>


                                            <tr>
                                                <th>Créance</th>
                                                <td class="text-center">
                                                    <input type="number" name="montant" id="montant_creance"
                                                        class="form-control" required />

                                                </td>


                                            </tr>



                                            <tr>
                                                <th>Date_Ouverture </th>
                                                <td>
                                                    <string id="date_ouverture"></string>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>






                            <div class="col-lg-4">

                                <div class="row">

                                    <table id="tabled" class="table table-bordered">

                                        <tbody>
                                            <tr>
                                                <th>Type</th>
                                                <td><select name="type_dossier" class="chosen-select">
                                                        @foreach ($typ as $typ)
                                                            <option value="{{ $typ->ID_TYPEDOSSIER }}">
                                                                {{ $typ->NOM }}</option>
                                                        @endforeach

                                                    </select></td>

                                            </tr>


                                            <tr>
                                                <th>Gestion_Utilisateur </th>
                                                <td><select id="gestion" name="gestion" class="chosen-select">
                                                        @foreach ($users as $users)
                                                            <option value="{{ $users->CIN }}">{{ $users->LOGIN }}
                                                            </option>
                                                        @endforeach

                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <th>Agence</th>
                                                <td>
                                                    <string id="nom_agence"></string>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Direction</th>
                                                <td>
                                                    <string id="direction"></string>
                                                </td>
                                            </tr>


                                            <tr>
                                                <th>Nature</th>
                                                <td><select id="nom_nature" name="nom_nature" class="chosen-select">
                                                        @foreach ($natur as $natur)
                                                            <option value="{{ $natur->ID_NATURE }}">{{ $natur->NOM }}
                                                            </option>
                                                        @endforeach

                                                    </select></td>

                                            </tr>




                                        </tbody>
                                    </table>
                                </div>

                            </div>




                            <div class="col-lg-4">




                                <table id="tabled" class="table table-bordered">

                                    <tbody id="documentation">
                                    </tbody>





                                </table>

                                <button type="button" data-role="ajouter" class="btn btn-success"
                                    style="width:100%">Ajouter D'autres Documents</button>

                                <div id="attache" class="card-body">


                                </div>


                            </div>









                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="col-form-label col-form-label-sm" for="nArchivage">N°
                                                Archivage : </label>
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="Numero d'archivage" id="numero_archivage"
                                                name="numero_archivage" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-form-label col-form-label-sm" for="observ">Observation :
                                            </label>
                                            <textarea class="form-control form-control-sm" rows="3" placeholder="Observation" id="observation"
                                                name="observation"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" style="padding-top:25px;">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="suspention"
                                                    name="suspention" />
                                                <label class="custom-control-label"
                                                    for="suspention">Suspension</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="arrangement"
                                                    name="arrangement" />
                                                <label class="custom-control-label" for="arrangement">Suspension
                                                    Arrangement</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="manque"
                                                    name="manque" />
                                                <label class="custom-control-label" for="manque">Manque
                                                    Pièce</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>











                        </div>





                    </div>
                </div>






            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#proced">Ajouter
                    Procédure</button>

                <button type="submit" class="btn btn-primary">Save changes</button>

                <button type="button" data-role="closer" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
            </div>

        </div>

    </form>
</div>





<div class="modal fade" id="proced" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterLabel">Procédures</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($procedure as $pro)
                                    <div class="col-sm-6" id="{{ $pro->ID_PROCEDURE }}">


                                        <div class="form-group">
                                            <div class="checkbox-zoom zoom-primary">
                                                <label>
                                                    <input type="checkbox" name="{{ $pro->NAME_PROCEDURE }}"
                                                        value="{{ $pro->ID_PROCEDURE }}"
                                                        id="procedure[{{ $pro->ID_PROCEDURE }}]">
                                                    <span class="cr">
                                                        <i class="cr-icon ik ik-check txt-primary"></i>
                                                    </span>
                                                    <span style="font-size:12px"
                                                        id="{{ $pro->ID_PROCEDURE }}">{{ $pro->NOM_PROCEDURE }}</span>
                                                </label>
                                            </div>





                                        </div>
                                    </div>
                                @endforeach
                            </div>




                        </div>



                    </div>





                </div>



            </div>

            <div class="modal-footer">

                <button data-role="ajoute" type="button" class="btn btn-primary">Ajouter</button>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
