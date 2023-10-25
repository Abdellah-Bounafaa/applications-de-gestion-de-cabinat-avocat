<div class="modal fade" id="edition" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">CIN : <strong id="CIN_MOD"></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Email : </label><br>
                            <input id="EMAIL_MOD" class="form-control" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Niveau D'utilisateur :
                            </label><br>
                            <select id="NIVEAU_MOD" class="form-control" required>
                                @foreach ($niveau as $nv)
                                    <option value="{{ $nv->ID_NIVEAU }}">{{ $nv->NOM_NIVEAU }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Prénom : </label><br>
                            <input id="PRENOM_MOD" class="form-control" placeholder="Prénom" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Nom : </label><br>
                            <input id="NOM_MOD" class="form-control" placeholder="Nom" required>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Numéro De Téléphone :
                            </label><br>
                            <input id="TEL_MOD" class="form-control" placeholder="Numéro De Téléphone" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Adresse : </label><br>
                            <input id="ADRESSE_MOD" class="form-control" placeholder="Adresse" required>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Login : </label><br>
                            <input id="LOGIN_MOD" class="form-control" placeholder="Login" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Mot De Passe :
                            </label><br>
                            <input id="MDP_MOD" class="form-control" placeholder="Mot De Passe" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 offset-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Poste D'utilisateur :
                            </label><br>
                            <input id="POSTE_MOD" class="form-control" required>
                        </div>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" data-role="sauvegarder" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
