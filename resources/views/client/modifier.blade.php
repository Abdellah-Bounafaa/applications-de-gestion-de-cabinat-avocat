{{-- <div class="modal fade" id="edition" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"> --}}
<div class="modal fade" id="edition" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="fullwindowModalLabel">Identifiant : <strong id="identifiant_cl"></strong> --}}
                <h5 class="modal-title" id="fullwindowModalLabel">Modifier un client :
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Type : </label><br>
                            <select id="type" class="chosen-select1 form-control"
                                onchange='togglePrenomField("type","prenom","nom","Label")' required>
                                @foreach ($type as $type)
                                    <option value="{{ $type->ID_TYPET }}">{{ $type->LIBELLE_TYPET }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="hidden" id="id" class="form-control">
                            <label class="col-form-label col-form-label-sm" for="clientCity">RC/CIN : </label><br>
                            <input type="text" id="identifiant" placeholder="Identifiant de client"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" id="Label" for="clientCity">Nom :
                            </label><br>
                            <input type="text" id="nom" class="form-control" placeholder="Nom de client"
                                required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Prénom :
                            </label><br>
                            <input type="text" id="prenom" placeholder="Prénom de client" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm " for="clientCity">Ville : </label><br>
                            <select id="ville" class="chosen-select1  form-control" required>
                                @foreach ($region as $region)
                                    <option value="{{ $region->ID_VILLE }}">{{ $region->NOM_VILLE }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Adresse : </label><br>
                            <input type="text" id="adresse" placeholder="Adresse de client" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Téléphone : </label><br>
                            <input type="text" id="tel" placeholder="Téléphone de client" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="tel2">Téléphone 2 : </label><br>
                            <input type="text" id="tel2" placeholder="Téléphone de client" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="fax">Fax : </label><br>
                            <input type="text" id="fax" placeholder="Fax de client" class="form-control"
                                required>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="fax">Email : </label><br>
                            <input id="email" type="email" placeholder="Email de client" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Capitale : </label><br>
                            <div class="input-group">
                                <input type="number" step="0.01" id="capitale" class="form-control" required>
                                <span class="input-group-append" id="basic-addon3">
                                    <label class="input-group-text"
                                        style="background-color:green;color:white">DH</label>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="pt-2">Interlocuteur :</h5>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="interlocuteur">Interlocuteur
                                :</label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Nom d'Interlocuteur" id="interlocuteur" name="nom_inter">


                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">

                            <label class="col-form-label col-form-label-sm" for="mobilein">Téléphone :</label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Téléphone d'Interlocuteur" id="mobilein" name="tel_inter" required>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">

                            <label class="col-form-label col-form-label-sm" for="emailin">Email :</label>
                            <input type="email" class="form-control form-control-sm"
                                placeholder="Email d'Interlocuteur" id="emailin" name="email_inter" required>
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
