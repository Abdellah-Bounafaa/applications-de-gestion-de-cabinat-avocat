<form method="post" action="{{ url('/huissier/nouveau') }}" class="form_add">

    @csrf
    <div class="row">

        <div class="col-md-12">
            <div class="card task-board">
                <div class="card-header">
                    <h3><i class="far fa-user"></i> &nbsp; Nouveau Huissier </h3>
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
                                    <label class="col-form-label col-form-label-sm">Id Huissier : </label>
                                    <input type="number" class="form-control form-control-sm" placeholder="Id Huissier"
                                        id="ID_HUISSIER" name="ID_HUISSIER" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Nom : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Nom"
                                        id="NOM" name="NOM" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Prénom : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Prénom"
                                        id="PRENOM" name="PRENOM" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Adresse : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Adresse"
                                        id="ADRESS" name="ADRESS" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Numéro De Téléphone : </label>
                                    <input type="number" class="form-control form-control-sm"
                                        placeholder="Numéro De Téléphone" id="TELEPHONE" name="TELEPHONE" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Email : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Email"
                                        id="EMAIL" name="EMAIL" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Ville : </label>
                                    <select name="ID_VILLE" class="form-control" id="VILLE_MOD">
                                        <option value="" disabled>Choisir Une Ville</option>
                                        @foreach ($villes as $ville)
                                            <option value="{{ $ville->ID_VILLE }}">{{ $ville->NOM_VILLE }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="card task-board">
                <div class="card-body todo-task">
                    <button data-role="inserer" type="submit" class="btn btn-info" style="width:100%">Ajouter</button>
                </div>
            </div>
        </div>





















    </div>
</form>
