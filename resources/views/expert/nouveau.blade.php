<form method="post" action="{{ url('/expert/nouveau') }}" class="form_add">

    @csrf
    <div class="row">

        <div class="col-md-12">
            <div class="card task-board">
                <div class="card-header">
                    <h3><i class="far fa-user"></i> &nbsp; Nouveau Expert </h3>
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
                                    <label class="col-form-label col-form-label-sm">ID EXPERT : </label>
                                    <input type="number" class="form-control form-control-sm" placeholder="ID EXPERT"
                                        id="ID_EXPERT" name="ID_EXPERT" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">NOM : </label>
                                    <input type="text" name="NOM" id="NOM" placeholder="NOM EXPERT"
                                        class="form-control">
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
