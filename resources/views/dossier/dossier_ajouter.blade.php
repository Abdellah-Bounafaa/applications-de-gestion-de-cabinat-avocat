@extends('layouts.app')


<title>@yield('title')Bienvenue </title>


@section('css')
@endsection


@section('contenu')
    <form method="post" action="{{ url('dossier/ajouter/nouveau') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="card task-board">
                    <div class="card-header">
                        <h3>Informations</h3>
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


                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-form-label col-form-label-sm">Type De Dossier : </label>
                                        <select name="type_dossier" class="chosen-select">
                                            @foreach ($type_dossier as $type_dossier)
                                                <option value="{{ $type_dossier->ID_TYPEDOSSIER }}">
                                                    {{ $type_dossier->NOM }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm" for="client">Client : </label><br>


                                        <select name="client" data-placeholder="Choisir  Client..." class="chosen-select"
                                            tabindex="-1" style="display: none;" required>
                                            <option value=""></option>
                                            @foreach ($clients as $clients)
                                                <option value="{{ $clients->ID_CLIENT }}">{{ $clients->NOM }}
                                                    {{ $clients->PRENOM }}</option>
                                            @endforeach

                                        </select>

                                        <button type="button" class="btn btn-outline-primary btn-icon"
                                            title="ajouter Un nouveau Client" data-toggle="modal"
                                            data-target="#clientModal"><i class="ik ik-plus"></i></button>

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm" for="client">Adversaire :
                                        </label><br>


                                        <select name="adversaire" data-placeholder="Choisir Adversaire..."
                                            class="chosen-select" tabindex="-1" style="display: none;" required>
                                            <option value=""></option>

                                            @foreach ($adversaire as $adversaire)
                                                <option value="{{ $adversaire->ID_ADVERSAIRE }}">{{ $adversaire->NOM }}
                                                    {{ $adversaire->PRENOM }}</option>
                                            @endforeach



                                        </select>
                                        <button type="button" class="btn btn-outline-primary btn-icon"
                                            title="ajouter Un nouveau Adversaire" data-toggle="modal"
                                            data-target="#adversaireModal"><i class="ik ik-plus"></i></button>

                                    </div>
                                </div>





                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm">Radical De Client : </label>

                                        <input type="text" class="form-control" placeholder="Radical client"
                                            name="radical_client" required="required">


                                    </div>
                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-form-label col-form-label-sm">Agence : </label>

                                        <input type="text" class="form-control" placeholder="Agence" name="agence"
                                            required="required">


                                    </div>
                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm">Direction : </label>

                                        <input type="text" class="form-control" placeholder="Direction" name="direction"
                                            required="required">


                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm">Montant De Créance : </label>

                                        <div class="input-group">
                                            <input type="number" step="0.01" placeholder="montant creance"
                                                id="creance" name="creance" class="form-control" required>
                                            <span class="input-group-append" id="basic-addon3">
                                                <label class="input-group-text"
                                                    style="background-color:green;color:white">DH</label>
                                            </span>
                                        </div>


                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm">Nature De Dossier : </label>

                                        <select name="nature" class="chosen-select">
                                            @foreach ($nature as $nature)
                                                <option value="{{ $nature->ID_NATURE }}">{{ $nature->NOM }}</option>
                                            @endforeach

                                        </select>


                                    </div>
                                </div>








                            </div>

















                        </div>
                    </div>
                </div>
            </div>






            <div class="col-md-6">
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

                            <div class="row">




                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm">N° Dossier : </label>

                                        <input type="number" class="form-control" placeholder="Numéro Dossier"
                                            name="numero" required="required">


                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm">Radical De Cabinet : </label>

                                        <input type="number" class="form-control" placeholder="Radical Cabinet"
                                            name="radical_cabinet" required="required">


                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm">Date D'ouverture : </label>

                                        <input type="date" class="form-control" name="date" required="required"
                                            value="{{ date('Y-m-d') }}" disabled>


                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label class="col-form-label col-form-label-sm">Gestion D'utilisateur : </label>

                                        <select class="form-control text-center" name="user">
                                            @foreach ($user as $user)
                                                <option value="{{ $user->CIN }}">{{ $user->LOGIN }}</option>
                                            @endforeach


                                        </select>


                                    </div>
                                </div>





                            </div>








                        </div>
                    </div>
                </div>
            </div>











            <div class="col-md-6">
                <div class="card task-board">
                    <div class="card-header">
                        <h3>Documents</h3>
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


                            <div id="attache">



                                <div id="attachement0" class="row">
                                    <div class="col-md-10">
                                        <div class="form-group"><label>Attacher Un fichier : </label><input type="file"
                                                class="form-control form-control-primary" id="fichier[0]"
                                                name="fichier[0]"></div>
                                    </div>
                                    <div class="col-md-2" style="padding:auto;margin:auto"><button data-role="add"
                                            class="btn-icon btn-outline-success" type="button"><i
                                                class="ik ik-plus"></i></button></div>
                                </div>

                            </div>







                        </div>










                    </div>
                </div>
            </div>






            <div class="col-md-6" style="padding:auto;margin:auto">
                <div class="card task-board">

                    <div class="card-body todo-task">




                        <button type="submit" class="btn btn-success" style="width:100%">Ajouter</button>


                    </div>
                </div>
            </div>








        </div>
























    </form>


    <!-- Modal -->





    <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterLabel">Nouveau Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="background-color:#ccc">



                    @include('client/nouveau')




                </div>

            </div>
        </div>
    </div>





    <div class="modal fade" id="adversaireModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterLabel">Nouveau Adversaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="background-color:#ccc">
                    @include('adversaire/nouveau')
                </div>

            </div>
        </div>
    </div>
@endsection















@section('script')
    <script>
        $(document).ready(function() {

            $('.chosen-select').select2({
                width: "75%"
            });

            @if (Session::has('message'))

                'use strict';
                $.toast({
                    heading: 'Success',
                    text: "Enregistrement Effectué !",
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#f96868',
                    position: 'top-center'
                });
            @endif

        });



        //Caution


        function caution(select) {

            var select = select.value;

            if (select == 1) {

                $('#cautionnaire').html(
                    '<div class="card-header"><h3><i class="far fa-user"></i> &nbsp; Nouveau Cautionnaire </h3><div class="card-header-right"><ul class="list-unstyled card-option"><li><i class="ik ik-chevron-left action-toggle"></i></li><li><i class="ik ik-minus minimize-card"></i></li><li><i class="ik ik-x close-card"></i></li></ul></div></div><div class="card-body todo-task"><div class="dd" data-plugin="nestable" id="dd"><div class="row"><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientName">Nom : </label><input type="text" class="form-control form-control-sm" placeholder="Nom cautionnaire" id="nom_adversaire" name="nom_cautionnaire" required></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientId">Identifiant : </label><input type="text" class="form-control form-control-sm" placeholder="Identifiant cautionnaire" id="identifiant_adversaire" name="identifiant_cautionnaire"></div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientadress">Prenom : </label><input type="text" class="form-control form-control-sm" placeholder="Prenom cautionnaire" id="adresse_adversaire" name="prenom_cautionnaire"></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientadress">Adresse : </label><input type="text" class="form-control form-control-sm" placeholder="Adresse cautionnaire" id="adresse_adversaire" name="adresse_cautionnaire"></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientType">Type : </label><select class="form-control form-control-sm" id="type_cautionnaire" name="type_cautionnaire"><option value="1">Particulier</option><option value="2" selected>Entreprise</option><option value="3">Professionnel</option></select><label class="col-form-label col-form-label-sm" for="clientTel2">Téléphone 2 : </label><input type="text" class="form-control form-control-sm" placeholder="Téléphone cautionnaire" id="clientTel2" name="tel2_cautionnaire"></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientTel1">Téléphone : </label><input type="text" class="form-control form-control-sm" placeholder="Téléphone cautionnaire" id="clientTel1" name="tel_cautionnaire" required="required"><label class="col-form-label col-form-label-sm" for="clientMail">Email : </label><input type="email" class="form-control form-control-sm" placeholder="Email cautionnaire" id="clientMail" name="email_cautionnaire"></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientTel1">Mobile : </label><input type="text" class="form-control form-control-sm" placeholder="Téléphone cautionnaire" id="clientTel1" name="mobile_cautionnaire"></div></div></div></div></div>'
                );

            } else {

                $('#cautionnaire').html('');

            }





        }






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




        $(document).on('click', 'button[data-role=delete]', function() {

            var i = $(this).data('id');

            var k = i - 1;



            $('#attachement' + i + '').remove();

            $('button[data-id=' + k + ']').show();


        });
    </script>
@endsection
