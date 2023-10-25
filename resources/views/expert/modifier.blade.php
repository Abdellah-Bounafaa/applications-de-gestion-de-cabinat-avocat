<div class="modal fade" id="edition" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">Modifier Expert : <strong id="ID_EXPERT_MOD"></strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">


                <div class="row">



                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Nom : </label><br>
                            <input id="NOM_MOD" class="form-control" placeholder="Nom" name="NOM" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-sm">Ville : </label>
                            <select name="ville" class="form-control" id="Ville_MOD">
                                <option value="" disabled>Choisir Une Ville</option>
                                @foreach ($villes as $ville)
                                    <option value="{{ $ville->ID_VILLE }}">{{ $ville->NOM_VILLE }}</option>
                                @endforeach
                            </select>
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
