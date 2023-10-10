<form method="post" action="{{ url('/currateur/nouveau') }}" class="form_add" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-12">
            <div class="card task-board">
                <div class="card-header">
                    <h3><i class="far fa-user"></i> &nbsp; Nouveau Currateur </h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>

                </div>

                <div class="card-body todo-task">

                    <div class="dd" data-plugin="nestable" id="dd">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">ID TRIBUNAL : </label>
                                    <input type="number" class="form-control form-control-sm"
                                        placeholder="ID CURRATEUR" id="ID_CURRATEUR" name="ID_CURRATEUR" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">VILLE : </label>
                                    <select name="ID_TRIBUNAL" id="ID_TRIBUNAL" class="form-control" id=""
                                        required>
                                        <option selected disabled>Choisir..</option>
                                        @foreach ($tribunaux as $tribunal)
                                            <option value="{{ $tribunal->ID_TRIBUNAL }}">
                                                {{ $tribunal->NOM_TRIBUNAL }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">CIN : </label>
                                    <select name="CIN" id="CIN" class="form-control" id="" required>
                                        <option selected disabled>Choisir..</option>
                                        @foreach ($utilisateurs as $utilisateur)
                                            <option value="{{ $utilisateur->CIN }}">
                                                {{ $utilisateur->NOM }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">DOSSIER : </label>
                                    <select name="ID_DOSSIER" id="ID_DOSSIER" class="form-control" id=""
                                        required>
                                        <option selected disabled>Choisir..</option>
                                        @foreach ($traitement as $dossier)
                                            <option value="{{ $dossier->ID_DOSSIER }}">
                                                {{ $dossier->ID_DOSSIER }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>







                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm"> PROCEDURE : </label>
                                    <select name="ID_PROCEDURE" id="ID_PROCEDURE" class="form-control" id=""
                                        required>
                                        <option selected disabled>Choisir..</option>
                                        @foreach ($traitement as $procedure)
                                            <option value="{{ $procedure->ID_PROCEDURE }}">
                                                {{ $procedure->ID_PROCEDURE }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">REF TRIBUNALE : </label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="REF TRIBUNALE" id="REF_TRIBUNALE" name="REF_TRIBUNALE" required>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm"> DATE ORDONANCE : </label>
                                    <input type="date" class="form-control" name="DATE_ORDONANCE"
                                        id="DATE_ORDONANCE">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">DATE DEM NOTIFICATION : </label>
                                    <input type="date" class="form-control" placeholder=""
                                        name="DATE_DEM_NOTIFICATION" id="DATE_DEM_NOTIFICATION">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm"> NOM CURRATEUR : </label>
                                    <input type="text" class="form-control" name="NOM_CURRATEUR" id="NOM_CURRATEUR">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">DATE NOT CURRATEUR : </label>
                                    <input type="date" class="form-control" placeholder="" name="DATE_NOT_CURRATEUR"
                                        id="DATE_NOT_CURRATEUR">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm"> DATE INSERTION JOURNALE : </label>
                                    <input type="date" class="form-control" name="DATE_INSERTION_JOURNALE"
                                        id="DATE_INSERTION_JOURNALE">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">NOM JOURNALE : </label>
                                    <input type="text" class="form-control" placeholder="" name="NOM_JOURNALE"
                                        id="NOM_JOURNALE">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm"> DATE RETOUR : </label>
                                    <input type="date" class="form-control" name="DATE_RETOUR" id="DATE_RETOUR">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">OBS CURRATEUR : </label>
                                    <input type="text" class="form-control" placeholder="" name="OBS_CUR"
                                        id="OBS_CUR">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm"> ETAT CURATEUR : </label>
                                    <select class="form-control" name="ETAT_CURATEUR" id="">
                                        <option value="" selected>Choisir...</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">URL CURRATEUR : </label>
                                    <input type="file" class="form-control" name="URL_CURRATEUR"
                                        id="URL_CURRATEUR">
                                </div>
                            </div>


                        </div>




                    </div>


                </div>
            </div>


            <div class="card task-board">

                <div class="card-body todo-task">



                    <button data-role="inserer" type="submit" class="btn btn-info"
                        style="width:100%">Ajouter</button>







                </div>
            </div>
        </div>





















    </div>
</form>
