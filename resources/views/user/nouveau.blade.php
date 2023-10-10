<form method="post" action="{{ url('users/nouveau') }}" class="form_add">

    @csrf
    <div class="row">

        <div class="col-md-12">
            <div class="card task-board">
                <div class="card-header">
                    <h3><i class="far fa-user"></i> &nbsp; Nouveau Utilisateur </h3>
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
                                    <label class="col-form-label col-form-label-sm">LOGIN_USER : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="LOGIN_USER"
                                        id="login_user" name="login_user" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">PASSWORD_USER : </label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="PASSWORD_USER" id="mdp_user" name="mdp_user" required>
                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">CIN_USER : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="CIN_USER"
                                        id="cin_user" name="cin_user" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">ADRESSE_USER : </label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="ADRESSE_USER" id="adresse_user" name="adresse_user" required>
                                </div>
                            </div>





                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">NOM_USER : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="NOM_USER"
                                        id="nom_user" name="nom_user" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">PRENOM_USER : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="PRENOM_USER"
                                        id="prenom_user" name="prenom_user" required>
                                </div>
                            </div>


                        </div>




                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">EMAIL_USER : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="EMAIL_USER"
                                        id="email_user" name="email_user" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">TEL_USER : </label>
                                    <input type="number"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        value="{{ old('tel') }}" placeholder="TEL_USER" id="tel_user"
                                        name="tel_user" required>

                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        </div>






                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">POSTE_USER : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="POSTE_USER"
                                        id="poste_user" name="poste_user" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">NIVEAU_USER : </label>
                                    <select id="niveau_user" name="niveau_user" class="form-control" required>

                                        @foreach ($niveau as $niv)
                                            <option value="{{ $niv->ID_NIVEAU }}">{{ $niv->NOM_NIVEAU }}</option>
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



                    <button data-role="inserer" type="submit" class="btn btn-info" style="width:100%"
                        disabled>Ajouter</button>







                </div>
            </div>
        </div>





















    </div>
</form>
