@extends('layouts.app')


<title>@yield('title')Bienvenue </title>


@section('css')
@endsection


@section('contenu')
    {{-- <style>
        .filename {
            border-radius: 5px;
            border: none
        }

        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .inputfile+label {
            font-size: 1.25em;
            font-weight: 700;
            color: white;
            background-color: #CCD9FF;
            display: inline-block;
            border-radius: 10px;
            padding: 8px 20px
        }

        .inputfile+label {
            cursor: pointer;
        }

        /*
            .inputfile:focus+label {
                outline: 1px dotted white;
                outline: -webkit-focus-ring-color auto 5px;
            } */
    </style> --}}
    <div class="row" id="recherche_dossier">
        <div class="col-md-12">
            <div class="card task-board">
                <div class="card-header">
                    <h3>Recherche</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body todo-task">
                    <div class="dd" data-plugin="nestable">

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm">N° Dossier : </label>

                                    <input type="text" class="form-control" placeholder="Numero Dossier"
                                        name="numero_dossier">


                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm">Radical Cabinet : </label>

                                    <input type="text" class="form-control" placeholder="Radical Cabinet"
                                        name="radical_cabinet">


                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm">Réference Client : </label>

                                    <input type="text" class="form-control" placeholder="Réference Client"
                                        name="reference_client">


                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm">Radical Client : </label>

                                    <input type="text" class="form-control" placeholder="Radical Client"
                                        name="radical_client">


                                </div>
                            </div>

                            <div class="col-md-3">

                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm" for="client">Client : </label><br>
                                    <select name="client" data-placeholder="Choisir Client..." class="chosen-select"
                                        tabindex="-1" style="display: none;" required>
                                        <option value=""></option>
                                        @foreach ($clients as $clients)
                                            <option value="{{ $clients->ID_CLIENT }}">{{ $clients->NOM }}
                                                {{ $clients->PRENOM }}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>



                            <div class="col-md-3">

                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm" for="client">Adversaire : </label><br>
                                    <select name="adversaire" data-placeholder="Choisir Adversaire..." class="chosen-select"
                                        tabindex="-1" style="display: none;" required>
                                        <option value=""></option>
                                        @foreach ($adversaire as $adversaire)
                                            <option value="{{ $adversaire->ID_ADVERSAIRE }}">{{ $adversaire->NOM }}
                                                {{ $adversaire->PRENOM }}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>



                            <div class="col-md-3">

                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm" for="client">Nature : </label><br>
                                    <select name="nature" data-placeholder="Choisir Nature..." class="chosen-select"
                                        tabindex="-1" style="display: none;" required>
                                        <option value=""></option>
                                        @foreach ($nature as $nature)
                                            <option value="{{ $nature->ID_NATURE }}">{{ $nature->NOM }}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>



                            <div class="col-md-3">

                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm" for="client">Type : </label><br>
                                    <select name="type" data-placeholder="Choisir Type..." class="chosen-select"
                                        tabindex="-1" style="display: none;" required>
                                        <option value=""></option>
                                        @foreach ($type as $type)
                                            <option value="{{ $type->ID_TYPEDOSSIER }}">{{ $type->NOM }}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>


                            <div class="col-md-3">

                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm" for="client">Gestionnaire :
                                    </label><br>
                                    <select name="user" data-placeholder="Choisir Type..." class="chosen-select"
                                        tabindex="-1" style="display: none;" required>
                                        <option value=""></option>
                                        @foreach ($user as $user)
                                            <option value="{{ $user->CIN }}">{{ $user->LOGIN }}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>


                            <div class="col-md-9" style="padding:auto;margin:auto">

                                <div class="form-group" style="padding:auto;margin:auto">

                                    <button data-role="rechercher" class="btn btn-outline-success"
                                        style="width:100%">Chercher Un Dossier</button>


                                </div>
                            </div>




                        </div>









                    </div>
                </div>
            </div>
        </div>




        <div id="resultat" class="col-md-12" style="display:none">
            <div class="card task-board">
                <div class="card-header">
                    <h3>Dossier</h3>
                    {{-- <div class="d-flex gap-2 justify-content-end w-100">
                        <input type="hidden" name="date_type" value="up">
                        <button data-role="filtrer" type="submit" class="btn btn-success" style="margin-right: 10px;">
                            <i class="fa-solid fa-arrow-up" style="color: #f0f0f0;"></i>
                        </button>

                        <input type="hidden" name="date_type" value="down">
                        <button data-role="filtrer" type="submit" class="btn btn-success">
                            <i class="fa-solid fa-arrow-down" style="color: #ffffff;"></i> </button>


                    </div> --}}
                </div>
                <div class="card-body table-responsive ">
                    <div class="dd" data-plugin="nestable">
                        <div class="row" id="ajax_resultat">






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    @include('dossier/modifier')

    @include('dossier/procedure')
