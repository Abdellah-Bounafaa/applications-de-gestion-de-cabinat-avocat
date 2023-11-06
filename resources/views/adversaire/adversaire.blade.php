@extends('layouts.app')


<title>
    @yield('title')Gestion Adversaire</title>





@section('contenu')
    <div class="card">


        <div class="card-header">
            <h3> Gestion Adversaire</h3>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                    <li><i class="ik ik-minus minimize-card"></i></li>
                    <li><i class="ik ik-x close-card"></i></li>
                </ul>
            </div>


        </div>
        <div class="card-body">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true"><i class="fas fa-search"></i> Liste</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="liste-tab" data-toggle="tab" href="#nouveau" role="tab"
                        aria-controls="nouveau" aria-selected="false"><i class="fas fa-folder-plus"></i> Nouveau</a>
                </li>

            </ul>
        </div>
    </div>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="row">

                <div class="card">
                    <div class="card-header d-block">
                        <h3>Listes Adversaire</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="simpletable" class="table table-bordered nowrap">
                            <thead class="text-center">
                                <tr>
                                    <th class="nosort"><i class="ik ik-settings"></i></th>
                                    <th>RC/CIN</th>
                                    <th>Date_Création</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Ville</th>
                                    <th>Type</th>

                                    <th>Tel</th>
                                    <th>Caution</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($adversaire as $row)
                                    <tr>
                                        <td><button data-role="update" class="btn-icon btn-outline-success"
                                                data-toggle="modal" data-target="#edition"
                                                data-id="{{ $row->ID_ADVERSAIRE }}"
                                                data-identifiant="{{ $row->IDENTIFIANT }}"
                                                data-creation="{{ $row->DATE_CLT }}" data-nom="{{ $row->NOM }}"
                                                data-prenom="{{ $row->PRENOM }}" data-ville="{{ $row->ID_VILLE }}"
                                                data-type="{{ $row->ID_TYPET }}" data-adresse="{{ $row->ADRESSE }}"
                                                data-adresse1="{{ $row->ADRESSE1 }}" data-adresse2="{{ $row->ADRESSE2 }}"
                                                data-adresse3="{{ $row->ADRESSE3 }}" data-tel="{{ $row->TEL }}"
                                                data-tel2="{{ $row->TEl2 }}" data-caution="{{ $row->CAUTION }}"
                                                {{-- data-mobile="{{ $row->MOBILE }}" --}} data-email="{{ $row->EMAIL }}"><i
                                                    class="ik ik-edit"></i></button></td>
                                        <td>{{ $row->IDENTIFIANT }}</td>
                                        <td>{{ $row->DATE_CLT }}</td>
                                        <td>{{ $row->NOM }}</td>
                                        <td>{{ $row->PRENOM }}</td>
                                        <td>{{ $row->NOM_VILLE }}</td>
                                        <td>{{ $row->LIBELLE_TYPET }}</td>

                                        <td>{{ $row->TEL }}</td>
                                        <td>
                                            @if ($row->CAUTION == 0)
                                                <span class="badge badge-info">Non</span>
                                            @else
                                                <span class="badge badge-info">Oui</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="nouveau" role="tabpanel" aria-labelledby="nouveau-tab">
            @include('adversaire/nouveau')

        </div>
    </div>



    <!-- modal -->


    @include('adversaire/modifier')








    <!-- fin modal -->
@endsection












