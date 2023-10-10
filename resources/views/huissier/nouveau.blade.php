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
                                    <label class="col-form-label col-form-label-sm">ID HUISSIER : </label>
                                    <input type="number" class="form-control form-control-sm" placeholder="ID HUISSIER"
                                        id="ID_HUISSIER" name="ID_HUISSIER" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">NOM : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="NOM"
                                        id="NOM" name="NOM" required>
                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">PRENOM : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="PRENOM"
                                        id="PRENOM" name="PRENOM" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">ADRESS : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="ADRESS"
                                        id="ADRESS" name="ADRESS" required>
                                </div>
                            </div>





                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">TELEPHONE : </label>
                                    <input type="number" class="form-control form-control-sm" placeholder="TELEPHONE"
                                        id="TELEPHONE" name="TELEPHONE" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">EMAIL : </label>
                                    <input type="text" class="form-control form-control-sm" placeholder="EMAIL"
                                        id="EMAIL" name="EMAIL" required>
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
