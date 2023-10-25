<form method="post" action="{{ url('/tribunal/nouveau') }}" class="form_add">

    @csrf
    <div class="row">

        <div class="col-md-12">
            <div class="card task-board">
                <div class="card-header">
                    <h3><i class="far fa-user"></i> &nbsp; Nouveau Tribunal </h3>
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
                                    <label class="col-form-label col-form-label-sm">Id Tribunal : </label>
                                    <input type="number" class="form-control form-control-sm" placeholder="Id Tribunal"
                                        id="ID_TRIBUNAL" name="ID_TRIBUNAL" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Ville : </label>
                                    <select name="ID_VILLE" id="ID_VILLE" class="form-control" id="" required>
                                        <option selected disabled>Choisir..</option>
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
                                    <select name="ID_TTRIBUNAL" id="ID_TTRIBUNAL" class="form-control" id=""
                                        required>
                                        <option selected disabled>Choisir..</option>
                                        @foreach ($type_tribunal as $type)
                                            <option value="{{ $type->ID_TRIBUNAL }}">{{ $type->NOM }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Nom De Tribunal : </label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="NOM_TRIBUNAL" id="NOM_TRIBUNAL" name="NOM_TRIBUNAL" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Libellé : </label>
                                    <input type="number" class="form-control form-control-sm" placeholder="Libellé"
                                        id="LIBELLE" name="LIBELLE" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Num De Tribunal : </label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Num De Tribunal" id="NUM_TRIBUNAL" name="NUM_TRIBUNAL" required>
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