@section('script')
    <script>
        $(document).ready(function() {


            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $('.chosen-select').select2({
                width: "100%"
            });
            $('.chosen-select1').select2({
                width: "100%",
                dropdownParent: $('#edition')
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


        $(document).on('click', 'button[data-role=adresse]', function() {
            $(this).hide();
            $('#adresse_add').show();
            $('button[data-role=adressehide]').show();
        });

        $(document).on('click', 'button[data-role=adressehide]', function() {
            $('#adresse_add').hide();
            $(this).hide();
            $('button[data-role=adresse]').show();
            $(this).html(
                '<button data-role="adresse" type="button" class="btn btn-outline-primary btn-icon"><i class="ik ik-plus"></i></button>'
            );
        });




        $(document).on('click', 'button[data-role=modadresse]', function() {
            $(this).hide();
            $('#modadresse_add').show();
            $('button[data-role=modadressehide]').show();
        });

        $(document).on('click', 'button[data-role=modadressehide]', function() {


            $('#modadresse_add').hide();

            $(this).hide();
            $('button[data-role=modadresse]').show();

            $(this).html(
                '<button data-role="modadresse" type="button" class="btn btn-outline-primary btn-icon"><i class="ik ik-plus"></i></button>'
            );






        });


        //Caution


        function caution(select) {
            var select = select.value;
            if (select == 1) {
                $('#cautionnaire').html(
                    '<div class="card-header"><h3><i class="far fa-user"></i> &nbsp; Nouveau Cautionnaire </h3><div class="card-header-right"><ul class="list-unstyled card-option"><li><i class="ik ik-chevron-left action-toggle"></i></li><li><i class="ik ik-minus minimize-card"></i></li><li><i class="ik ik-x close-card"></i></li></ul></div></div><div class="card-body todo-task"><div class="dd" data-plugin="nestable" id="dd"><div class="row"><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" id="nom_label_cut" for="clientName">Nom : </label><input type="text" class="form-control form-control-sm" placeholder="Nom cautionnaire" id="nom_cautionnaire" name="nom_cautionnaire" required></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientId">RC/CIN : </label><input type="text" class="form-control form-control-sm" placeholder="Identifiant cautionnaire" id="identifiant_adversaire" name="identifiant_cautionnaire"></div></div></div><div class="row"> <div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientadress">Prénom : </label><input type="text" class="form-control form-control-sm" placeholder="Prenom cautionnaire" id="prenom_cutionnaire" name="prenom_cautionnaire"></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientadress">Adresse : </label><input type="text" class="form-control form-control-sm" placeholder="Adresse cautionnaire" id="adresse_adversaire" name="adresse_cautionnaire"></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientType">Type : </label><select class="form-control form-control-sm" id="type_cautionnaire" name="type_cautionnaire" onchange=' +
                    'togglePrenomField("type_cautionnaire","prenom_cutionnaire","nom_cautionnaire","nom_label_cut")' +
                    '><option value="1" selected>Particulier</option><option value="2">Entreprise</option><option value="3">Professionnel</option></select><label class="col-form-label col-form-label-sm" for="clientTel2">Téléphone 2 : </label><input type="text" class="form-control form-control-sm" placeholder="Téléphone cautionnaire" id="clientTel2" name="tel2_cautionnaire"></div></div><div class="col-md-6"><div class="form-group"><label class="col-form-label col-form-label-sm" for="clientTel1">Téléphone : </label><input type="text" class="form-control form-control-sm" placeholder="Téléphone cautionnaire" id="clientTel1" name="tel_cautionnaire" required="required"><label class="col-form-label col-form-label-sm" for="clientMail">Email : </label><input type="email" class="form-control form-control-sm" placeholder="Email cautionnaire" id="clientMail" name="email_cautionnaire"></div></div><div class="col-md-6"></div></div></div></div>'
                );
            } else {
                $('#cautionnaire').html('');
            }
        }


        //modification

        $(document).on('click', 'button[data-role=update]', function() {

            $('#adresse_add').hide();

            var id = $(this).data('id');
            var identifiant = $(this).data('identifiant');
            var nom = $(this).data('nom');
            var prenom = $(this).data('prenom');
            var ville = $(this).data('ville');
            var caution = $(this).data('caution');
            var type = $(this).data('type');
            var adresse = $(this).data('adresse');
            var adresse1 = $(this).data('adresse1');
            var adresse2 = $(this).data('adresse2');
            var adresse3 = $(this).data('adresse3');
            var email = $(this).data('email');
            var tel = $(this).data('tel');
            var tel2 = $(this).data('tel2');


            $('#id').val(id);
            $('#ville').val(ville).change();
            $('#nom').val(nom);
            $('#prenom').val(prenom);
            $('#identifiant').val(identifiant);
            $('#type').val(type).change();
            $('#adresse').val(adresse);
            $('#adresse1').val(adresse1);
            $('#adresse2').val(adresse2);
            $('#adresse3').val(adresse3)
            $('#email').val(email);
            $('#tel').val(tel);
            $('#tel2').val(tel2);
            $('#caution').val(caution);
            $('#type').val(type);

            if (caution == 1) {


                $.ajax({


                    url: "{{ url('adversaire/caution') }}",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#caution_modifier').html(
                            '<div class="col-md-12"><h5 class="pt-2 pb-2">Cautionnaire :</h5></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Type De Cautionnaire : </label><select class="form-control form-control-sm" id="type_caution" required onchange="togglePrenomField(\'type_caution\',\'prenom_caution\',\'nom_caution\',\'label_nom_cautionnaire\')" required>@foreach ($type as $typet)<option value="{{ $typet->ID_TYPET }}">{{ $typet->LIBELLE_TYPET }}</option>@endforeach</select></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm" id="label_nom_cautionnaire">Nom De Cautionnaire : </label><input type="text" class="form-control form-control-sm" placeholder="Nom De Cautionnaire" id="nom_caution" value="' +
                            data.NOM +
                            '" required></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Prénom De Cautionnaire : </label><input type="text" class="form-control form-control-sm" placeholder="Prénom De cautionnaire" id="prenom_caution" value="' +
                            (data.PRENOM === "null" ? '' : data.PRENOM) +
                            '" required></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Téléphone : </label><input type="text" class="form-control form-control-sm" placeholder="Téléphone De Cautionnaire" id="tel_caution" value="' +
                            data.TEL +
                            '" required></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Téléphone 2: </label><input type="text" class="form-control form-control-sm" placeholder="Téléphone De Cautionnaire" id="tel2_caution" value="' +
                            data.TEL2 +
                            '" required></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Email: </label><input type="text" class="form-control form-control-sm" placeholder="Email De Cautionnaire" id="email_caution" value="' +
                            data.EMAIL_CAUTIONNAIRE +
                            '" required></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Identifiant : </label><input type="text" class="form-control form-control-sm" placeholder="Identifiant De  Cautionnaire" id="identifiant_caution" value="' +
                            data.IDENTIFIANT +
                            '" required></div></div><div class="col-md-4"><div class="form-group"><label class="col-form-label col-form-label-sm">Adresse : </label><input placeholder="Adresse De Cautionnaire" type="text" value="' +
                            data.ADRESSE +
                            '" class="form-control form-control-sm" id="adresse_caution" required></div></div>'
                        );


                        $('#type_caution').val(data.ID_TYPET);


                    }


                });



            } else {
                $('#caution_modifier').html('');

            }



        });






        //sauvegarder

        $(document).on('click', 'button[data-role=sauvegarder]', function() {
            var id = $('#id').val();
            var ville = $('#ville').val();
            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var identifiant = $('#identifiant').val();
            var adresse = $('#adresse').val();
            var adresse1 = $('#adresse1').val();
            var adresse2 = $('#adresse2').val();
            var adresse3 = $('#adresse3').val();
            var tel = $('#tel').val();
            var tel2 = $('#tel2').val();
            var email = $('#email').val();
            var caution = $('#caution').val();
            var type = $('#type').val();
            if (caution == 0) {
                var fruits = new Array();
                fruits = [identifiant, nom, prenom, tel, adresse, ville, caution, type, id, adresse1, adresse2,
                    adresse3, tel2, email
                ];
                $.ajax({
                    url: "{{ url('adversaire/modifier') }}",
                    method: "POST",
                    data: {
                        fruits: fruits
                    },
                    success: function(data) {

                        'use strict';
                        $.toast({
                            heading: 'Success',
                            text: "Mise à jour Effectué !",
                            showHideTransition: 'slide',
                            icon: 'success',
                            loaderBg: '#f96868',
                            position: 'top-center'
                        });

                        setTimeout(function() {

                            window.location.reload();
                        }, 100);



                    }





                });


            } else {
                var nom_cautionnaire = $('#nom_caution').val();
                var prenom_cautionnaire = $('#prenom_caution').val();
                var identifiant_cautionnaire = $('#identifiant_caution').val();
                var tel_cautionnaire = $('#tel_caution').val();
                var type_cautionnaire = $('#type_caution').val();
                var adresse_cautionnaire = $('#adresse_caution').val();
                var email_cautionaire = $('#email_caution').val();
                var tel2_cautionnaire = $('#tel2_caution').val();
                var fruits = new Array();
                fruits = [identifiant, nom, prenom, tel, adresse, ville, caution, type, id, adresse1, adresse2,
                    adresse3, tel2, email, nom_cautionnaire, prenom_cautionnaire, identifiant_cautionnaire,
                    tel_cautionnaire,
                    type_cautionnaire, adresse_cautionnaire, email_cautionaire, tel2_cautionnaire
                ];
                $.ajax({
                    url: "{{ url('adversaire/modifier') }}",
                    method: "POST",
                    data: {
                        fruits: fruits
                    },
                    success: function(data) {

                        'use strict';
                        $.toast({
                            heading: 'Success',
                            text: "Mise à jour Effectué !",
                            showHideTransition: 'slide',
                            icon: 'success',
                            loaderBg: '#f96868',
                            position: 'top-center'
                        });

                        setTimeout(function() {

                            window.location.reload();
                        }, 100);



                    }





                });



            }













        });
    </script>
@endsection
