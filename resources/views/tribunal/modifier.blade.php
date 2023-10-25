<div class="modal fade" id="edition" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">Modifier Tribunal : <strong
                        id="ID_TRIBUNAL_MOD"></strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm">Nom De Tribunal : </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Nom De Tribunal"
                                id="NOM_TRIBUNAL_MOD" name="NOM_TRIBUNAL" required>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm">Ville : </label>
                            <select name="ID_VILLE" id="ID_VILLE_MOD" class="form-control" id="" required>
                                @foreach ($villes as $ville)
                                    <option value="{{ $ville->ID_VILLE }}">{{ $ville->NOM_VILLE }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm">Type De Tribunal : </label>
                            <select name="ID_TTRIBUNAL" id="ID_TTRIBUNAL_MOD" class="form-control" id=""
                                required>
                                @foreach ($type_tribunal as $type)
                                    <option value="{{ $type->ID_TRIBUNAL }}">{{ $type->NOM }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm">Libellé : </label>
                            <input type="number" class="form-control form-control-sm" placeholder="Libellé"
                                id="LIBELLE_MOD" name="LIBELLE" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm">Num De Tribunal : </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Num De Tribunal"
                                id="NUM_TRIBUNAL_MOD" name="NUM_TRIBUNAL" required>
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
