@extends('layouts.app')


@section('title')
    Consultations
@endsection

@section('css')
@endsection




@section('contenu')
    <style>
        button {
            background: none;
            border: none
        }
    </style>
    <div class="row clearfix">

        <div class="col-sm-3 text-center">
            Requetes - <button class="text-success" type="button" data-etape="1"
                data-role="affichage">{{ $requetes->count() }}</button>
        </div>
        <div class="col-sm-3 text-center">
            Audiances - <button class="text-success" data-etape="2" type="button"
                data-role="affichage">{{ $audiances->count() }}</button>
        </div>
        <div class="col-sm-3 text-center">
            Jugements - <button class="text-success" type="button" data-etape="3"
                data-role="affichage">{{ $jugements->count() }}</button>
        </div>
        <div class="col-sm-3 text-center">
            Notifications - <button class="text-success" data-etape="4"
                data-role="affichage">{{ $notifications->count() }}</button>
        </div>
        <div class="col-sm-3 text-center">
            CNA - <button class="text-success" data-etape="5" data-role="affichage">{{ $cnas->count() }}</button>
        </div>
        <div class="col-sm-3 text-center">
            Executions - <button class="text-success" data-etape="6"
                data-role="affichage">{{ $executions->count() }}</button>
        </div>
        <div class="col-sm-3 text-center">
            Currateurs - <button class="text-success" data-etape="7"
                data-role="affichage">{{ $currateurs->count() }}</button>
        </div>


        {{-- </div> --}}
        <hr style="width:80%;height:2px;margin: 10px auto" />



        @foreach ($procedure as $procedure)
            <div class="col-sm-3 text-center">
                <div class="input-group input-group-dropdown">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button"
                        value="{{ $procedure->NOM_PROCEDURE }}" class="form-control"
                        aria-label="Text input with dropdown button" disabled
                        style="background-color:#06186A;color:white;font-weight:bold">
                    <div class="input-group-append">
                        <button data-role="procedure" data-id="{{ $procedure->ID_PROCEDURE }}"
                            data-nom="{{ $procedure->NOM_PROCEDURE }}" type="button"
                            class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Choisir_Etape <i class="ik ik-chevron-down"></i></button>
                        <div class="dropdown-menu" id="{{ $procedure->ID_PROCEDURE }}">


                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <div id="exampleModal" style="width:100%;display:none">
            <div class="col-lg-12" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>

                    </div>

                    <div class="modal-body" id="modal_example">

                    </div>

                </div>
            </div>
        </div>




    </div>
    <!-- Modal -->




    <div class="modal" tabindex="-1" role="dialog" id="modification">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_modification"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="form_procedure" method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body" id="contenu_modification">

                    </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>


                    <div class="col-lg-6">
                        <div class="text-center" id="progres"></div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        var user = @json($user);
        $(document).ready(function() {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });



        });



        $(document).on('click', 'button[data-role=procedure]', function() {



            var id_procedure = $(this).data('id');

            var nom_procedure = $(this).data('nom');

            $.ajax({

                url: "{{ url('dossier/search/procedure') }}",
                method: "POST",
                data: {
                    id_procedure: id_procedure
                },
                dataType: "JSON",
                success: function(data) {



                    $.each(data, function(i, res) {


                        $('#' + id_procedure + '').append(
                            '<a class="dropdown-item" data-role="ouverture" data-id_etape="' +
                            res.id_etape + '" data-etape="' + res.etape +
                            '" data-procedure="' + id_procedure + '" data-nom="' +
                            nom_procedure + '" href="javascript:void(0)">' + res.etape +
                            ' <span class="badge badge-success" data-id="' + id_procedure +
                            '_' + res.id_etape + '"></span></a>');



                    });
                }


            });




        });



        $(document).on('mouseover', 'a[data-role=ouverture]', function() {

            var id_etape = $(this).data('id_etape');
            var procedure = $(this).data('procedure');






            $.ajax({

                url: "{{ url('consultations/etapes') }}",
                method: "POST",
                data: {
                    id_etape: id_etape,
                    procedure: procedure
                },
                dataType: "JSON",
                success: function(data) {



                    $('span[data-id="' + procedure + '_' + id_etape + '"]').html(data.length);





                }


            });










        });





        $(document).on('click', 'a[data-role=ouverture]', function() {

            var id_etape = $(this).data('id_etape');
            var etape = $(this).data('etape');
            var procedure = $(this).data('procedure');
            var nom_procedure = $(this).data('nom');








            $('#exampleModalLabel').html('' + nom_procedure + ' / ' + etape + ' / ' + user.CIN);

            $('#modal_example').html('');



            $.ajax({

                url: "{{ url('consultations/etapes') }}",
                method: "POST",
                data: {
                    id_etape: id_etape,
                    procedure: procedure
                },
                dataType: "JSON",
                success: function(data) {


                    if (id_etape == 1) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Requete</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Referance_Tribunal</th><th>Date_Depot</th><th>Date_Retrait</th><th>Juge</th><th>Date_Jugement</th><th>Etat_Requete</th><th>Fichier_Requete</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data, function(i, res) {

                            if (res.DATE_RETRAIT == null) {
                                res.DATE_RETRAIT = '';
                            }


                            if (res.DATE_JUGEMENT == null) {
                                res.DATE_JUGEMENT = '';
                            }

                            if (res.JUGE == null) {
                                res.JUGE = '';
                            }


                            if (res.ETAT_REQUETE == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_REQUETE == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                id_etape + '" data-nom_etape="' + etape +
                                '" data-nom_procedure="' + nom_procedure +
                                '" data-id_procedure="' + procedure +
                                '" data-id_requete="' + res.ID_REQUETE +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_depot="' + res.DATE_DEPOT +
                                '" data-date_retrait="' + res.DATE_RETRAIT +
                                '" data-reference_tribunal="' + res.REFERANCE_TRIBUNALE +
                                '" data-juge="' + res.JUGE + '" data-date_jugement="' + res
                                .DATE_JUGEMENT + '" data-etat_requete="' + res
                                .ETAT_REQUETE +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_REQUETE + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
                                .REFERANCE_TRIBUNALE + '</td><td>' + res.DATE_DEPOT +
                                '</td><td>' + res.DATE_RETRAIT + '</td><td>' + res.JUGE +
                                '</td><td>' + res.DATE_JUGEMENT + '</td><td>' + etat +
                                '</td><td><a href="storage/app/' + res.URL_SCAN +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (id_etape == 2) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Audiance</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Date_Creation</th><th>Juge_Audiance</th><th>Date_Audiance</th><th>Salle</th><th>Etat_AUD</th><th>Fichier_AUD</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data, function(i, res) {

                            if (res.DATE_CREATION == null) {
                                res.DATE_CREATION = '';
                            }


                            if (res.DATE_AUDIANCE == null) {
                                res.DATE_AUDIANCE = '';
                            }


                            if (res.ETAT_AUD == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_AUD == null) {
                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';
                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                id_etape + '" data-nom_etape="' + etape +
                                '" data-nom_procedure="' + nom_procedure +
                                '" data-id_procedure="' + procedure +
                                '" data-id_audiance="' + res.ID_AUDIANCE +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_creation="' + res.DATE_CREATION +
                                '" data-salle="' + res.SALLE + '" data-juge_audiance="' +
                                res.JUGE_AUD + '"  data-date_audiance="' + res
                                .DATE_AUDIANCE + '" data-etat_audiance="' + res.ETAT_AUD +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_AUDIANCE + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
                                .DATE_CREATION + '</td><td>' + res.JUGE_AUD + '</td><td>' +
                                res.DATE_AUDIANCE + '</td><td>' + res.SALLE + '</td><td>' +
                                etat + '</td><td><a href="storage/app/' + res.URL_AUD +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (id_etape == 3) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Jugement</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Ref_Tribunal</th><th>Juge</th><th>Date_Jugement</th><th>Sort</th><th>Etat_Jugement</th><th>Fichier_Jugement</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data, function(i, res) {




                            if (res.DATE_JUGEMENT == null) {
                                res.DATE_JUGEMENT = '';
                            }


                            if (res.ETAT_JUGEMENT == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_JUGEMENT == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                id_etape + '" data-nom_etape="' + etape +
                                '" data-nom_procedure="' + nom_procedure +
                                '" data-id_procedure="' + procedure +
                                '" data-id_jugement="' + res.ID_JUGEMENT +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_jugement="' + res.DATE_JUGEMENT +
                                '" data-sort="' + res.SORT + '" data-juge="' + res.JUGE +
                                '"  data-reference_tribunal="' + res.REF_TRIBU +
                                '" data-etat_jugement="' + res.ETAT_JUGEMENT +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_JUGEMENT + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
                                .REF_TRIBU + '</td><td>' + res.JUGE + '</td><td>' + res
                                .DATE_JUGEMENT + '</td><td>' + res.SORT + '</td><td>' +
                                etat + '</td><td><a href="storage/app/' + res.URL_JUGEMENT +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (id_etape == 4) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Notification</th><th>NUM_Notification</th><th>NUM_Dossier</th><th>Huissier</th><th>Date_Envoie</th><th>Date_Sort</th><th>Sort</th><th>Etat_Notification</th><th>Fichier_Sort</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data, function(i, res) {

                            if (res.DATE_SORT == null) {
                                res.DATE_SORT = '';
                            }


                            if (res.DATE_ENVOI_NOT == null) {
                                res.DATE_ENVOI_NOT = '';
                            }


                            if (res.ETAT_NOTIF == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_NOTIF == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                id_etape + '" data-nom_etape="' + etape +
                                '" data-nom_procedure="' + nom_procedure +
                                '" data-id_procedure="' + procedure +
                                '" data-id_notification="' + res.ID_NOTIFICATION +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_huissier="' + res.ID_HUISSIER +
                                '" data-date_envoie="' + res.DATE_ENVOI_NOT +
                                '" data-date_sort="' + res.DATE_SORT + '" data-sort="' + res
                                .SORT + '"  data-numero_notification="' + res
                                .NUM_NOTIFICATION + '" data-etat_notification="' + res
                                .ETAT_NOTIF +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_NOTIFICATION + '</td><td>' + res.NUM_NOTIFICATION +
                                '</td><td>' + res.NUM_DOSSIER + '</td><td>' + res.PRENOM +
                                '_' + res.NOM + '</td><td>' + res.DATE_ENVOI_NOT +
                                '</td><td>' + res.DATE_SORT + '</td><td>' + res.SORT +
                                '</td><td>' + etat + '</td><td><a href="storage/app/' + res
                                .PV_SORT +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (id_etape == 5) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_CNA</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Ref_CNA</th><th>Date_Demande</th><th>Date_Retrait</th><th>Num_Notification</th><th>Fichier_CNA</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data, function(i, res) {

                            if (res.DATE_DEM_CNA == null) {
                                res.DATE_DEM_CNA = '';
                            }

                            if (res.DATE_RET_CNA == null) {
                                res.DATE_RET_CNA = '';
                            }



                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                id_etape + '" data-nom_etape="' + etape +
                                '" data-nom_procedure="' + nom_procedure +
                                '" data-id_procedure="' + procedure + '" data-id_cna="' +
                                res.ID_CNA + '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_demande="' + res.DATE_DEM_CNA +
                                '" data-retrait="' + res.DATE_RET_CNA +
                                '"  data-reference_cna="' + res.REF_CNA +
                                '" data-numero_notification="' + res.N_NOTIFICATION +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_CNA + '</td><td>' + res.NUM_DOSSIER + '</td><td>' +
                                res.NOM_TRIBUNAL + '</td><td>' + res.REF_CNA + '</td><td>' +
                                res.DATE_DEM_CNA + '</td><td>' + res.DATE_RET_CNA +
                                '</td><td>' + res.N_NOTIFICATION +
                                '</td><td><a href="storage/app/' + res.URL_CNA +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (id_etape == 6) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Currateur</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Ref_Tribunal</th><th>Date_Ordonance</th><th>Date_Demande_Notif</th><th>Nom_Currateur</th><th>Date_Notif_Currateur</th><th>Date_Insert_Journal</th><th>Nom_Journal</th><th>Date_Retour</th><th>Etat_Currateur</th><th>Fichier_Currateur</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data, function(i, res) {

                            if (res.DATE_DEM_NOTIFICATION == null) {
                                res.DATE_DEM_NOTIFICATION = '';
                            }


                            if (res.DATE_NOT_CURRATEUR == null) {
                                res.DATE_NOT_CURRATEUR = '';
                            }


                            if (res.DATE_INSERTION_JOURNAL == null) {
                                res.DATE_INSERTION_JOURNAL = '';
                            }


                            if (res.ETAT_CURRATEUR == 0) {
                                res.ETAT_CURRATEUR =
                                    '<span class="badge badge-info">EN_COURS</span>';
                            }

                            $('#tbody').append(
                                '<tr><td><button data-role="update" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_CURRATEUR + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
                                .REF_TRIBUNAL + '</td><td>' + res.DATE_ORDONANCE +
                                '</td><td>' + res.DATE_DEM_NOTIFICATION + '</td><td>' + res
                                .NOM_CURRATEUR + '</td><td>' + res.DATE_NOT_CURRATEUR +
                                '</td><td>' + res.DATE_INSERTION_JOURNAL + '</td><td>' + res
                                .NOM_JOURNAL + '</td><td>' + res.DATE_RETOUR + '</td><td>' +
                                res.ETAT_CURRATEUR + '</td><td><a href="storage/app/' + res
                                .URL_CURRATEUR +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (id_etape == 7) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Execution</th><th>NUM_Dossier</th><th>Huissier</th><th>Reference_Execution</th><th>Date_Envoie</th><th>Date_Execution</th><th>Sort</th><th>Etat_Execution</th><th>Fichier_Execution</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data, function(i, res) {

                            if (res.DATE_EXECUTION == null) {
                                res.DATE_EXECUTION = '';
                            }



                            if (res.ETAT_EXEC == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_EXEC == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                id_etape + '" data-nom_etape="' + etape +
                                '" data-nom_procedure="' + nom_procedure +
                                '" data-id_procedure="' + procedure +
                                '" data-id_execution="' + res.ID_EXECUTION +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_huissier="' + res.ID_HUISSIER +
                                '" data-date_envoie="' + res.DATE_ENVOI +
                                '" data-date_execution="' + res.DATE_EXECUTION +
                                '" data-sort="' + res.SORT +
                                '" data-reference_execution="' + res.REF_EXECUTION +
                                '" data-etat_execution="' + res.ETAT_EXEC +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_EXECUTION + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.PRENOM + '_' + res.NOM + '</td><td>' + res
                                .REF_EXECUTION + '</td><td>' + res.DATE_ENVOI +
                                '</td><td>' + res.DATE_EXECUTION + '</td><td>' + res.SORT +
                                '</td><td>' + etat + '</td><td><a href="storage/app/' + res
                                .PV +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (id_etape == 11) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Plainte</th><th>NUM_Dossier</th><th>Tribunal</th><th>Reference_Plainte</th><th>Date_Depot</th><th>Date_Envoie</th><th>Procedure</th><th>Arrendissement_Police</th><th>Sort_Plainte</th><th>Type_Plainte</th><th>Etat_Plainte</th><th>Fichier_Plainte</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data, function(i, res) {

                            if (res.DATE_ENVOI_P == null) {
                                res.DATE_ENVOI_P = '';
                            }


                            if (res.DATE_DEPOT == null) {
                                res.DATE_DEPOT = '';
                            }

                            if (res.ARRENDISSEMENT_POLICE == null) {
                                res.ARRENDISSEMENT_POLICE = '';
                            }


                            if (res.ETAT_PLAINTE == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_PLAINTE == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                id_etape + '" data-nom_etape="' + etape +
                                '" data-nom_procedure="' + nom_procedure +
                                '" data-id_procedure="' + procedure +
                                '" data-id_plainte="' + res.ID_PLAINTE +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_envoie="' + res.DATE_ENVOI_P +
                                '" data-date_depot="' + res.DATE_DEPOT +
                                '" data-sort_plainte="' + res.SORT_PLAINTE +
                                '" data-type_plainte="' + res.TYPE_PLAINTE +
                                '" data-arrendissement_police="' + res
                                .ARRENDISSEMENT_POLICE + '" data-procureure="' + res
                                .PROCUREURE + '" data-reference_plainte="' + res
                                .REF_PLAINTE + '" data-etat_plainte="' + res.ETAT_PLAINTE +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_PLAINTE + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
                                .REF_PLAINTE + '</td><td>' + res.DATE_DEPOT + '</td><td>' +
                                res.DATE_ENVOI_P + '</td><td>' + res.PROCUREURE +
                                '</td><td>' + res.ARRENDISSEMENT_POLICE + '</td><td>' + res
                                .SORT_PLAINTE + '</td><td>' + res.TYPE_PLAINTE +
                                '</td><td>' + etat + '</td><td><a href="storage/app/' + res
                                .URL_PLAINTE +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    }








                }


            });










        });


        $(document).on('click', 'button[data-role=update]', function() {
            $('#contenu_modification').html('');
            var id_etape = $(this).data('id_etape');

            var nom_etape = $(this).data('nom_etape');

            var nom_procedure = $(this).data('nom_procedure');

            var id_procedure = $(this).data('id_procedure');


            if (id_etape == 1) {


                var id_requete = $(this).data('id_requete');
                var reference_tribunal = $(this).data('reference_tribunal');
                var num_dossier = $(this).data('num_dossier');
                var id_tribunal = $(this).data('id_tribunal');


                var date_depot = $(this).data('date_depot');
                var date_retrait = $(this).data('date_retrait');
                var juge = $(this).data('juge');
                var date_jugement = $(this).data('date_jugement');
                var etat_requete = $(this).data('etat_requete');


                $('#title_modification').html(nom_procedure + ' / ' + nom_etape + ' :' + id_requete + ' / ' + user
                    .CIN);




                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="id_etape" name="id_etape" value="' +
                    id_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_etape" name="nom_etape" value="' +
                    nom_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_procedure" name="id_procedure" value="' +
                    id_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_procedure" name="nom_procedure" value="' +
                    nom_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_requete" name="id_requete" value="' +
                    id_requete +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir_Tribunal--</option>@foreach ($tribunal as $tribunal)<option value="{{ $tribunal->ID_TRIBUNAL }}">{{ $tribunal->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Referance_Tribunal</label><input type="text" class="form-control text-center" id="reference_tribunal" name="reference_tribunal" value="' +
                    reference_tribunal +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Depot</label><input type="date" class="form-control text-center" id="date_depot" name="date_depot" value="' +
                    date_depot +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Retrait</label><input type="date" class="form-control text-center" id="date_retrait" name="date_retrait" value="' +
                    date_retrait +
                    '"></div></div><div class="col-lg-6"><div class="form-group"><label>Juge</label><input type="text" class="form-control text-center" id="juge" name="juge" value="' +
                    juge +
                    '"></div></div><div class="col-lg-6"><div class="form-group"><label>Date_Jugement</label><input type="date" class="form-control text-center" id="date_jugement" name="date_jugement" value="' +
                    date_jugement +
                    '"></div></div><div class="col-lg-6"><div class="form-group"><label>Etat_Requete</label><select class="form-control text-center" id="etat_requete" name="etat_requete"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Requete</label><input type="file" name="fichier_requete" id="fichier_requete" class="form-control text-center"></div></div></div>'
                );


                $('select[id=etat_requete]').val(etat_requete).change();




                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });

                $('select[id=id_tribunal]').val(id_tribunal).change();

            }
            if (id_etape == 2) {


                var id_audiance = $(this).data('id_audiance');

                var num_dossier = $(this).data('num_dossier');
                var id_tribunal = $(this).data('id_tribunal');


                var date_creation = $(this).data('date_creation');
                var date_audiance = $(this).data('date_audiance');
                var salle = $(this).data('salle');
                var juge_audiance = $(this).data('juge_audiance');
                var etat_audiance = $(this).data('etat_audiance');


                $('#title_modification').html(nom_procedure + ' / ' + nom_etape + ' :' + id_audiance + ' / ' + user
                    .CIN);




                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="id_etape" name="id_etape" value="' +
                    id_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_etape" name="nom_etape" value="' +
                    nom_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_procedure" name="id_procedure" value="' +
                    id_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_procedure" name="nom_procedure" value="' +
                    nom_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_audiance" name="id_audiance" value="' +
                    id_audiance +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir_Tribunal--</option>@foreach ($tribunal1 as $tribunal1)<option value="{{ $tribunal1->ID_TRIBUNAL }}">{{ $tribunal1->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Creation</label><input type="date" class="form-control text-center" id="date_creation" name="date_creation" value="' +
                    date_creation +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Audiance</label><input type="date" class="form-control text-center" id="date_audiance" name="date_audiance" value="' +
                    date_audiance +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Juge</label><input type="text" class="form-control text-center" id="juge_audiance" name="juge_audiance" value="' +
                    juge_audiance +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Salle</label><input type="text" class="form-control text-center" id="salle" name="salle" value="' +
                    salle +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Etat_Requete</label><select class="form-control text-center" id="etat_audiance" name="etat_audiance"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Audiance</label><input type="file" name="fichier_audiance" id="fichier_audiance" class="form-control text-center"></div></div></div> '
                );


                $('select[id=etat_audiance]').val(etat_audiance).change();




                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });

                $('select[id=id_tribunal]').val(id_tribunal).change();

            }
            if (id_etape == 3) {


                var id_jugement = $(this).data('id_jugement');

                var num_dossier = $(this).data('num_dossier');
                var id_tribunal = $(this).data('id_tribunal');


                var reference_tribunal = $(this).data('reference_tribunal');
                var date_jugement = $(this).data('date_jugement');
                var sort = $(this).data('sort');
                var juge = $(this).data('juge');
                var etat_jugement = $(this).data('etat_jugement');


                $('#title_modification').html(nom_procedure + ' / ' + nom_etape + ' :' + id_jugement + ' / ' + user
                    .CIN);




                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="id_etape" name="id_etape" value="' +
                    id_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_etape" name="nom_etape" value="' +
                    nom_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_procedure" name="id_procedure" value="' +
                    id_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_procedure" name="nom_procedure" value="' +
                    nom_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_jugement" name="id_jugement" value="' +
                    id_jugement +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir_Tribunal--</option>@foreach ($tribunal2 as $tribunal2)<option value="{{ $tribunal2->ID_TRIBUNAL }}">{{ $tribunal2->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Jugement</label><input type="date" class="form-control text-center" id="date_jugement" name="date_jugement" value="' +
                    date_jugement +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Ref_Tribunal</label><input type="text" class="form-control text-center" id="reference_tribunal" name="reference_tribunal" value="' +
                    reference_tribunal +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Juge</label><input type="text" class="form-control text-center" id="juge" name="juge" value="' +
                    juge +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Sort</label><input type="text" class="form-control text-center" id="sort_jugement" name="sort_jugement" value="' +
                    sort +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Etat_Jugement</label><select class="form-control text-center" id="etat_jugement" name="etat_jugement"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Jugement</label><input type="file" name="fichier_jugement" id="fichier_jugement" class="form-control text-center"></div></div></div> '
                );


                $('select[id=etat_jugement]').val(etat_jugement).change();




                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });

                $('select[id=id_tribunal]').val(id_tribunal).change();

            }
            if (id_etape == 4) {


                var id_notification = $(this).data('id_notification');

                var num_dossier = $(this).data('num_dossier');
                var id_huissier = $(this).data('id_huissier');


                var numero_notification = $(this).data('numero_notification');
                var date_envoie = $(this).data('date_envoie');
                var sort = $(this).data('sort');
                var date_sort = $(this).data('date_sort');
                var etat_notification = $(this).data('etat_notification');


                $('#title_modification').html(nom_procedure + ' / ' + nom_etape + ' :' + id_notification + ' / ' +
                    user.CIN);




                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="id_etape" name="id_etape" value="' +
                    id_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_etape" name="nom_etape" value="' +
                    nom_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_procedure" name="id_procedure" value="' +
                    id_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_procedure" name="nom_procedure" value="' +
                    nom_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_notification" name="id_notification" value="' +
                    id_notification +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Huissier</label><select class="form-control text-center" id="id_huissier" name="id_huissier"><option value="" disabled>--Choisir_Huissier--</option>@foreach ($huissier as $huissier)<option value="{{ $huissier->ID_HUISSIER }}">{{ $huissier->PRENOM }} {{ $huissier->NOM }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Envoie</label><input type="date" class="form-control text-center" id="date_envoie" name="date_envoie" value="' +
                    date_envoie +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Sort</label><input type="date" class="form-control text-center" id="date_sort" name="date_sort" value="' +
                    date_sort +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Numero_Notification</label><input type="text" class="form-control text-center" id="numero_notification" name="numero_notification" value="' +
                    numero_notification +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Sort</label><input type="text" class="form-control text-center" id="sort_notification" name="sort_notification" value="' +
                    sort +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Etat_Jugement</label><select class="form-control text-center" id="etat_notification" name="etat_notification"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Jugement</label><input type="file" name="fichier_notification" id="fichier_notification" class="form-control text-center"></div></div></div> '
                );


                $('select[id=etat_notification]').val(etat_notification).change();




                $('select[id=id_huissier]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });

                $('select[id=id_huissier').val(id_huissier).change();

            }
            if (id_etape == 5) {


                var id_cna = $(this).data('id_cna');

                var num_dossier = $(this).data('num_dossier');
                var id_tribunal = $(this).data('id_tribunal');


                var date_demande = $(this).data('date_demande');
                var date_retrait = $(this).data('date_retrait');
                var numero_notification = $(this).data('numero_notification');
                var reference_cna = $(this).data('reference_cna');


                $('#title_modification').html(nom_procedure + ' / ' + nom_etape + ' :' + id_cna + ' / ' + user
                    .CIN);




                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="id_etape" name="id_etape" value="' +
                    id_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_etape" name="nom_etape" value="' +
                    nom_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_procedure" name="id_procedure" value="' +
                    id_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_procedure" name="nom_procedure" value="' +
                    nom_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_cna" name="id_cna" value="' +
                    id_cna +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-4"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir_Tribunal--</option>@foreach ($tribunal3 as $tribunal3)<option value="{{ $tribunal3->ID_TRIBUNAL }}">{{ $tribunal3->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-4"><div class="form-group"><label>Date_Demande_Cna</label><input type="date" class="form-control text-center" id="date_demande" name="date_demande" value="' +
                    date_demande +
                    '"></div></div><div class="col-lg-4"><div class="form-group"><label>Date_Retrait_Cna</label><input type="date" class="form-control text-center" id="date_retrait" name="date_retrait" value="' +
                    date_retrait +
                    '"></div></div><div class="col-lg-4"><div class="form-group"><label>Numero_Notification</label><input type="text" class="form-control text-center" id="numero_notification" name="numero_notification" value="' +
                    numero_notification +
                    '"></div></div><div class="col-lg-4"><div class="form-group"><label>Reference_Cna</label><input type="text" class="form-control text-center" id="reference_cna" name="reference_cna" value="' +
                    reference_cna +
                    '"></div></div><div class="col-lg-4"><div class="form-group"><label>Fichier_Cna</label><input type="file" name="fichier_cna" id="fichier_cna" class="form-control text-center"></div></div></div>'
                );






                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });

                $('select[id=id_tribunal]').val(id_tribunal).change();

            }
            if (id_etape == 7) {


                var id_execution = $(this).data('id_execution');

                var num_dossier = $(this).data('num_dossier');
                var id_huissier = $(this).data('id_huissier');

                var reference_execution = $(this).data('reference_execution')
                var date_envoie = $(this).data('date_envoie');
                var sort = $(this).data('sort');
                var date_execution = $(this).data('date_execution');
                var etat_execution = $(this).data('etat_execution');


                $('#title_modification').html(nom_procedure + ' / ' + nom_etape + ' :' + id_execution + ' / ' +
                    user.CIN);




                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="id_etape" name="id_etape" value="' +
                    id_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_etape" name="nom_etape" value="' +
                    nom_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_procedure" name="id_procedure" value="' +
                    id_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_procedure" name="nom_procedure" value="' +
                    nom_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_execution" name="id_execution" value="' +
                    id_execution +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Huissier</label><select class="form-control text-center" id="id_huissier" name="id_huissier"><option value="" disabled>--Choisir_Huissier--</option>@foreach ($huissier1 as $huissier1)<option value="{{ $huissier1->ID_HUISSIER }}">{{ $huissier1->PRENOM }} {{ $huissier1->NOM }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Envoie</label><input type="date" class="form-control text-center" id="date_envoie" name="date_envoie" value="' +
                    date_envoie +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Execution</label><input type="date" class="form-control text-center" id="date_execution" name="date_execution" value="' +
                    date_execution +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Reference_Execution</label><input type="text" class="form-control text-center" id="reference_execution" name="reference_execution" value="' +
                    reference_execution +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Sort</label><input type="text" class="form-control text-center" id="sort_execution" name="sort_execution" value="' +
                    sort +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Etat_Execution</label><select class="form-control text-center" id="etat_execution" name="etat_execution"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Jugement</label><input type="file" name="fichier_execution" id="fichier_execution" class="form-control text-center"></div></div></div> '
                );


                $('select[id=etat_execution]').val(etat_execution).change();




                $('select[id=id_huissier]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });

                $('select[id=id_huissier').val(id_huissier).change();

            }
            if (id_etape == 11) {


                var id_plainte = $(this).data('id_plainte');
                var reference_plainte = $(this).data('reference_plainte');
                var num_dossier = $(this).data('num_dossier');
                var id_tribunal = $(this).data('id_tribunal');


                var date_depot = $(this).data('date_depot');
                var date_envoie = $(this).data('date_envoie');
                var sort_plainte = $(this).data('sort_plainte');
                var procureure = $(this).data('procureure');
                var arrendissement_police = $(this).data('arrendissement_police');
                var etat_plainte = $(this).data('etat_plainte');
                var type_plainte = $(this).data('type_plainte');


                $('#title_modification').html(nom_procedure + ' / ' + nom_etape + ' :' + id_plainte + ' / ' + user
                    .CIN);




                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="id_etape" name="id_etape" value="' +
                    id_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_etape" name="nom_etape" value="' +
                    nom_etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_procedure" name="id_procedure" value="' +
                    id_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="nom_procedure" name="nom_procedure" value="' +
                    nom_procedure +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_plainte" name="id_plainte" value="' +
                    id_plainte +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir_Tribunal--</option>@foreach ($tribunal4 as $tribunal4)<option value="{{ $tribunal4->ID_TRIBUNAL }}">{{ $tribunal4->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Referance_Tribunal</label><input type="text" class="form-control text-center" id="reference_plainte" name="reference_plainte" value="' +
                    reference_plainte +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Depot</label><input type="date" class="form-control text-center" id="date_depot" name="date_depot" value="' +
                    date_depot +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Envoie</label><input type="date" class="form-control text-center" id="date_envoie" name="date_envoie" value="' +
                    date_envoie +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Arrendissement_Police</label><input type="date" class="form-control text-center" id="arrendissement_police" name="arrendissement_police" value="' +
                    arrendissement_police +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Procureure</label><input type="text" class="form-control text-center" id="procureure" name="procureure" value="' +
                    procureure +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Sort_Plainte</label><input type="text" class="form-control text-center" id="sort_plainte" name="sort_plainte" value="' +
                    sort_plainte +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Type_Plainte</label><input type="text" class="form-control text-center" id="type_plainte" name="type_plainte" value="' +
                    type_plainte +
                    '"></div></div><div class="col-lg-6"><div class="form-group"><label>Etat_Plainte</label><select class="form-control text-center" id="etat_plainte" name="etat_plainte"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Requete</label><input type="file" name="fichier_plainte" id="fichier_plainte" class="form-control text-center"></div></div></div>'
                );


                $('select[id=etat_plainte]').val(etat_plainte).change();




                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });

                $('select[id=id_tribunal]').val(id_tribunal).change();

            }
        });




        // audiance

        $("#form_procedure").submit(function(e) {
            e.preventDefault();
            var form = $('#form_procedure').get(0);
            var formData = new FormData(form); // get the form data
            $.ajax({
                url: "{{ url('consultations/update') }}",
                method: "POST",
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                // beforeSend: function(x) {
                //     $('#progres').html("<progress id='bar' value='0' max='100'></progress>").show();

                //     $('#bar').val(25);

                //     setTimeout(function() {

                //         $('#bar').val(50);
                //     }, 1000);
                //     setTimeout(function() {

                //         $('#bar').val(75);
                //     }, 1000);
                // },
                success: function(data) {
                    // $('#progres').hide();
                    $('#modification').modal('toggle');
                    swal({
                        title: "Mise A Jour Effectuée",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true,
                    });
                    if (data[0][0].id_etape == 1) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Requete</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Referance_Tribunal</th><th>Date_Depot</th><th>Date_Retrait</th><th>Juge</th><th>Date_Jugement</th><th>Etat_Requete</th><th>Fichier_Requete</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data[1], function(i, res) {

                            if (res.DATE_RETRAIT == null) {
                                res.DATE_RETRAIT = '';
                            }


                            if (res.DATE_JUGEMENT == null) {
                                res.DATE_JUGEMENT = '';
                            }

                            if (res.JUGE == null) {
                                res.JUGE = '';
                            }


                            if (res.ETAT_REQUETE == 0) {
                                var etat = '<span class="badge badge-info">En Cours</span>';
                            } else if (res.ETAT_REQUETE == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">Fermé</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                data[0][0].id_etape + '" data-nom_etape="' + data[0][0]
                                .nom_etape + '" data-nom_procedure="' + data[0][0]
                                .nom_procedure + '" data-id_procedure="' + data[0][0]
                                .id_procedure + '" data-id_requete="' + res.ID_REQUETE +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_depot="' + res.DATE_DEPOT +
                                '" data-date_retrait="' + res.DATE_RETRAIT +
                                '" data-reference_tribunal="' + res.REFERANCE_TRIBUNALE +
                                '" data-juge="' + res.JUGE + '" data-date_jugement="' + res
                                .DATE_JUGEMENT + '" data-etat_requete="' + res
                                .ETAT_REQUETE +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_REQUETE + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
                                .REFERANCE_TRIBUNALE + '</td><td>' + res.DATE_DEPOT +
                                '</td><td>' + res.DATE_RETRAIT + '</td><td>' + res.JUGE +
                                '</td><td>' + res.DATE_JUGEMENT + '</td><td>' + etat +
                                '</td><td><a href="storage/app/' + res.URL_SCAN +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (data[0][0].id_etape == 2) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Audiance</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Date_Creation</th><th>Juge_Audiance</th><th>Date_Audiance</th><th>Salle</th><th>Etat_AUD</th><th>Fichier_AUD</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data[1], function(i, res) {

                            if (res.DATE_RETRAIT == null) {
                                res.DATE_RETRAIT = '';
                            }


                            if (res.ETAT_AUD == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_AUD == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                data[0][0].id_etape + '" data-nom_etape="' + data[0][0]
                                .nom_etape + '" data-nom_procedure="' + data[0][0]
                                .nom_procedure + '" data-id_procedure="' + data[0][0]
                                .id_procedure + '"  data-id_audiance="' + res.ID_AUDIANCE +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_jugement="' + res.DATE_JUGEMENT +
                                '" data-date_creation="' + res.DATE_CREATION +
                                '" data-salle="' + res.SALLE + '" data-juge_audiance="' +
                                res.JUGE_AUD + '"  data-date_creation="' + res
                                .DATE_CREATION + '" data-etat_audiance="' + res.ETAT_AUD +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_AUDIANCE + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
                                .DATE_CREATION + '</td><td>' + res.JUGE_AUD + '</td><td>' +
                                res.DATE_AUDIANCE + '</td><td>' + res.SALLE + '</td><td>' +
                                etat + '</td><td><a href="storage/app/' + res.URL_AUD +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (data[0][0].id_etape == 3) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Jugement</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Ref_Tribunal</th><th>Juge</th><th>Date_Jugement</th><th>Sort</th><th>Etat_Jugement</th><th>Fichier_Jugement</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data[1], function(i, res) {




                            if (res.DATE_JUGEMENT == null) {
                                res.DATE_JUGEMENT = '';
                            }


                            if (res.ETAT_JUGEMENT == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_JUGEMENT == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                data[0][0].id_etape + '" data-nom_etape="' + data[0][0]
                                .nom_etape + '" data-nom_procedure="' + data[0][0]
                                .nom_procedure + '" data-id_procedure="' + data[0][0]
                                .id_procedure + '" data-id_jugement="' + res.ID_JUGEMENT +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_jugement="' + res.DATE_JUGEMENT +
                                '" data-sort="' + res.SORT + '" data-juge="' + res.JUGE +
                                '"  data-reference_tribunal="' + res.REF_TRIBU +
                                '" data-etat_jugement="' + res.ETAT_JUGEMENT +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_JUGEMENT + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
                                .REF_TRIBU + '</td><td>' + res.JUGE + '</td><td>' + res
                                .DATE_JUGEMENT + '</td><td>' + res.SORT + '</td><td>' +
                                etat + '</td><td><a href="storage/app/' + res.URL_JUGEMENT +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (data[0][0].id_etape == 4) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Notification</th><th>NUM_Notification</th><th>NUM_Dossier</th><th>Huissier</th><th>Date_Envoie</th><th>Date_Sort</th><th>Sort</th><th>Etat_Notification</th><th>Fichier_Sort</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data[1], function(i, res) {

                            if (res.DATE_SORT == null) {
                                res.DATE_SORT = '';
                            }


                            if (res.DATE_ENVOI_NOT == null) {
                                res.DATE_ENVOI_NOT = '';
                            }


                            if (res.ETAT_NOTIF == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_NOTIF == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update"  data-id_etape="' +
                                data[0][0].id_etape + '" data-nom_etape="' + data[0][0]
                                .nom_etape + '" data-nom_procedure="' + data[0][0]
                                .nom_procedure + '" data-id_procedure="' + data[0][0]
                                .id_procedure + '" data-id_notification="' + res
                                .ID_NOTIFICATION + '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_huissier="' + res.ID_HUISSIER +
                                '" data-date_envoie="' + res.DATE_ENVOI_NOT +
                                '" data-date_sort="' + res.DATE_SORT + '" data-sort="' + res
                                .SORT + '"  data-numero_notification="' + res
                                .NUM_NOTIFICATION + '" data-etat_notification="' + res
                                .ETAT_NOTIF +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_NOTIFICATION + '</td><td>' + res.NUM_NOTIFICATION +
                                '</td><td>' + res.NUM_DOSSIER + '</td><td>' + res.PRENOM +
                                '_' + res.NOM + '</td><td>' + res.DATE_ENVOI_NOT +
                                '</td><td>' + res.DATE_SORT + '</td><td>' + res.SORT +
                                '</td><td>' + etat + '</td><td><a href="storage/app/' + res
                                .PV_SORT +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (data[0][0].id_etape == 5) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_CNA</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Ref_CNA</th><th>Date_Demande</th><th>Date_Retrait</th><th>Num_Notification</th><th>Fichier_CNA</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data[1], function(i, res) {

                            if (res.DATE_DEM_CNA == null) {
                                res.DATE_DEM_CNA = '';
                            }

                            if (res.DATE_RET_CNA == null) {
                                res.DATE_RET_CNA = '';
                            }



                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                data[0][0].id_etape + '" data-nom_etape="' + data[0][0]
                                .nom_etape + '" data-nom_procedure="' + data[0][0]
                                .nom_procedure + '" data-id_procedure="' + data[0][0]
                                .id_procedure + '" data-id_cna="' + res.ID_CNA +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_demande="' + res.DATE_DEM_CNA +
                                '" data-retrait="' + res.DATE_RET_CNA +
                                '"  data-reference_cna="' + res.REF_CNA +
                                '" data-numero_notification="' + res.N_NOTIFICATION +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_CNA + '</td><td>' + res.NUM_DOSSIER + '</td><td>' +
                                res.NOM_TRIBUNAL + '</td><td>' + res.REF_CNA + '</td><td>' +
                                res.DATE_DEM_CNA + '</td><td>' + res.DATE_RET_CNA +
                                '</td><td>' + res.N_NOTIFICATION +
                                '</td><td><a href="storage/app/' + res.URL_CNA +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (data[0][0].id_etape == 7) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Execution</th><th>NUM_Dossier</th><th>Huissier</th><th>Reference_Execution</th><th>Date_Envoie</th><th>Date_Execution</th><th>Sort</th><th>Etat_Execution</th><th>Fichier_Execution</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data[1], function(i, res) {

                            if (res.DATE_EXECUTION == null) {
                                res.DATE_EXECUTION = '';
                            }



                            if (res.ETAT_EXEC == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_EXEC == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                data[0][0].id_etape + '" data-nom_etape="' + data[0][0]
                                .nom_etape + '" data-nom_procedure="' + data[0][0]
                                .nom_procedure + '" data-id_procedure="' + data[0][0]
                                .id_procedure + '" data-id_execution="' + res.ID_EXECUTION +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_huissier="' + res.ID_HUISSIER +
                                '" data-date_envoie="' + res.DATE_ENVOI +
                                '" data-date_execution="' + res.DATE_EXECUTION +
                                '" data-sort="' + res.SORT +
                                '" data-reference_execution="' + res.REF_EXECUTION +
                                '" data-etat_execution="' + res.ETAT_EXEC +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_EXECUTION + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.PRENOM + '_' + res.NOM + '</td><td>' + res
                                .REF_EXECUTION + '</td><td>' + res.DATE_ENVOI +
                                '</td><td>' + res.DATE_EXECUTION + '</td><td>' + res.SORT +
                                '</td><td>' + etat + '</td><td><a href="storage/app/' + res
                                .PV +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    } else if (data[0][0].id_etape == 11) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Plainte</th><th>NUM_Dossier</th><th>Tribunal</th><th>Reference_Plainte</th><th>Date_Depot</th><th>Date_Envoie</th><th>Procedure</th><th>Arrendissement_Police</th><th>Sort_Plainte</th><th>Type_Plainte</th><th>Etat_Plainte</th><th>Fichier_Plainte</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data[1], function(i, res) {

                            if (res.DATE_ENVOI_P == null) {
                                res.DATE_ENVOI_P = '';
                            }


                            if (res.DATE_DEPOT == null) {
                                res.DATE_DEPOT = '';
                            }

                            if (res.ARRENDISSEMENT_POLICE == null) {
                                res.ARRENDISSEMENT_POLICE = '';
                            }


                            if (res.ETAT_PLAINTE == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_PLAINTE == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-id_etape="' +
                                data[0][0].id_etape + '" data-nom_etape="' + data[0][0]
                                .nom_etape + '" data-nom_procedure="' + data[0][0]
                                .nom_procedure + '" data-id_procedure="' + data[0][0]
                                .id_procedure + '" data-id_plainte="' + res.ID_PLAINTE +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + res.NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_envoie="' + res.DATE_ENVOI_P +
                                '" data-date_depot="' + res.DATE_DEPOT +
                                '" data-sort_plainte="' + res.SORT_PLAINTE +
                                '" data-type_plainte="' + res.TYPE_PLAINTE +
                                '" data-arrendissement_police="' + res
                                .ARRENDISSEMENT_POLICE + '" data-procureure="' + res
                                .PROCUREURE + '" data-reference_plainte="' + res
                                .REF_PLAINTE + '" data-etat_plainte="' + res.ETAT_PLAINTE +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_PLAINTE + '</td><td>' + res.NUM_DOSSIER +
                                '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
                                .REF_PLAINTE + '</td><td>' + res.DATE_DEPOT + '</td><td>' +
                                res.DATE_ENVOI_P + '</td><td>' + res.PROCUREURE +
                                '</td><td>' + res.ARRENDISSEMENT_POLICE + '</td><td>' + res
                                .SORT_PLAINTE + '</td><td>' + res.TYPE_PLAINTE +
                                '</td><td>' + etat + '</td><td><a href="storage/app/' + res
                                .URL_PLAINTE +
                                '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
                            );


                        });




                    }
                }
            });
        });


        var tribunaux = @json($tribunaux);
        var dossiers = @json($dossiers);
        var huissiers = @json($huissiers);
        $(document).on('click', 'button[data-role=affichage]', function() {
            var etape = $(this).data('etape');
            $('#modal_example').html('');
            $.ajax({
                url: "{{ url('/consultations/search/etape') }}",
                method: "POST",
                data: {
                    etape: etape
                },
                dataType: "JSON",
                success: function(data) {
                    if (etape === 1) {
                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID Requete</th><th>NUM Dossier</th><th>Nom Tribunal</th><th>Referance De Tribunal</th><th>Date De Dépot</th><th>Date De Retrait</th><th>Juge</th><th>Date De Jugement</th><th>Etat_Requete</th><th>Fichier De Requete</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );
                        $.each(data, function(i, res) {
                            var document = '/requete/' + res.URL_SCAN + '';
                            var tribunal = tribunaux.filter((tribunal) => tribunal
                                .ID_TRIBUNAL === res.ID_TRIBUNAL)
                            var dossier = dossiers.filter((dossier) => dossier
                                .ID_DOSSIER === res.ID_DOSSIER)
                            if (res.DATE_RETRAIT == null) {
                                res.DATE_RETRAIT = '';
                            }
                            if (res.DATE_JUGEMENT == null) {
                                res.DATE_JUGEMENT = '';
                            }
                            if (res.JUGE == null) {
                                res.JUGE = '';
                            }
                            if (res.ETAT_REQUETE == 0) {
                                var etat = '<span class="badge badge-info">En Cours</span>';
                            } else if (res.ETAT_REQUETE == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">Fermé</span>';

                            }
                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="modify"' +

                                '" data-etape="' + etape +
                                '" data-id_requete="' + res.ID_REQUETE +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + tribunal[0].NOM_TRIBUNAL +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_depot="' + res.DATE_DEPOT +
                                '" data-date_retrait="' + res.DATE_RETRAIT +
                                '" data-reference_tribunal="' + res.REFERANCE_TRIBUNALE +
                                '" data-juge="' + res.JUGE + '" data-date_jugement="' + res
                                .DATE_JUGEMENT + '" data-etat_requete="' + res
                                .ETAT_REQUETE +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_REQUETE + '</td><td>' + dossier[0].NUM_DOSSIER +
                                '</td><td>' + tribunal[0].NOM_TRIBUNAL + '</td><td>' + res
                                .REFERANCE_TRIBUNALE + '</td><td>' + res.DATE_DEPOT +
                                '</td><td>' + res.DATE_RETRAIT + '</td><td>' + res.JUGE +
                                '</td><td>' + res.DATE_JUGEMENT + '</td><td>' + etat +
                                '</td>' +
                                // '<td><a href="storage/app/' + res.URL_SCAN +
                                // '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td>'
                                '<td>' + (res.URL_SCAN === null ?
                                    "Pas De Fichier" :
                                    '<a href="' + document +
                                    '" target="_blank" style="color:blue;text-decoration: underline">' +
                                    res.URL_SCAN + '</a>') + '</td>' +
                                '</tr>'
                            );

                        });




                    } else if (etape === 2) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID Audiance</th><th>NUM Dossier</th><th>Nom De Tribunal</th><th>Date De Creation</th><th>Juge D\'audiance</th><th>Date D\'audiance</th><th>Salle</th><th>Etat_AUD</th><th>Fichier D\'audiance</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );
                        $.each(data, function(i, res) {
                            var document = '/audiance/' + res.URL_SCAN + '';
                            var tribunal = tribunaux.filter((tribunal) => tribunal
                                .ID_TRIBUNAL === res.ID_TRIBUNAL)
                            var dossier = dossiers.filter((dossier) => dossier
                                .ID_DOSSIER === res.ID_DOSSIER)
                            if (res.DATE_CREATION == null) {
                                res.DATE_CREATION = '';
                            }
                            if (res.DATE_AUDIANCE == null) {
                                res.DATE_AUDIANCE = '';
                            }
                            if (res.ETAT_AUD == 0) {
                                var etat = '<span class="badge badge-info">En Cours</span>';
                            } else if (res.ETAT_AUD == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">Fermé</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="modify" ' +
                                '" data-etape="' + etape +
                                '" data-id_audiance="' + res.ID_AUDIANCE +
                                // '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + dossier[0].NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_creation="' + res.DATE_CREATION +
                                '" data-salle="' + res.SALLE + '" data-juge_audiance="' +
                                res.JUGE_AUD + '"  data-date_audiance="' + res
                                .DATE_AUDIANCE + '" data-etat_audiance="' + res.ETAT_AUD +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_AUDIANCE + '</td><td>' + dossier[0].NUM_DOSSIER +
                                '</td><td>' + tribunal[0].NOM_TRIBUNAL + '</td><td>' + res
                                .DATE_CREATION + '</td><td>' + res.JUGE_AUD + '</td><td>' +
                                res.DATE_AUDIANCE + '</td><td>' + res.SALLE + '</td><td>' +
                                etat + '</td>' +
                                // '<td><a href="storage/app/' + res.URL_AUD +
                                // '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td>'
                                '<td>' + (res.URL_AUD === null ?
                                    "Pas De Fichier" :
                                    '<a href="' + document +
                                    '" target="_blank" style="color:blue;text-decoration: underline">' +
                                    res.URL_AUD + '</a>') + '</td>' +
                                '</tr>'
                            );


                        });




                    } else if (etape == 3) {
                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID Jugement</th><th>NUM Dossier</th><th>Nom De Tribunal</th><th>Ref Tribunal</th><th>Juge</th><th>Date De Jugement</th><th>Sort</th><th>Etat De Jugement</th><th>Fichier De Jugement</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );
                        $.each(data, function(i, res) {
                            var document = '/jugement/' + res.URL_SCAN + '';

                            var tribunal = tribunaux.filter((tribunal) => tribunal
                                .ID_TRIBUNAL === res.ID_TRIBUNAL)
                            var dossier = dossiers.filter((dossier) => dossier
                                .ID_DOSSIER === res.ID_DOSSIER)
                            if (res.DATE_JUGEMENT == null) {
                                res.DATE_JUGEMENT = '';
                            }
                            if (res.ETAT_JUGEMENT == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_JUGEMENT == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="modify" ' +
                                '" data-etape="' + etape +
                                '" data-id_jugement="' + res.ID_JUGEMENT +
                                // '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + dossier[0].NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_jugement="' + res.DATE_JUGEMENT +
                                '" data-sort="' + res.SORT + '" data-juge="' + res.JUGE +
                                '"  data-reference_tribunal="' + res.REF_TRIBU +
                                '" data-etat_jugement="' + res.ETAT_JUGEMENT +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_JUGEMENT + '</td><td>' + dossier[0].NUM_DOSSIER +
                                '</td><td>' + tribunal[0].NOM_TRIBUNAL + '</td><td>' + res
                                .REF_TRIBU + '</td><td>' + res.JUGE + '</td><td>' + res
                                .DATE_JUGEMENT + '</td><td>' + res.SORT + '</td><td>' +
                                etat + '</td>' +
                                // '<td><a href="storage/app/' + res.URL_JUGEMENT +
                                // '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td>'
                                '<td>' + (res.URL_JUGEMENT === null ?
                                    "Pas De Fichier" :
                                    '<a href="' + document +
                                    '" target="_blank" style="color:blue;text-decoration: underline">' +
                                    res.URL_JUGEMENT + '</a>') + '</td>' +
                                '</tr>'
                            );


                        });




                    } else if (etape == 4) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID Notification</th><th>NUM Notification</th><th>NUM Dossier</th><th>Huissier</th><th>Date D\'envoie</th><th>Date De Sort</th><th>Sort</th><th>Etat De Notification</th><th>Fichier De Sort</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );



                        $.each(data, function(i, res) {
                            var document = '/notification/' + res.URL_SCAN + '';

                            var huissier = huissiers.filter((huissier) => huissier
                                .ID_HUISSIER === res.ID_HUISSIER)
                            var dossier = dossiers.filter((dossier) => dossier
                                .ID_DOSSIER === res.ID_DOSSIER)
                            if (res.DATE_SORT == null) {
                                res.DATE_SORT = '';
                            }


                            if (res.DATE_ENVOI_NOT == null) {
                                res.DATE_ENVOI_NOT = '';
                            }


                            if (res.ETAT_NOTIF == 0) {
                                var etat = '<span class="badge badge-info">EN_COURS</span>';
                            } else if (res.ETAT_NOTIF == null) {

                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">FERME</span>';

                            }

                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="modify" ' +
                                '" data-etape="' + etape +
                                '" data-id_notification="' + res.ID_NOTIFICATION +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + dossier[0].NUM_DOSSIER +
                                '" data-id_huissier="' + huissier[0].ID_HUISSIER +
                                '" data-date_envoie="' + res.DATE_ENVOI_NOT +
                                '" data-date_sort="' + res.DATE_SORT + '" data-sort="' + res
                                .SORT + '"  data-numero_notification="' + res
                                .NUM_NOTIFICATION + '" data-etat_notification="' + res
                                .ETAT_NOTIF +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_NOTIFICATION + '</td><td>' + res.NUM_NOTIFICATION +
                                '</td><td>' + dossier[0].NUM_DOSSIER + '</td><td>' +
                                huissier[0].PRENOM +
                                ' ' + huissier[0].NOM + '</td><td>' + res.DATE_ENVOI_NOT +
                                '</td><td>' + res.DATE_SORT + '</td><td>' + res.SORT +
                                '</td><td>' + etat + '</td>' +
                                // '<td><a href="storage/app/' + res
                                // .PV_SORT +
                                // '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td>'
                                '<td>' + (res.PV_SORT === null ?
                                    "Pas De Fichier" :
                                    '<a href="' + document +
                                    '" target="_blank" style="color:blue;text-decoration: underline">' +
                                    res.PV_SORT + '</a>') + '</td>' +
                                '</tr>'
                            );


                        });




                    } else if (etape == 5) {
                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID CNA</th><th>NUM De Dossier</th><th>Nom De Tribunal</th><th>Ref CNA</th><th>Date De Demande</th><th>Date De Retrait</th><th>Num De Notification</th><th>Fichier CNA</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );
                        $.each(data, function(i, res) {
                            var document = '/cna/' + res.URL_SCAN + '';

                            var tribunal = tribunaux.filter((tribunal) => tribunal
                                .ID_TRIBUNAL === res.ID_TRIBUNAL)
                            var dossier = dossiers.filter((dossier) => dossier
                                .ID_DOSSIER === res.ID_DOSSIER)
                            if (res.DATE_DEM_CNA == null) {
                                res.DATE_DEM_CNA = '';
                            }
                            if (res.DATE_RET_CNA == null) {
                                res.DATE_RET_CNA = '';
                            }
                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="modify"' +
                                '" data-etape="' + etape +
                                '" data-id_cna="' +
                                res.ID_CNA +
                                // '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + dossier[0].NUM_DOSSIER +
                                '" data-id_tribunal="' + res.ID_TRIBUNAL +
                                '" data-date_demande="' + res.DATE_DEM_CNA +
                                '" data-retrait="' + res.DATE_RET_CNA +
                                '"  data-reference_cna="' + res.REF_CNA +
                                '" data-numero_notification="' + res.N_NOTIFICATION +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_CNA + '</td><td>' + dossier[0].NUM_DOSSIER +
                                '</td><td>' +
                                tribunal[0].NOM_TRIBUNAL + '</td><td>' + res.REF_CNA +
                                '</td><td>' +
                                res.DATE_DEM_CNA + '</td><td>' + res.DATE_RET_CNA +
                                '</td><td>' + res.N_NOTIFICATION +
                                '</td>' +
                                // '<td><a href="storage/app/' + res.URL_CNA +
                                // '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td>'
                                '<td>' + (res.URL_CNA === null ?
                                    "Pas De Fichier" :
                                    '<a href="' + document +
                                    '" target="_blank" style="color:blue;text-decoration: underline">' +
                                    res.URL_CNA + '</a>') + '</td>' +
                                '</tr>'
                            );


                        });




                    } else if (etape == 6) {

                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID Execution</th><th>NUM Dossier</th><th>Huissier</th><th>Reference Execution</th><th>Date D\'envoie</th><th>Date D\'execution</th><th>Sort</th><th>Etat D\'éxecution</th><th>Fichier D\'éxecution</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );
                        $.each(data, function(i, res) {
                            var document = '/execution/' + res.URL_SCAN + '';

                            var dossier = dossiers.filter((dossier) => dossier
                                .ID_DOSSIER === res.ID_DOSSIER)
                            var huissier = huissiers.filter((huissier) => huissier
                                .ID_HUISSIER === res.ID_HUISSIER)
                            if (res.DATE_EXECUTION == null) {
                                res.DATE_EXECUTION = '';
                            }
                            if (res.ETAT_EXEC == 0) {
                                var etat = '<span class="badge badge-info">En Cours</span>';
                            } else if (res.ETAT_EXEC == null) {
                                var etat = '';
                            } else {
                                var etat = '<span class="badge badge-danger">Fermé</span>';
                            }
                            $('#tbody').append(
                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="modify"' +
                                '"data-etape="' + etape +
                                '" data-id_execution="' + res.ID_EXECUTION +
                                '" data-id_dossier="' + res.ID_DOSSIER +
                                '" data-num_dossier="' + dossier[0].NUM_DOSSIER +
                                '" data-id_huissier="' + res.ID_HUISSIER +
                                '" data-date_envoie="' + res.DATE_ENVOI +
                                '" data-date_execution="' + res.DATE_EXECUTION +
                                '" data-sort="' + res.SORT +
                                '" data-reference_execution="' + res.REF_EXECUTION +
                                '" data-etat_execution="' + res.ETAT_EXEC +
                                '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_EXECUTION + '</td><td>' + dossier[0].NUM_DOSSIER +
                                '</td><td>' + huissier[0].PRENOM + '_' + huissier[0].NOM +
                                '</td><td>' + res
                                .REF_EXECUTION + '</td><td>' + res.DATE_ENVOI +
                                '</td><td>' + res.DATE_EXECUTION + '</td><td>' + res.SORT +
                                '</td><td>' + etat +
                                '</td>' +
                                // '<td><a href="storage/app/' + res
                                // .PV +
                                // '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td>'
                                '<td>' + (res.PV === null ?
                                    "Pas De Fichier" :
                                    '<a href="' + document +
                                    '" target="_blank" style="color:blue;text-decoration: underline">' +
                                    res.PV + '</a>') + '</td>' +
                                '</tr>'
                            );


                        });




                    } else if (etape == 7) {
                        $('#exampleModal').fadeIn(200);
                        $('#modal_example').html(
                            '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID Currateur</th><th>Numéro De Dossier</th><th>Nom De Tribunal</th><th>Référence De Tribunal</th><th>Date D\'ordonance</th><th>Date De Demande De Notification</th><th>Nom De Currateur</th><th>Date De Notification De Currateur</th><th>Date D\'insertion De Journale</th><th>Nom De Journale</th><th>Date De Retour</th><th>Etat De Currateur</th><th>Fichier De Currateur</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                        );
                        $.each(data, function(i, res) {
                            var document = '/currateurs/' + res.URL_SCAN + '';
                            var dossier = dossiers.filter((dossier) => dossier
                                .ID_DOSSIER === res.ID_DOSSIER)
                            var tribunal = tribunaux.filter((tribunal) => tribunal
                                .ID_TRIBUNAL === res.ID_TRIBUNAL)
                            if (res.DATE_DEM_NOTIFICATION == null) {
                                res.DATE_DEM_NOTIFICATION = '';
                            }
                            if (res.DATE_NOT_CURRATEUR == null) {
                                res.DATE_NOT_CURRATEUR = '';
                            }
                            if (res.DATE_INSERTION_JOURNAL == null) {
                                res.DATE_INSERTION_JOURNAL = '';
                            }
                            if (res.ETAT_CURRATEUR == 0) {
                                res.ETAT_CURRATEUR =
                                    '<span class="badge badge-info">En Cours</span>';
                            }
                            $('#tbody').append(


                                '<tr><td><button data-toggle="modal" data-target="#modification" data-role="modify"' +
                                '" data-etape="' + etape +

                                '"data-id_currateur="' + res.ID_CURRATEUR +
                                '"data-num_dossier="' + dossier[0].NUM_DOSSIER +
                                '"data-id_tribunal="' + res.ID_TRIBUNAL +
                                '"data-ref_tribunal="' + res.REF_TRIBUNALE +
                                '"data-date_ordonnance="' + res.DATE_ORDONANCE +
                                '"data-date_dem_notification="' + res
                                .DATE_DEM_NOTIFICATION +
                                '"data-date_insertion_journale="' + res
                                .DATE_INSERTION_JOURNALE +
                                '"data-nom_journale="' + res.NOM_JOURNALE +
                                '"data-date_retour="' + res.DATE_RETOUR +
                                '"data-etat_currateur="' + res.ETAT_CURATEUR +
                                '"class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
                                res.ID_CURRATEUR + '</td><td>' + dossier[0].NUM_DOSSIER +
                                '</td><td>' + tribunal[0].NOM_TRIBUNAL + '</td><td>' + res
                                .REF_TRIBUNALE + '</td><td>' + res.DATE_ORDONANCE +
                                '</td><td>' + res.DATE_DEM_NOTIFICATION + '</td><td>' + res
                                .NOM_CURRATEUR + '</td><td>' + res.DATE_NOT_CURRATEUR +
                                '</td><td>' + res.DATE_INSERTION_JOURNALE + '</td><td>' +
                                res
                                .NOM_JOURNALE + '</td><td>' + res.DATE_RETOUR +
                                '</td>' +
                                '<td>' +
                                (res.ETAT_CURATEUR === 0 ?
                                    '<span class="badge badge-danger">Non</span>' : res
                                    .ETAT_CURATEUR === 1 ?
                                    '<span class="badge badge-danger">Oui</span>' : "") +
                                '</td>' +
                                // '<td><a href="storage/app/' + res
                                // .URL_CURRATEUR +
                                // '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td>'
                                '<td>' + (res.URL_CURRATEUR === null ?
                                    "Pas De Fichier" :
                                    '<a href="' + document +
                                    '" target="_blank" style="color:blue;text-decoration: underline">' +
                                    res.URL_CURRATEUR + '</a>') + '</td>' +
                                '</tr>'
                            );


                        });




                    }
                }


            });










        });

        $(document).on('click', 'button[data-role=modify]', function() {
            $('#contenu_modification').html('');
            var etape = $(this).data('etape');
            if (etape == 1) {
                var id_requete = $(this).data('id_requete');
                var id_dossier = $(this).data('id_dossier');
                var id_tribunal = $(this).data('id_tribunal');
                var num_dossier = $(this).data('num_dossier');
                var reference_tribunal = $(this).data('reference_tribunal');
                var date_depot = $(this).data('date_depot');
                var date_retrait = $(this).data('date_retrait');
                var juge = $(this).data('juge');
                var date_jugement = $(this).data('date_jugement');
                var etat_requete = $(this).data('etat_requete');
                $('#title_modification').html("Requete : " + id_requete + " / " + "CIN : " + user.CIN);
                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="etape" name="etape" value="' +
                    etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_requete" name="id_requete" value="' +
                    id_requete +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir_Tribunal--</option>@foreach ($tribunaux as $tribunal)<option value="{{ $tribunal->ID_TRIBUNAL }}">{{ $tribunal->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Referance_Tribunal</label><input type="text" class="form-control text-center" id="reference_tribunal" name="reference_tribunal" value="' +
                    reference_tribunal +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Depot</label><input type="date" class="form-control text-center" id="date_depot" name="date_depot" value="' +
                    date_depot +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Retrait</label><input type="date" class="form-control text-center" id="date_retrait" name="date_retrait" value="' +
                    date_retrait +
                    '"></div></div><div class="col-lg-6"><div class="form-group"><label>Juge</label><input type="text" class="form-control text-center" id="juge" name="juge" value="' +
                    juge +
                    '"></div></div><div class="col-lg-6"><div class="form-group"><label>Date_Jugement</label><input type="date" class="form-control text-center" id="date_jugement" name="date_jugement" value="' +
                    date_jugement +
                    '"></div></div><div class="col-lg-6"><div class="form-group"><label>Etat_Requete</label><select class="form-control text-center" id="etat_requete" name="etat_requete"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Requete</label><input type="file" name="fichier_requete" id="fichier_requete" class="form-control text-center"></div></div></div>'
                );
                $('select[id=etat_requete]').val(etat_requete).change();
                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });
                $('select[id=id_tribunal]').val(id_tribunal).change();

            }
            if (etape == 2) {
                var id_audiance = $(this).data('id_audiance');
                var num_dossier = $(this).data('num_dossier');
                var id_tribunal = $(this).data('id_tribunal');
                var date_creation = $(this).data('date_creation');
                var date_audiance = $(this).data('date_audiance');
                var salle = $(this).data('salle');
                var juge_audiance = $(this).data('juge_audiance');
                var etat_audiance = $(this).data('etat_audiance');
                console.log(etape);

                $('#title_modification').html("Audiance : " + id_audiance + " / " + "CIN : " + user.CIN);

                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="etape" name="etape" value="' +
                    etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_audiance" name="id_audiance" value="' +
                    id_audiance +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir_Tribunal--</option>@foreach ($tribunaux as $tribunal)<option value="{{ $tribunal->ID_TRIBUNAL }}">{{ $tribunal->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Creation</label><input type="date" class="form-control text-center" id="date_creation" name="date_creation" value="' +
                    date_creation +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Audiance</label><input type="date" class="form-control text-center" id="date_audiance" name="date_audiance" value="' +
                    date_audiance +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Juge</label><input type="text" class="form-control text-center" id="juge_audiance" name="juge_audiance" value="' +
                    juge_audiance +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Salle</label><input type="text" class="form-control text-center" id="salle" name="salle" value="' +
                    salle +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Etat_Requete</label><select class="form-control text-center" id="etat_audiance" name="etat_audiance"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Audiance</label><input type="file" name="fichier_audiance" id="fichier_audiance" class="form-control text-center"></div></div></div> '
                );
                $('select[id=etat_audiance]').val(etat_audiance).change();
                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });
                $('select[id=id_tribunal]').val(id_tribunal).change();
            }
            if (etape == 3) {
                var id_jugement = $(this).data('id_jugement');
                var num_dossier = $(this).data('num_dossier');
                var id_tribunal = $(this).data('id_tribunal');
                var date_jugement = $(this).data('date_jugement');
                var reference_tribunal = $(this).data('reference_tribunal');
                var sort = $(this).data('sort');
                var juge = $(this).data('juge');
                var etat_jugement = $(this).data('etat_jugement');
                $('#title_modification').html("Jugement : " + id_jugement + " / " + "CIN : " + user.CIN);
                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="etape" name="etape" value="' +
                    etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_jugement" name="id_jugement" value="' +
                    id_jugement +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir_Tribunal--</option>@foreach ($tribunaux as $tribunal)<option value="{{ $tribunal->ID_TRIBUNAL }}">{{ $tribunal->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Jugement</label><input type="date" class="form-control text-center" id="date_jugement" name="date_jugement" value="' +
                    date_jugement +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Ref_Tribunal</label><input type="text" class="form-control text-center" id="reference_tribunal" name="reference_tribunal" value="' +
                    reference_tribunal +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Juge</label><input type="text" class="form-control text-center" id="juge" name="juge" value="' +
                    juge +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Sort</label><input type="text" class="form-control text-center" id="sort_jugement" name="sort_jugement" value="' +
                    sort +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Etat_Jugement</label><select class="form-control text-center" id="etat_jugement" name="etat_jugement"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Jugement</label><input type="file" name="fichier_jugement" id="fichier_jugement" class="form-control text-center"></div></div></div> '
                );
                $('select[id=etat_jugement]').val(etat_jugement).change();
                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });

                $('select[id=id_tribunal]').val(id_tribunal).change();

            }
            if (etape == 4) {
                var id_notification = $(this).data('id_notification');
                var num_dossier = $(this).data('num_dossier');
                var id_huissier = $(this).data('id_huissier');
                var numero_notification = $(this).data('numero_notification');
                var date_envoie = $(this).data('date_envoie');
                var sort = $(this).data('sort');
                var date_sort = $(this).data('date_sort');
                var etat_notification = $(this).data('etat_notification');
                $('#title_modification').html("Notification : " + id_notification + " / " + "CIN : " + user.CIN);
                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="etape" name="etape" value="' +
                    etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_notification" name="id_notification" value="' +
                    id_notification +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Huissier</label><select class="form-control text-center" id="id_huissier" name="id_huissier"><option value="" disabled>--Choisir_Huissier--</option>@foreach ($huissiers as $huissier)<option value="{{ $huissier->ID_HUISSIER }}">{{ $huissier->PRENOM }} {{ $huissier->NOM }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Envoie</label><input type="date" class="form-control text-center" id="date_envoie" name="date_envoie" value="' +
                    date_envoie +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Sort</label><input type="date" class="form-control text-center" id="date_sort" name="date_sort" value="' +
                    date_sort +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Numero_Notification</label><input type="text" class="form-control text-center" id="numero_notification" name="numero_notification" value="' +
                    numero_notification +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Sort</label><input type="text" class="form-control text-center" id="sort_notification" name="sort_notification" value="' +
                    sort +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Etat_Jugement</label><select class="form-control text-center" id="etat_notification" name="etat_notification"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Jugement</label><input type="file" name="fichier_notification" id="fichier_notification" class="form-control text-center"></div></div></div> '
                );
                $('select[id=etat_notification]').val(etat_notification).change();
                $('select[id=id_huissier]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });
                $('select[id=id_huissier').val(id_huissier).change();
            }
            if (etape == 5) {
                var id_cna = $(this).data('id_cna');
                var num_dossier = $(this).data('num_dossier');
                var id_tribunal = $(this).data('id_tribunal');
                var date_demande = $(this).data('date_demande');
                var date_retrait = $(this).data('date_retrait');
                var numero_notification = $(this).data('numero_notification');
                var reference_cna = $(this).data('reference_cna');
                $('#title_modification').html("CNA : " + id_cna + " / " + "CIN : " + user.CIN);
                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="etape" name="etape" value="' +
                    etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_cna" name="id_cna" value="' +
                    id_cna +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-4"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir_Tribunal--</option>@foreach ($tribunaux as $tribunal)<option value="{{ $tribunal->ID_TRIBUNAL }}">{{ $tribunal->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-4"><div class="form-group"><label>Date_Demande_Cna</label><input type="date" class="form-control text-center" id="date_demande" name="date_demande" value="' +
                    date_demande +
                    '"></div></div><div class="col-lg-4"><div class="form-group"><label>Date_Retrait_Cna</label><input type="date" class="form-control text-center" id="date_retrait" name="date_retrait" value="' +
                    date_retrait +
                    '"></div></div><div class="col-lg-4"><div class="form-group"><label>Numero_Notification</label><input type="text" class="form-control text-center" id="numero_notification" name="numero_notification" value="' +
                    numero_notification +
                    '"></div></div><div class="col-lg-4"><div class="form-group"><label>Reference_Cna</label><input type="text" class="form-control text-center" id="reference_cna" name="reference_cna" value="' +
                    reference_cna +
                    '"></div></div><div class="col-lg-4"><div class="form-group"><label>Fichier_Cna</label><input type="file" name="fichier_cna" id="fichier_cna" class="form-control text-center"></div></div></div>'
                );
                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });
                $('select[id=id_tribunal]').val(id_tribunal).change();
            }
            if (etape == 6) {
                var id_execution = $(this).data('id_execution');
                var num_dossier = $(this).data('num_dossier');
                var id_huissier = $(this).data('id_huissier');
                var reference_execution = $(this).data('reference_execution')
                var date_envoie = $(this).data('date_envoie');
                var sort = $(this).data('sort');
                var date_execution = $(this).data('date_execution');
                var etat_execution = $(this).data('etat_execution');
                $('#title_modification').html("Execution : " + id_execution + " / " + "CIN : " + user.CIN);
                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="etape" name="etape" value="' +
                    etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_execution" name="id_execution" value="' +
                    id_execution +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Huissier</label><select class="form-control text-center" id="id_huissier" name="id_huissier"><option value="" disabled>--Choisir_Huissier--</option>@foreach ($huissiers as $huissier)<option value="{{ $huissier->ID_HUISSIER }}">{{ $huissier->PRENOM }} {{ $huissier1->NOM }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Envoie</label><input type="date" class="form-control text-center" id="date_envoie" name="date_envoie" value="' +
                    date_envoie +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date_Execution</label><input type="date" class="form-control text-center" id="date_execution" name="date_execution" value="' +
                    date_execution +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Reference_Execution</label><input type="text" class="form-control text-center" id="reference_execution" name="reference_execution" value="' +
                    reference_execution +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Sort</label><input type="text" class="form-control text-center" id="sort_execution" name="sort_execution" value="' +
                    sort +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Etat_Execution</label><select class="form-control text-center" id="etat_execution" name="etat_execution"><option value="0">EN COURS</option><option value="1">FERME</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Jugement</label><input type="file" name="fichier_execution" id="fichier_execution" class="form-control text-center"></div></div></div> '
                );
                $('select[id=etat_execution]').val(etat_execution).change();
                $('select[id=id_huissier]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });
                $('select[id=id_huissier').val(id_huissier).change();
            }
            if (etape == 7) {
                var id_currateur = $(this).data('id_currateur');
                var num_dossier = $(this).data('num_dossier');
                var id_tribunal = $(this).data('id_tribunal');
                var ref_tribunal = $(this).data('ref_tribunal')
                var date_ordonnance = $(this).data('date_ordonnance');
                var date_dem_notification = $(this).data('date_dem_notification');
                var date_insertion_journale = $(this).data('date_insertion_journale');
                var date_retour = $(this).data('date_retour');
                var nom_journale = $(this).data('nom_journale');
                var etat_currateur = $(this).data('etat_currateur');
                $('#title_modification').html("Currateur : " + id_currateur + " / " + "CIN : " + user.CIN);
                $('#contenu_modification').append(
                    '<div class="row"><input type="hidden" class="form-control text-center form-control-success" id="etape" name="etape" value="' +
                    etape +
                    '" style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="id_currateur" name="id_currateur" value="' +
                    id_currateur +
                    '"  style="background-color:white;font-weight:bold" required><input type="hidden" class="form-control text-center form-control-success" id="num_dossier"  name="num_dossier" value="' +
                    num_dossier +
                    '" style="background-color:white;font-weight:bold"><div class="col-lg-3"><div class="form-group"><label>Tribunal</label><select class="form-control text-center" id="id_tribunal" name="id_tribunal"><option value="" disabled>--Choisir Une Tribunal--</option>@foreach ($tribunaux as $tribunal)<option value="{{ $tribunal->ID_TTRIBUNAL }}">{{ $tribunal->NOM_TRIBUNAL }}</option>@endforeach</select></div></div><div class="col-lg-3"><div class="form-group"><label>Référence De Tribunal</label><input type="text" class="form-control text-center" id="ref_tribunal" name="ref_tribunal" value="' +
                    ref_tribunal +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date D\'ordannance</label><input type="date" class="form-control text-center" id="date_ordonnance" name="date_ordonnance" value="' +
                    date_ordonnance +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date De Demande De Notification</label><input type="date" class="form-control text-center" id="date_dem_notification" name="date_dem_notification" value="' +
                    date_dem_notification +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date D\'insertion De Journale</label><input type="date" class="form-control text-center" id="date_insertion_journale" name="date_insertion_journale" value="' +
                    date_insertion_journale +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Date De Retour</label><input type="date" class="form-control text-center" id="date_retour" name="date_retour" value="' +
                    date_retour +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Nom De Journale</label><input type="text" class="form-control text-center" id="nom_journale" name="nom_journale" value="' +
                    nom_journale +
                    '"></div></div><div class="col-lg-3"><div class="form-group"><label>Etat De Currateur</label><select class="form-control text-center" id="etat_currateur" name="etat_currateur"><option value="0">Non</option><option value="1">Oui</option></select></div></div><div class="col-lg-6"><div class="form-group"><label>Fichier_Jugement</label><input type="file" name="fichier_execution" id="fichier_execution" class="form-control text-center"></div></div></div> '
                );
                $('select[id=etat_currateur]').val(etat_currateur).change();
                $('select[id=id_tribunal]').select2({
                    with: '100%',
                    dropdownParent: $('#modification')
                });
                $('select[id=id_tribunal').val(id_tribunal).change();
            }

        });
        //update etape code
        // $("#form_procedure").submit(function(e) {
        //     e.preventDefault();
        //     var form = $('#form_procedure').get(0);
        //     var formData = new FormData(form); // get the form data
        //     $.ajax({
        //         url: "{{ url('/consultations/update-etape') }}",
        //         method: "POST",
        //         data: formData,
        //         dataType: "JSON",
        //         processData: false,
        //         contentType: false,
        //         success: function(data) {
        //             // $('#progres').hide();
        //             $('#modification').modal('toggle');
        //             swal({
        //                 title: "Mise A Jour Effectuée",
        //                 icon: "success",
        //                 timer: 2000,
        //                 timerProgressBar: true,
        //             });
        //             if (data[0][0].id_etape == 1) {

        //                 $('#exampleModal').fadeIn(200);
        //                 $('#modal_example').html(
        //                     '<div class="table-responsive"><table class="table table-bordered"><thead class="text-center"><th>Actions</th><th>ID_Requete</th><th>NUM_Dossier</th><th>Nom_Tribunal</th><th>Referance_Tribunal</th><th>Date_Depot</th><th>Date_Retrait</th><th>Juge</th><th>Date_Jugement</th><th>Etat_Requete</th><th>Fichier_Requete</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
        //                 );
        //                 $.each(data[1], function(i, res) {
        //                     if (res.DATE_RETRAIT == null) {
        //                         res.DATE_RETRAIT = '';
        //                     }
        //                     if (res.DATE_JUGEMENT == null) {
        //                         res.DATE_JUGEMENT = '';
        //                     }
        //                     if (res.JUGE == null) {
        //                         res.JUGE = '';
        //                     }
        //                     if (res.ETAT_REQUETE == 0) {
        //                         var etat = '<span class="badge badge-info">En Cours</span>';
        //                     } else if (res.ETAT_REQUETE == null) {

        //                         var etat = '';
        //                     } else {
        //                         var etat = '<span class="badge badge-danger">Fermé</span>';

        //                     }
        //                     $('#tbody').append(
        //                         '<tr><td><button data-toggle="modal" data-target="#modification" data-role="update" data-etape="' +
        //                         data[0][0].etape + '" data-id_requete="' + res.ID_REQUETE +
        //                         '" data-id_dossier="' + res.ID_DOSSIER +
        //                         '" data-num_dossier="' + res.NUM_DOSSIER +
        //                         '" data-id_tribunal="' + res.ID_TRIBUNAL +
        //                         '" data-date_depot="' + res.DATE_DEPOT +
        //                         '" data-date_retrait="' + res.DATE_RETRAIT +
        //                         '" data-reference_tribunal="' + res.REFERANCE_TRIBUNALE +
        //                         '" data-juge="' + res.JUGE + '" data-date_jugement="' + res
        //                         .DATE_JUGEMENT + '" data-etat_requete="' + res
        //                         .ETAT_REQUETE +
        //                         '" class="btn-icon btn-outline-success"><i class="ik ik-edit-2"></i></button></td><td>' +
        //                         res.ID_REQUETE + '</td><td>' + res.NUM_DOSSIER +
        //                         '</td><td>' + res.NOM_TRIBUNAL + '</td><td>' + res
        //                         .REFERANCE_TRIBUNALE + '</td><td>' + res.DATE_DEPOT +
        //                         '</td><td>' + res.DATE_RETRAIT + '</td><td>' + res.JUGE +
        //                         '</td><td>' + res.DATE_JUGEMENT + '</td><td>' + etat +
        //                         '</td><td><a href="storage/app/' + res.URL_SCAN +
        //                         '" target="_blank" style="color:blue;text-decoration: underline">document à lire</a></td></tr>'
        //                     );
        //                 });




        //             }
        //         }
        //     });
        // });
    </script>
@endsection
