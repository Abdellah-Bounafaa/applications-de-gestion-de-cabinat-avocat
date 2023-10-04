@extends('layouts.app')


<title>@yield('title')Bienvenue </title>


@section('css')
@endsection


@section('contenu')
    <div class="row">
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

                                    <label class="col-form-label col-form-label-sm">N°_Dossier : </label>

                                    <input type="text" class="form-control" placeholder="Numero Dossier"
                                        name="numero_dossier">


                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm">Radical_Cabinet : </label>

                                    <input type="text" class="form-control" placeholder="Radical Cabinet"
                                        name="radical_cabinet">


                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm">Réference_Client : </label>

                                    <input type="text" class="form-control" placeholder="Réference Client"
                                        name="reference_client">


                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <label class="col-form-label col-form-label-sm">Radical_Client : </label>

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
    </div>




    <div id="resultat" class="row" style="display:none">
        <div class="col-md-12">
            <div class="card task-board">
                <div class="card-header">
                    <h3>Dossier</h3>
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
        $(document).ready(function() {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $('.chosen-select').chosen({
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
                        '<div class="table-responsive"><table id="simpletable" class="table table-bordered nowrap" style="margin-left:1px"><thead class="text-center"><tr><th class="nosort">Actions</th><th>R.Cabinet</th><th>R.Client</th><th>Client</th><th>Adversaire</th><th>Gestionnaire</th><th>Date_Ouverture</th><th>Montant_Créance</th></thead><tbody id="tbody" class="text-center"></tbody></table></div>'
                    );



                    $.each(data, function(i, res) {


                        $('#tbody').append('<tr><td><button data-role="modifier" data-id="' +
                            res.ID_DOSSIER +
                            '" class="btn-icon btn-outline-success"  data-toggle="modal" data-target="#fullwindowModal"><i class="ik ik-edit"></i></button></td><td>' +
                            res.R_CABINET + '</td><td>' + res.R_CLIENT + '</td><td>' + res
                            .nom_client + '&nbsp;' + res.prenom_client + '</td><td>' + res
                            .nom_adversaire + '&nbsp;' + res.prenom_adversaire +
                            '</td><td>' + res.LOGIN + '</td><td>' + res.DATE_OUVERTURE +
                            '</td><td>' + res.MNT_CREANCE + ' DH</td></tr>');



                    });








                }




            });





        });



        $(document).on('click', 'button[data-role=modifier]', function() {



            $('#documentation').html('');

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
                    $('#gestion').val(data[0].cin).trigger('chosen:updated');
                    $('#montant_creance').val(data[0].MNT_CREANCE);
                    $('#type_dossier').val(data[0].type).trigger('chosen:updated');
                    $('#nom_nature').val(data[0].nature).trigger('chosen:updated');

                    $('#numero_archivage').val(data[0].NUM_ARCHIVAGE);
                    $('#observation').val(data[0].OBSERVATION);




                    $.each(data, function(i, res) {


                        url = res.chemin + '';


                        $('#documentation').append('<tr><td><a href="' + url +
                            '" target="_blank" style="color:blue;text-decoration: underline">' +
                            res.NOM_DOCUMENT + '</a></td><td>' + moment(res.date_doc)
                            .format('DD-MMM-YYYY') + '</td></tr>');


                    });


                }



            });






        });



        // ajouter document +1

        $(document).on('click', 'button[data-role=ajouter]', function() {



            $('#attache').html(
                '<div id="attachement0" class="row"><div class="col-md-10"><div class="form-group"><label>Attacher Un fichier : </label><input type="file" class="form-control form-control-primary" id="fichier[0]" name="fichier[0]"></div></div><div class="col-md-2" style="padding:auto;margin:auto"><button data-role="add" class="btn-icon btn-outline-success" type="button"><i class="ik ik-plus"></i></button></div></div>'
            );



        });


        // ajouter document i++

        $(document).on('click', 'button[data-role=add]', function() {



            var i = $('input[type=file]').length;

            $('#attache').append('<div id="attachement' + i +
                '" class="row"><div class="col-md-10"><div class="form-group"><label>Attacher Un fichier : </label><input type="file" class="form-control form-control-primary" name="fichier[' +
                i + ']" id="fichier[' + i +
                ']" required></div></div><div class="col-md-2" style="padding:auto;margin:auto"><button data-id="' +
                i +
                '" data-role="delete" class="btn-icon btn-outline-danger" type="button"><i class="ik ik-minus"></i></button></div></div>'
            );

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

            var id = document.getElementById('procedure[3]');
            if (id.checked == true) {



                var id_procedure = id.value;



                var nom_procedure = $('span[id=' + id_procedure + ']').html();


                if (!$('#index' + id_procedure + '').html()) {




                    $('#affichage_procedure').append('<div class="col-md-6" id="index' + id_procedure +
                        '"><div class="input-group input-group-dropdown"><input type="text" value="' +
                        nom_procedure +
                        '" class="form-control" aria-label="Text input with dropdown button"/disabled style="background-color:#06186A;color:white;font-weight:bold"><div class="input-group-append"><button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">choisir une option<i class="ik ik-chevron-down"></i></button><div class="dropdown-menu" id="resultat_json" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(224px, 36px, 0px);"></div></div></div></div>'
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


                                $('#resultat_json').append(
                                    '<a class="dropdown-item" data-role="ouverture" data-id="' +
                                    res.etape + '" data-procedure="' + id_procedure +
                                    '" href="javascript:void(0)">' + res.etape + '</a>');



                            });


                        }

                    });

                } else {

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


        });





        $(document).on('click', 'a[data-role=ouverture]', function() {

            var id_modal = $(this).data('id');

            var id_procedure = $(this).data('procedure');


            $('#id_procedure' + id_modal + '').val(id_procedure);

            $('#number_dossier' + id_modal + '').html($('#numero_dossier').html());


            $('#' + id_modal + '').modal('toggle');

        });
    </script>
@endsection