@endsection















@section('script')
    <script>
        var usersData = @json($users);

        $(document).ready(function() {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $('.chosen-select').select2({
                width: "100%"
            });

            @if (Session::has('message'))

                'use strict';
                $.toast({
                    heading: 'Success',
                    text: "Mise à jour Effectué !",
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#f96868',
                    position: 'top-center'
                });
            @endif

        });


        $(document).on('click', 'button[data-role=rechercher]', function() {

            $('#ajax_resultat').html('');

            var numero_dossier = $('input[name=numero_dossier]').val();
            var radical_cabinet = $('input[name=radical_cabinet]').val();
            var reference_client = $('input[name=reference_client]').val();
            var radical_client = $('input[name=radical_client]').val();
            var client = $('select[name=client]').val();
            var adversaire = $('select[name=adversaire]').val();
            var nature = $('select[name=nature]').val();
            var type = $('select[name=type]').val();
            var gestionnaire = $('select[name=user]').val();



            var donnees = [numero_dossier, radical_cabinet, reference_client, radical_client, client, adversaire,
                nature, type, gestionnaire
            ];
            $.ajax({
                url: "{{ url('dossier/search/rechercher') }}",
                method: "POST",
                data: {
                    donnees: donnees
                },
                dataType: "JSON",
                success: function(data) {
                    $('#resultat')[0].style.display = 'block';

                    $('#ajax_resultat').html(
                        '<table id="simpletable" class="table table-bordered nowrap" style="margin-left:1px"><thead class="text-center"><tr><th class="nosort">Actions</th><th>N° Dossier</th><th>R.Cabinet</th><th>R.Client</th><th>Client</th><th>Adversaire</th><th>Gestionnaire</th><th>Date Ouverture</th><th>Montant Créance</th></thead><tbody id="tbody" class="text-center"></tbody></table>'
                    );
                    $.each(data, function(i, res) {
                        $('#tbody').append('<tr><td><button data-role="modifier" data-id="' +
                            res.ID_DOSSIER +
                            '" class="btn-icon btn-outline-success"><i class="ik ik-edit"></i></button></td><td>' +
                            res.NUM_DOSSIER + '</td><td>' + res.R_CABINET + '</td><td>' +
                            res.R_CLIENT + '</td><td>' + res.nom_client + '&nbsp;' + res
                            .prenom_client + '</td><td>' + res.nom_adversaire + '&nbsp;' +
                            res.prenom_adversaire + '</td><td>' + res.LOGIN + '</td><td>' +
                            res.DATE_OUVERTURE + '</td><td>' + res.MNT_CREANCE +
                            ' DH</td></tr>');
                    });
                }
            });
        });

        $(document).on('click', 'button[data-role=filtrer]', function() {
            $('#ajax_resultat').html('');
            var type = $('input[name=date_type]').val();
            console.log(type);
            $.ajax({

                url: "{{ url('/dossier/search/date') }}",
                method: "POST",
                data: {
                    type: type
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#resultat')[0].style.display = 'block';
                    $('#ajax_resultat').html(
                        '  <table id="simpletable" class="table table-bordered nowrap"><thead class="text-center"><tr><th class="nosort">Actions</th><th>N° Dossier</th><th>R.Cabinet</th><th>R.Client</th><th>Client</th><th>Adversaire</th><th>Gestionnaire</th><th>Date Ouverture</th><th>Montant Créance</th></thead><tbody id="tbody" class="text-center"></tbody></table>'
                    );
                    $.each(data, function(i, res) {
                        $('#tbody').append('<tr><td><button data-role="modifier" data-id="' +
                            res.ID_DOSSIER +
                            '" class="btn-icon btn-outline-success"><i class="ik ik-edit"></i></button></td><td>' +
                            res.NUM_DOSSIER + '</td><td>' + res.R_CABINET + '</td><td>' +
                            res.R_CLIENT + '</td><td>' + res.nom_client + '&nbsp;' + res
                            .prenom_client + '</td><td>' + res.nom_adversaire + '&nbsp;' +
                            res.prenom_adversaire + '</td><td>' + res.LOGIN + '</td><td>' +
                            res.DATE_OUVERTURE + '</td><td>' + res.MNT_CREANCE +
                            ' DH</td></tr>');
                    });
                }
            });
        });



        $(document).on('click', 'button[data-role=modifier]', function() {
            $('#affichage_procedure').html('');
            $('#documentation').html('');
            $('#recherche_dossier').fadeOut(200);
            $('#resultat_dossier').fadeIn(200);
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('dossier/search/modifier') }}",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {


                    if (data[0].SUSPENTION == 1) {
                        $('#suspention')[0].checked = true;

                    }


                    if (data[0].MANQUE_PIECE == 1) {
                        $('#manque')[0].checked = true;

                    }

                    if (data[0].SUSPENTION_ARRANGEMENT == 1) {
                        $('#arrangement')[0].checked = true;

                    }


                    $('#id_dossier').val(id);
                    $('#dossier_id').html(id);

                    $('#prenom_client').html(data[0].prenom_client);
                    $('#nom_client').html(data[0].nom_client);

                    $('#prenom_adversaire').html(data[0].prenom_adversaire);
                    $('#nom_adversaire').html(data[0].nom_adversaire);


                    $('#radical_client').html(data[0].R_CLIENT);
                    $('#nom_agence').html(data[0].AGENCE);

                    $('#reference_client').html(data[0].R_CLIENT);
                    $('#direction').html(data[0].DIRECTION);



                    $('#radical_cabinet').html(data[0].R_CABINET);
                    $('#num_dossier').html(data[0].numero);
                    $('#numero_dossier').html(data[0].numero);
                    $('#date_ouverture').html(data[0].DATE_OUVERTURE);
                    $('select[id=gestion]').val(data[0].cin).change().trigger('chosen:updated');
                    $('select[id=type_dossier]').val(data[0].type).change().trigger('chosen:updated');
                    $('select[id=nom_nature]').val(data[0].nature).change().trigger('chosen:updated');
                    // $('#gestion').val(data[0].cin).trigger('chosen:updated');
                    $('#montant_creance').val(data[0].MNT_CREANCE);
                    // $('#type_dossier').val(data[0].type).trigger('chosen:updated');
                    // $('#nom_nature').val(data[0].nature).trigger('chosen:updated');

                    $('#numero_archivage').val(data[0].NUM_ARCHIVAGE);
                    $('#observation').val(data[0].observation);




                    $.each(data, function(i, res) {
                        var url = '/documents/' + res.NOM_DOCUMENT;

                        $('#documentation').append('<tr><td><a href="' + url +
                            '" target="_blank" style="color:blue;text-decoration: underline">' +
                            res.NOM_DOCUMENT + '</a></td><td>' + moment(res.date_doc)
                            .format('DD-MMM-YYYY') + '</td></tr>');


                    });


                    $.ajax({

                        url: "{{ url('dossier/search/dossierprocedure') }}",
                        method: "POST",
                        data: {
                            id: id
                        },
                        dataType: "JSON",
                        success: function(data) {





                            $.each(data, function(i, res) {

                                var id_procedure = res.ID_PROCEDURE;

                                document.getElementById('procedure[' +
                                    id_procedure + ']').checked = false;



                                $('#affichage_procedure').append(
                                    '<div class="col-md-6" id="' + id +
                                    'index' + id_procedure +
                                    '"><div class="input-group input-group-dropdown"><input type="text" value="' +
                                    res.NOM_PROCEDURE +
                                    '" class="form-control" aria-label="Text input with dropdown button"/disabled style="background-color:#06186A;color:white;font-weight:bold"><div class="input-group-append"><button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">choisir une option<i class="ik ik-chevron-down"></i></button><div class="dropdown-menu" id="' +
                                    id + 'resultat_json' + id_procedure +
                                    '" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(224px, 36px, 0px);"></div></div></div></div>'
                                );


                                $.ajax({

                                    url: "{{ url('dossier/search/procedure') }}",
                                    method: "POST",
                                    data: {
                                        id_procedure: id_procedure
                                    },
                                    dataType: "JSON",
                                    success: function(data) {



                                        $.each(data, function(i, res) {


                                            $('#' + id +
                                                'resultat_json' +
                                                id_procedure +
                                                '').append(
                                                '<a class="dropdown-item" data-role="ouverture" data-id="' +
                                                res.etape +
                                                '" data-procedure="' +
                                                id_procedure +
                                                '" href="javascript:void(0)">' +
                                                res.etape +
                                                '</a>');



                                        });
                                    }


                                });




                            });






                        }



                    });






                }

            });

        });




        // ajouter document +1

        $(document).on('click', 'button[data-role=ajouter]', function() {



            $('#attache').html(
                '<div id="attachement0" class="row"><div class="col-md-10"><p>Ajouter Un Fichier</p><div class="form-group"><input type="file" class="form-control form-control-primary " id="fichier[0]" name="fichier[0]"></div></div><div class="col-md-2" style="padding:auto;margin:auto"><button data-role="add" class="btn-icon btn-outline-success" type="button"><i class="ik ik-plus"></i></button></div></div>'
            );
            // $('#attache').html(
            //     '<div id="attachement0" class="row"><div class="col-md-10"><p>Ajouter Un Fichier</p><div class="form-group d-flex"><input type="file" class="form-control form-control-primary inputfile col-md-5" id="fichier[0]" name="fichier[0]"><input type="text" class="ml-10 filename" placeholder="Nom De Fichier" name="filename[0]" /></div></div><div class="col-md-2" style="padding:auto;margin:auto"><button data-role="add" class="btn-icon btn-outline-success" type="button"><i class="ik ik-plus"></i></button></div></div>'
            // );



        });


        // ajouter document i++

        $(document).on('click', 'button[data-role=add]', function() {



            var i = $('input[type=file]').length;

            $('#attache').append('<div id="attachement' + i +
                '" class="row"><div class="col-md-10"><p>Ajouter Un Fichier</p><div class="form-group"><input type="file" class="form-control form-control-primary inputfile" name="fichier[' +
                i + ']" id="fichier[' + i +
                ']" required></div></div><div class="col-md-2" style="padding:auto;margin:auto"><button data-id="' +
                i +
                '" data-role="delete" class="btn-icon btn-outline-danger" type="button"><i class="ik ik-minus"></i></button></div></div>'
            );
            // $('#attache').append('<div id="attachement' + i +
            //     '" class="row"><div class="col-md-10"><p>Ajouter Un Fichier</p><div class="form-group d-flex"><input type="file" class="form-control form-control-primary inputfile" name="fichier[' +
            //     i + ']" id="fichier[' + i +
            //     ']" required><input type="text" class="ml-10 filename" placeholder="Nom De Fichier" name="filename[' +
            //     i +
            //     ']"  /></div></div><div class="col-md-2" style="padding:auto;margin:auto"><button data-id="' +
            //     i +
            //     '" data-role="delete" class="btn-icon btn-outline-danger" type="button"><i class="ik ik-minus"></i></button></div></div>'
            // );

            if (i > 1) {

                var k = i - 1;

                $('button[data-id=' + k + ']').hide();
            }




        });



        //desactiver ajout document i-1
        $(document).on('click', 'button[data-role=delete]', function() {

            var i = $(this).data('id');

            var k = i - 1;



            $('#attachement' + i + '').remove();

            $('button[data-id=' + k + ']').show();


        });







        // ajouter selon les procedures
        $(document).on('click', 'button[data-role=ajoute]', function() {

            //actions en paiement



            for (var i = 1; i <= 16; i++) {



                var id = document.getElementById('procedure[' + i + ']');
                if (id.checked == true) {

                    var id_dossier = $('#dossier_id').html();
                    var id_procedure = id.value;



                    var nom_procedure = $('span[id=' + id_procedure + ']').html();


                    if (!$('#' + id_dossier + 'index' + id_procedure + '').html()) {


                        id.checked = false;





                        $('#affichage_procedure').append('<div class="col-md-6" id="' + id_dossier + 'index' +
                            id_procedure +
                            '"><div class="input-group input-group-dropdown"><input type="text" value="' +
                            nom_procedure +
                            '" class="form-control" aria-label="Text input with dropdown button"/disabled style="background-color:#06186A;color:white;font-weight:bold"><div class="input-group-append"><button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">choisir une option<i class="ik ik-chevron-down"></i></button><div class="dropdown-menu" id="' +
                            id_dossier + 'resultat_json' + id_procedure +
                            '" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(224px, 36px, 0px);"></div></div></div></div>'
                        );





                        $.ajax({

                            url: "{{ url('dossier/search/procedures') }}",
                            method: "POST",
                            data: {
                                id_procedure: id_procedure,
                                id_dossier: id_dossier
                            },
                            dataType: "JSON",
                            success: function(data) {



                                $.each(data, function(i, res) {


                                    $('#' + id_dossier + 'resultat_json' + id_procedure + '')
                                        .append(
                                            '<a class="dropdown-item" data-role="ouverture" data-id="' +
                                            res.etape + '" data-procedure="' + id_procedure +
                                            '" href="javascript:void(0)">' + res.etape + '</a>'
                                        );



                                });


                            }

                        });

                    } else {

                        id.checked = false;

                        'use strict';
                        $.toast({
                            heading: 'Warning',
                            text: "Procédure déja selectionné !",
                            showHideTransition: 'slide',
                            icon: 'warning',
                            loaderBg: '#f96868',
                            position: 'top-center'
                        });



                    }





                }

            }





        });





        $(document).on('click', 'a[data-role=ouverture]', function() {
            var id_modal = $(this).data('id');
            var id_procedure = $(this).data('procedure');
            var id_dossier = $('#dossier_id').html();
            var montant = $('#montant_creance').val();

            $('#prix_' + id_modal + '').html(montant);

            $('#tbody' + id_dossier + '').html('');

            $('input[name=id_dossier' + id_modal + ']').val($('#dossier_id').html());
            $('input[name=id_procedure' + id_modal + ']').val(id_procedure);

            $('#number_dossier' + id_modal + '').html($('#numero_dossier').html());


            $('#' + id_modal + '').modal('toggle');

            var url = '{{ url('dossier/search/procedureid') }}';
            url = url.replace('id', id_modal);

            $('#' + id_modal + '_dossier').html('');
            $('#' + id_dossier + 'tbody' + id_dossier + '').html('');

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    id_procedure: id_procedure,
                    id_dossier: id_dossier
                },
                dataType: "JSON",
                success: function(data) {

                    if (id_modal == 'Requete') {

                        if (data.length > 0) {
                            $('#' + id_modal + '_dossier').html(
                                '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Responsable</th><th>Reference_Tribunal</th><th>Date_Dépot</th><th>Date_Retrait</th><th>URL_Scan</th><th>L\'état</th></tr></thead><tbody id="' +
                                id_dossier + 'tbody' + id_modal + '"></tbody></table></div>');




                            $.each(data, function(i, res) {
                                var document = '/requete/' + res.URL_SCAN + '';
                                var responsable = usersData.filter(item => item.CIN === res.CIN)

                                $('#' + id_dossier + 'tbody' + id_modal + '').append(
                                    '<tr><td><string>' + responsable[0].NOM + " " +
                                    responsable[0].PRENOM +
                                    '</string></td><td><string>' + res.REFERANCE_TRIBUNALE +
                                    '</string></td><td><string>' + res.DATE_DEPOT +
                                    '</string></td><td><string>' + res.DATE_RETRAIT +
                                    '</string></td><td>' + (res.URL_SCAN === null ?
                                        "Pas De Fichier" :
                                        '<a href="' + document +
                                        '" target="_blank" style="color:blue;text-decoration: underline">' +
                                        res.URL_SCAN + '</a>') + '</td>' +
                                    '<td>' + (res.ETAT_REQUETE === 0 ? "En cours" :
                                        "Fermé") + '</td></tr>'
                                );


                            });


                        }




                    }



                    if (id_modal == 'Audiance') {

                        if (data.length > 0) {
                            $('#' + id_modal + '_dossier').html(
                                '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Responsable</th><th>ID_Tribunal</th><th>Date_Audiance</th><th>Salle</th><th>URL_Scan</th></tr></thead><tbody id="' +
                                id_dossier + 'tbody' + id_modal + '"></tbody></table></div>');




                            $.each(data, function(i, res) {

                                var document = '/audiance/' + res.URL_AUD;
                                var responsable = usersData.filter(item => item.CIN === res.CIN)

                                $('#' + id_dossier + 'tbody' + id_modal + '').append(
                                    '<tr><td><string>' + responsable[0].NOM + " " +
                                    responsable[0].PRENOM +
                                    '</string></td><td><string>' + res.ID_TRIBUNAL +
                                    '</string></td><td><string>' + moment(res.DATE_AUDIANCE)
                                    .format('DD-MMM-YYYY') + '</string></td><td><string>' +
                                    res.SALLE + '</string></td><td>' + (res.URL_AUD ===
                                        null ?
                                        "Pas De Fichier" :
                                        '<a href="' + document +
                                        '" target="_blank" style="color:blue;text-decoration: underline">' +
                                        res.URL_AUD + '</a>') + '</td>' + '</tr>'
                                );


                            });


                        }




                    }



                    if (id_modal == 'Jugement') {

                        if (data.length > 0) {
                            $('#' + id_modal + '_dossier').html(
                                '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Responsable</th><th>ID_Tribunal</th><th>Date_Jugement</th><th>Juge</th><th>URL_Scan</th></tr></thead><tbody id="' +
                                id_dossier + 'tbody' + id_modal + '"></tbody></table></div>');




                            $.each(data, function(i, res) {

                                var document = '/jugement/' + res.URL_JUGEMENT;

                                var responsable = usersData.filter(item => item.CIN === res.CIN)
                                $('#' + id_dossier + 'tbody' + id_modal + '').append(
                                    '<tr><td><string>' + responsable[0].NOM + " " +
                                    responsable[0].PRENOM + '</string></td><td><string>' +
                                    res.ID_TRIBUNAL +
                                    '</string></td><td><string>' + moment(res.DATE_JUGEMENT)
                                    .format('DD-MMM-YYYY') + '</string></td><td><string>' +
                                    res.JUGE + '</string></td> <td> ' + (res
                                        .URL_JUGEMENT ===
                                        null ?
                                        "Pas De Fichier" :
                                        '<a href="' + document +
                                        '" target="_blank" style="color:blue;text-decoration: underline">' +
                                        res.URL_JUGEMENT + '</a>') + '</td>' + '</tr>'
                                );


                            });


                        }

                    }



                    if (id_modal == 'Notification') {

                        if (data.length > 0) {
                            $('#' + id_modal + '_dossier').html(
                                '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Responsable</th><th>ID_HUISSIER</th><th>Date_Envoie</th><th>Date_Sort</th><th>PV_Sort</th></tr></thead><tbody id="' +
                                id_dossier + 'tbody' + id_modal + '"></tbody></table></div>');




                            $.each(data, function(i, res) {

                                var document = '/notification/' + res.PV_SORT;
                                var responsable = usersData.filter(item => item.CIN === res.CIN)

                                $('#' + id_dossier + 'tbody' + id_modal + '').append(
                                    '<tr><td><string>' + responsable[0].NOM + " " +
                                    responsable[0].PRENOM + '</string></td><td><string>' +
                                    res.ID_HUISSIER +
                                    '</string></td><td><string>' + moment(res
                                        .DATE_ENVOI_NOT).format('DD-MMM-YYYY') +
                                    '</string></td><td><string>' + moment(res.DATE_SORT)
                                    .format('DD-MMM-YYYY') + '</string></td> <td> ' + (res
                                        .PV_SORT ===
                                        null ?
                                        "Pas De Fichier" :
                                        '<a href="' + document +
                                        '" target="_blank" style="color:blue;text-decoration: underline">' +
                                        res.PV_SORT + '</a>') + '</td>' + '</tr>');


                            });


                        }

                    }




                    if (id_modal == 'CNA') {

                        if (data.length > 0) {
                            $('#' + id_modal + '_dossier').html(
                                '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Responsable</th><th>ID_TribunaL</th><th>Date_Demande</th><th>Date_Retrait</th><th>Url_CNA</th></tr></thead><tbody id="' +
                                id_dossier + 'tbody' + id_modal + '"></tbody></table></div>');




                            $.each(data, function(i, res) {

                                var document = '/cna/' + res.URL_CNA + '';
                                var responsable = usersData.filter(item => item.CIN === res.CIN)

                                $('#' + id_dossier + 'tbody' + id_modal + '').append(
                                    '<tr><td><string>' + responsable[0].NOM + " " +
                                    responsable[0].PRENOM +
                                    '</string></td><td><string>' + res.ID_TRIBUNAL +
                                    '</string></td><td><string>' + moment(res.DATE_DEM_CNA)
                                    .format('DD-MMM-YYYY') + '</string></td><td><string>' +
                                    moment(res.DATE_RET_CNA).format('DD-MMM-YYYY') +
                                    '</string></td> <td> ' + (res
                                        .URL_CNA ===
                                        null ?
                                        "Pas De Fichier" :
                                        '<a href="' + document +
                                        '" target="_blank" style="color:blue;text-decoration: underline">' +
                                        res.URL_CNA + '</a>') + '</td>' + '</tr>');


                            });


                        }

                    }



                    if (id_modal == 'Execution') {

                        if (data.length > 0) {
                            $('#' + id_modal + '_dossier').html(
                                '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Responsable</th><th>ID_Huissier</th><th>Date_Envoie</th><th>Date_Execution</th><th>Url_Exec</th></tr></thead><tbody id="' +
                                id_dossier + 'tbody' + id_modal + '"></tbody></table></div>');




                            $.each(data, function(i, res) {

                                var document = '/execution/' + res.PV + '';
                                var responsable = usersData.filter(item => item.CIN === res.CIN)

                                $('#' + id_dossier + 'tbody' + id_modal + '').append(
                                    '<tr><td><string>' + responsable[0].NOM + " " +
                                    responsable[0].PRENOM +
                                    '</string></td><td><string>' + res.ID_HUISSIER +
                                    '</string></td><td><string>' + moment(res.DATE_ENVOI)
                                    .format('DD-MMM-YYYY') + '</string></td><td><string>' +
                                    moment(res.DATE_EXECUTION).format('DD-MMM-YYYY') +
                                    '</string></td> <td> ' + (res
                                        .PV ===
                                        null ?
                                        "Pas De Fichier" :
                                        '<a href="' + document +
                                        '" target="_blank" style="color:blue;text-decoration: underline">' +
                                        res.PV + '</a>') + '</td>' + '</tr>');


                            });


                        }

                    }



                    if (id_modal == 'PLAINTE') {

                        if (data.length > 0) {
                            $('#' + id_modal + '_dossier').html(
                                '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Responsable</th><th>ID_Tribunal</th><th>Date_Envoie</th><th>Date_Depot</th><th>Url_Plainte</th></tr></thead><tbody id="' +
                                id_dossier + 'tbody' + id_modal + '"></tbody></table></div>');




                            $.each(data, function(i, res) {

                                var document = '/plainte/' + res.URL_PLAINT + '';

                                $('#' + id_dossier + 'tbody' + id_modal + '').append(
                                    '<tr><td><string>' + res.CIN +
                                    '</string></td><td><string>' + res.ID_TRIBUNAL +
                                    '</string></td><td><string>' + moment(res.DATE_ENVOI_P)
                                    .format('DD-MMM-YYYY') + '</string></td><td><string>' +
                                    moment(res.DATE_DEPOT).format('DD-MMM-YYYY') +
                                    '</string></td> <td> ' + (res
                                        .URL_PLAINT ===
                                        null ?
                                        "Pas De Fichier" :
                                        '<a href="' + document +
                                        '" target="_blank" style="color:blue;text-decoration: underline">' +
                                        res.URL_PLAINT + '</a>') + '</td>' + '</tr>');

                            });


                        }

                    }







                    if (id_modal == 'Curateur') {

                        if (data.length > 0) {
                            $('#' + id_modal + '_dossier').html(
                                '<div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Nom Currateur</th><th>Ref Tribunal</th><th>Date Insertion Journale</th><th>Date Not Currateur</th><th>Url Currateur</th></tr></thead><tbody id="' +
                                id_dossier + 'tbody' + id_modal + '"></tbody></table></div>');




                            $.each(data, function(i, res) {

                                var document = '/currateurs/' + res.URL_CURRATEUR + '';

                                $('#' + id_dossier + 'tbody' + id_modal + '').append(
                                    '<tr><td><string>' + res.NOM_CURRATEUR +
                                    '</string></td><td><string>' + res.REF_TRIBUNALE +
                                    '</string></td><td><string>' + moment(res
                                        .DATE_INSERTION_JOURNALE)
                                    .format('DD-MMM-YYYY') + '</string></td><td><string>' +
                                    moment(res.DATE_NOT_CURRATEUR).format('DD-MMM-YYYY') +
                                    '</string></td> <td> ' + (res
                                        .URL_CURRATEUR ===
                                        null ?
                                        "Pas De Fichier" :
                                        '<a href="' + document +
                                        '" target="_blank" style="color:blue;text-decoration: underline">' +
                                        res.URL_CURRATEUR + '</a>') + '</td>' + '</tr>');

                            });


                        }

                    }
                }

            });



        });


        //requete

        $("#requete_form").submit(function(e) {



            e.preventDefault();


            var form = $('#requete_form').get(0);
            var formData = new FormData(form);
            var retraitDate = new Date(formData.get('retraitRequete'));
            var depotDate = new Date(formData.get('depotRequete'));
            var jugementDate = new Date(formData.get('jugementRequete'));

            if (retraitDate <= depotDate) {
                alert("Date de retrait doit être supérieure strictement à la date de dépôt.");
            } else if (jugementDate <= depotDate || jugementDate <= retraitDate) {
                alert("Date de jugement doit être supérieure strictement aux deux autres dates.");
            } else {
                $.ajax({

                    url: "{{ url('dossier/search/requete') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        'use strict';
                        $.toast({
                            heading: 'Success',
                            text: "Enregistrement Effectué !",
                            showHideTransition: 'slide',
                            icon: 'success',
                            loaderBg: '#f96868',
                            position: 'top-center',
                            hideAfter: 1000,
                        });
                        $('#Requete').modal('toggle');
                    }
                });
            }








        });



        // audiance

        $("#audiance_form").submit(function(e) {



            e.preventDefault();


            var form = $('#audiance_form').get(0);
            var formData = new FormData(form);
            var dateAudiance = new Date(formData.get('dateAudiance'));
            var audianceRetrait = new Date(formData.get('audianceRetrait'));


            if (dateAudiance <= audianceRetrait) {
                alert("Date d'audiance doit être supérieure strictement à la date de retrait.");
            } else {
                $.ajax({

                    url: "{{ url('dossier/search/audiance') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {


                        'use strict';
                        $.toast({
                            heading: 'Success',
                            text: "Enregistrement Effectué !",
                            showHideTransition: 'slide',
                            icon: 'success',
                            loaderBg: '#f96868',
                            position: 'top-center',
                            hideAfter: 1000,
                        });


                        $('#Audiance').modal('toggle');


                    }


                });
            }








        });




        // jugement

        $("#jugement_form").submit(function(e) {



            e.preventDefault();


            var form = $('#jugement_form').get(0);
            var formData = new FormData(form); // get the form data


            $.ajax({

                url: "{{ url('dossier/search/jugement') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {


                    'use strict';
                    $.toast({
                        heading: 'Success',
                        text: "Enregistrement Effectué !",
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-center',
                        hideAfter: 1000,
                    });


                    $('#Jugement').modal('toggle');


                }


            });






        });




        // notification

        $("#notification_form").submit(function(e) {



            e.preventDefault();


            var form = $('#notification_form').get(0);
            var formData = new FormData(form); // get the form data

            $.ajax({

                url: "{{ url('dossier/search/notification') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {


                    'use strict';
                    $.toast({
                        heading: 'Success',
                        text: "Enregistrement Effectué !",
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-center',
                        hideAfter: 1000,
                    });


                    $('#Notification').modal('toggle');


                }


            });






        });



        // CNA

        $("#cna_form").submit(function(e) {



            e.preventDefault();


            var form = $('#cna_form').get(0);
            var formData = new FormData(form); // get the form data


            $.ajax({

                url: "{{ url('dossier/search/cna') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {


                    'use strict';
                    $.toast({
                        heading: 'Success',
                        text: "Enregistrement Effectué !",
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-center',
                        hideAfter: 1000,
                    });


                    $('#CNA').modal('toggle');


                }


            });






        });



        // Execution

        $("#execution_form").submit(function(e) {



            e.preventDefault();


            var form = $('#execution_form').get(0);
            var formData = new FormData(form); // get the form data


            $.ajax({

                url: "{{ url('dossier/search/execution') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {


                    'use strict';
                    $.toast({
                        heading: 'Success',
                        text: "Enregistrement Effectué !",
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-center',
                        hideAfter: 1000,
                    });


                    $('#Execution').modal('toggle');


                }


            });






        });




        // PLAINTE

        $("#plainte_form").submit(function(e) {



            e.preventDefault();


            var form = $('#plainte_form').get(0);
            var formData = new FormData(form); // get the form data


            $.ajax({

                url: "{{ url('dossier/search/plainte') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {


                    'use strict';
                    $.toast({
                        heading: 'Success',
                        text: "Enregistrement Effectué !",
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-center',
                        hideAfter: 1000,

                    });


                    $('#PLAINTE').modal('toggle');


                }


            });






        });

        // CURRATEUTR

        $("#curateur_form").submit(function(e) {



            e.preventDefault();


            var form = $('#curateur_form').get(0);
            var formData = new FormData(form); // get the form data


            $.ajax({

                url: "{{ url('/dossier/search/curateur') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {


                    'use strict';
                    $.toast({
                        heading: 'Success',
                        text: "Enregistrement Effectué !",
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-center',
                        hideAfter: 1000,

                    });


                    $('#Curateur').modal('toggle');


                }


            });
        });

        $(document).on('click', 'button[data-role=closer]', function() {
            $('#recherche_dossier').fadeIn(500);
            $('#resultat_dossier').fadeOut(500);



        });
    </script>
@endsection
